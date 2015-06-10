<?php

function victheme_setup(){
    //加载语言文件
    load_theme_textdomain('victheme',get_template_directory().'/languages');
    //注册菜单
    register_nav_menu('vic_menu',__('vic_menu','victheme'));
}
add_action('after_setup_theme','victheme_setup');
// 开启文章缩略图(特色图像)
add_theme_support( 'post-thumbnails' );  

/*
 * WordPress 后台禁用Google Open Sans字体，加速网站
 */
function wpdx_disable_open_sans( $translations, $text, $context, $domain ) {
  if ( 'Open Sans font: on or off' == $context && 'on' == $text ) {
    $translations = 'off';
  }
  return $translations;
}
add_filter( 'gettext_with_context', 'wpdx_disable_open_sans', 888, 4 );

/*
 * 网站标题 不同页面加载不同标题
 */

function victheme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// 添加网站名称
	$title .= get_bloginfo( 'name' );

	// 为首页添加网站描述
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// 在页面标题中添加页码
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'victheme' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'victheme_wp_title', 10, 2 );



/*
 * 搜索模块 前台页面搜索DOM结构自定义，样式自定义
 */
function victheme_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<div class="form-group" style="margin-bottom:0;">
	<input type="search" value="' . get_search_query() . '" name="s" id="s" class="form-control" placeholder="'.__('Search for','victheme').'" />
	<input type="submit" id="searchsubmit" class="hide" value="'. esc_attr__( 'Search' ) .'" />
	</div>
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'victheme_search_form' );

/*
 *文章摘要结尾字符替换
 */
function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
/*
 *文章摘要截取字符长度
 */
function new_excerpt_length($length) {
    return 80;
}
add_filter('excerpt_length', 'new_excerpt_length');

/*
 * 注册小工具
 */
function victheme_widgets_init(){
    register_sidebar(array(
        'name' => __('Sidebar Right','victheme'),
        'id' => 'sidebar-right',
        'description' => __('Sidebar Right','victheme'),
        'before_widget' => '<div id="%1$s" class="panel panel-default vc-panel" >',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="vc-widget-title">',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init','victheme_widgets_init');

/*
 * 自定义评论列表
 */
function victheme_comment($comment, $args, $depth) {
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
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		<div class="comment-author vcard">
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
<?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
		<br />
<?php endif; ?>

		<time>
			<?php
				/* translators: 1: date, 2: time */
				printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','' );
			?>
		</time>
</div>

		<?php comment_text() ?>

		<footer class='comment-footer'>
		<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</footer>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
<?php
}

/*
 * 脚本与样式
 */
function victheme_scripts_styles() {
	global $wp_styles;
  //  需要时加载回复评论的脚本文件
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'victheme_scripts_styles' );

//修复4.2表情bug
function disable_emoji9s_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array(
            'wpemoji'
        ));
    } else {
        return array();
    }
}
//取当前主题下images\smilies\下表情图片路径
function custom_gitsmilie_src($old, $img) {
    return get_stylesheet_directory_uri() . '/smilies/' . $img;
}
function init_gitsmilie() {
    global $wpsmiliestrans;
    //默认表情文本与表情图片的对应关系(可自定义修改)
    $wpsmiliestrans = array(
        ':mrgreen:' => 'icon_mrgreen.gif',
        ':neutral:' => 'icon_neutral.gif',
        ':twisted:' => 'icon_twisted.gif',
        ':arrow:' => 'icon_arrow.gif',
        ':shock:' => 'icon_eek.gif',
        ':smile:' => 'icon_smile.gif',
        ':???:' => 'icon_confused.gif',
        ':cool:' => 'icon_cool.gif',
        ':evil:' => 'icon_evil.gif',
        ':grin:' => 'icon_biggrin.gif',
        ':idea:' => 'icon_idea.gif',
        ':oops:' => 'icon_redface.gif',
        ':razz:' => 'icon_razz.gif',
        ':roll:' => 'icon_rolleyes.gif',
        ':wink:' => 'icon_wink.gif',
        ':cry:' => 'icon_cry.gif',
        ':eek:' => 'icon_surprised.gif',
        ':lol:' => 'icon_lol.gif',
        ':mad:' => 'icon_mad.gif',
        ':sad:' => 'icon_sad.gif',
        '8-)' => 'icon_cool.gif',
        '8-O' => 'icon_eek.gif',
        ':-(' => 'icon_sad.gif',
        ':-)' => 'icon_smile.gif',
        ':-?' => 'icon_confused.gif',
        ':-D' => 'icon_biggrin.gif',
        ':-P' => 'icon_razz.gif',
        ':-o' => 'icon_surprised.gif',
        ':-x' => 'icon_mad.gif',
        ':-|' => 'icon_neutral.gif',
        ';-)' => 'icon_wink.gif',
        '8O' => 'icon_eek.gif',
        ':(' => 'icon_sad.gif',
        ':)' => 'icon_smile.gif',
        ':?' => 'icon_confused.gif',
        ':D' => 'icon_biggrin.gif',
        ':P' => 'icon_razz.gif',
        ':o' => 'icon_surprised.gif',
        ':x' => 'icon_mad.gif',
        ':|' => 'icon_neutral.gif',
        ';)' => 'icon_wink.gif',
        ':!:' => 'icon_exclaim.gif',
        ':?:' => 'icon_question.gif',
    );
    //移除WordPress4.2版本更新所带来的Emoji钩子同时挂上主题自带的表情路径
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emoji9s_tinymce');
    add_filter('smilies_src', 'custom_gitsmilie_src', 10, 2);
}
add_action('init', 'init_gitsmilie', 5);  

/* 访问计数 */
function record_visitors()
{
	if (is_singular())
	{
	  global $post;
	  $post_ID = $post->ID;
	  if($post_ID)
	  {
		  $post_views = (int)get_post_meta($post_ID, 'views', true);
		  if(!update_post_meta($post_ID, 'views', ($post_views+1)))
		  {
			add_post_meta($post_ID, 'views', 1, true);
		  }
	  }
	}
}
add_action('wp_head', 'record_visitors');
 
/// 函数名称：post_views
/// 函数作用：取得文章的阅读次数
function post_views($before = '(点击 ', $after = ' 次)', $echo = 1)
{
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
}

/*
 * Bootstrap 导航菜单
 */

class victheme_Nav_Walker extends Walker_Nav_Menu {

     /*
      * @see Walker_Nav_Menu::start_lvl()
      */
     function start_lvl( &$output, $depth ) {
          $output .= "\n<ul class=\"dropdown-menu\">\n";
     }

     /*
      * @see Walker_Nav_Menu::start_el()
      */
     function start_el( &$output, $item, $depth, $args ) {
          global $wp_query;
         
          $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
          $li_attributes = $class_names = $value = '';
          $classes = empty( $item->classes ) ? array() : (array) $item->classes;
          $classes[] = 'menu-item-' . $item->ID;

          if ( $args->has_children ) {
               $classes[] = ( 1 > $depth) ? 'dropdown': 'dropdown-submenu';
               $li_attributes .= ' data-dropdown="dropdown"';
          }

          $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
          $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

          $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
          $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

          $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

          $attributes     =     $item->attr_title     ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
          $attributes     .=     $item->target          ? ' target="' . esc_attr( $item->target     ) .'"' : '';
          $attributes     .=     $item->xfn               ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
          $attributes     .=     $item->url               ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
          $attributes     .=     $args->has_children     ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

          $item_output     =     $args->before . '<a' . $attributes . '>';
          $item_output     .=     $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
          $item_output     .=     ( $args->has_children AND 1 > $depth ) ? ' <b class="caret"></b>' : '';
          $item_output     .=     '</a>' . $args->after;

          $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
     }

     /*
      * @see Walker::display_element()
      */
     function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
          if ( ! $element )
               return;
          $id_field = $this->db_fields['id'];
          //display this element
          if ( is_array( $args[0] ) )
               $args[0]['has_children'] = (bool) ( ! empty( $children_elements[$element->$id_field] ) AND $depth != $max_depth - 1 );
          elseif ( is_object(  $args[0] ) )
               $args[0]->has_children = (bool) ( ! empty( $children_elements[$element->$id_field] ) AND $depth != $max_depth - 1 );

          $cb_args = array_merge( array( &$output, $element, $depth ), $args );
          call_user_func_array( array( &$this, 'start_el' ), $cb_args );

          $id = $element->$id_field;

          // descend only when the depth is right and there are childrens for this element
          if ( ( $max_depth == 0 OR $max_depth > $depth+1 ) AND isset( $children_elements[$id] ) ) {

               foreach ( $children_elements[ $id ] as $child ) {

                    if ( ! isset( $newlevel ) ) {
                         $newlevel = true;
                         //start the child delimiter
                         $cb_args = array_merge( array( &$output, $depth ), $args );
                         call_user_func_array( array( &$this, 'start_lvl' ), $cb_args );
                    }
                    $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
               }
               unset( $children_elements[ $id ] );
          }

          if ( isset( $newlevel ) AND $newlevel ) {
               //end the child delimiter
               $cb_args = array_merge( array( &$output, $depth ), $args );
               call_user_func_array( array( &$this, 'end_lvl' ), $cb_args );
          }

          //end this element
          $cb_args = array_merge( array( &$output, $element, $depth ), $args );
          call_user_func_array( array( &$this, 'end_el' ), $cb_args );
     }
}

/*
 * 给激活的导航菜单添加 .active
 */
function victheme_nav_menu_css_class( $classes ) {
     if ( in_array('current-menu-item', $classes ) OR in_array( 'current-menu-ancestor', $classes ) )
          $classes[]     =     'active';

     return $classes;
}
add_filter( 'nav_menu_css_class', 'victheme_nav_menu_css_class' );

/*
 * 自定义后台设置
 */
//添加设置菜单，注意add_menu_page和add_submenu_page的写法
add_action('admin_menu', 'options_admin_menu');
function options_admin_menu(){
    add_menu_page( '主题设置', '主题设置', 'administrator', 'base-settings', 'BaseSettings', '', 100);
    add_submenu_page('base-settings', '基本设置', '基本设置', 'administrator', 'base-settings', 'BaseSettings');
    add_submenu_page('base-settings', '高级设置', '高级设置', 'administrator', 'advanced-settings', 'AdvancedSettings');
}
     
//加载设置文件
add_action('admin_head', 'OptionFile');
function OptionFile(){
	require_once( get_template_directory() . '/inc/option.php' ); //代码解耦
}

//后台自定义选项样式
    add_action("admin_print_styles", "OptionsStyle" );
    function OptionsStyle(){
    wp_enqueue_style( "admin_css", get_template_directory_uri() . "/inc/options.css" );
    }
