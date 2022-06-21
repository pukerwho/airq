<!doctype html>
<html <?php language_attributes(); ?> >

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/img/restx-logo.png">
  
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <!-- <link rel="stylesheet" href="../css/style.css" inline> -->
  <?php
    wp_head();
	?>
  <?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>
<body <?php echo body_class(); ?>>
  
  <header class="header w-full z-10">
  	<div class="header_top bg-gray-700 text-white text-sm py-2">
  		<div class="container">
  			<div class="flex items-center justify-between">
  				<div class="flex items-center">
		  			<div class="hidden lg:block"><a href="mailto:<?php echo carbon_get_theme_option('crb_email'); ?>"><?php echo carbon_get_theme_option('crb_email'); ?></a></div>
		  			<div class="hidden lg:block px-4">|</div>
		  			<div><a href="tel:<?php echo carbon_get_theme_option('crb_phone'); ?>"><?php echo carbon_get_theme_option('crb_phone'); ?></a></div>
		  		</div>
		  		<div class="flex items-center -mx-3">
		  			<div class="cursor-pointer px-3">
							<div class="hidden dark:block text-gray-200 js-toggle-light" data-light="off">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
								</svg>
							</div>
							<div class="block dark:hidden dark:text-gray-200 js-toggle-light" data-light="on">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
								</svg>
							</div>
						</div>
		  			<div class="flex items-center lang px-3 -mx-3">
		  				<?php if (function_exists('pll_the_languages')) { 
	              pll_the_languages(); 
	            } ?>
		  			</div>
		  		</div>
  			</div>
  		</div>
  	</div>
  	<div class="header_bottom py-3 lg:py-2">
  		<div class="container">
  			<div class="flex items-center justify-between lg:-mx-4">
  				<div class="w-1/3 lg:w-2/12 lg:px-4">
  					<a href="<?php echo home_url(); ?>">
	  					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/prolitec_logo.png" alt="LOGO" class="w-full">
	  				</a>
  				</div>
  				<div class="header_bottom_menu hidden lg:block px-4">
  					<?php wp_nav_menu([
	            'theme_location' => 'header',
	            'container' => 'div',
	            'menu_class' => 'flex items-center justify-center'
	          ]); ?> 
  				</div>
  				<div class="hidden lg:block px-4">
  					<div class="flex justify-end">
  						<a href="<?php echo get_page_url('templates/tpl_contact'); ?>" class="block border border-orange-400 rounded-lg px-8 py-2">
  							<?php _e('Контакти', 'airq'); ?>
  						</a>
  					</div>
  				</div>

  				<!-- Гамбургер -->
					<div class="hamburger-toggle w-7 h-6 relative flex flex-col justify-center lg:hidden mt-1">
						<span class="w-7 h-0.5 absolute bg-gray-600 top-0 right-0"></span>
						<span class="w-7 h-0.5 absolute bg-gray-600 top-2 right-0"></span>
						<span class="w-7 h-0.5 absolute bg-gray-600 top-4 right-0"></span>
					</div>
					<!-- END Гамбургер -->

  			</div>
  		</div>
  	</div>  
	</header><!-- #masthead -->

	<div class="mobile-menu hidden h-full w-full fixed left-0 top-24 py-4 px-2">
		<div class="custom-shadow bg-white dark:bg-dark-xl rounded-lg p-4">
			<?php wp_nav_menu([
	      'theme_location' => 'mobile',
	      'container' => 'div',
	      'menu_class' => 'flex flex-col'
	    ]); ?> 
		</div>
	</div>
  