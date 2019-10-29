<?php
/**
 * Template name: Homepage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>
	<?php if ( get_header_image() ) : ?>
		<div id="site-header">
		<!-- data-pin-nopin="true" disabled pinterest button-->
			<div class="headerimg"><img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"data-pin-nopin="true"></div>
		</div>
	<?php endif; ?>
<div class="wrapper" id="page-wrapper">

	<div class="mx-5" id="content" tabindex="-1">

		<div class="row ">
			<main class="site-main" id="main">
				<div class="row align-content-center">
					<img class="img-responsive m-auto" 
						src="<?php 
						// To create an alternative logo depending on language displayed
						global $post;
						$lang = pll_get_post_language($post->ID);
						$location = bloginfo('stylesheet_directory').'/images/';
						$logo = pll_translate_string('Logo-blue-EN.svg', $lang); 
						echo $location . $logo;
						?>" 
						alt="Logo" data-pin-nopin="true">
				</div>
				<div class="nav-category row">
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="hovereffect">
							<img class="img-responsive" src=" <?php bloginfo('stylesheet_directory'); ?>/images/House-button.jpg" alt="button for the Home category page" data-pin-nopin="true">
							<div class="overlay">
							<a href="index.php//category_ecolo_tips/the-house/" title="The House" class="info">The House</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="hovereffect">
							<img class="img-responsive" src=" <?php bloginfo('stylesheet_directory'); ?>/images/Shopping-button.jpg" alt="button for the Shopping category page" data-pin-nopin="true">
							<div class="overlay">
								<a href="index.php/category_ecolo_tips/shopping/" class="info">The Shopping</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="hovereffect">
							<img class="img-responsive" src=" <?php bloginfo('stylesheet_directory'); ?>/images/Health-button.jpg" alt="button for the Health category page" data-pin-nopin="true">
							<div class="overlay">
								<a href="index.php//category_ecolo_tips/health/" class="info">The Health</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="hovereffect">
							<img class="img-responsive" src=" <?php bloginfo('stylesheet_directory'); ?>/images/Food-button.jpg" alt="button for the Food category page" data-pin-nopin="true">
							<div class="overlay">
								<a href="index.php//category_ecolo_tips/food/" class="info">The Food</a>
							</div>
						</div>
					</div>
				</div>

			<div class="mx-lg-5">
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php get_template_part( 'loop-templates/content', 'page' ); ?>
	
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
	
				<?php endwhile; // end of the loop. ?>
			</div>
			</main><!-- #main -->



		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer();
