<!DOCTYPE html>
<html <?php bloginfo("language"); ?>>

<head>
	<meta charset="<?php bloginfo("charset"); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo wp_get_document_title(); ?></title>
	<meta name="description" content="<?php bloginfo("description"); ?>">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo get_home_url(); ?>/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php echo get_home_url(); ?>/favicon.ico" type="image/x-icon" />
	<?php wp_head(); ?>

</head>

<body class="fixed-header">

	<header class="main-header bg-light ">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid px-0">
					<?php the_custom_logo(); ?>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">

						<?php
						wp_nav_menu([
							'theme_location'  => 'header_menu',
							'container'       => 'ul',
							'menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0',

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
					<div class="navbar-action py-2">
						<a class="btn btn-primary" href="#" role="link">Увійти</a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>
				</div>
			</nav>
		</div>
	</header>