<?php get_header() ?>


	<section id="front-page">
		<div class="container">
			<section id="carousel">
				<div class="item-img">Carrossel</div>
				<div class="nav-carousel">
					<span class="c-previous">
						<i class="icon-arrow-left"></i>
					</span>
					<span class="c-next">
						<i class="icon-arrow-right"></i>
					</span>
				</div>
			</section><!-- /carousel -->
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
					</div><!-- /left-side -->
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
					</div><!-- /right-side -->
					<input type="button" value="Pesquisar Imóvel">
				</form>
			</section><!-- /advanced-search -->
		</div>
	</section>

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
				<div class="property">
					<div class="img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/imovel-lista.jpg" alt="Imóvel">
					</div>
					<div class="status-prop cf forsale">
						<span>À Venda</span>
					</div>
					<div class="address">
						<p class="street">Rua Namur 792, Vila Valqueire</p>
						<p class="city">Rio de Janeiro</p>
					</div>
					<div class="price">
						<i class="icon-money"></i>
						<span class="price-prop">230.000</span>
					</div>
					<div class="info">
						<div class="foot-plan">
							<i class="icon-foot-plan"></i>
							<span class="value">70<span>m²</span></span>
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

				<div class="property">
					<div class="img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/imovel-lista.jpg" alt="Imóvel">
					</div>
					<div class="status-prop">
						<span>À Venda</span>
					</div>
					<div class="address">
						Rua Namur 792, Vila Valqueire
					</div>
					<div class="price">
						<i class="icon-money"></i>
						<span class="price-prop">230.000</span>
					</div>
					<div class="info">
						<div class="foot-plan">
							<i class="icon-foot-plan"></i>
							<span class="value">70<span>m²</span></span>
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

				<div class="property">
					<div class="img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/imovel-lista.jpg" alt="Imóvel">
					</div>
					<div class="status-prop">
						<span>À Venda</span>
					</div>
					<div class="address">
						Rua Namur 792, Vila Valqueire
					</div>
					<div class="price">
						<i class="icon-money"></i>
						<span class="price-prop">230.000</span>
					</div>
					<div class="info">
						<div class="foot-plan">
							<i class="icon-foot-plan"></i>
							<span class="value">70<span>m²</span></span>
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

				<div class="property">
					<div class="img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/imovel-lista.jpg" alt="Imóvel">
					</div>
					<div class="status-prop">
						<span>À Venda</span>
					</div>
					<div class="address">
						Rua Namur 792, Vila Valqueire
					</div>
					<div class="price">
						<i class="icon-money"></i>
						<span class="price-prop">230.000</span>
					</div>
					<div class="info">
						<div class="foot-plan">
							<i class="icon-foot-plan"></i>
							<span class="value">70<span>m²</span></span>
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

				<div class="property">
					<div class="img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/imovel-lista.jpg" alt="Imóvel">
					</div>
					<div class="status-prop">
						<span>À Venda</span>
					</div>
					<div class="address">
						Rua Namur 792, Vila Valqueire
					</div>
					<div class="price">
						<i class="icon-money"></i>
						<span class="price-prop">230.000</span>
					</div>
					<div class="info">
						<div class="foot-plan">
							<i class="icon-foot-plan"></i>
							<span class="value">70<span>m²</span></span>
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

			</div>
		</div>
	</section>


<?php get_footer() ?>