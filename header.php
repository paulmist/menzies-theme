<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod('understrap_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ffc500">
	<meta name="theme-color" content="#ffc500">
	<link rel="preload" as="style" href="https://www.menzies.co.uk/wp-content/themes/menziestheme/css/font-face.min.css" crossorigin="anonymous" onload="this.rel='stylesheet'">
	<link rel="preload" as="style" href="https://www.menzies.co.uk/wp-content/themes/menziestheme/css/font-awesome.min.css" crossorigin="anonymous" onload="this.rel='stylesheet'">
	<link rel="preload" as="style" href="<?php bloginfo('template_directory'); ?>/css/accordion.css" crossorigin="anonymous" onload="this.rel='stylesheet'">
	<link rel="stylesheet" href="/wp-content/themes/menziestheme/css/font-face.min.css">
	<link rel="stylesheet" href="/wp-content/themes/menziestheme/css/styleAwesome.css">
	<link rel="stylesheet" href="/wp-content/themes/menziestheme/css/styleMain.css">
	<link rel="stylesheet" href="/wp-content/themes/menziestheme/carousel/carousel.css">
	<link rel="stylesheet" href="/wp-content/themes/menziestheme/carousel/slick-theme6.css">
	<?php wp_head(); ?>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<?php $script_path = get_template_directory() . '/js/menzies.min.js'; ?>
	<script src="https://kit.fontawesome.com/7e214f3969.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/js/accordion.js"></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/js/scroll-to-feature.js"></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/carousel/carousel.min.js"></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/carousel/flickity.pkgd.js"></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/carousel/hash.js"></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/js/animate-scroll.js"></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/js/pop52.js" defer></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/js/anchor15.js"></script>

	<script type="text/javascript" src="/wp-content/themes/menziestheme/carousel/careers_video_slider3.js"></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/js/show-hide3.js" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/js/gsap/header-pillars.js" defer></script>
	<link rel="stylesheet" href="https://use.typekit.net/byt5shy.css">
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/menzies.min.js?v=<?php echo filemtime($script_path); ?>" />
	</script>
	<!-- HTML5 Speech Recognition API -->
	<script>
		function startDictation() {

			if (window.hasOwnProperty('webkitSpeechRecognition')) {

				var recognition = new webkitSpeechRecognition();

				recognition.continuous = false;
				recognition.interimResults = false;

				recognition.lang = "en-GB";
				recognition.start();

				recognition.onresult = function(e) {
					document.getElementById('transcript').value = e.results[0][0].transcript;
					recognition.stop();
					document.getElementById('labnol').submit();
				};

				recognition.onerror = function(e) {
					recognition.stop();
				}
			}
		}
	</script>

	<script type="text/javascript" src="/wp-content/themes/menziestheme/js/span-removal.js"></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/js/tabs-function.js"></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/js/tabs-cb.js"></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/js/readmore-btn.js"></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/js/edit.js"></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/js/menu-steps18.js"></script>
	<script type="text/javascript" src="/wp-content/themes/menziestheme/js/sticky_anchor_bar10.js"></script>

</head>

<body <?php body_class(); ?>>
	<?php if (function_exists('gtm4wp_the_gtm_tag')) {
		gtm4wp_the_gtm_tag();
	} ?>
	<a id="scroll-top"></a>

	<div class="site" id="page">

		<!-- ******************* The Navbar Area ******************* -->
		<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e('Skip to content', 'understrap'); ?></a>

			<div class="header-topbar-wrap fadeInDown animationDelayone animatable">

				<div class="container header-topbar-container">

					<div class="row header-topbar-row">

						<div class="col-12 header-topbar-col">

							<div class="header-topbar flexBox alignCenter">

								<ul id="mini-nav" class="navbar-nav ml-auto">

									<?php if (have_rows('mini_nav_items', 'option')) : ?>

										<?php $mini_nav_count = 101; ?>

										<?php while (have_rows('mini_nav_items', 'option')) : the_row(); ?>

											<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-<?php echo $mini_nav_count; ?>" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown menu-item-<?php echo $mini_nav_count; ?> mini-nav-item">

												<?php $mini_nav_title = get_sub_field('title'); ?>

												<?php if (have_rows('child_items', 'option')) : ?>

													<?php // the_sub_field('icon'); 
													?> <span class="top-head-text dark"><?php echo $mini_nav_title; ?></span>

													<div class="mini-dropdown dropdown-menu" aria-labelledby="menu-item-dropdown-<?php echo $mini_nav_count; ?>" role="menu">

														<?php while (have_rows('child_items', 'option')) : the_row(); ?>

															<div itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
																<a title="All insights" href="<?php the_sub_field('link'); ?>" class="dropdown-item"><?php the_sub_field('title'); ?></a>
															</div>

														<?php endwhile; ?>

													</div>

												<?php else : ?>

													<a href="<?php the_sub_field('link'); ?>">
														<?php // the_sub_field('icon'); 
														?> <span class="top-head-text"><?php the_sub_field('title'); ?></span>
													</a>

												<?php endif;  ?>

											</li>

											<?php $mini_nav_count++; ?>

										<?php endwhile; ?>

									<?php endif; ?>
								</ul>

								<div class="header-socials">
									<div class="footer-column fc-socials">
										<?php if (have_rows('footer_columns_socials', 'option')) : ?>
											<ul class="company-socials">
												<?php while (have_rows('footer_columns_socials', 'option')) : the_row(); ?>
													<li>
														<a target="_blank" class="social <?php the_sub_field('footer_columns_social_type', 'option'); ?>" href="<?php the_sub_field('footer_columns_social_link', 'option'); ?>">
															<?php if (get_sub_field('footer_columns_social_type', 'option') == 'instagram') : echo '';
															endif; ?>
															<?php if (get_sub_field('footer_columns_social_type', 'option') == 'facebook') : echo '';
															endif; ?>
															<?php if (get_sub_field('footer_columns_social_type', 'option') == 'linkedin') : echo '';
															endif; ?>
															<?php if (get_sub_field('footer_columns_social_type', 'option') == 'twitter') : echo '';
															endif; ?>
															<?php if (get_sub_field('footer_columns_social_type', 'option') == 'youtube') : echo '';
															endif; ?>
														</a>
													</li>
												<?php endwhile; ?>
											</ul>
										<?php endif; ?>
									</div>
								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top fadeInDown animationDelayone animatable">
				

				<?php if ('container' == $container) : ?>
					<div class="container">
					<?php endif; ?>

					<a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url">

						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Menzies_Logo_Small_GreyOrange.svg" class="svg-logo fadeInDown animationDelayone animatable" onerror="this.src='<?php echo get_stylesheet_directory_uri(); ?>/images/Menzies_Logo_Small_GreyOrange.png'" alt="Menzies LLP - Financial Management and Accounting Services Firm">

					</a>

					<div class="mobile-search-menu">
						<?php $mobile_nav_button = get_field('mobile_nav_button', 'option'); ?>
						<?php
						$link = get_field('mobile_navbar_button', 'option');
						if ($link):
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
						?>
							<a class="readon solid blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
						<?php endif; ?>

						<div itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-200" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children mini-nav-search">
							<a href="#" data-toggle="modal" data-target="#searchmodal"><span class="top-head-text"><i class="fa fa-search" aria-hidden="true"></i><span class="search-words" style="display: none;"><?php _e(' Search', 'menziestheme'); ?></span></span></a>
						</div>

						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>


					<!-- The WordPress Menu goes here -->

					<div id="navbarNavDropdown" class="menzies-nav collapse navbar-collapse">

						<?php if (have_rows('navigation_items', 'option')) : ?>

							<ul id="main-menu" class="navbar-nav ml-auto">

								<?php $nav_parent_count = 1; ?>

								<?php while (have_rows('navigation_items', 'option')) : the_row(); ?>

									<?php if (get_sub_field('item_type') == 'simple') : ?>

										<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-<?php echo $nav_parent_count; ?>" class="menu-item menu-item-<?php echo $nav_parent_count; ?> nav-item">

											<a title="<?php the_sub_field('text'); ?>" href="<?php if (get_sub_field('link')) {
																									the_sub_field('link');
																								} else {
																									echo '#';
																								} ?>" class="nav-link"><?php the_sub_field('text'); ?></a>

										</li>

									<?php elseif (get_sub_field('item_type') == 'services') : ?>

										<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-<?php echo $nav_parent_count; ?>" class="menu-item menu-item-<?php echo $nav_parent_count; ?> mega-toggle menu-item-has-children dropdown  nav-item">

											<a title="<?php the_sub_field('text'); ?>" href="/services/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-<?php echo $nav_parent_count; ?>"><?php the_sub_field('text'); ?></a>

											<a title="<?php the_sub_field('text'); ?>" href="/services/" class="mobile-nav-link nav-link"><?php the_sub_field('text'); ?></a>

											<div class="mega-panel dropdown-menu" style="display: none;">
												<div class="container">
													<div class="row load">
														<div class="col-md-12">
															<div class="mega-panel-holder">

																<?php get_template_part('section-templates/section', 'service-nav'); ?>

															</div>
														</div>
													</div>
												</div>
											</div>

										</li>



									<?php elseif (get_sub_field('item_type') == 'discover') : ?>

										<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-<?php echo $nav_parent_count; ?>" class="menu-item menu-item-<?php echo $nav_parent_count; ?> mega-toggle menu-item-has-children dropdown  nav-item">

											<a title="<?php the_sub_field('text'); ?>" href="#" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-<?php echo $nav_parent_count; ?>"><?php the_sub_field('text'); ?></a>

											<a title="<?php the_sub_field('text'); ?>" class="mobile-nav-link nav-link"><?php the_sub_field('text'); ?></a>

											<div class="mega-panel dropdown-menu" style="display: none;">
												<div class="container">
													<div class="row load">
														<div class="col-md-12">
															<div class="mega-panel-holder">

																<?php get_template_part('section-templates/section', 'discover-nav'); ?>

															</div>
														</div>
													</div>
												</div>
											</div>

										</li>



									<?php elseif (get_sub_field('item_type') == 'sectors') : ?>

										<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-<?php echo $nav_parent_count; ?>" class="menu-item menu-item-<?php echo $nav_parent_count; ?> mega-toggle menu-item-has-children dropdown  nav-item">

											<a title="<?php the_sub_field('text'); ?>" href="/sectors/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-<?php echo $nav_parent_count; ?>"><?php the_sub_field('text'); ?></a>

											<a title="<?php the_sub_field('text'); ?>" href="/sectors/" class="mobile-nav-link nav-link"><?php the_sub_field('text'); ?></a>

											<div class="mega-panel dropdown-menu" style="display: none;">
												<div class="container">
													<div class="row load">
														<div class="col-md-12">
															<div class="mega-panel-holder">

																<?php get_template_part('section-templates/section', 'sectors-nav'); ?>

															</div>
														</div>
													</div>
												</div>
											</div>

										</li>

										</li>


									<?php elseif (get_sub_field('item_type') == 'careers') : ?>

										<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-<?php echo $nav_parent_count; ?>" class="menu-item menu-item-<?php echo $nav_parent_count; ?> mega-toggle menu-item-has-children dropdown  nav-item">

											<a title="<?php the_sub_field('text'); ?>" href="/careers/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-<?php echo $nav_parent_count; ?>"><?php the_sub_field('text'); ?></a>

											<a title="<?php the_sub_field('text'); ?>" href="/careers/" class="mobile-nav-link nav-link"><?php the_sub_field('text'); ?></a>

											<div class="mega-panel dropdown-menu" style="display: none;">
												<div class="container">
													<div class="row load">
														<div class="col-md-12">
															<div class="mega-panel-holder">

																<?php get_template_part('section-templates/section', 'careers-nav'); ?>

															</div>
														</div>
													</div>
												</div>
											</div>

										</li>

									<?php elseif (get_sub_field('item_type') == 'insights-is-turned-off') : ?>

										<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-<?php echo $nav_parent_count; ?>" class="menu-item menu-item-<?php echo $nav_parent_count; ?> mega-toggle menu-item-has-children dropdown  nav-item">

											<a title="<?php the_sub_field('text'); ?>" href="/insights/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-<?php echo $nav_parent_count; ?>"><?php the_sub_field('text'); ?></a>

											<a title="<?php the_sub_field('text'); ?>" href="/insights/" class="mobile-nav-link nav-link"><?php the_sub_field('text'); ?></a>

											<div class="mega-panel dropdown-menu" style="display: none;">
												<div class="container">
													<div class="row load">
														<div class="col-md-12">
															<div class="mega-panel-holder">

																<?php get_template_part('section-templates/section', 'insights-nav'); ?>

															</div>
														</div>
													</div>
												</div>
											</div>

										</li>

									<?php endif; ?>

									<?php $nav_parent_count++; ?>

								<?php endwhile; ?>

							</ul>

						<?php endif; ?>


						<a class="readon blue solid menu-side-btn" href="/contact-us">Contact us</a>


						<div itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-200" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children mini-nav-search">
							<a class="no-mobile" href="#" data-toggle="modal" data-target="#searchmodal"><span class="top-head-text"><i class="fa fa-search" aria-hidden="true"></i><span class="search-words" style="display: none;"><?php _e(' Search', 'menziestheme'); ?></span></span></a>
						</div>

					</div>

					<?php if ('container' == $container) : ?>
					</div><!-- .container -->
				<?php endif; ?>
				
			</nav><!-- .site-navigation -->

		</div><!-- #wrapper-navbar end -->

		<!-- Modal -->
		<div class="modal fade" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="searchmodalLabel" aria-hidden="true">

			<div class="modal-dialog modal-lg" role="document">

				<div class="modal-content">

					<div class="modal-body">

						<form id="labnol" action="<?php echo home_url(); ?>" method="get">

							<div class="search-intro-text search-intro-text-modal">

								Search or ask a question:

							</div>

							<div class="speech">
								<input type="text" name="s" value="" id="transcript" placeholder="Start typing.." data-swplive="true" /> <!-- data-swplive="true" enables SearchWP Live Search! -->
								<a onClick="startDictation()" onTouchTap="startDictation()" ontouchstart="startDictation()" class="search-mic-icon" alt="search mic" style="cursor:pointer;"><i class="fa fa-microphone" aria-hidden="true"></i></a><input type="submit" class="search-submit">
							</div>

						</form>

					</div>

				</div>

			</div>

		</div>