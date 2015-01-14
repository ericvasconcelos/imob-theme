<?php get_header() ?>


	<div id="front-page">
		<div class="container">
			<section id="carousel" class="owl-carousel">
				
				<?php 
					$args = array( 'post_type' => 'carrossel', 'posts_per_page' => 4 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 

						$titulo 		= get_post_meta( $post->ID,'titulo', true );
						$subtitulo 		= get_post_meta( $post->ID,'subtitulo', true );
						$cor_titulo 	= get_post_meta( $post->ID,'cor_titulo', true );
						$fundo_titulo 	= get_post_meta( $post->ID,'fundo_titulo', true );
					?>

						<div class="item">

							<a href="<?php echo get_post_meta( $post->ID,'url', true ); ?>" target="_blank">
								<?php 
									$img_carousel = get_post_meta( $post->ID,'carousel_image', true );

									echo wp_get_attachment_image(
										$img_carousel, 
										array(720,373)
									);
								?>
							</a>
							<p class="tit" style="color: <?php echo $cor_titulo ?>; background-color:  <?php echo $fundo_titulo ?>;"><?php echo $titulo ?></p>
							<p class="subtit" style="color: <?php echo $cor_titulo ?>; background-color:  <?php echo $fundo_titulo ?>;"><?php echo $subtitulo ?></p>
			            </div>
						
				<?php endwhile; ?>
				
			</section><!-- .carousel -->

			<section id="advanced-search">
				<form action="post" class="cf">
					<div class="left-side">
						<p>
							<label>Cidade</label>
							<select name="" id="">
								<option value="">Cidade</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
							</select>
						<p>
						<p>
							<label>Status</label>
							<select name="" id="">
								<option value="">Status</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
							</select>
						<p>
						<p>
							<label>Quartos</label>
							<select name="" id="">
								<option value="">Quartos</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
							</select>
						<p>
						<p>
							<label>Preço mínimo</label>
							<select name="" id="">
								<option value="">Preço mínimo</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
							</select>
						<p>
					</div><!-- .left-side -->

					<div class="right-side">
						<p>
							<label>Bairro</label>
							<select name="" id="">
								<option value="">Bairro</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
							</select>
						<p>
						<p>
							<label>Tipo</label>
							<select name="" id="">
								<option value="">Tipo</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
							</select>
						<p>
						<p>
							<label>Banheiros</label>
							<select name="" id="">
								<option value="">Banheiros</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
							</select>
						<p>
						<p>
							<label>Preço máximo</label>
							<select name="" id="">
								<option value="">Preço máximo</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
								<option value="">Opção 1</option>
							</select>
						<p>
					</div><!-- .right-side -->
					<input type="button" value="Pesquisar Imóvel">
				</form>
			</section><!-- .advanced-search -->
		</div>
	</div><!-- #front-page -->

	<section id="list-property">
		<div class="container">
			<div id="filter" class="cf">
				<div class="tit-filter">
					<h3>Filtre os Imóveis</h3>
				</div>
				<nav>
					<a href="" class="active">Todos</a>
					<a href="">Casa</a>
					<a href="">Apartamento</a>
					<a href="">Comercial</a>
				</nav>
			</div>
			<div class="list-property cf">
				<div class="row">

				 	<?php 	
				 		$query = new WP_Query( 'cat=20' );
						if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

						<div class="col-3">
							<div class="property">
								<div class="img">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/imovel-lista.jpg" alt="Imóvel">
								</div>
								<div class="status-prop cf forsale">
									<span>À Venda</span>
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

					<?php endwhile; else : ?>
						<p><?php _e( 'Desculpe, mas não encontramos imóveis para esse filtro', 'textdomain' ); ?></p>
					<?php endif; ?>
					

					<div class="col-3">
						<div class="property">
							<div class="img">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/imovel-lista.jpg" alt="Imóvel">
							</div>
							<div class="status-prop cf forrent">
								<span>Aluguel</span>
							</div>
							<div class="address">
								<p class="street">Rua Namur 792</p>
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
					
				</div><!-- /row -->
			</div>
		</div>
	</section>


<?php get_footer() ?>