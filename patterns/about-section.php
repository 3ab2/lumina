<?php
/**
 * Title: About Section
 * Slug: lumina/about-section
 * Categories: lumina-about
 * Keywords: about, story, skills, experience
 * Block Types: core/post-content
 * Post Types: page, wp_template
 * Viewport width: 1400
 * Description: An about section with story, skills, and experience.
 *
 * @package Lumina
 * @since 2.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl)"}}},"layout":{"type":"constrained"},"className":"about-section"} -->
<div class="wp-block-group alignfull about-section" style="padding-top:var(--wp--preset--spacing--4xl);padding-bottom:var(--wp--preset--spacing--4xl)">
	
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		
		<!-- wp:column {"width":"60%"} -->
		<div class="wp-block-column" style="flex-basis:60%">
			
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var(preset|spacing|2xl","left":"var:preset|spacing|2xl","right":"var:preset|spacing|2xl"}}},"backgroundColor":"glass-bg","layout":{"type":"constrained"},"className":"about-content"} -->
			<div class="wp-block-group about-content has-glass-bg-background-color" style="padding-top:var(--wp--preset--spacing--2xl);padding-bottom:var(--wp--preset--spacing--2xl);padding-left:var(--wp--preset--spacing--2xl);padding-right:var(--wp--preset--spacing--2xl)">
				
				<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"var(--wp--preset--font-size--4xl)"}}} -->
				<h2 style="font-size:var(--wp--preset--font-size--4xl)">Crafting with Precision</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"large","style":{"typography":{"lineHeight":"1.6"}}} -->
				<p class="has-large-font-size" style="line-height:1.6">With over 8 years of experience, I blend technical expertise with creative vision to deliver high-end digital solutions that scale.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p>I believe that every pixel has a purpose. My approach is minimalist yet powerful, ensuring that the message is never lost in the noise. From concept to deployment, I focus on creating experiences that resonate with users and drive results.</p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"layout":{"type":"constrained"},"className":"skills-section"} -->
				<div class="wp-block-group skills-section">
					
					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var(--wp--preset--font-size--2xl)"}}} -->
					<h3 style="font-size:var(--wp--preset--font-size--2xl)">Core Skills</h3>
					<!-- /wp:heading -->

					<!-- wp:columns {"layout":{"type":"flex","flexWrap":"wrap"}} -->
					<div class="wp-block-columns">
						
						<!-- wp:column -->
						<div class="wp-block-column">
							<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"flex-start"}} -->
							<div class="wp-block-group">
								<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--outfit)"}}} -->
								<p style="font-family:var(--wp--preset--font-family--outfit)">● UI/UX Design</p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->
						</div>
						<!-- /wp:column -->

						<!-- wp:column -->
						<div class="wp-block-column">
							<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"flex-start"}} -->
							<div class="wp-block-group">
								<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--outfit)"}}} -->
								<p style="font-family:var(--wp--preset--font-family--outfit)">● React & PHP 8</p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->
						</div>
						<!-- /wp:column -->

						<!-- wp:column -->
						<div class="wp-block-column">
							<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"flex-start"}} -->
							<div class="wp-block-group">
								<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--outfit)"}}} -->
								<p style="font-family:var(--wp--preset--font-family--outfit)">● Global SEO</p>
								<!-- /wp:paragraph -->
							</div>
							<!-- /wp:group -->
						</div>
						<!-- /wp:column -->

					</div>
					<!-- /wp:columns -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%">
			
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|2xl","right":"var:preset|spacing|2xl"}}},"backgroundColor":"glass-bg","layout":{"type":"constrained"},"className":"about-visual"} -->
			<div class="wp-block-group about-visual has-glass-bg-background-color" style="padding-top:var(--wp--preset--spacing--2xl);padding-bottom:var(--wp--preset--spacing--2xl);padding-left:var(--wp--preset--spacing--2xl);padding-right:var(--wp--preset--spacing--2xl)">
				
				<!-- wp:group {"layout":{"type":"constrained"},"className":"experience-badge"} -->
				<div class="wp-block-group experience-badge">
					
					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var(--wp--preset--font-size--5xl)","color":"var(--wp--preset--color--primary-accent)"}}} -->
					<h3 style="font-size:var(--wp--preset--font-size--5xl);color:var(--wp--preset--color--primary-accent)">08+</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--outfit)"}}} -->
					<p style="font-family:var(--wp--preset--font-family--outfit)">Years of Excellence</p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

				<!-- wp:spacer {"height":"40px"} -->
				<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"backgroundColor":"glass-bg","layout":{"type":"constrained"},"className":"about-image"} -->
				<div class="wp-block-group about-image has-glass-bg-background-color" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)">
					
					<!-- wp:spacer {"height":"200px"} -->
					<div style="height:200px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
					
					<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"italic"}}} -->
					<p class="has-text-align-center" style="font-style:italic">Design is not just what it looks like. Design is how it works.</p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
