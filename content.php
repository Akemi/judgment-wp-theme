<?php
/**
 * The template for displaying posts in no specific post format
 *
 * @package WordPress
 * @subpackage Judgment
 * @since Judgment 1.0
 */
?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
		<li style="background-image: url('<?php echo $image[0]; ?>');">
			<h1><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf('Permalink to %s', the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h1>
			
			<div class="post-desc">
				<div><?php echo get_the_excerpt();  ?></div>
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf('Permalink to %s', the_title_attribute( 'echo=0' ) ) ); ?>">More...</a>
			</div>
		</li>
	