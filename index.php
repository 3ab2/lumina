<?php
/**
 * The main template file - Premium Security Update
 * 
 * @package Lumina
 */

get_header(); ?>

<main id="primary" class="site-main section-padding">
    <div class="container site-main__container">
        
        <?php if ( have_posts() ) : ?>
            
            <header class="page-header reveal">
                <h1 class="page-title text-accent"><?php esc_html_e( 'Journal', 'lumina' ); ?></h1>
            </header><!-- .page-header -->

            <div class="blog-grid">
                <?php
                while ( have_posts() ) :
                    the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-item glass reveal' ); ?>>
                        <div class="blog-item__content">
                            <span class="blog-item__date"><?php echo esc_html( get_the_date() ); ?></span>
                            <h2 class="blog-item__title">
                                <a href="<?php echo esc_url( get_permalink() ); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <div class="blog-item__excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="blog-item__link">
                                <?php esc_html_e( 'Read More', 'lumina' ); ?> &rarr;
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php 
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => esc_html__( 'Previous', 'lumina' ),
                    'next_text' => esc_html__( 'Next', 'lumina' ),
                ) ); 
                ?>
            </div>

        <?php else : ?>
            <p><?php esc_html_e( 'No posts found.', 'lumina' ); ?></p>
        <?php endif; ?>

    </div>
</main><!-- #main -->

<?php get_footer(); ?>
