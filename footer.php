    <footer class="vc-footer">
        <div class="vc-footer-info">
            <ul class="vc-footer-menu">
                <li><a class="vc-a" href="#!"><i class="fa fa-weixin"></i> <?php echo get_option('vc-weixin'); ?></a>
                </li>
                <li><a class="vc-a" target="_blank" href="<?php echo get_option('vc-weibo'); ?>"><i class="fa fa-weibo"></i></a>
                </li>
                <li><a class="vc-a" target="_blank" href="<?php echo get_option('vc-t'); ?>"><i class="fa fa-tencent-weibo"></i></a>
                </li>
                <li><a class="vc-a" target="_blank" href="<?php echo get_option('vc-github'); ?>"><i class="fa fa-github"></i></a>
                </li>
            </ul>
        </div>
        <div class="vc-footer-copyright">
            <div> Copyright &copy; <?php echo date('Y'); ?> <a class="vc-a" href="http://vicchen.me">Vic Theme</a>
            </div>
            Powered by <a class="vc-a" href="#!"><?php bloginfo('name'); ?></a> &bull; <?php echo get_option( 'zh_cn_l10n_icp_num' );?> <?php echo stripcslashes(get_option('vc-cnzz')); ?>
        </div>
        <div class="backtop" title="返回顶部" ></div>
    </footer>
    <script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/base.js"></script>
    <?php wp_footer(); ?>
</body>

</html>