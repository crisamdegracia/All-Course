
<footer class="site-footer">
	<div class="site-footer__inner container container--narrow">
		<div class="group">
			<div class="site-footer__col-one">
				<h1 class="school-logo-text school-logo-text--alt-color">
					<a href="<?php echo site_url(); ?>"><strong>Fictional</strong> University</a>
				</h1>
				<p><a class="site-footer__link" href="#">555.555.5555</a></p>
			</div>

			<div class="site-footer__col-two-three-group">
				<div class="site-footer__col-two">
					<h3 class="headline headline--small">Explore</h3>
					<nav class="nav-list">

						<ul>
							<li><a href="<?php echo site_url( '/about-us' ); ?>">About Us</a></li>
							<li><a href="<?php echo site_url( '/programs' ); ?>">Programs</a></li>
							<li><a href="<?php echo site_url( '/events' ); ?>">Events</a></li>
							<li><a href="<?php echo site_url( '/campuses' ); ?>">Campuses</a></li>
						</ul>



						<?php
						/*
						 wp_nav_menu(array(
						'theme_location' => 'footerMenuLocationOne'


						));*/

						?>


					</nav>
				</div>

				<div class="site-footer__col-three">
					<h3 class="headline headline--small">Learn</h3>
					<nav class="nav-list">
						<ul>

							<li><a href="<?php echo site_url( '/legal' ); ?>">Legal</a></li>
							<li><a href="<?php echo site_url( '/privacy-policy' ); ?>">Privacy</a></li>
							<li><a href="<?php echo site_url( '/careers' ); ?>">Careers</a></li>


							<?php
							/*
							 wp_nav_menu(array(
							'theme_location' => 'footerMenuLocationTwo'

							));
							*/

							?>
						</ul>
					</nav>
				</div>
			</div>

			<div class="site-footer__col-four">
				<h3 class="headline headline--small">Connect With Us</h3>
				<nav>
					<ul class="min-list social-icons-list group">
						<li>
							<a href="#" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="#" class="social-color-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="#" class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</footer>
<!-- <script id="__bs_script__">
	//<![CDATA[
	document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.26.14'><\/script>".replace("HOST", location.hostname));
	//]]>
</script> -->

<!--
-->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<!-- <script src="https://unpkg.com/@glidejs/glide"></script> -->

<?php wp_footer(); ?>
<!-- <script>
	var glide = new Glide(".glide", {
		type: "carousel",
		perView: 1,
		autoplay: 3000
	})

	glide.mount()
</script> -->

</body>

</html>
