<?php
/**
 * Single Template File
 * @package Yudiho
 */
get_header();
?>
<div class="container">
    <?php get_template_part('template-parts/single/single-header'); ?>
    <section class="single-page">
        <div class="row">
            <div class="col-lg-9 col-sm-12 col-md-12 single-page__content">
                <?php the_content();
                if (comments_open()):
                    comments_template();
                endif; ?>

            </div>
            <div class="col-lg-3 col-sm-12 col-md-12">
                <?php dynamic_sidebar('blog-sidebar-widget'); ?>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>

