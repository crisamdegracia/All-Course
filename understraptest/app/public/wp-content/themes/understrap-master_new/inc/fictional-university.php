<?php



//eto to display ung Archive pages with theeir own title and sub title
function pageBanner( $args = NULL ){

if( !$args['title'] ){
	$args['title'] = get_the_title();
}     
if( !$args['sub-title'] ){
	$args['sub-title'] = get_field('page_banner_subtitle');
} 
if ( !$args['photo'] ){
	if(get_field('page_banner_background_image')){
		$args['photo']     =  get_field('page_banner_background_image')['sizes']['pageBanner'];
	} else {
		$args['photo']     =  get_theme_file_uri('/images/ocean.jpg');

	}
}


?>

<div class="page-banner">
<div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']  ?>)">   
</div> 
<div class="page-banner__content container container--narrow">
	<h1 class="page-banner__title"><?php echo $args['title']; ?> </h1>
	<div class="page-banner__intro">
		<p><?php echo $args['sub-title'] ?></p>
	</div>
</div>  
</div>

<?php
} 


function university_adjust_queries($query){


	
	if( !is_admin() AND is_post_type_archive('program') AND $query->is_main_query() ) {
        $query->set('orderby','title');
        $query->set('order','ASC'); 
        $query->set('posts_per_page', 5); 
    }

}

//pre_get_posts - ryt before we get the post with the query
// its going to give a reference to the wordpress query object
add_action('pre_get_posts', 'university_adjust_queries');


function UniversityMapKey($api){

    $api['key'] = 'AIzaSyD-rsOXjG5-vXQEjd-YFC4zBBEEAb8tl6w';
    return $api;

}
//1st args to target the Advanced Custom Fields and let it know
// that we have Google Maps API
add_filter('acf/fields/google_map/api', 'UniversityMapKey');



function noSubAdminBar(){

    $currentUser = wp_get_current_user();

    /*
        before we create condition we need to create variable
        so we can look inside it. AHA! so we can look pala ha!

        if how many users are in the array, if there is 1 user, another check
        if the user is subscriber

        */
    if(count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber') {

        /* removes the admin bar */
        show_admin_bar(false);
    }

}

add_action('wp_loaded', 'noSubAdminBar');


?>

