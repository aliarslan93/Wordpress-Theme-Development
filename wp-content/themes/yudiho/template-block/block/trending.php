<?php
/**
 * Trending Template File
 *
 * @package Yudiho
 */
$trend_class = \Yudiho_THEME\Inc\Trending::get_instance();
$trending_post = $trend_class->get_trending_post()->posts;
?>
<section class="mt-5">

    <div class="row">
        <div class="col-xl-3 col-sm-12 col-md-12">
            <?php get_sidebar('home'); ?>
        </div>
        <?php if (is_array($trending_post) && !empty($trending_post)): ?>
            <div class="col-xl-9 col-sm-12 col-md-12">
                <h3><?php _e('Latest Post'); ?></h3>
                <ul class="yudiho-trending-list">
                    <?php foreach ($trending_post as $trending): ?>

                        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($trending->ID), 'carousel_slider'); ?>
                        <li>
                            <a href="<?php the_permalink($trending->ID); ?>"
                               title="<?php echo $trending->post_title; ?>">
                                <div class="yudiho-trending-list__image">
                                    <img src="<?php echo $image[0]; ?>" class="trend-image-circle img-fluid"
                                         alt="<?php echo $trending->post_title; ?>">
                                </div>
                                <div class="yudiho-trending-list__content">
                                    <div class="yudiho-trending-list__tag-list">
                                        <?php $category_detail = get_the_category($trending->ID);
                                        foreach ($category_detail as $cd) {
                                            ?>
                                            <a href="<?php echo get_category_link($cd); ?>">
                                            <span><?php echo $cd->name; ?></span>
                                            </a>

                                        <?php }; ?>

                                    </div>
                                    <a href="<?php the_permalink($trending->ID); ?>"
                                       title="<?php echo $trending->post_title; ?>">
                                        <div class="yudiho-trending-list__description">
                                            <h3 class="yudiho-trending-list__title"><?php echo $trending->post_title; ?></h3>
                                            <p><?php echo $trending->post_excerpt; ?></p>
                                            <span class="date"> <?php echo date('d-m-Y', strtotime($trending->post_date)); ?></span>
                                            <span class="read-more"><?php _e('Read More...'); ?></span>
                                        </div>
                                    </a>

                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>
        <?php endif; ?>
    </div>
</section>