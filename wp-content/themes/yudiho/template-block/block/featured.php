<section class="featured">
    <h1><?php echo get_field('featured_title'); ?></h1>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 ">
            <a href="<?php echo get_field('big_post_url'); ?>">
                <div class="big-card">
                    <figure>
                        <img src="<?php echo get_field('big_post_image'); ?>"
                             class="full-width img-fluid">
                    </figure>
                    <figcaption class="big-card__body">
                        <h2 class="big-card__heading"><?php echo get_field('big_post_title'); ?></h2>
                        <p class="big-card__description"><?php echo get_field('big_post_description'); ?></p>
                    </figcaption>
                </div>
            </a>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 ">
            <div class="row">
                <div class="col-12">
                    <a href="<?php echo get_field('small_top_post_url'); ?>">
                        <div class="small-card">
                            <figure>
                                <img src="<?php echo get_field('small_top_post_image'); ?>"
                                     class="full-width img-fluid">
                            </figure>
                            <figcaption class="small-card__body">
                                <h2 class="small-card__heading"><?php echo get_field('small_top_post_title'); ?></h2>
                                <p class="small-card__description"><?php echo get_field('small_top_post_description'); ?></p>
                            </figcaption>
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a href="<?php echo get_field('small_bottom_post_url'); ?>">
                        <div class="small-card">
                            <figure>
                                <img src="<?php echo get_field('small_bottom_post_image'); ?>"
                                     class="full-width img-fluid">
                            </figure>
                            <figcaption class="small-card__body">
                                <h2 class="small-card__heading"><?php echo get_field('small_bottom_post_title'); ?></h2>
                                <p class="small-card__description"><?php echo get_field('small_bottom_post_description'); ?></p>
                            </figcaption>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
