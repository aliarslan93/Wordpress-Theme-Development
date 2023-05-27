<?php
/**
 * Article Not Found Template
 *
 * @package Yudiho
 */
?>
<main class="post-list">
    <h1><?php esc_html_e( 'Noting Found', 'yudiho' ) ?></h1>
	<?php
	if ( is_home() && current_user_can( 'publish_post' ) ) {
		printf(
			wp_kses(
				__( 'Ready to publish your first post? <a href="%s">Get Start Here</a>', 'yudiho' ),
				[
					'a' => [
						'href' => []
					]
				]
			),
			esc_url( admin_url( 'post-new.php' ) )
		);
	} elseif ( is_search() ) {
		?>
        <p><?php esc_html_e( 'Sorry but nothing matched your item. Please try again with some different keywords', 'yudiho' ); ?></p>

		<?php
		get_search_form();
	} else {
		?>
        <p><?php esc_html_e( 'Opps It seems we cannot find what you are looking for. Perhaps search can help.', 'yudiho' ); ?></p>

		<?php
		get_search_form();
	} ?>
</main>
