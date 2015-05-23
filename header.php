<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
    <meta <?php bloginfo('charset') ?>>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
    <title><?php wp_title(' | ',true,'right'); ?></title>
    <meta name="keywords" content="<?php echo get_option('vc-keywords'); ?>">
    <meta name="description" content="<?php echo get_option('vc-description'); ?>">
    <link rel="Bookmark" href="favicon.ico">
    <link rel="Shortcut Icon" href="favicon.ico" />
    <?php wp_head(); ?>
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/rewrite-bootstrap.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]> 
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
        <div class="alert alert-danger">您正在使用 <strong>过时的</strong> 浏览器. 是时候 <a href="http://browsehappy.com/">更换一个更好的浏览器</a> 来提升用户体验.</div>
    <![endif]-->
</head>

<body>
    <header class="vc-header">
        <nav class="navbar navbar-default" data-spy="affix" data-offset-top="15">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#vmenu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>">
                        <h1 class="vc-logo"><?php echo esc_attr(get_bloginfo('name','display')); ?></h1>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="vmenu">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'vic_menu',//注册菜单的名称
                        'menu_class'     => 'nav navbar-nav navbar-right',//主菜单css类名
                        'container'      => false,//导航容器标签类型
                        'fallback_cb'    => 'wp_page_menu',//没有设置导航的回调函数
                        'walker'         => new victheme_Nav_Walker,
						) ); ?>
                </div>
            </div>
        </nav>
    </header>
    <div class="container vc-container">
    	<form role="search" method="get" id="searchform" class="visible-xs visible-sm" action="<?php echo esc_url( home_url('/') ); ?>">
    <div class="input-group vc-form-search">
      				<input type="search" name="s" id="s" class="form-control vc-input-search" placeholder="<?php _e('Search for','victheme') ?>">
      				<span class="input-group-btn">
        					<button class="btn vc-btn-search" type="submit"><?php _e('Search','victheme') ?></button>
      				</span>
    	</div><!-- /input-group -->
    	</form>