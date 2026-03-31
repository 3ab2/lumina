<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php 
    // SEO & Open Graph Tags
    if ( function_exists( 'lumina_seo_tags' ) ) {
        lumina_seo_tags();
    }
    ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'lumina' ); ?></a>

    <header id="masthead" class="site-header glass">
        <div class="container site-header__container">
            <div class="site-branding">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                        </a>
                    </h1>
                <?php endif; ?>
            </div>

            <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'lumina' ); ?>">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'lumina' ); ?>">
                    <span class="hamburger"></span>
                </button>
                
                <div class="menu-container" id="primary-menu">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu-list',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ) );
                    ?>
                    <div class="header-cta">
                        <a href="#contact" class="btn btn-primary"><?php echo esc_html__( 'Hire Me', 'lumina' ); ?></a>
                    </div>
                </div>
            </nav>
        </div>
    </header><!-- #masthead -->
