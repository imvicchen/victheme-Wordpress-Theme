<div class='visible-lg visible-md col-md-3'>
    <div class='panel panel-default'>
        <div class='panel-body'>
            <?php get_search_form(); ?>
        </div>
    </div>
    <?php if(is_active_sidebar( 'sidebar-right')): ?>
    <?php dynamic_sidebar( 'sidebar-right'); ?>
    <?php endif; ?>
</div>