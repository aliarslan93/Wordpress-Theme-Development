<?php
/**
 * Index Template File
 * @package Yudiho
 */
get_header();


?>
<div class="container">

    <?php if (is_author()):
        get_template_part('template-parts/single/author-header');
    else: ?>
    <h1><?php single_cat_title('', true); ?></h1>
    <?php endif; ?>
    <div class="row">

        <div class="col-sm 12 col-md-12 col-xl-9">
            <?php if (have_posts()): ?>
                <section class="category-list">
                    <?php if (is_home() && !is_front_page()): ?>
                        <h1><?php single_post_title(); ?></h1>
                    <?php endif; ?>
                    <ul class="row">
                        <?php while (have_posts()) : the_post() ?>
                            <?php get_template_part('template-parts/article-card'); ?>
                        <?php endwhile; ?>
                    </ul>
                    <div class="share-social d-flex aligns-items-center justify-content-center ">
                        <?php echo paginate_links(); ?>
                    </div>
                </section>
            <?php else:
                get_template_part('template-parts/article-not-found');
            endif; ?>
        </div>
        <div class="col-lg-3 col-sm-12 col-md-12">
            <?php dynamic_sidebar('blog-sidebar-widget'); ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>

