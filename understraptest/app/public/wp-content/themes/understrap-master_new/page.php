<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();


while (have_posts()){
    the_post();
    
    pageBanner( array() );

  
?>

<div class="container container--narrow page-section">
	
    <?php
    /* Get the ID of the parent page if meron. */
    $parentPageID  = wp_get_post_parent_id( get_the_ID() );

    // if nasa child page tayo we will check here kung merong parent page 
    // tapos yan ung magiging output
    if (  $parentPageID  ) { ?>

    <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo get_the_permalink( $parentPageID) ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title( $parentPageID ) ?></a> <span class="metabox__main"><?php the_title() ?></span></p>

    </div>


    <?php
                           }
    ?>


    <?php 

    // $testArray's role here is to double check
    //child_of - numerical ID of a certain page or post
    // kung parehas merong parent page lalabas ung links sa gilid
    $testArray = get_pages(array(
        'child_of'  => get_the_ID()
    ));

    //1st condition we test that 
    //if parentPageID has an ID
    //2nd condition is to check the child page
    if( $parentPageID or $testArray ) { ?>

    <div class="page-links">
        <h2 class="page-links__title"><a href="<?php echo get_the_permalink( $parentPageID ) ?>"><?php echo get_the_title($parentPageID) ?></a></h2>
        <ul class="min-list">

            <?php 

        if( $parentPageID ){
            $findChildrenOf = $parentPageID;
        } else {
            $findChildrenOf = get_the_ID();
        }

                                       wp_list_pages( array(
                                           //title_li is empty 
                                           //child_of - numerical ID of a certain page or post
                                           //sort_column => 'menu_order' we can choose the order output of link -
                                           // ^ you can control this on right panel and choose the order number
                                           'title_li' => NULL,
                                           'child_of' => $findChildrenOf,
                                           'sort_column' => 'menu_order'


                                       ))   ?>

        </ul>
    </div>
    <?php } ?>

    <div class="generic-content">
        <p><?php the_content(); ?></p>
    </div>

</div>



<?php 
}
?>


<?php 

get_footer();
?>