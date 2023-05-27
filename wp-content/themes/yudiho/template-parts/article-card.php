<?php
/**
 * Blog Card Template
 *
 * @package Yudiho
 */
$blog_class = Yudiho_THEME\Inc\Blog::get_instance();
?>
<div class="post-item">
    <a href="<?php the_permalink(); ?>">
        <div class="post-item__image">
            <img src="<?php the_post_thumbnail_url('small'); ?>" alt="<?php the_title(); ?>">
        </div>
        <div class="post-item__detail">
            <h2 class="post-item__heading"><?php the_title(); ?></h2>
            <p class="post-item__description"><?php the_excerpt(); ?></p>
            <div class="post-item__author">
                <?php if (is_home()): ?>
                    <?php $category_detail = get_the_category(get_the_ID());
                    foreach ($category_detail as $cd) {
                        ?>
                        <a href="<?php echo get_category_link($cd); ?>">
                            <span class="item__author-name">
                                   <?php echo $cd->cat_name; ?>
                            </span>
                        </a>
                    <?php }; ?>
                <?php endif; ?>
            </div>
            <div class="post-item__impression">
                <ul>
                    <li>
                        <i class="lni lni-eye"></i> <?php echo $blog_class->get_view_count(get_the_ID()); ?>
                    </li>
                    <li>
                        <i class="lni lni-comments-alt"></i> <?php echo $blog_class->get_comments_count(get_the_ID()); ?>
                    </li>
                </ul>
            </div>
        </div>
    </a>

</div>
