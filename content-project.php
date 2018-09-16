<?php
/**
 * The template for displaying posts in the Project post format
 *
 * @package WordPress
 * @subpackage Judgment
 * @since Judgment 1.0
 */
?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
					<li>
						<img alt="logo" src="<?php echo $image[0]; ?>">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</li>
	