<?php if (!function_exists('add_action')) exit;

add_action('after_setup_theme', 'imobiliaria_setup_theme');


function imobiliaria_setup_theme()
{
    imobiliaria_nav_menus();
    imobiliaria_theme_supports();
    imobiliaria_image_sizes();

    add_action('wp_enqueue_scripts', 'imobiliaria_scripts');
    add_action('widgets_init', 'imobiliaria_register_sidebars');

    add_filter('excerpt_length', 'imobiliaria_custom_excerpt_length', 999);
    add_filter('excerpt_more', 'imobiliaria_custom_excerpt_more');


}


function imobiliaria_scripts()
{
   
   wp_register_script(
        'imobiliaria-jquery-ui',
        get_stylesheet_directory_uri() . '/assets/js/jquery-ui.min.js',
        '',
        array('imobiliaria-jquery'),
        true
    );
    wp_register_script(
        'imobiliaria-viewportchecker',
        get_stylesheet_directory_uri() . '/assets/js/libs/jquery.viewportchecker.min.js',
        '',
        array('imobiliaria-jquery'),
        true
    );

    wp_register_script(
        'imobiliaria-main',
        get_stylesheet_directory_uri() . '/assets/js/main.min.js',
        '',
        array('imobiliaria-jquery'),
        true
    );
    wp_enqueue_style(
        'imobiliaria-style-main',
        get_stylesheet_directory_uri() . '/assets/css/main.css',
        true,
        'all'
    );

}

/*-------------------------------------------*
        Suporte do tema
*------------------------------------------*/
function imobiliaria_theme_supports()
{
    add_theme_support('post-thumbnails');
    add_theme_support('html5');
}
/*-------------------------------------------*
    Reegistrar Shortcode Depoimentos
*------------------------------------------*/
function imobiliaria_testimonials_shortcode($atts)
{
    get_template_part('template-part', 'testimonials');
}

add_shortcode('depoimentos', 'imobiliaria_testimonials_shortcode');
/*-------------------------------------------*
    Reegistrar Shortcode Usuarios
*------------------------------------------*/
function imobiliaria_users()
{
    get_template_part('template-part', 'users');
}

add_shortcode('users', 'imobiliaria_users');


/*-------------------------------------------*
        Navegação
*------------------------------------------*/
function imobiliaria_nav_menus()
{
    register_nav_menu('primary_navi', 'Menu do cabeçalho.');
    register_nav_menu('secondary_navi', 'Secondary Menu');
}

/*-------------------------------------------*
        Resumo e Tamnho dos posts
*------------------------------------------*/
function imobiliaria_custom_excerpt_length($length)
{
    return 20;
}

function imobiliaria_custom_excerpt_more($more)
{
    global $post;
    return ' ...';
}


/*-------------------------------------------*
        Adicionar area de widget
*------------------------------------------*/
function imobiliaria_register_sidebars()
{

    register_sidebar(
        array(
            'name' => 'Widgets Lateral',
            'id' => 'imobiliaria-widgets-side',
            'description' => 'Arraste aqui os widgets que serão exibidos na lateral do site.',
            'before_widget' => '<aside class="widget %2$s" id="%1$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        )
    );

    register_sidebar(
        array(
            'name' => 'Widgets Rodapé',
            'id' => 'imobiliaria-widgets-footer',
            'description' => 'Arraste aqui os widgets que serão exibidos no rodapé do site.',
            'before_widget' => '<aside class="widget %2$s" id="%1$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        )
    );
}

/*-------------------------------------------*
        Registrando area de widget
*------------------------------------------*/

function imobiliaria_register_widgets()
{

    register_widget('Widget_Apiki_Most_Commented');
}


/*-------------------------------------------*
        Imagens do site
*------------------------------------------*/
function imobiliaria_image_sizes()
{
    add_image_size('imobiliaria-home-medium', 234, 175, true);
    add_image_size('imobiliaria-home-small', 160, 85, true);
    add_image_size('imobiliaria-related-posts', 222, 160, true);
    add_image_size('imobiliaria-single-apps', 474, 327, true);
}

/*-------------------------------------------*
        Paginação
*------------------------------------------*/
function imobiliaria_pagination()
{
    global $wp_query;

    $big = 9999999999999; // need an unlikely integer

    echo paginate_links(
        array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'type' => 'list',
            'prev_next' => true,
            'prev_text' => 'Página Anterior',
            'next_text' => 'Próxima Página',
        )
    );
}



