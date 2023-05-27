<?php if ( ! empty( $args ) && is_array( $args ) ): ?>
    <ul class="dropdown-menu shadow">
		<?php foreach ( $args as $arg ): ?>
            <li><a class="dropdown-item"
                   href="<?php echo esc_html( $arg->url ); ?>"><?php echo esc_html( $arg->title ); ?></a></li>
		<?php endforeach; ?>
    </ul>
<?php endif; ?>