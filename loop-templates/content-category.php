<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="col-lg-4 col-md-6">
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	
		<header class="entry-header">
		<div <?php post_class('cell'); ?>>
			<div class="card my-3">
				<?php if (has_post_thumbnail()) : ?>
					<a href="<?php echo the_permalink();?>"><img class="single-card " data-pin-nopin="true" src="<?php the_post_thumbnail_url(); ?>" /></a>
				<?php endif; ?>
				<div class="card-section p-3">
					<div class="bio">
						<h2 class="section-title">
						<?php
							the_title(
								sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
								'</a></h2>'
							);
							?>
						</h2>
						<?php the_excerpt(); ?>
					</div>
				</div>
			</div>
		</div>
	
			<?php if ( 'post' == get_post_type() ) : ?>
	
				<div class="entry-meta">
					<?php understrap_posted_on(); ?>
				</div><!-- .entry-meta -->
	
			<?php endif; ?>
	
		</header><!-- .entry-header -->
	
	</article><!-- #post-## -->
</div>