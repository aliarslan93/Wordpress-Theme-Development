<section class="author-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 d-lg-block">
                <ol class="carousel-indicators tabs">
                    <li>
                        <figure>
                            <?php echo get_avatar(get_the_author_meta('ID'), 350, '', get_the_author_meta('display_name'), array('class' => 'img-fluid rounded-circle')); ?>
                        </figure>
                    </li>
                </ol>
            </div>
            <div class="col-lg-9">
                <div id="carouselExampleIndicators" data-interval="false" class="carousel slide" data-ride="carousel">
                    <h1><?php echo get_the_author_meta('display_name'); ?></h1>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="quote-wrapper">
                                <p><?php echo get_the_author_meta('description'); ?></p>
                                <a href="<?php echo get_the_author_meta('facebook'); ?>" class="author-social"
                                   rel="nofollow noopenner">
                                    <i class="lni lni-facebook align-self-center"></i>
                                </a>
                                <a href="<?php echo get_the_author_meta('twitter'); ?>" class="author-social"
                                   rel="nofollow noopenner">
                                    <i class="lni lni-twitter align-self-center"></i>
                                </a>
                                <a href="<?php echo get_the_author_meta('linkedin'); ?>" class="author-social"
                                   rel="nofollow noopenner">
                                    <i class="lni lni-linkedin align-self-center"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>