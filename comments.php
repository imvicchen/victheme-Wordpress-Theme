<?php if (post_password_required()){return;} ?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

	<h2 class="vc-comments-title">
		<?php
			printf( _n( 'One thought on &ldquo; %2$s &rdquo;', '%1$s thoughts on &ldquo; %2$s &rdquo;', get_comments_number(), 'victheme' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
		?>
	</h2>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'twentyfourteen' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'victheme' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'victheme' ) ); ?></div>
	</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<ol class="commentlist">
		<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 50,
                'callback'          => victheme_comment,
			) );
		?>
	</ol><!-- .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'victheme' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'victheme' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'victheme' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'victheme' ); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>
   <?php 
    $comment_form_args = array(
    // 添加评论内容的文本域表单元素
  	'comment_field'         => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="5" placeholder="想喷就喷，别憋着..." aria-describedby="form-allowed-tags" aria-required="true" required="required"></textarea><span id="smilies">
    <a href=javascript:grin(":?:")><img src="/wp-content/themes/victheme/smilies/icon_question.gif" alt="?" /></a>
<a href=javascript:grin(":razz:")><img src="/wp-content/themes/victheme/smilies/icon_razz.gif" alt="razz" /></a>
<a href=javascript:grin(":sad:")><img src="/wp-content/themes/victheme/smilies/icon_sad.gif" alt="sad" /></a>
<a href=javascript:grin(":evil:")><img src="/wp-content/themes/victheme/smilies/icon_evil.gif" alt="evil" /></a>
<a href=javascript:grin(":!:")><img src="/wp-content/themes/victheme/smilies/icon_exclaim.gif" alt="!" /></a>
<a href=javascript:grin(":smile:")><img src="/wp-content/themes/victheme/smilies/icon_smile.gif" alt="smile" /></a>
<a href=javascript:grin(":oops:")><img src="/wp-content/themes/victheme/smilies/icon_redface.gif" alt="oops" /></a>
<a href=javascript:grin(":grin:")><img src="/wp-content/themes/victheme/smilies/icon_biggrin.gif" alt="grin" /></a>
<a href=javascript:grin(":eek:")><img src="/wp-content/themes/victheme/smilies/icon_surprised.gif" alt="eek" /></a>
<a href=javascript:grin(":shock:")><img src="/wp-content/themes/victheme/smilies/icon_eek.gif" alt="shock" /></a>
<a href=javascript:grin(":???:")><img src="/wp-content/themes/victheme/smilies/icon_confused.gif" alt="???" /></a>
<a href=javascript:grin(":cool:")><img src="/wp-content/themes/victheme/smilies/icon_cool.gif" alt="cool" /></a>
<a href=javascript:grin(":lol:")><img src="/wp-content/themes/victheme/smilies/icon_lol.gif" alt="lol" /></a>
<a href=javascript:grin(":mad:")><img src="/wp-content/themes/victheme/smilies/icon_mad.gif" alt="mad" /></a>
<a href=javascript:grin(":twisted:")><img src="/wp-content/themes/victheme/smilies/icon_twisted.gif" alt="twisted" /></a>
<a href=javascript:grin(":roll:")><img src="/wp-content/themes/victheme/smilies/icon_rolleyes.gif" alt="roll" /></a>
<a href=javascript:grin(":wink:")><img src="/wp-content/themes/victheme/smilies/icon_wink.gif" alt="wink" /></a>
<a href=javascript:grin(":idea:")><img src="/wp-content/themes/victheme/smilies/icon_idea.gif" alt="idea" /></a>
<a href=javascript:grin(":arrow:")><img src="/wp-content/themes/victheme/smilies/icon_arrow.gif" alt="arrow" /></a>
<a href=javascript:grin(":neutral:")><img src="/wp-content/themes/victheme/smilies/icon_neutral.gif" alt="neutral" /></a>
<a href=javascript:grin(":cry:")><img src="/wp-content/themes/victheme/smilies/icon_cry.gif" alt="cry" /></a>
<a href=javascript:grin(":mrgreen:")><img src="/wp-content/themes/victheme/smilies/icon_mrgreen.gif" alt="mrgreen" /></a>
</span></p>',
    // 评论之前的提示内容
  	'comment_notes_before'  => '',
  	// 评论之后的提示内容
  	'comment_notes_after'   => '',
     );
?>

    <?php comment_form($comment_form_args) ?>
</div><!-- #comments -->
<script type="text/javascript">
/* <![CDATA[ */
    function grin(tag) {
      var myField;
      tag = ' ' + tag + ' ';
        if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
        myField = document.getElementById('comment');
      } else {
        return false;
      }
      if (document.selection) {
        myField.focus();
        sel = document.selection.createRange();
        sel.text = tag;
        myField.focus();
      }
      else if (myField.selectionStart || myField.selectionStart == '0') {
        var startPos = myField.selectionStart;
        var endPos = myField.selectionEnd;
        var cursorPos = startPos;
        myField.value = myField.value.substring(0, startPos)
                + tag
                + myField.value.substring(endPos, myField.value.length);
        cursorPos += tag.length;
        myField.focus();
        myField.selectionStart = cursorPos;
        myField.selectionEnd = cursorPos;
      }      else {
        myField.value += tag;
        myField.focus();
      }
    }
/* ]]> */
</script>

