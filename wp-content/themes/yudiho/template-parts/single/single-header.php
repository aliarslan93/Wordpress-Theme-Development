<section class="single-header">
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-12">
            <img src="<?php the_post_thumbnail_url('featured_big'); ?>" class="single-header__image"
                 alt="<?php the_title(); ?>">
        </div>
        <div class="col-lg-6 col-sm-12 col-md-12">
            <div class="single-header__description">
                <h1 class="single-header__h1"> <?php the_title(); ?></h1>
                <?php
                $posttags = get_the_tags();
                if ($posttags): ?>
                    <div class="d-inline-block">
                        <div class="category-box">
                            <?php foreach ($posttags as $tag): ?>
                                <a href="<?php echo get_option('siteurl'); ?>?s=&tag=<?php echo str_replace(' ', '-', $tag->name); ?>">
                                    <span>
                                        <?php echo $tag->name; ?>
                                    </span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <p class="single-header__excerpt"><?php the_excerpt(); ?></p>
                <div class="d-inline-block">
                    <div class="single-header__author-box">
                        <a href=" <?php echo get_author_posts_url(get_the_author_meta('ID'))?>">
                            <?php echo get_avatar(get_the_author_meta('ID'), 80,'',get_the_author_meta('display_name'), array('class' => 'img-fluid rounded-circle')); ?>
                            <span><?php echo get_the_author_meta('first_name'); ?> <?php echo get_the_author_meta('last_name'); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>