<?php get_header() ?>

	<div id="page">
		<div class="container">

			<?php if ( have_posts() ) : ?>

				<h1 class="page-title"><?php printf( __( 'Resultados encontrdos para: %s', 'textdomain' ), get_search_query() ); ?></h1>

				<div class="list-property cf">
					<div class="row">
					<?php while ( have_posts() ) : the_post(); ?>

							<div class="col-3">
								<div class="property">
									<div class="img">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/imovel-lista.jpg" alt="Imóvel">
									</div>
									<div class="status-prop cf forrent">
										<span>Aluguel</span>
									</div>
									<div class="address">
										<?php the_title( '<p class="street">', '</p>' ); ?>
										<p class="city">Vila Valqueire - Rio de Janeiro</p>
									</div>
									<div class="price">
										<i class="icon-money"></i>
										<span class="price-prop">230.000</span>
									</div>
									<div class="info cf">
										<div class="foot-plan">
											<i class="icon-foot-plan"></i>
											<span class="value"><span>970</span>m²</span>
										</div>
										<div class="beds">
											<i class="icon-beds"></i>
											<span class="value">2</span>
										</div>
										<div class="bathroons">
											<i class="icon-bathroons"></i>
											<span class="value">1</span>
										</div>
									</div>
								</div>
							</div><!-- /col-3 -->

						<?php endwhile ; ?>

						</div><!-- /row -->
					</div>

					<?php else : ?>
					
					<div class="search-not-found">
						<div class="row">
							<div class="col-12">
								<div class="search-again cf">
									<h1 class="page-title"><?php _e( 'Desculpe, mas nenhum imóvel foi encontrado. Tente outras palavras-chave', 'textdomain' ); ?></h1>
									<?php get_search_form(); ?>
								</div>
							</div>
						</div>
					</div>
						

			<?php endif; ?>

		</div><!-- .container -->
	</div><!-- #page -->

<?php
get_footer();
