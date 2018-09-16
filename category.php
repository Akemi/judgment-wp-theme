<?php
/**
 * The template for displaying Category pages.
 *
 * @package WordPress
 * @subpackage Judgment
 * @since Judgment 1.0
 */

get_header(); ?>

	<div id="content-main">
		<div class="something-weird">You found something weird!</div>

		<?php if ( have_posts() ) : ?>
			<?php if(get_cat_id(single_cat_title("",false)) != get_cat_ID($project_cat)){ ?>
			<h1 class="archive-title"><?php printf( 'Category Archives: %s', '<span>'.single_cat_title( '', false ).'</span>' ); ?></h1>
			<ul class="secondary">
			<?php }
			else{ 
				global $wp_query;
				query_posts(
				   array_merge(
					  $wp_query->query,
					  array('posts_per_page' => -1)
				   )
				);
			?>
			<ul class="cat-project">
			<?php } ?>
				<?php if(get_cat_id(single_cat_title("",false)) == get_cat_ID($project_cat)){ 
					//only for project category
					$args = array( 'posts_per_page' => -1, 'orderby'=> 'title', 'order' => 'ASC', 'category' => get_cat_id(single_cat_title("",false)) );
					$glossaryposts = get_posts( $args ); 
					foreach( $glossaryposts as $post ) :	setup_postdata($post);
						//if(the_category_ID($echo=false) != get_cat_ID($project_cat)) get_template_part( 'content', get_post_format());
						//else 
						get_template_part( 'content', 'project' );
					endforeach;
				}
				else{ //for all other categories
					while ( have_posts() ) : the_post();
						//if(get_cat_id(single_cat_title("",false)) != get_cat_ID($project_cat)) get_template_part( 'content', get_post_format());
						//else get_template_part( 'content', 'project' );
						get_template_part( 'content', get_post_format());
					endwhile;
					?>
				
				<?php } ?>				
			</ul>
		<?php else : ?>
			<?php //get_template_part( 'content', 'none' ); 
			?>
			<h2>Sorry, nothing here.</h2>
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