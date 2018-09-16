<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Judgment
 * @since Judgment 1.0
 */

get_header(); ?>

	

			<?php while ( have_posts() ) : the_post(); ?>

				

				<div class="content-main">
					<div class="something-weird">You found something weird!</div>
					
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
					<div class="content-post">
						<div class="cover-image" style="background-image: url('<?php echo $image[0]; ?>');">
							<div class="cover-image-bg"></div>
						</div>
						<div class="post-title">
							<h1><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf('Permalink to %s', the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h1>
							<h2>
								<?php the_author_posts_link() ?> on 
								<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php echo get_the_date(); ?></a>
							</h2>
						</div>
						<div class="post-desc">
							<?php the_content(); ?>
							
							<div class="post-footer">
								Posted in 
								<?php
									$categories = get_the_category();
									$separator = ' ';
									$output = '';
									if($categories){
										foreach($categories as $category) {
											$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
										}
										echo trim($output, $separator);
									}
									?>
								<span><?php the_tags('Tagged as ',' - ','<br />'); ?></span>
							</div>
							
						</div>
					</div>

					

				<?php comments_template( '', true ); ?>
				</div>
			<?php endwhile; // end of the loop. ?>

	

<?php get_sidebar(); ?>
<?php get_footer(); ?>