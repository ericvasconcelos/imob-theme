<?php if ( ! function_exists( 'add_action' ) ) exit; ?>

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

    <div class="bot-footer">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <p class="copyright">&copy; <?php echo date( 'Y' ); ?>  <?php bloginfo( 'name' ); ?> - Todos os direitos reservados.</p>
                </div><!-- /col-6 -->
                <div class="col-3">
                    <nav class="social-footer">
                        <a href="" class="pinterest">
                            <i class="icon-pinterest"></i>
                        </a>
                        <a href="" class="instagram">
                            <i class="icon-instagram"></i>
                        </a>
                        <a href="" class="youtube">
                            <i class="icon-youtube"></i>
                        </a>
                        <a href="" class="facebook">
                            <i class="icon-facebook"></i>
                        </a>
                        <a href="" class="twitter">
                            <i class="icon-twitter"></i>
                        </a>
                    </nav><!-- /social -->
                </div><!-- /col-3 -->
                <div class="col-1">
                    <span class="back-top">
                        ^
                    </span>
                </div>
            </div><!-- /row -->
        </div><!-- /container -->
    </div><!-- /bot-footer -->
    
</footer>

<?php wp_footer(); ?>
</body>
</html>
