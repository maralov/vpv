<!DOCTYPE html>
<html <?php bloginfo("language"); ?>>

<head>
	<meta charset="<?php bloginfo("charset"); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo wp_get_document_title(); ?></title>
	<meta name="description" content="<?php bloginfo("description"); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo THEME_ROOT ?>/assets/img/favicons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo THEME_ROOT ?>/assets/img/favicons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo THEME_ROOT ?>/assets/img/favicons/favicon-16x16.png">
	<?php wp_head(); ?>

</head>

<body class="fixed-header">

	<header class="main-header bg-light ">
		<div class="container">
			<nav class="navbar navbar-expand-md navbar-light bg-light">
				<div class="container-fluid px-0">
					<?php the_custom_logo(); ?>

					<div class="collapse navbar-collapse order-1 order-md-0 mt-3 mt-md-0" id="navbarSupportedContent">

						<?php
						wp_nav_menu([
							'theme_location'  => 'header_menu',
							'container'       => 'ul',
							'menu_class' => 'navbar-nav ms-auto mb-2 mb-sm-0',

						]);
						?>
						<!-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
							<li class="current-menu-item">
								<a href="#">Home</a>
							</li>
							<li>
								<a href="#">Link</a>
							</li>
						</ul> -->
					</div>
					<div class="navbar-action py-2 d-flex d-md-block">
						<a class="btn btn-primary btn-header-mob btn-header-mob--sigin order-1 order-md-0" href="#" aria-label="Увійти у персональний кабінет">Увійти</a>
						<button class="btn btn-primary btn-header-mob btn-header-mob--toggle ms-md-3 me-3 me-md-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="Toggle navigation" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>
				</div>
			</nav>
		</div>
	</header>