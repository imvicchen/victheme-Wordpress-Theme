<?php get_header(); ?>
        <div class="row">
            <div class="col-sm-12 col-md-9">
               <div class="well well-sm text-center">
                  <?php
    	/* 查询第一个文章，这样我们就知道整个页面的作者是谁。
    	 * 在下面我们使用 rewind_posts() 重置了一下，这样一会儿我们才能正确运行循环。
    	 */
    	the_post();
    ?>
    <?php
    	if ( is_day() ) :
    		printf( __( 'Daily Archives: %s', 'victheme' ), '<span>' . get_the_date() . '</span>' );
    	elseif ( is_month() ) :
    		printf( __( 'Monthly Archives: %s', 'victheme' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'victheme' ) ) . '</span>' );
    	elseif ( is_year() ) :
    		printf( __( 'Yearly Archives: %s', 'victheme' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'victheme' ) ) . '</span>' );
    	elseif ( is_category() ) :
    	  printf( __( 'Category Archives: %s', 'victheme' ), '<span>' . single_cat_title( '', false ) . '</span>' );
    	elseif ( is_tag() ) :
    	  printf( __( 'Tag Archives: %s', 'victheme' ), '<span>' . single_tag_title( '', false ) . '</span>' );
    	elseif ( is_author() ) :
    	  printf( __( 'Author Archives: %s', 'victheme' ), '<span>' . get_the_author() . '</span>' );
    	else :
    		_e( 'Archives', 'victheme' );
    	endif;
    ?>
    <?php 
      /* 把循环恢复到开始，
       * 这样下面的循环才能正常运行。
       */
      rewind_posts(); 
    ?>
               </div>
                <?php if(have_posts()): ?>
                <?php while(have_posts()):the_post(); ?>
                <div class="thumbnail">
                    <div class="caption">
                        <h1 class="vc-page-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <p class="vc-author-info">
                            <time><?php echo get_the_date('Y-m-d'); ?></time> &bull; 
                            <span><?php echo get_the_author(); ?></span> &bull; 
                            <span><a href=""><?php comments_popup_link( '0','1','%');?>条评论</a></span> &bull;
                        		<span><?php post_views(' ', ' 次浏览'); ?></span>
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