<?php
/**
 * Title: Portfolio Grid
 * Slug: lumina/portfolio-grid
 * Categories: lumina-portfolio
 * Keywords: portfolio, grid, projects, filter
 * Block Types: core/post-content
 * Post Types: page, wp_template
 * Viewport width: 1400
 * Description: A dynamic portfolio grid with filtering capabilities.
 *
 * @package Lumina
 * @since 2.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|4xl","bottom":"var:preset|spacing|4xl)"}}},"layout":{"type":"constrained"},"className":"portfolio-section"} -->
<div class="wp-block-group alignfull portfolio-section" style="padding-top:var(--wp--preset--spacing--4xl);padding-bottom:var(--wp--preset--spacing--4xl)">
	
	<!-- wp:group {"layout":{"type":"constrained"},"className":"section-header"} -->
	<div class="wp-block-group section-header">
		
		<!-- wp:heading {"align":"center","level":2,"style":{"typography":{"fontSize":"var(--wp--preset--font-size--4xl)"}}} -->
		<h2 class="has-text-align-center" style="font-size:var(--wp--preset--font-size--4xl)">Selected Work</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var(--wp--preset--font-size--large"}}} -->
		<p class="has-text-align-center has-large-font-size" style="font-size:var(--wp--preset--font-size--large)">A collection of projects built with passion and attention to detail.</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"},"className":"portfolio-filters"} -->
		<div class="wp-block-group portfolio-filters">
			<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"textColor":"primary-text","backgroundColor":"primary-accent","style":{"border":{"radius":"20px"}},"className":"filter-btn active"} -->
				<div class="wp-block-button filter-btn active"><a class="wp-block-button__link has-primary-text-color has-primary-accent-background-color has-text-color has-background" style="border-radius:20px">All</a></div>
				<!-- /wp:button -->
				
				<!-- wp:button {"style":{"border":{"radius":"20px","color":"var(--wp--preset--color--border)","width":"1px"}},"className":"filter-btn"} -->
				<div class="wp-block-button filter-btn"><a class="wp-block-button__link" style="border-radius:20px;border-color:var(--wp--preset--color--border);border-width:1px">Web Design</a></div>
				<!-- /wp:button -->
				
				<!-- wp:button {"style":{"border":{"radius":"20px","color":"var(--wp--preset--color--border)","width":"1px"}},"className":"filter-btn"} -->
				<div class="wp-block-button filter-btn"><a class="wp-block-button__link" style="border-radius:20px;border-color:var(--wp--preset--color--border);border-width:1px">Development</a></div>
				<!-- /wp:button -->
				
				<!-- wp:button {"style":{"border":{"radius":"20px","color":"var(--wp--preset--color--border)","width":"1px"}},"className":"filter-btn"} -->
				<div class="wp-block-button filter-btn"><a class="wp-block-button__link" style="border-radius:20px;border-color:var(--wp--preset--color--border);border-width:1px">Branding</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:query {"query":{"perPage":12,"postType":"portfolio","postStatus":"publish"},"displayLayout":{"type":"flex","columns":3},"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-query alignwide">
		
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3},"className":"portfolio-grid"} -->
		<div class="wp-block-post-template portfolio-grid">
			
			<!-- wp:group {"style":{"spacing":{"padding":"var:preset|spacing|medium"}},"backgroundColor":"glass-bg","layout":{"type":"constrained"},"className":"portfolio-item"} -->
			<div class="wp-block-group portfolio-item has-glass-bg-background-color" style="padding:var(--wp--preset--spacing--medium)">
				
				<!-- wp:post-featured-image {"isLink":true,"style":{"border":{"radius":"8px"}}} /-->
				
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium)">
					
					<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--outfit)","fontSize":"var(--wp--preset--font-size--large"}}} -->
					<h3 class="wp-block-post-title has-text-color" style="font-family:var(--wp--preset--font-family--outfit);font-size:var(--wp--preset--font-size--large)"><a href="#">Project Title</a></h3>
					<!-- /wp:post-title -->

					<!-- wp:post-excerpt {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--small"}}} -->
					<div class="wp-block-post-excerpt has-small-font-size" style="font-size:var(--wp--preset--font-size--small)">
						<p>Project description goes here...</p>
					</div>
					<!-- /wp:post-excerpt -->

					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
					<div class="wp-block-group">
						<!-- wp:post-terms {"term":"portfolio_category","separator":", ","style":{"typography":{"fontSize":"var(--wp--preset--font-size--tiny"}}} -->
						<div class="wp-block-post-terms has-tiny-font-size" style="font-size:var(--wp--preset--font-size--tiny)">
							<a href="#">Category</a>
						</div>
						<!-- /wp:post-terms -->
						
						<!-- wp:post-date {"format":"Y","style":{"typography":{"fontSize":"var(--wp--preset--font-size--tiny"}}} -->
						<time datetime="2024-01-01" class="wp-block-post-date has-tiny-font-size" style="font-size:var(--wp--preset--font-size--tiny)">2024</time>
						<!-- /wp:post-date -->
					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:post-template -->

		<!-- wp:query-pagination {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
		<div class="wp-block-query-pagination">
			<!-- wp:query-pagination-previous {"label":"Previous"} /-->
			<!-- wp:query-pagination-numbers /-->
			<!-- wp:query-pagination-next {"label":"Next"} /-->
		</div>
		<!-- /wp:query-pagination -->

	</div>
	<!-- /wp:query -->

</div>
<!-- /wp:group -->
