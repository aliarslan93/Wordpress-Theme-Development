<?php
$newest_posts = get_field('newest_post');
?>
<section class="mt-5">
    <h3><?php echo get_field('newest_title'); ?></h3>

    <div class="row">
        <?php if (is_array($newest_posts)): ?>
            <ul class="yudiho-newest-list row">
                <?php foreach ($newest_posts as $newest_post): ?>
                    <?php
                    get_post($newest_post->ID);
                    $tags = get_the_tags($newest_post->ID);
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($newest_post->ID), 'single-post-thumbnail');

                    ?>

                    <li class="col-lg-6 col-md-6 col-sm-12">
                        <a href="<?php the_permalink($newest_post->ID); ?>" class="col-lg-6 col-md-6 col-sm-12">
                            <div class="yudiho-newest-list__image">
                                <img src="<?php echo $image[0]; ?>" class="rounded-circle img-fluid"
                                     alt="<?php echo $newest_post->post_title; ?>">
                            </div>
                            <div class="yudiho-newest-list__content">
                                <?php if (is_array($tags) & !empty($tags)): ?>
                                    <div class="yudiho-newest-list__tag-list">
                                        <?php foreach ($tags as $tag): ?>
                                            <span><?php echo ucfirst($tag->name); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="yudiho-newest-list__description">
                                    <h3 class="yudiho-newest-list__title"><?php echo $newest_post->post_title; ?></h3>
                                    <p><?php echo $newest_post->post_excerpt; ?></p>
                                    <span class="date"> <?php echo date('d-m-Y', strtotime($newest_post->post_modified)); ?></span>
                                    <span class="read-more">Read More...</span>
                                </div>
                            </div>
                        </a>

                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>