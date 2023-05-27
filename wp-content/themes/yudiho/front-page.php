<?php
/**
 * FRONT PAGE Template File
 * @package Yudiho
 */
get_header();
?>
<div class="container">
    <?php if (is_front_page()):
        $group = acf_get_field_group('group_61ab9ee8be2e6'); // featured field group key
        if ($group['active']) {
            get_template_part('template-block/block/featured');
        }
        $group = acf_get_field_group('group_61bb5b335837a'); // newest field group key
        if ($group['active']) {
            get_template_part('template-block/block/newest');
        }
        $group = acf_get_field_group('group_61bdc76c8a987'); // carousel slider group key
        if ($group['active']) {
            get_template_part('template-block/block/carousel-slider');
        }
        get_template_part('template-block/block/trending');

        get_template_part('template-block/block/testimonial-section');
        ?>
    <?php endif; ?>

</div>
<?php get_footer(); ?>

