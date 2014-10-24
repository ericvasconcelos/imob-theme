<?php if (!function_exists('add_action')) exit; ?>
<?php get_header(); ?>
    <section id="" class="<?php post_class('content-services bg-light'); ?>">
        <div class="container padding-sections">
            <div class="row">
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
                while (have_posts()) : the_post();?>

                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>