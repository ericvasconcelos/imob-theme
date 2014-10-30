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
                <div class="col-6">
                    <p>&copy; <?php echo date( 'Y' ); ?>  <?php bloginfo( 'name' ); ?> - Todos os direitos reservados.</p>
                </div><!-- /col-6 -->
                <div class="col-6">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href=""><span class="icon-facebook"></span></a>
                        </li>
                        <li>
                            <a href=""><span class="icon-twitter"></span></a>
                        </li>
                        <li>
                            <a href=""><span class="icon-googleplus"></span></a>
                        </li>
                        <li>
                            <a href=""><span class="icon-github"></span></a>
                        </li>
                    </ul>
                </div><!-- /col-6 -->
            </div><!-- /row -->
        </div><!-- /container -->
    </div><!-- /bot-footer -->
    
</footer>

<?php wp_footer(); ?>
</body>
</html>
