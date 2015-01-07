<?php if ( ! function_exists( 'add_action' ) ) exit;
    
    // Armazenando os dados do theme options
    $theme_opts = get_option( 'info_contact' ); 
?>
<footer class="footer bg-light">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                
                <?php if ( dynamic_sidebar('imobiliaria-widgets-footer') ) : else : endif; ?>
                
                <div class="col-3">
                    <div class="form-contato">
                        <h1 class="widget-title-footer">Contato</h1>
                        <?php echo do_shortcode('[contact-form-7 id="9" title="Formulário de contato 1"]') ?>
                    </div>
                </div>
            </div><!-- /row -->
        </div><!-- /container -->
    </div><!-- /top-footer -->

    <div class="bot-footer cf">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <address>
                        <!-- Email header -->
                        <?php if ($theme_opts['end_opts'] ) { 

                            echo $theme_opts['end_opts'];

                        } ?>
                    </address>
                </div><!-- /col-6 -->
                <div class="col-3">
                    <nav class="social-footer">
                        <!-- Redes sociais footer -->
                        <?php 
                            if ($theme_opts['fb-link'])
                            echo '<a href="' . $theme_opts['fb-link'] . '" class="facebook" title="Página no Facebook" target="_blank"><i class="icon-facebook"></i></a>';

                            if ($theme_opts['twt-link'])
                            echo '<a href="' . $theme_opts['twt-link'] . '" class="twitter" title="Página no Twitter" target="_blank"><i class="icon-twitter"></i></a>';

                            if ($theme_opts['insta-link'])
                            echo '<a href="' . $theme_opts['insta-link'] . '" class="instagram" title="Página no Instagram" target="_blank"><i class="icon-instagram"></i></a>';

                            if ($theme_opts['linked-link'])
                            echo '<a href="' . $theme_opts['linked-link'] . '" class="linkedin" title="Página no LinkedIn" target="_blank"><i class="icon-linkedin"></i></a>';

                            if ($theme_opts['yt-link'])
                            echo '<a href="' . $theme_opts['yt-link'] . '" class="youtube" title="Página no YouTube" target="_blank"><i class="icon-youtube"></i></a>';

                            if ($theme_opts['gplus-link'])
                            echo '<a href="' . $theme_opts['gplus-link'] . '" class="googleplus" title="Página no Google+" target="_blank"><i class="icon-gplus"></i></a>';

                            if ($theme_opts['pint-link'])
                            echo '<a href="' . $theme_opts['pint-link'] . '" class="pinterest" title="Página no Pinterest" target="_blank"><i class="icon-pinterest"></i></a>';
                        ?>
                    </nav><!-- /social -->
                </div><!-- /col-3 -->
                <div class="col-1">
                    <span class="back-top">
                        ^
                    </span>
                </div>
            </div><!-- /row -->
            <div class="row">
                <div class="col-12">
                    <p class="copyright">&copy; <?php echo date( 'Y' ); ?>  <?php bloginfo( 'name' ); ?> - Todos os direitos reservados.</p>
                </div>
            </div>
        </div><!-- /container -->
    </div><!-- /bot-footer -->
    
</footer>

<?php wp_footer(); ?>
</body>
</html>
