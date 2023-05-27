<?php
/**
 * PAGE Template File
 * @package Yudiho
 */

get_header();

if (has_post_thumbnail()):
    $attachment_image = wp_get_attachment_url(get_post_thumbnail_id());
    get_template_part('template-parts/yudiho-parallax', null,
        array('image' => esc_attr($attachment_image))
    );
endif;
?>
<div class="container">

    <section class="row">
        <div class="col-lg-9 col-sm-12 col-md-12">
            <div class="yudiho-page-content">
                <?php the_content(); ?>
            </div>
            <?php
            if (comments_open()):
                comments_template();
                /*else:
                    echo "Comments are closed";*/
            endif; ?>
        </div>
            <div class="col-lg-3 col-sm-12 col-md-12">
                <?php get_sidebar('page'); ?>
            </div>
    </section>
</div>
<?php get_footer(); ?>

