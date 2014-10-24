<?php if ( ! function_exists( 'add_action' ) ) exit; ?>

<footer class="footer bg-light">
    <div class="container">
        <div class="row">
            <!--<ul class="nav navbar-nav">
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
            </ul>-->
            <p>&copy; <?php echo date( 'Y' ); ?>  <?php bloginfo( 'name' ); ?> - Todos os direitos reservados.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
