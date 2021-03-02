<?php
/*
	Template Name: Головна
 */
get_header(); ?>

<main>
	<div class="page">
		<div class="container">
			<?php
			if (function_exists('yoast_breadcrumb')) {
				yoast_breadcrumb('<div id="breadcrumbs" class="page-breadcrumbs">', '</div>');
			} ?>

			<h1 class="page-title page__title"><?php the_title(); ?></h1>


		</div>
	</div>

</main>

<?php get_footer(); ?>