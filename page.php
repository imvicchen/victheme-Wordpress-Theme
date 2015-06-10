<?php get_header(); ?>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <?php if(have_posts()): ?>
                <?php while(have_posts()):the_post(); ?>
                <article class="vc-blog">
                    <h1 class="vc-blog-title"><?php the_title(); ?></h1>
                    <p class="vc-author-info">
                        <time>
                            <?php echo get_the_date( 'Y-m-d'); ?>
                        </time> &bull;
                        <span><?php echo get_the_author(); ?></span> &bull;
                        <span><a href=""><?php comments_popup_link( '0','1','%');?>条评论</a></span> &bull;
                        <span><?php post_views(' ', ' 次浏览'); ?></span>
                    </p>
                    <div class="vc-blog-content">
                        <?php the_content(); ?>
                    </div>
                    <span class="vc-tags">
                            <?php the_tags('',' ',''); ?>
                        </span>
                    <div class="vc-copyright">
                        本站文章除注明转载外，均为原创文章。转载请注明：文章转载自：
                        <?php bloginfo( 'name'); ?>（
                        <a href="<?php bloginfo('url'); ?>">
                            <?php bloginfo( 'url'); ?>
                        </a>）
                    </div>
                </article>
                <?php endwhile; ?>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>