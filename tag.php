<?php
/**
 * The template for displaying Tag pages.
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @package WordPress
 * @subpackage Judgment
 * @since Judgment 1.0
 */

get_header(); ?>

	<div id="content-main">
		<div class="something-weird">You found something weird!</div>

		<?php if ( have_posts() ) : ?>
			<h1><?php printf('Tag Archives: %s', '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
			<ul class="secondary">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				endwhile;?>
			</ul>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		<div id="pagination-bar">
			<?php
				global $wp_query;
				$big = 999999999; // need an unlikely integer
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages,
					'prev_next'    => False,
				) );
			?>
		</div>
	</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>