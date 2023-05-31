<script>
	function incrustar_hoja_estilos_comision() {
		var hoja_estilos_url =
			'<?php echo get_site_url() . '/wp-content/themes/netflix/assets/modulos/modulo-videos/modulo-videos.css'; ?>';
		var hoja_estilos = document.createElement('link');
		hoja_estilos.rel = 'stylesheet';
		hoja_estilos.href = hoja_estilos_url;
		document.head.appendChild(hoja_estilos);
	}
	incrustar_hoja_estilos_comision();
</script>

<!-- #seccion 5 contenidos -->
<section class="seccion-cinco container mt-5 mb-5">


	<?php
	$i = 0;
	$e = 0;
	$temp = $wp_query;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$post_per_page = 15; // -1 shows all posts
	$args = array(
		'post_type' => 'video',
		'orderby' => 'rand',
		'order' => 'DESC',
		'paged' => $paged,
		'posts_per_page' => $post_per_page,
		'tax_query' => array(
			array(
				'taxonomy' => 'genero-video',
				'field'    => 'slug',
				'terms'    => 'portada',
			),
		),
	);
	$wp_query = new WP_Query($args);
	if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<div class="container-fluid">
				<div class="col-md-12">
					<div class="portada row" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">

						<div class="col-md-6 m-5">

							<div class=" col-12 col-md-6 position-absolute bottom-0">

								<div class="container w-75 text-white m-4">

									<?php the_field('duracion_de_la_pelicula'); ?>
									<?php
									$image = get_field('logo_netflix');
									if (!empty($image)) : ?>
										<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>

									<p class="p-3">
										<?php echo get_the_excerpt(); ?>
									</p>


									<button type="button" class="btn btn-danger"><span class="dashicons dashicons-controls-play"></span> Reproducir</button>
									<button type="button" class="btn btn-danger"><span class="dashicons dashicons-info-outline"></span> Más información</button>

								</div>
							</div>

						</div>

					</div>
				</div>
			</div>

			</div>



		<?php endwhile; ?>






	<?php else : ?>
		<p class="text-center">Oops!, Lo sentimos, no hay contenido que mostrar</p>
	<?php endif;
	wp_reset_query();
	$wp_query = $temp ?>





</section>
<!------seccion contacto---->