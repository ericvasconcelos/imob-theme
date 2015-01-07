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
                        <?php echo $theme_opts['end_opts'] ?>
                    </address>
                </div><!-- /col-6 -->
                <div class="col-3">
                    <nav class="social-footer">
                        <a href="<?php echo $theme_opts['fb-link'] ?>" class="Facebook">
                            <i class="icon-facebook"></i>
                        </a>
                        <a href="<?php echo $theme_opts['twt-link'] ?>" class="Twitter">
                            <i class="icon-twitter"></i>
                        </a>
                        <a href="<?php echo $theme_opts['insta-link'] ?>" class="Instagram">
                            <i class="icon-instagram"></i>
                        </a>
                        <a href="<?php echo $theme_opts['linked-link'] ?>" class="LinkedIn">
                            <i class="icon-linkedin"></i>
                        </a>
                        <a href="<?php echo $theme_opts['yt-link'] ?>" class="YouTube">
                            <i class="icon-youtube"></i>
                        </a>
                        <a href="<?php echo $theme_opts['gplus-link'] ?>" class="Google Plus">
                            <i class="icon-gplus"></i>
                        </a>
                        <a href="<?php echo $theme_opts['pint-link'] ?>" class="Pinterest">
                            <i class="icon-pinterest"></i>
                        </a>
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
