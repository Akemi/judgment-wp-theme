<?php
/**
 * Judgment functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * @package WordPress
 * @subpackage Judgment
 * @since Judgment 1.0
 */

$project_cat = "Projects";

function judgment_setup() {	
	add_theme_support( 'judgment' );
	
	register_nav_menu( 'primary', __( 'Primary Menu', 'judgment' ) );

	$defaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $defaults );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 750, 9999 ); 
	
	
	register_sidebar( array(
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


}
add_action( 'after_setup_theme', 'judgment_setup' );

function custom_excerpt_length( $length ) {
	return 170;
}
add_filter( 'excerpt_length', 'custom_excerpt_length');

function trim_excerpt($text){
	return rtrim($text,'[...]');
}
add_filter('get_the_excerpt', 'trim_excerpt');

function remove_ul ( $menu ){
    return preg_replace('~>\s*\n\s*<~', '><', $menu );
}
add_filter( 'wp_nav_menu', 'remove_ul' );

add_action('get_header', 'my_filter_head');

function my_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}


function judgment_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
?>
		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">

	<div class="comment-table">
		<div class="comment-row">
			<div class="comment-ava">
				<b><?php comment_author_link(); ?></b>
				<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 50 ); ?>
			</div>
		
			<?php if ($comment->comment_approved == '0') : ?>
				<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
			<?php endif; ?>

			<div class="comment-content"><?php echo comment_text(); ?></div>

			<div class="comment-right">
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
				<?php
					printf( __('%1$s <br>at %2$s'), get_comment_date(),  get_comment_time()) ?></a><br />
					<?php edit_comment_link(__('Edit'),'  ','' );
				?><br />
				<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
		</div>
	</div>
<?php
}
?>