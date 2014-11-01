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


function imobiliaria_scripts() {   
    $template_url = get_template_directory_uri();

    // Main jQuery.
    wp_enqueue_script('imobiliaria-jquery', $template_url . '/assets/js/jquery.min.js', array(), null, true );

    // Main JS.
    wp_enqueue_script('imobiliaria-mainjs', $template_url . '/assets/js/main.js' , array(), null, true );

    // Main CSS.
    wp_enqueue_style('imobiliaria-style-main', $template_url . '/assets/css/main.css', true, 'all');

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

    // register_sidebar(
    //     array(
    //         'name' => 'Widgets Lateral',
    //         'id' => 'imobiliaria-widgets-side',
    //         'description' => 'Arraste aqui os widgets que serão exibidos na lateral do site.',
    //         'before_widget' => '<aside class="widget %2$s" id="%1$s">',
    //         'after_widget' => '</aside>',
    //         'before_title' => '<h1 class="widget-title">',
    //         'after_title' => '</h1>',
    //     )
    // );

    register_sidebar(
        array(
            'name' => 'Widgets Rodapé',
            'id' => 'imobiliaria-widgets-footer',
            'description' => 'Arraste aqui os widgets que serão exibidos no rodapé do site.',
            'before_widget' => '<div class="widget %2$s col-3" id="%1$s">',
            'after_widget' => '</div>',
            'before_title' => '<h1 class="widget-title-footer">',
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

/*-------------------------------------------*
    Desativando alguns widgets
*------------------------------------------*/
function remove_some_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Nav_Menu_Widget');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
}

add_action( 'widgets_init', 'remove_some_widgets' );

/*-------------------------------------------*
    Criado um widget
*------------------------------------------*/
class about_us_widget extends WP_Widget {

function __construct() {
    parent::__construct(
    // Base ID of your widget
    'about_us_widget', 

    // Widget name will appear in UI
    __('Sobre você/empresa', 'about_us_widget_domain'), 

    // Widget description
    array( 'description' => __( 'Descreva sobre você ou sua empresa', 'about_us_widget_domain' ), ) 
    );
}

// Criando o Front-end do Widget
public function widget( $args, $instance ) {

    $title = apply_filters( 'widget_title', $instance['title'] );
    $descricao = apply_filters( 'widget_descricao', $instance['descricao'] );
    // Tag de abertura 
    echo $args['before_widget'];
    echo '<div class="about-us">';

        // Título
        if ( ! empty( $title ) )
        echo $args['before_title'] . $title . $args['after_title'];

        // Descrição
        if ( ! empty( $descricao ) )
        echo '<p>' . $descricao . '</p>';
    
    echo '</div>';
    // Tag de fechamento
    echo $args['after_widget'];
}
        
// Widget Back-end 
public function form( $instance ) {
    if ( isset( $instance[ 'descricao' ] ) ) {
        $descricao = $instance[ 'descricao' ];
    } else {
        $descricao = __( 'Nova Descrição', 'about_us_widget_domain' );
    }

    if ( isset( $instance[ 'title' ] ) ) {
        $title = $instance[ 'title' ];
    } else {
        $title = __( 'Título', 'about_us_widget_domain' );
    }

?>
<p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Título:'); ?></label>
    <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />

    <label for="<?php echo $this->get_field_id( 'descricao' ); ?>"><?php _e( 'Descrição:' ); ?></label> 
    <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 'descricao' ); ?>" name="<?php echo $this->get_field_name( 'descricao' ); ?>">
        <?php if (!empty($descricao)) echo $descricao; ?>
    </textarea>
</p>

<?php 
}
    
// Atualizando o widget substituindo as antigas instâncias com as novas
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['descricao'] = ( ! empty( $new_instance['descricao'] ) ) ? strip_tags( $new_instance['descricao'] ) : '';
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }

} // fim da class about_us_widget

// Registrando e rodando o widget
function about_us_load_widget() {
    register_widget( 'about_us_widget' );
}
add_action( 'widgets_init', 'about_us_load_widget' );
