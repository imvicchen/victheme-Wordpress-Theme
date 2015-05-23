<?php /**主题设置项更新页面**/
     
    //成功提示
    define('SuccessInfo','<div class="updated"><p><strong>设置已保存。</strong></p></div>');
     
    //基本设置
    function BaseSettings(){
    if ($_POST['update_options']=='true') {
    // 数据更新验证
    update_option('vc-keywords', $_POST['vc-keywords']); //keywords
    update_option('vc-description', $_POST['vc-description']); //description
    update_option('vc-cnzz', $_POST['vc-cnzz']); //cnzz
//    update_option('select-demo', $_POST['select-demo']); //theme-color
    echo SuccessInfo;
    }
    require_once(get_template_directory().'/inc/base.php'); //代码解耦
    add_action('admin_menu', 'BaseSettings');
    }
     
    //高级设置
    function AdvancedSettings(){
    if ($_POST['update_options']=='true') {
    update_option('vc-weixin', $_POST['vc-weixin']);//微信
    update_option('vc-weibo', $_POST['vc-weibo']);//新浪微博
    update_option('vc-t', $_POST['vc-t']);//腾讯微博
    update_option('vc-github', $_POST['vc-github']);//GitHub
    echo SuccessInfo;
    }
    require_once(get_template_directory().'/inc/advanced.php'); //代码解耦
    add_action('admin_menu', 'AdvancedSettings');
    }
     
    ?>