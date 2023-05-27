<?php
/**
 * Header Navbar Template
 * @package Yudiho
 */
$menu_class        = \Yudiho_THEME\Inc\Menus::get_instance();
$header_menu_id    = $menu_class->get_menu_id( 'yudiho-header-menu' );
$header_menu_items = wp_get_nav_menu_items( $header_menu_id );
?>
<?php if ( ! empty( $header_menu_items ) && is_array( $header_menu_items ) ): ?>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light shadow">
		<?php if ( ! empty( $header_menu_items ) && is_array( $header_menu_items ) ): ?>

            <div class="container-fluid">
                <a class="navbar-brand" href="#">
					<?php if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
					} ?>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar-content">
                    <div class="hamburger-toggle">
                        <div class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </button>
                <div class="collapse navbar-collapse yudiho-header" id="navbar-content">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
						<?php foreach ( $header_menu_items as $menu_item ):
							if ( ! $menu_item->menu_item_parent ) {
								$child_menu_items = $menu_class->get_child_menu_items( $header_menu_items, $menu_item->ID );
								$has_children     = ! empty( $child_menu_items ) && is_array( $child_menu_items );

								if ( $has_children ):
									$dropdown_class = '';
									if ( $menu_item->classes[0] == 'mega-menu' ) :
										$dropdown_class = 'dropdown-mega overflow-hidden position-static';
										$template_path  = 'template-parts/header/mega-menu/mega-menu';
									else:
										$dropdown_class = '';
										$template_path  = 'template-parts/header/dropdown-menu';
									endif;
									?>
                                    <li class="nav-item dropdown <?php echo $dropdown_class; ?>">
                                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                           data-bs-auto-close="outside">
											<?php echo esc_html( $menu_item->title ); ?>
                                        </a>
										<?php
										get_template_part( $template_path, null, $child_menu_items );
										?>
                                    </li>
								<?php else: ?>
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page"
                                           href="<?php echo esc_html( $menu_item->url ); ?>"><?php echo esc_html( $menu_item->title ); ?></a>
                                    </li>
								<?php endif; ?>
							<?php } ?>

						<?php
                            wp_reset_query();
                        endforeach; ?>
                    </ul>

                </div>

                <button class="d-flex ms-auto btn bg-yudiho-1 " data-bs-toggle="modal" data-bs-target="#searchForm">
                    <i class="lni lni-search yudiho-color-4"></i>
                </button>
            </div>
		<?php endif; ?>
    </nav>
<?php endif; ?>

