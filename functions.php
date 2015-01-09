<?php 

/**
 * Odin Classes.
 */
// require_once get_template_directory() . '/core/classes/class-shortcodes.php';
// require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
// require_once get_template_directory() . '/core/classes/class-post-type.php';
// require_once get_template_directory() . '/core/classes/class-taxonomy.php';
// require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';

add_action('admin_notices', 'showAdminMessages');

function showAdminMessages()
{
    $plugin_messages = array();

    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    // SEO by Yoast
    if(!is_plugin_active( 'wordpress-seo/wp-seo.php' )) {
        $plugin_messages[] = 'Esse tema requer que você instale o plugin <a href="' . get_site_url() . '/wp-admin/update.php?action=install-plugin&plugin=wordpress-seo&_wpnonce=7dbe669aaa">Wordpress SEO by Yoast</a>.';
    }
    // Contact form 7
    if(!is_plugin_active( 'contact-form-7/wp-contact-form-7.php' )) {
        $plugin_messages[] = 'Esse tema requer que você instale o plugin <a href="' . get_site_url() . '/wp-admin/update.php?action=install-plugin&plugin=wordpress-seo&_wpnonce=7dbe669aaa">Contact form 7</a>.';
    }
    // Wysija Newsletter
    if(!is_plugin_active( 'wysija-newsletters/index.php' )) {
        $plugin_messages[] = 'Esse tema requer que você instale o plugin <a href="' . get_site_url() . '/wp-admin/update.php?action=install-plugin&plugin=wordpress-seo&_wpnonce=7dbe669aaa">Wysija Newsletter</a>.';
    }
    // 

    if(count($plugin_messages) > 0) {
        echo '<div id="message" class="error">';

            foreach($plugin_messages as $message)
            {
                echo '<p><strong>'.$message.'</strong></p>';
            }

        echo '</div>';
    }
}



if (!function_exists('add_action')) exit;

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



/*-------------------------------------------*
    Theme oprtions - Usando odin
*------------------------------------------*/
function odin_theme_settings() {

    $settings = new Odin_Theme_Options(
        'odin-settings', // Slug/ID of the Settings Page (Required)
        'Informações do Site', // Settings page name (Required)
        'manage_options' // Page capability (Optional) [default is manage_options]
    );

    $settings->set_tabs(
        array(
            array(
                'id' => 'info_contact', // Slug/ID of the Settings tab (Required)
                'title' => __( 'Informações', 'odin' ), // Settings tab title (Required)
            ),
        )
    );

    $settings->set_fields(
        array('info_contact_fields_section' => array( // Slug/ID of the section (Required)
                'tab'   => 'info_contact', // Tab ID/Slug (Required)
                'title' => __( 'Informações de Contato', 'odin' ), // Section title (Required)
                'fields' => array( // Section fields (Required)
                    // Image logo.
                    array(
                        'id'          => 'logomarca_opts', // Required
                        'label'       => __( 'Logomarca (logo)', 'odin' ), // Required
                        'type'        => 'image', // Required
                        'description' => __( 'Faça o upload da imagem de sua logomarca', 'odin' ), // Opcional
                    ),

                    // input tel.
                    array(
                        'id'          => 'tel_opts', // Required
                        'label'       => __( 'Telefone', 'odin' ), // Required
                        'type'        => 'input', // Required
                        'attributes'  => array( // Optional (html input elements)
                            'type' => 'tel',
                            'placeholder' => __( '(00) 0000-0000' )
                        )
                    ),
                    // input tel.
                    array(
                        'id'          => 'tel_adicional_opts', // Required
                        'label'       => __( 'Telefone adicional', 'odin' ), // Required
                        'type'        => 'input', // Required
                        'description' => __( 'Adicione mais um telefone se for necessário', 'odin' ), // Optional
                        'attributes'  => array( // Optional (html input elements)
                            'type' => 'tel',
                            'placeholder' => __( '(00) 0000-0000' )
                        )
                    ),
                    // input email.
                    array(
                        'id'          => 'email_opts', // Required
                        'label'       => __( 'Email de contato', 'odin' ), // Required
                        'type'        => 'input', // Required
                        // 'default'  => 'Default text', // Optional
                        'attributes'  => array( // Optional (html input elements)
                            'type' => 'email',
                            'placeholder' => __( 'meuemail@meusite.com.br' ),
                            'style'   => 'width: 250px;'
                        )
                    ),
                    // Textarea - Endereço
                    array(
                        'id'          => 'end_opts', // Obrigatório
                        'label'       => __( 'Endereço', 'odin' ), // Obrigatório
                        'type'        => 'textarea', // Obrigatório
                        'attributes'  => array( // Opcional (atributos para input HTML/HTML5)
                            'placeholder' => __( 'Avenida Rio Branco, n° 68, apto 602, Rio de Janeiro - RJ - 20090-004' )
                        ),
                        'description' => __( 'Escreva seu endereço completo, inclusive com complemento e CEP', 'odin' ), // Opcional
                    ),
                    // url facebook
                    array(
                        'id'          => 'fb-link', // Required
                        'label'       => __( 'Facebook (link)', 'odin' ), // Required
                        'type'        => 'input', // Required
                        'attributes'  => array( // Optional (html input elements)
                            'type' => 'url',
                            'placeholder' => __( 'http://www.facebok.com/minhapágina' ),
                            'style'   => 'width: 350px;'
                        )
                    ),
                    // url twitter
                    array(
                        'id'          => 'twt-link', // Required
                        'label'       => __( 'Twitter (link)', 'odin' ), // Required
                        'type'        => 'input', // Required
                        'attributes'  => array( // Optional (html input elements)
                            'type' => 'url',
                            'placeholder' => __( 'http://www.twitter.com/minhapágina' ),
                            'style'   => 'width: 350px;'
                        )
                    ),
                    // url instagram
                    array(
                        'id'          => 'insta-link', // Required
                        'label'       => __( 'Instagram (link)', 'odin' ), // Required
                        'type'        => 'input', // Required
                        'attributes'  => array( // Optional (html input elements)
                            'type' => 'url',
                            'placeholder' => __( 'http://www.instagram.com/minhapágina' ),
                            'style'   => 'width: 350px;'
                        )
                    ),
                    // url Linkedin
                    array(
                        'id'          => 'linked-link', // Required
                        'label'       => __( 'Linkedin (link)', 'odin' ), // Required
                        'type'        => 'input', // Required
                        'attributes'  => array( // Optional (html input elements)
                            'type' => 'url',
                            'placeholder' => __( 'http://www.linkedin.com/minhapágina' ),
                            'style'   => 'width: 350px;'
                        )
                    ),
                    // url Youtube
                    array(
                        'id'          => 'yt-link', // Required
                        'label'       => __( 'YouTube (link)', 'odin' ), // Required
                        'type'        => 'input', // Required
                        'attributes'  => array( // Optional (html input elements)
                            'type' => 'url',
                            'placeholder' => __( 'http://www.youtube.com/minhapágina' ),
                            'style'   => 'width: 350px;'
                        )
                    ),
                    // url Google plus
                    array(
                        'id'          => 'gplus-link', // Required
                        'label'       => __( 'YouTube (link)', 'odin' ), // Required
                        'type'        => 'input', // Required
                        'attributes'  => array( // Optional (html input elements)
                            'type' => 'url',
                            'placeholder' => __( 'http://www.plus.google.com/minhapágina' ),
                            'style'   => 'width: 350px;'
                        )
                    ),
                    // url Pinterest
                    array(
                        'id'          => 'pint-link', // Required
                        'label'       => __( 'Pinterest (link)', 'odin' ), // Required
                        'type'        => 'input', // Required
                        'attributes'  => array( // Optional (html input elements)
                            'type' => 'url',
                            'placeholder' => __( 'http://www.pinterest.com/minhapágina' ),
                            'style'   => 'width: 350px;'
                        )
                    ),
                    array(
                        'id'    => 'zopim', // Obrigatório
                        'label' => __( 'Zopim - chat online', 'odin' ), // Obrigatório
                        'type'        => 'textarea', // Obrigatório
                        'attributes'  => array( // Opcional (atributos para input HTML/HTML5)
                            'placeholder' => __( 'Cole seu código aqui' ),
                            'cols'       => '80',
                            'rows'      => '10'
                        ),
                        'description' => __( 'Coloque aqui o código do seu zopim. Caso ainda não tenha se cadastrado, <a href="https://www.zopim.com/" target="_blank">acesse aqui e se cadastre</a>', 'odin' ) // Opcional
                    ),
                )
            )
        )
    );
}

add_action( 'init', 'odin_theme_settings', 1 );


// Retirando o large size thumbnail
// function wpmayor_filter_image_sizes( $sizes) {
//     unset( $sizes['medium']);
//     unset( $sizes['large']);
     
//     return $sizes;
// }
// add_filter('intermediate_image_sizes_advanced', 'wpmayor_filter_image_sizes');
 