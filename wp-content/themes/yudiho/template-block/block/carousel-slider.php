<?php
$carousel_class = \Yudiho_THEME\Inc\Sidebar::get_instance();

$slider_items = get_field('slider_post_items');
?>
<section class="slider-section mt-5">
    <h2><?php echo get_field('slider_title'); ?></h2>
    <div class="slider-container">
        <?php if (is_array($slider_items) && !empty($slider_items)): ?>
            <ul class="slider-cards slider">
                <?php foreach ($slider_items as $slider_item): $image = wp_get_attachment_image_src(get_post_thumbnail_id($slider_item->ID), 'carousel_slider'); ?>

                    <li class="card-outter slider-item">
                        <div class="news-item">
                            <a href="<?php echo get_permalink($carousel_class->getSliderIdByGuid($slider_item->guid)); ?>"
                               title="<?php echo $slider_item->post_title; ?>">
                                <img src="<?php echo $image[0]; ?>" alt="<?php echo $slider_item->post_title; ?>">
                                <h3 class="title color-3 font-semibold"><?php echo $slider_item->post_title; ?></h3>
                                <p class="description">
                                    <?php echo $slider_item->post_excerpt; ?>
                                </p>
                            </a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>