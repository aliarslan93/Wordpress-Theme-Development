<?php
$menu_class = \Yudiho_THEME\Inc\Menus::get_instance();
$featuredID = get_post_thumbnail_id($args->object_id);
$image = wp_get_attachment_image_src($featuredID, 'featured_big');
$post = get_post($args->object_id);

$post_type = get_post_type($args->object_id);
if ($post_type == 'post'):
    ?>
    <a href="<?php echo esc_html($args->url); ?>" class="text-decoration-none">

        <div class="navbar-card">
            <img src="<?php echo $image[0] ?>" class="full-width img-fluid" alt="<?php echo $args->title; ?>">
            <div class="result-body">
<!--                <p class="result-description">--><?php //echo $excerpt; ?><!--</p>-->
            </div>
        </div>
        <h5 class="p-10 title"><?php echo $args->title; ?></h5>
    </a>

<?php else:
    get_template_part('template-parts/header/mega-menu/mega-menu-list', null, $args);
endif; ?>