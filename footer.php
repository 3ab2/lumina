    <footer id="colophon" class="site-footer section-padding">
        <div class="container site-footer__container">
            <div class="footer-branding reveal">
                <h2 class="footer-title">
                    <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                </h2>
                <div class="site-description">
                    <?php echo esc_html( get_bloginfo( 'description' ) ); ?>
                </div>
            </div>

            <div class="footer-socials reveal">
                <?php
                $socials = array(
                    'linkedin' => array( 'label' => 'LinkedIn', 'icon' => 'dashicons-id' ),
                    'github'   => array( 'label' => 'GitHub', 'icon' => 'dashicons-networking' ),
                    'dribbble' => array( 'label' => 'Dribbble', 'icon' => 'dashicons-art' )
                );
                foreach ( $socials as $id => $social ) : ?>
                    <a href="#" target="_blank" aria-label="<?php echo esc_attr( $social['label'] ); ?>">
                        <i class="dashicons <?php echo esc_attr( $social['icon'] ); ?>"></i>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="site-info reveal">
                &copy; <?php echo esc_html( date('Y') ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. 
                <?php esc_html_e( 'All rights reserved.', 'lumina' ); ?>
            </div>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php if ( get_theme_mod( 'lumina_magnetic_cursor', true ) ) : ?>
    <div id="magnetic-cursor" class="magnetic-cursor" aria-hidden="true"></div>
<?php endif; ?>

</body>
</html>
