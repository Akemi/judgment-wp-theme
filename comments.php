<?php
/**
 * The template for displaying Comments.
 *
 * @package WordPress
 * @subpackage Judgment
 * @since Judgment 1.0
 */
 
if ( post_password_required() )
	return;
?>

<div id="comments">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &rdquo;%2$s&rdquo;', get_comments_number()),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>

		<ol class="commentlist">
			<?php wp_list_comments( 'type=comment&callback=judgment_comment' ); ?>
		</ol><!-- .commentlist -->

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments">Comments are closed</p>
		<?php endif; ?>
	<?php endif; ?>
	<?php
	$args = array(
		'id_form' => 'commentform',
		'id_submit' => 'submit',
		'title_reply' => __( 'Leave a Reply' ),
		'title_reply_to' => __( 'Leave a Reply to %s' ),
		'cancel_reply_link' => __( 'Cancel Reply' ),
		'label_submit' => __( 'Post Comment' ),
		'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
		'comment_notes_after' => '',
		'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
		'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
		'url' => '<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>' ) ) );
	?>

	<?php comment_form($args); ?>

</div><!-- #comments .comments-area -->