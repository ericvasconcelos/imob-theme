<?php get_header() ?>
<?php
if (($locations = get_nav_menu_locations()) && $locations['primary_navi']) {
    $menu = wp_get_nav_menu_object($locations['primary_navi']);
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    $pageID = array();
    foreach ($menu_items as $item) {
        if ($item->object == 'page')
            $pageID[] = $item->object_id;
    }
    query_posts(array('post_type' => 'page', 'post__in' => $pageID, 'posts_per_page' => count($pageID), 'orderby' => 'post__in'));
}
while (have_posts()) : the_post();
    if (get_field('full_width')) {
        get_template_part('template-part', 'full-width');
    } else {
        get_template_part('template-part', 'default');
    }
endwhile;

?>
<?php get_footer() ?>