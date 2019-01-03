<?php
/**
 * The template for displaying all pages.
 *
 * @package Theme Freesia
 * @subpackage Cocktail
 * @since Cocktail 1.0
 */

get_header();
$cocktail_settings = cocktail_get_theme_options();
$cocktail_display_page_single_featured_image = $cocktail_settings['cocktail_display_page_single_featured_image'];?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<header class="page-header">
				
				<?php cocktail_breadcrumb(); ?><!-- .breadcrumb -->
			</header><!-- .page-header -->
			<?php
			if( have_posts() ) {
				while( have_posts() ) {
					the_post(); ?>
			<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if(has_post_thumbnail() && $cocktail_display_page_single_featured_image == 0 ){ ?>
					<div class="entry-thumb">
						<figure class="entry-thumb-content">
							<?php the_post_thumbnail(); ?>
						</figure>
					</div><!-- end.post-image-content -->
				<?php } ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div> <!-- entry-content clearfix-->
				<?php
				wp_link_pages( array( 
						'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.esc_html__( 'Pages:', 'cocktail' ),
						'after'             => '</div>',
						'link_before'       => '<span>',
						'link_after'        => '</span>',
						'pagelink'          => '%',
						'echo'              => 1
						) );
				comments_template(); ?>
			</article>
			<?php }
			} else { ?>
			<h1 class="entry-title"> <?php esc_html_e( 'No Posts Found.', 'cocktail' ); ?> </h1>
			<?php
			} ?>
		</main><!-- end #main -->
	</div> <!-- #primary -->
<?php
get_sidebar();
?>
</div><!-- end .wrap -->
<?php
get_footer();