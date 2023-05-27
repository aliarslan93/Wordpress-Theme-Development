<?php
if ( ! empty( $args ) && is_array( $args ) ): ?>
    <div class="dropdown-menu shadow">
        <div class="mega-content px-4">
            <div class="container-fluid">
                <div class="row">
					<?php foreach ( $args as $arg ): ?>
                        <div class="col-12 col-sm-4 col-md-3 py-4 menu-card">

							<?php
							if ( $arg->classes[0] == 'card' ) {
								get_template_part( 'template-parts/header/mega-menu/mega-menu-card', null, $arg );
							}else{
								get_template_part( 'template-parts/header/mega-menu/mega-menu-list', null, $arg );
							}
							?>
                        </div>
					<?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>