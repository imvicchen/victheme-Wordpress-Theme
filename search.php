<?php get_header(); ?>
        <div class="row">
            <div class="col-sm-12 col-md-9">
               <div class="well well-sm text-center">
                  搜索关键字：<?php the_search_query(); ?>
               </div>
                <?php if(have_posts()): ?>
                <?php while(have_posts()):the_post(); ?>
                <div class="thumbnail">
                    <div class="caption">
                        <h1 class="vc-page-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <p class="vc-author-info">
                            <time><?php echo get_the_date('Y-m-d'); ?></time> &bull; 
                            <span><?php echo get_the_author(); ?></span> &bull; 
                            <span><a href=""><?php comments_popup_link( '0','1','%');?>条评论</a></span>
                        </p>
                        <p class="hidden-xs">
                            <?php echo esc_attr(get_the_excerpt()); ?>
                        </p>
                        <p class="clearfix">
                            <a class="hidden-xs pull-right vc-more-link" href="<?php the_permalink(); ?>" role="button">继续阅读 &raquo;</a>
                            <span class="vc-tags">
                                <?php the_tags('',' ',''); ?>
                            </span>
                        </p>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif;?>
                <nav>
                  <ul class="pager">
                    <li class="previous">
                       <?php previous_posts_link(__('<i class="fa fa-angle-left"></i> Previous','victheme')) ?>
                    </li>
                    <li class="next">
                       <?php next_posts_link(__('Next <i class="fa fa-angle-right"></i>','victheme')) ?>
                    </li>
                  </ul>
                </nav>
            </div>
            <?php get_sidebar('right'); ?>
        </div>
    </div>
<?php get_footer(); ?>