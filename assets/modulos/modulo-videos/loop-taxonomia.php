<script>
function incrustar_hoja_estilos_comision() {
    var hoja_estilos_url =
        '<?php echo get_site_url() . '/wp-content/themes/netflix/assets/modulos/modulo-videos/modulo-videos.css';?>';
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
			'post_type' => 'videos',
			'orderby' => 'rand',
			'order' => 'DESC',
			'paged' => $paged,
			'posts_per_page' => $post_per_page,
			'tax_query' => array(
				array(
					'taxonomy' => 'categoria-videos',
					'field'    => 'slug',
					'terms'    => 'video',
				),
			),
		); 
		$wp_query = new WP_Query($args);
		if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>



			<?php endwhile; ?>



		<?php else : ?>
			<p class="text-center">Oops!, Lo sentimos, no hay contenido que mostrar</p>
		<?php endif;
		wp_reset_query();
		$wp_query = $temp ?>





</section>
<!------seccion contacto---->