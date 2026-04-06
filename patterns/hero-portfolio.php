<?php
/**
 * Title: Hero Portfolio
 * Slug: lumina/hero-portfolio
 * Categories: lumina-hero
 * Keywords: hero, portfolio, landing
 * Block Types: core/post-content
 * Post Types: page, wp_template
 * Viewport width: 1400
 * Description: A modern hero section for portfolio homepage with glassmorphism effect.
 *
 * @package Lumina
 * @since 2.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl)"}}},"layout":{"type":"constrained"},"className":"hero-portfolio"} -->
<div class="wp-block-group alignfull hero-portfolio" style="padding-top:var(--wp--preset--spacing--4xl);padding-bottom:var(--wp--preset--spacing--4xl)">
	
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium"}}}} -->
	<div class="wp-block-columns alignwide">
		
		<!-- wp:column {"width":"60%"} -->
		<div class="wp-block-column" style="flex-basis:60%">
			
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|2xl","right":"var:preset|spacing|2xl"}}},"backgroundColor":"glass-bg","layout":{"type":"constrained"},"className":"hero-content"} -->
			<div class="wp-block-group hero-content has-glass-bg-background-color" style="padding-top:var(--wp--preset--spacing--2xl);padding-bottom:var(--wp--preset--spacing--2xl);padding-left:var(--wp--preset--spacing--2xl);padding-right:var(--wp--preset--spacing--2xl)">
				
				<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--plus-jakarta)"}},"textColor":"muted-text","className":"hero-label"} -->
				<p class="has-muted-text-color has-text-color hero-label" style="font-family:var(--wp--preset--font-family--plus-jakarta)">Available for Projects</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"var(--wp--preset--font-size--6xl)"}}} -->
				<h1 style="font-size:var(--wp--preset--font-size--6xl)">I Create Digital <span style="color:var(--wp--preset--color--primary-accent)">Aura</span> for Bold Brands.</h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"large","style":{"typography":{"lineHeight":"1.6"}}} -->
				<p class="has-large-font-size" style="line-height:1.6">Independent designer and developer focusing on premium web experiences that transform ideas into digital reality.</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"primary-accent","textColor":"primary-text","style":{"border":{"radius":"8px"}},"className":"hero-cta-primary"} -->
					<div class="wp-block-button hero-cta-primary"><a class="wp-block-button__link has-primary-text-color has-primary-accent-background-color has-text-color has-background" style="border-radius:8px">View Work</a></div>
					<!-- /wp:button -->
					
					<!-- wp:button {"style":{"border":{"radius":"8px","color":"var(--wp--preset--color--border)","width":"1px"},"spacing":{"padding":{"top":"0.75rem","bottom":"0.75rem","left":"1.5rem","right":"1.5rem"}}},"className":"hero-cta-secondary"} -->
					<div class="wp-block-button hero-cta-secondary"><a class="wp-block-button__link" style="border-radius:8px;border-color:var(--wp--preset--color--border);border-width:1px;padding-top:0.75rem;padding-bottom:0.75rem;padding-left:1.5rem;padding-right:1.5rem">My Story</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%">
			
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|2xl","right":"var:preset|spacing|2xl"}}},"backgroundColor":"glass-bg","layout":{"type":"constrained"},"className":"hero-visual"} -->
			<div class="wp-block-group hero-visual has-glass-bg-background-color" style="padding-top:var(--wp--preset--spacing--2xl);padding-bottom:var(--wp--preset--spacing--2xl);padding-left:var(--wp--preset--spacing--2xl);padding-right:var(--wp--preset--spacing--2xl)">
				
				<!-- wp:spacer {"height":"200px"} -->
				<div style="height:200px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->
				
				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"italic","fontSize":"var(--wp--preset--font-size--medium"}}} -->
				<p class="has-text-align-center" style="font-style:italic;font-size:var(--wp--preset--font-size--medium)">"Every pixel has a purpose in the digital landscape."</p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
