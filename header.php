<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package art-stomatology
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="alternate" hreflang="x-default" href="href=" https:
    //www.artstomatology.com.ua" />
    <?php if (pll_current_language()) {
        $lang = pll_current_language();
    } else {
        $lang = 'ru';
    } ?>
    <?php
    switch ($lang) { //ссылки на страницы-категории
        case "ru":
            echo '<link rel=canonical href="https://www.artstomatology.com.ua"/>';
            break;
        case "uk":
            echo '<link rel=canonical href="https://www.artstomatology.com.ua/uk"/>';
            break;
        case "en":
            echo '<link rel=canonical href="https://www.artstomatology.com.ua/en"/>';
            break;
    }
    ?>
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <?php if (pll_current_language()) {
        $lang = pll_current_language();
    } else {
        $lang = 'ru';
    } ?>
    <?php
		switch ($lang) { //ссылки на страницы-категории
			case "ru":
				$therapy = 996;
				$prosthetics = 934;
				$implantation = 976;
				$surgery = 1006;
				$lang_prefix = "";
				break;
			case "uk":
				$therapy = 998;
				$prosthetics = 983;
				$implantation = 937;
				$surgery = 1009;
				$lang_prefix = "uk/";
				break;
			case "en":
				$therapy = 1001;
				$prosthetics = 987;
				$implantation = 939;
				$surgery = 1012;
				$lang_prefix = "en/";
				break;
			default:
				$therapy = 996;
				$prosthetics = 934;
				$implantation = 976;
				$surgery = 1006;
				$lang_prefix = "";
				break;
		}
    ?>

    <header class="header">
        <div class="header-top">
            <div class="container d-flex flex-row flex-wrap justify-content-between align-content-center align-items-center position-relative h-100">
                <a class="navbar-brand d-flex align-items-center" href="/<?php echo $lang_prefix; ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tooth-logo.svg" alt="a" class="d-block pe-3 logo-desktop"/>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tooth-logo-small.svg" alt="a" class="d-block pe-3 logo-mobile"/>
                    <span class="logo-text"><?php the_field('global_slogan_' . $lang, 'option'); ?></span>
                </a>

                <div class="header-top__content">
                    <div class="header-top__services">
                        <button type="button" class="header-top__services-toggle"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/menu-icon.svg"
                                                                                       alt="">Наши услуги
                        </button>

                        <div class="header-top__services-content">
                            <div class="header-top__services-inner">
                                <a href="<?php echo "/" . $lang_prefix . get_page_uri($therapy) . "/"; ?>" class="header-top__service">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/dental-care.svg" alt="">
                                    <?php _e('Терапия', 'art-stomatology'); ?>
                                </a>

                                <?php
                                $args = array(
                                    'posts_per_page' => -1,
                                    'post_type' => 'therapy'
                                );
                                $query = new WP_Query($args);
                                ?>
                                <?php if ($query->have_posts()) : ?>
                                    <ul class="header-top__services-inner-list">
                                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </ul>
                                <?php endif; ?>
                            </div>

                            <div>
                                <div class="header-top__services-inner">
                                    <a href="<?php echo "/" . $lang_prefix . get_page_uri($implantation) . "/"; ?>" class="header-top__service">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/dental-implant.svg" alt="">
                                        <?php _e('Имплантация', 'art-stomatology'); ?>
                                    </a>

                                    <?php
                                    $args = array(
                                        'posts_per_page' => -1,
                                        'post_type' => 'implantation'
                                    );
                                    $query = new WP_Query($args);
                                    ?>
                                    <?php if ($query->have_posts()) : ?>
                                        <ul class="header-top__services-inner-list">
                                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                            <?php endwhile; ?>
                                            <?php wp_reset_postdata(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>

                                <div class="header-top__services-inner">
                                    <a href="<?php echo "/" . $lang_prefix . get_page_uri($prosthetics) . "/"; ?>" class="header-top__service">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/teeth.svg" alt="">
                                        <?php _e('Протезирование', 'art-stomatology'); ?>
                                    </a>

                                    <?php
                                    $args = array(
                                        'posts_per_page' => -1,
                                        'post_type' => 'prosthetics',
                                    );
                                    $query = new WP_Query($args);
                                    ?>
                                    <?php if ($query->have_posts()) : ?>
                                        <ul class="header-top__services-inner-list">
                                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                            <?php endwhile; ?>
                                            <?php wp_reset_postdata(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="header-top__services-inner">
                                <a href="<?php echo "/" . $lang_prefix . get_page_uri($surgery) . "/"; ?>" class="header-top__service">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tooth.svg" alt="">
                                    <?php _e('Хирургия', 'art-stomatology'); ?>
                                </a>

                                <?php
                                $args = array(
                                    'posts_per_page' => -1,
                                    'post_type' => 'surgery'
                                );
                                $query = new WP_Query($args);
                                ?>
                                <?php if ($query->have_posts()) : ?>
                                    <ul class="header-top__services-inner-list">
                                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                   <?php
                        wp_nav_menu(array(
                            'menu' => 'header-menu-' . $lang,
                            'container' => '',
                            'fallback_cb' => 'wp_page_menu',
                            'menu_class' => 'header-top__nav-menu',
                            'add_a_class' => '',
                            'depth' => 0,
                        ));
                    
                        if (is_post_type_archive('specialists')) : ?>
                            <script>
                                const wp_header_menu = $('.wp-header-menu');
                                if (wp_header_menu.length) {
                                    wp_header_menu.find('.specialists').addClass('current-menu-item'); // Класс .specialists навешивается на страницу Специалисты/Фахiвцi/Specialists вручную через настройки меню в админке
                                } else {
                                    wp_header_menu.find('.specialists').removeClass('current-menu-item');
                                }
                            </script>
                    <?php endif; ?>
                                   

                    <div class="header-top__lang">
                        <?php $trans = pll_the_languages(['raw'=>1]); ?>
                        <span class="header-top__lang-current"><?php echo pll_current_language(); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/header-dropdown.svg" alt="" class="pll-dropdown-thumbler"></span>

                        <ul class="header-top__lang-list">
                            <?php foreach($trans as $language) :                             
                                if( pll_current_language() != $language['slug'] ) : 
                                ?>                           
                                    <li><a href="<?php echo $language['url']; ?>"><?php echo $language['name']; ?></a></li>
                                <?php endif;                                                 
                                endforeach; 
                             ?>               
                        </ul>
                    </div>

                    <button class="header-button" data-bs-toggle="modal" data-bs-target="#recordModal"><?php _e('Записаться', 'art-stomatology'); ?></button>
                </div>

                <div class="header-top__mob-content">
                    <a href="tel:+<?php the_field('global_telefon_link', 'option'); ?>" class="contact"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/phone.svg" alt="Tel"></a>
                    <button type="button" class="burger-btn"><span></span></button>
                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="container-fluid container-xl">
                <div class="header-info col-12 px-3 d-flex flex-wrap">
                    <div class="info-item px-2 px-lg-0">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/map-pin.svg" alt="Map Pin">
                        <span class="info-text"><?php the_field('global_adress_' . $lang, 'option'); ?></span>
                    </div>
                    <div class="info-item px-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/clock.svg" alt="Clock">
                        <span class="info-item"><?php the_field('global_timetable_header_' . $lang, 'option'); ?></span>
                    </div>
                    <div class="info-item px-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/phone.svg" alt="Tel">
                        <span class="info-item"><a
                                    href="tel:+<?php the_field('global_telefon_link', 'option'); ?>"><?php the_field('global_telefon_text', 'option'); ?></a></span>
                    </div>
                    <?php if ($lang == 'uk') { ?>
                        <?php include('block-socmedia-header.php'); ?>
                    <?php } else { ?>
                        <?php if (have_rows('global_socmedia', 'option')) : ?>
                            <div class="info-item social-links px-2">
                                <?php while (have_rows('global_socmedia', 'option')) : the_row(); ?>
                                    <a href="<?php the_sub_field('global_socmedia-link', 'option'); ?>" class="social-link" target="_blank">
                                        <?php the_sub_field('global_socmedia-icon', 'option'); ?>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>

    <header class="header" hidden>
        <div class="header-top">
            <nav class="navbar navbar-expand-lg navbar-light py-3 py-lg-0 pt-lg-0 container-fluid container-xl mobile-navbar">
                <div class="container-fluid d-flex align-items-center justify-content-end">
                    <a class="navbar-brand d-flex align-items-center" href="/<?php echo $lang_prefix; ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tooth-logo.svg" alt="a" class="d-block pe-3 logo-desktop"/>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tooth-logo-small.svg" alt="a" class="d-block pe-3 logo-mobile"/>
                        <span class="logo-text"><?php the_field('global_slogan_' . $lang, 'option'); ?></span>
                    </a>
                    <a class="call-me" href="tel:+<?php the_field('global_telefon_link', 'option'); ?>"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/icons/call-icon.svg" alt="Tel"></a></span>

                    <a href="#" class="navbar-toggler collapsed" id="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                       aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>

                    <div class="collapse navbar-collapse dropdown-mobile-menu-wrapper" id="navbarNavAltMarkup">
                        <!--- Список категорий на мобиле --->
                        <div class="dropdown-menu dropdown-menu-services-mobile w-100 dropdown-categories-mobile-menu"><!-- aria-labelledby="dropdownServices" -->
                            <div class="nav-link justify-content-end justify-content-lg-start show-991">
                                <button class="header-button" data-bs-toggle="modal" data-bs-target="#recordModal"><?php _e('Записаться', 'art-stomatology'); ?></button>
                            </div>

                            <a class="dropdown-item" href="<?php echo "/" . $lang_prefix . get_page_uri($therapy) . "/"; ?>"><img class="pe-3"
                                                                                                                                  src="<?php echo get_template_directory_uri(); ?>/assets/icons/dental-care.svg"
                                                                                                                                  alt=""><?php _e('Терапия', 'art-stomatology'); ?>
                            </a>
                            <a class="dropdown-item" href="<?php echo "/" . $lang_prefix . get_page_uri($implantation) . "/"; ?>"><img class="pe-3"
                                                                                                                                       src="<?php echo get_template_directory_uri(); ?>/assets/icons/dental-implant.svg"
                                                                                                                                       alt=""><?php _e('Имплантация', 'art-stomatology'); ?>
                            </a>
                            <a class="dropdown-item" href="<?php echo "/" . $lang_prefix . get_page_uri($prosthetics) . "/"; ?>"><img class="pe-3"
                                                                                                                                      src="<?php echo get_template_directory_uri(); ?>/assets/icons/teeth.svg"
                                                                                                                                      alt=""><?php _e('Протезирование', 'art-stomatology'); ?>
                            </a>
                            <a class="dropdown-item" href="<?php echo "/" . $lang_prefix . get_page_uri($surgery) . "/"; ?>"><img class="pe-3"
                                                                                                                                  src="<?php echo get_template_directory_uri(); ?>/assets/icons/tooth.svg"
                                                                                                                                  alt=""><?php _e('Хирургия', 'art-stomatology'); ?>
                            </a>

                        </div>
                        <!--- Список ссылок на мобиле --->
                        <div class="navbar-nav w-100 ms-lg-3 d-flex justify-content-between pt-2 pt-lg-0 dropdown-categories-mobile-menu-right">
                            <a href="#" class="nav-link text-end active me-xxl-3 dropdown-toggle justify-content-end justify-content-lg-start mobile-hide"
                               data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/menu-icon.svg" alt="" class="pe-1">
                                <?php _e('Наши услуги', 'art-stomatology'); ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-services dropdown-menu-end dropdown-menu-lg-start w-100">
                                <div class="dropdown-item d-flex justify-content-around py-5">
                                    <div class="dropdown-services ps-5">
                                        <div class="dropdown-service">
                                            <a href="<?php echo "/" . $lang_prefix . get_page_uri($therapy) . "/"; ?>"
                                               class="dropdown-service-header d-flex align-items-center">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/dental-care.svg" alt="">
                                                <div class="h4 my-0 ps-2"><?php _e('Терапия', 'art-stomatology'); ?></div>
                                            </a>

                                            <?php
                                            $args = array(
                                                'posts_per_page' => -1,
                                                'post_type' => 'therapy'
                                            );
                                            $query = new WP_Query($args);
                                            ?>
                                            <?php if ($query->have_posts()) : ?>
                                                <ul class="dropdown-service-list">
                                                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                                                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                                    <?php endwhile; ?>
                                                    <?php wp_reset_postdata(); ?>
                                                </ul>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    <div>
                                        <div class="dropdown-services">
                                            <div class="dropdown-service">
                                                <a href="<?php echo "/" . $lang_prefix . get_page_uri($implantation) . "/"; ?>"
                                                   class="dropdown-service-header d-flex align-items-center">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/dental-implant.svg" alt="">
                                                    <div class="h4 my-0 ps-2"><?php _e('Имплантация', 'art-stomatology'); ?></div>
                                                </a>
                                                <?php
                                                $args = array(
                                                    'posts_per_page' => -1,
                                                    'post_type' => 'implantation'
                                                );
                                                $query = new WP_Query($args);
                                                ?>
                                                <?php if ($query->have_posts()) : ?>
                                                    <ul class="dropdown-service-list">
                                                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                                                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                                        <?php endwhile; ?>
                                                        <?php wp_reset_postdata(); ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="dropdown-services">
                                            <div class="dropdown-service">
                                                <a href="<?php echo "/" . $lang_prefix . get_page_uri($prosthetics) . "/"; ?>"
                                                   class="dropdown-service-header d-flex align-items-center">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/teeth.svg" alt="">
                                                    <div class="h4 my-0 ps-2"><?php _e('Протезирование', 'art-stomatology'); ?></div>
                                                </a>
                                                <?php
                                                $args = array(
                                                    'posts_per_page' => -1,
                                                    'post_type' => 'prosthetics',
                                                );
                                                $query = new WP_Query($args);
                                                ?>
                                                <?php if ($query->have_posts()) : ?>
                                                    <ul class="dropdown-service-list">
                                                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                                                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                                        <?php endwhile; ?>
                                                        <?php wp_reset_postdata(); ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-services pe-5">
                                        <div class="dropdown-service">
                                            <a href="<?php echo "/" . $lang_prefix . get_page_uri($surgery) . "/"; ?>"
                                               class="dropdown-service-header d-flex align-items-center">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/tooth.svg" alt="">
                                                <div class="h4 my-0 ps-2"><?php _e('Хирургия', 'art-stomatology'); ?></div>
                                            </a>
                                            <?php
                                            $args = array(
                                                'posts_per_page' => -1,
                                                'post_type' => 'surgery'
                                            );
                                            $query = new WP_Query($args);
                                            ?>
                                            <?php if ($query->have_posts()) : ?>
                                                <ul class="dropdown-service-list">
                                                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                                                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                                    <?php endwhile; ?>
                                                    <?php wp_reset_postdata(); ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            wp_nav_menu(array(
                                'menu' => 'header-menu-' . $lang,
                                'container' => '',
                                'fallback_cb' => 'wp_page_menu',
                                'menu_class' => 'navbar-nav d-flex justify-content-between wp-header-menu',
                                'add_a_class' => 'nav-link me-xxl-3 justify-content-end justify-content-lg-start',
                                'depth' => 0,
                            ));
                            ?>

                            <?php if (is_post_type_archive('specialists')) : ?>
                                <script>
                                    const wp_header_menu = $('.wp-header-menu');
                                    if (wp_header_menu.length) {
                                        wp_header_menu.find('.specialists').addClass('current-menu-item'); // Класс .specialists навешивается на страницу Специалисты/Фахiвцi/Specialists вручную через настройки меню в админке
                                    } else {
                                        wp_header_menu.find('.specialists').removeClass('current-menu-item');
                                    }
                                </script>
                            <?php endif; ?>

                            <div class="dropdown nav-link text-end me-xxl-3 justify-content-end justify-content-lg-start pll-dropdown style=" white-space: nowrap;
                            ">
                            <a class="header-lang" href="#">
									<span>
										<?php
                                        switch ($lang) {
                                            case "ru":
                                                $current_lang = "ru";
                                                break;
                                            case "uk":
                                                $current_lang = "ua";
                                                break;
                                            case "en":
                                                $current_lang = "en";
                                                break;
                                            default:
                                                $current_lang = "ru";
                                                break;
                                        }
                                        echo strtoupper($current_lang);
                                        ?>
									</span>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/header-dropdown.svg" alt="" class="pll-dropdown-thumbler">
                            </a>
                            <ul class="dropdown-menu pll-dropdown-menu">
                                <?php pll_the_languages(); ?>
                            </ul>
                        </div>
                        <div class="nav-link justify-content-end justify-content-lg-start hide-991">
                            <button class="header-button" data-bs-toggle="modal" data-bs-target="#recordModal"><?php _e('Записаться', 'art-stomatology'); ?></button>
                        </div>
                    </div>
                </div>
        </div>
        </nav>
	</div>

	<div class="header-bottom">
		<div class="container-fluid container-xl">
			<div class="header-info col-12 px-3 d-flex flex-wrap">
				<div class="info-item px-2 px-lg-0">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/map-pin.svg" alt="Map Pin">
					<span class="info-text"><?php the_field('global_adress_' . $lang, 'option'); ?></span>
				</div>
				<div class="info-item px-2">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/clock.svg" alt="Clock">
					<span class="info-item"><?php the_field('global_timetable_header_' . $lang, 'option'); ?></span>
				</div>
				<div class="info-item px-2">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/phone.svg" alt="Tel">
					<span class="info-item"><a
								href="tel:+<?php the_field('global_telefon_link', 'option'); ?>"><?php the_field('global_telefon_text', 'option'); ?></a></span>
				</div>
				<?php if ($lang == 'uk') { ?>
					<?php include('block-socmedia-header.php'); ?>
				<?php } else { ?>
					<?php if (have_rows('global_socmedia', 'option')) : ?>
						<div class="info-item social-links px-2">
							<?php while (have_rows('global_socmedia', 'option')) : the_row(); ?>
								<a href="<?php the_sub_field('global_socmedia-link', 'option'); ?>" class="social-link" target="_blank">
									<?php the_sub_field('global_socmedia-icon', 'option'); ?>
								</a>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				<?php } ?>
			</div>
		</div>
	</div>
</header>
  