<?php
/**
 * Title: Contact Section
 * Slug: lumina/contact-section
 * Categories: lumina-contact
 * Keywords: contact, form, get in touch
 * Block Types: core/post-content
 * Post Types: page, wp_template
 * Viewport width: 1400
 * Description: A modern contact section with form and information.
 *
 * @package Lumina
 * @since 2.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl)"}}},"layout":{"type":"constrained"},"className":"contact-section"} -->
<div class="wp-block-group alignfull contact-section" style="padding-top:var(--wp--preset--spacing--4xl);padding-bottom:var(--wp--preset--spacing--4xl)">
	
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		
		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|2xl","right":"var:preset|spacing|2xl"}}},"backgroundColor":"glass-bg","layout":{"type":"constrained"},"className":"contact-info"} -->
			<div class="wp-block-group contact-info has-glass-bg-background-color" style="padding-top:var(--wp--preset--spacing--2xl);padding-bottom:var(--wp--preset--spacing--2xl);padding-left:var(--wp--preset--spacing--2xl);padding-right:var(--wp--preset--spacing--2xl)">
				
				<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"var(--wp--preset--font-size--4xl)"}}} -->
				<h2 style="font-size:var(--wp--preset--font-size--4xl)">Let's Create Something <span style="color:var(--wp--preset--color--primary-accent)">Unique</span>.</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"large"} -->
				<p class="has-large-font-size">Have a project in mind? Reach out and let's start a conversation about bringing your vision to life.</p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"layout":{"type":"constrained"},"className":"contact-details"} -->
				<div class="wp-block-group contact-details">
					
					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"flex-start"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--outfit)"}}} -->
						<p style="font-family:var(--wp--preset--font-family--outfit)"><strong>Email:</strong></p>
						<!-- /wp:paragraph -->
						<!-- wp:paragraph -->
						<p>hello@lumina.com</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"flex-start"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--outfit)"}}} -->
						<p style="font-family:var(--wp--preset--font-family--outfit)"><strong>Phone:</strong></p>
						<!-- /wp:paragraph -->
						<!-- wp:paragraph -->
						<p>+1 (555) 123-4567</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"flex-start"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--outfit)"}}} -->
						<p style="font-family:var(--wp--preset--font-family--outfit)"><strong>Location:</strong></p>
						<!-- /wp:paragraph -->
						<!-- wp:paragraph -->
						<p>San Francisco, CA</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:group -->

				<!-- wp:social-links {"iconColor":"primary-accent","iconColorValue":"var(--wp--preset--color--primary-accent)","className":"is-style-logos-only","layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<ul class="wp-block-social-links has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"twitter"} /-->
					<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
					<!-- wp:social-link {"url":"#","service":"github"} /-->
					<!-- wp:social-link {"url":"#","service":"instagram"} /-->
				</ul>
				<!-- /wp:social-links -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|2xl","right":"var:preset|spacing|2xl"}}},"backgroundColor":"glass-bg","layout":{"type":"constrained"},"className":"contact-form-wrapper"} -->
			<div class="wp-block-group contact-form-wrapper has-glass-bg-background-color" style="padding-top:var(--wp--preset--spacing--2xl);padding-bottom:var(--wp--preset--spacing--2xl);padding-left:var(--wp--preset--spacing--2xl);padding-right:var(--wp--preset--spacing--2xl)">
				
				<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var(--wp--preset--font-size--2xl)"}}} -->
				<h3 style="font-size:var(--wp--preset--font-size--2xl)">Send Message</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--medium"}}} -->
				<p style="font-size:var(--wp--preset--font-size--medium)">Fill out the form below and I'll get back to you within 24 hours.</p>
				<!-- /wp:paragraph -->

				<!-- wp:html -->
				<form class="contact-form" id="lumina-contact-form">
					<div class="form-group">
						<input type="text" id="name" name="name" placeholder="Your Name" required>
					</div>
					<div class="form-group">
						<input type="email" id="email" name="email" placeholder="Email Address" required>
					</div>
					<div class="form-group">
						<textarea id="message" name="message" placeholder="Project Details" rows="4" required></textarea>
					</div>
					<button type="submit" class="wp-block-button__link has-primary-text-color has-primary-accent-background-color has-text-color has-background" style="border-radius:8px">Send Message</button>
					<div id="form-response" class="form-response"></div>
				</form>
				<!-- /wp:html -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
