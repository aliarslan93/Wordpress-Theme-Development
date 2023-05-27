<div class="col-lg-4 col-sm-12 col-md-12">
    <?php
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($args->ID), 'carousel_slider');
    ?>
    <a href="<?php the_permalink($args->ID); ?>">
        <div class="result-card">
            <img src="<?php echo $image[0]; ?>"
                 class="full-width img-fluid" alt="<?php echo $args->post_title; ?>">
            <div class="result-body">
                <h5 class="result-heading"><?php echo $args->post_title; ?></h5>
<!--                <p class="result-description">--><?php //echo $args->post_excerpt; ?><!--</p>-->
            </div>

        </div>
    </a>
</div>