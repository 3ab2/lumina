<?php
/**
 * The template for displaying the front page - Market Success Edition
 * 
 * @package Lumina
 */

get_header(); ?>

<main id="primary" class="site-main">

    <!-- Hero Section -->
    <section id="hero" class="hero section-padding">
        <div class="container hero__container">
            <div class="hero__content">
                <span class="hero__label reveal"><?php esc_html_e( 'Available for Projects', 'lumina' ); ?></span>
                
                <h1 class="hero__title reveal">
                    <?php 
                    $hero_title = get_theme_mod( 'hero_title', __( 'I Create Digital <span class="text-accent">Aura</span> for Bold Brands.', 'lumina' ) );
                    echo wp_kses( $hero_title, array( 'span' => array( 'class' => array() ) ) ); 
                    ?>
                </h1>
                
                <p class="hero__subtitle reveal">
                    <?php echo esc_html( get_theme_mod( 'hero_subtitle', __( 'Independent designer and developer focusing on premium web experiences.', 'lumina' ) ) ); ?>
                </p>
                
                <div class="hero__cta reveal">
                    <a href="#portfolio" class="btn btn-primary"><?php esc_html_e( 'View Work', 'lumina' ); ?></a>
                    <a href="#about" class="btn btn-secondary"><?php esc_html_e( 'My Story', 'lumina' ); ?></a>
                </div>
            </div>
            
            <div class="hero__visual">
                <div class="hero__blob" aria-hidden="true"></div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <?php if ( get_theme_mod( 'show_about', true ) ) : ?>
    <section id="about" class="about section-padding">
        <div class="container about__container">
            <div class="about__content reveal">
                <h2 class="section-title"><?php esc_html_e( 'Crafting with Precision', 'lumina' ); ?></h2>
                <div class="about__text">
                    <p class="lead"><?php esc_html_e( 'With over 8 years of experience, I blend technical expertise with creative vision to deliver high-end digital solutions that scale.', 'lumina' ); ?></p>
                    <p><?php esc_html_e( 'I believe that every pixel has a purpose. My approach is minimalist yet powerful, ensuring that the message is never lost in the noise.', 'lumina' ); ?></p>
                </div>
                
                <div class="skills-grid">
                    <div class="skill-item"><span class="skill-dot"></span><span class="skill-name"><?php esc_html_e( 'UI/UX Design', 'lumina' ); ?></span></div>
                    <div class="skill-item"><span class="skill-dot"></span><span class="skill-name"><?php esc_html_e( 'React & PHP 8', 'lumina' ); ?></span></div>
                    <div class="skill-item"><span class="skill-dot"></span><span class="skill-name"><?php esc_html_e( 'Global SEO', 'lumina' ); ?></span></div>
                </div>
            </div>

            <div class="about__visual reveal">
                <div class="experience-badge">
                    <span class="experience-number">08+</span>
                    <span class="experience-text"><?php esc_html_e( 'Years of Excellence', 'lumina' ); ?></span>
                </div>
                <div class="about__image-wrapper glass">
                    <div class="about__image-placeholder"></div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Portfolio Section -->
    <?php if ( get_theme_mod( 'show_portfolio', true ) ) : ?>
    <section id="portfolio" class="portfolio section-padding">
        <div class="container portfolio__container">
            <header class="section-header reveal">
                <h2 class="section-title"><?php esc_html_e( 'Selected Work', 'lumina' ); ?></h2>
                <p class="section-subtitle"><?php esc_html_e( 'A collection of projects built with passion and attention to detail.', 'lumina' ); ?></p>
            </header>

            <div class="portfolio-filters reveal">
                <button class="portfolio-filter active" data-filter="all"><?php esc_html_e( 'All', 'lumina' ); ?></button>
                <?php
                $terms = get_terms( array( 'taxonomy' => 'portfolio_category', 'hide_empty' => true ) );
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
                    foreach ( $terms as $term ) : ?>
                        <button class="portfolio-filter" data-filter="<?php echo esc_attr( $term->slug ); ?>">
                            <?php echo esc_html( $term->name ); ?>
                        </button>
                    <?php endforeach;
                endif;
                ?>
            </div>

            <div class="portfolio-grid-wrapper">
                <div id="portfolio-empty" class="portfolio-empty" style="display:none;">
                    <p><?php esc_html_e( 'No projects match your current selection.', 'lumina' ); ?></p>
                </div>

                <div class="portfolio-grid">
                    <?php
                    $portfolio_query = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => 12 ) );
                    if ( $portfolio_query->have_posts() ) :
                        while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); 
                            $categories = wp_get_post_terms( get_the_ID(), 'portfolio_category', array( 'fields' => 'slugs' ) );
                            $cat_slugs = ! empty( $categories ) ? implode( ' ', $categories ) : '';
                            ?>
                            <article id="project-<?php the_ID(); ?>" <?php post_class( 'portfolio-item reveal' ); ?> data-category="<?php echo esc_attr( $cat_slugs ); ?>">
                                <a href="<?php echo esc_url( get_permalink() ); ?>" class="portfolio-item__link">
                                    <div class="portfolio-item__image glass">
                                        <?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'large' ); else : ?>
                                            <div class="placeholder-image"></div>
                                        <?php endif; ?>
                                        <div class="portfolio-item__overlay">
                                            <h3 class="portfolio-item__title"><?php the_title(); ?></h3>
                                            <span class="portfolio-item__category"><?php echo esc_html( get_post_meta( get_the_ID(), '_project_tech', true ) ); ?></span>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Contact Section -->
    <?php if ( get_theme_mod( 'show_contact', true ) ) : ?>
    <section id="contact" class="contact section-padding">
        <div class="container contact__container">
            <div class="contact-card glass reveal">
                <div class="contact-header">
                    <h2 class="section-title"><?php echo wp_kses( __( 'Let\'s Create Something <span class="text-accent">Unique</span>.', 'lumina' ), array( 'span' => array( 'class' => array() ) ) ); ?></h2>
                    <p><?php esc_html_e( 'Have a project in mind? Reach out and let\'s start a conversation.', 'lumina' ); ?></p>
                </div>
                
                <form class="contact-form" id="lumina-contact-form">
                    <div id="form-response" class="form-response" aria-live="polite"></div>
                    
                    <div class="form-group">
                        <input type="text" id="name" name="name" placeholder=" " required>
                        <label for="name"><?php esc_html_e( 'Your Name', 'lumina' ); ?></label>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder=" " required>
                        <label for="email"><?php esc_html_e( 'Email Address', 'lumina' ); ?></label>
                    </div>
                    <div class="form-group">
                        <textarea id="message" name="message" placeholder=" " rows="4" required></textarea>
                        <label for="message"><?php esc_html_e( 'Project Details', 'lumina' ); ?></label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-full" id="submit-btn" data-loading="<?php esc_attr_e( 'Sending...', 'lumina' ); ?>">
                        <?php esc_html_e( 'Send Message', 'lumina' ); ?>
                    </button>
                    
                    <!-- Consolidated Nonce handled via Localized JS variable lumina_vars.nonce -->
                </form>
            </div>
        </div>
    </section>
    <?php endif; ?>

</main>

<?php
get_footer(); ?>
