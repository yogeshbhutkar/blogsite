<?php
/**
 * Title: index
 * Slug: shadow-fade/index
 * Inserter: no
 *
 * @package shadow_fade
 * @subpackage shadow_fade/patterns
 */

?>
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","metadata":{"name":"index-body"},"layout":{"type":"constrained"}} -->
<main class="wp-block-group">
	<!-- wp:query {"queryId":13,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[]},"layout":{"contentSize":null,"type":"constrained"}} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"384px"}} -->
		<!-- wp:group {"layout":{"type":"constrained","wideSize":"384px","justifyContent":"left"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"backgroundColor":"accent-light-base","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
			<div class="wp-block-group has-accent-light-base-background-color has-background">
				<!-- wp:post-featured-image {"width":"384px","height":"411px"} /-->

				<!-- wp:group {"className":"generic-upper-container","style":{"layout":{"selfStretch":"fit","flexSize":""},"dimensions":{"minHeight":""}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
				<div class="wp-block-group generic-upper-container">
					<!-- wp:post-title {"isLink":true,"linkTarget":"_blank","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"level-4","fontFamily":"heebo"} /-->

					<!-- wp:paragraph {"style":{"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|accent-text-contrast"}}}},"textColor":"accent-text-contrast","fontSize":"level-1","fontFamily":"heebo"} -->
					<p
						class="has-accent-text-contrast-color has-text-color has-link-color has-heebo-font-family has-level-1-font-size">
						<?php esc_html_e( '1 hr 15 min', 'shadow-fade' ); ?>
					</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"generic-lower-container","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group generic-lower-container">
					<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent-text-contrast"}}}},"textColor":"accent-text-contrast","fontSize":"level-1","fontFamily":"heebo"} -->
					<p class="has-accent-text-contrast-color has-text-color has-link-color has-heebo-font-family has-level-1-font-size">
						<?php esc_html_e( 'Crime • Thriller', 'shadow-fade' ); ?>
					</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent-text-contrast"}}}},"textColor":"accent-text-contrast","fontSize":"level-1","fontFamily":"heebo"} -->
					<p class="has-accent-text-contrast-color has-text-color has-link-color has-heebo-font-family has-level-1-font-size">
						<?php esc_html_e( '2015', 'shadow-fade' ); ?>
					</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-pagination {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"level-2","fontFamily":"heebo","layout":{"type":"flex","justifyContent":"center"}} -->
		<!-- wp:query-pagination-previous /-->

		<!-- wp:query-pagination-numbers /-->

		<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->
	</div>
	<!-- /wp:query -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->