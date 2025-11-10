<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<section class="no-results not-found">

	<header class="page-header">

		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'understrap' ); ?></h1>

	</header><!-- .page-header -->

	<div class="page-content">

		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'understrap' ), array(
	'a' => array(
		'href' => array(),
	),
) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'It looks like nothing was found with your search terms. Maybe try searching for your content with some different keywords below?', 'understrap' ); ?></p>

			<div class="search-empty-form">

				<form id="labnol" action="<?php echo home_url(); ?>" method="get">

				    <div class="speech">
				    	<input type="text" name="s" value="" id="transcript" placeholder="Search.." />
				    	<img onclick="startDictation()" src="//i.imgur.com/cHidSVu.gif" class="search-mic-icon" />
				    </div>

				</form>

			</div>

			<?php else : ?>

			<p><?php esc_html_e( 'It looks like nothing was found. Maybe try searching for your content below?', 'understrap' ); ?></p>

			<div class="search-empty-form">

				<form id="labnol" action="<?php echo home_url(); ?>" method="get">

				    <div class="speech">
				    	<input type="text" name="s" value="" id="transcript" placeholder="Search.." />
				    	<img onclick="startDictation()" src="//i.imgur.com/cHidSVu.gif" class="search-mic-icon" />
				    </div>

				</form>

			</div>

			<?php endif; ?>
	</div><!-- .page-content -->
	
</section><!-- .no-results -->
