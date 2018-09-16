<?php
/**
 * The search template file.
 *
 * @package WordPress
 * @subpackage Judgment
 * @since Judgment 1.0
 */

get_header(); ?>

	<div id="content-main">
		<div class="something-weird">You found something weird!</div>
		<?php if ( have_posts() ) : ?>
		<h1>Search for <?php the_search_query(); ?></h1>
			<ul class="secondary">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			</ul>
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
		<?php else : ?>
				<h1>Nothing Found</h1>
					<p>Nothing here. Try Searching again.</p>
					<?php get_search_form(); ?>
		<?php endif;?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


