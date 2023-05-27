<?php
/**
 * Comments Template File
 * @package Yudiho
 */

if (get_option('comment_registration') && !is_user_logged_in()) {
    ?>
    <p> You must be login <a
                href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">Logged
            in</a> a post.</p>
<?php } else {

    ?>
    <h4 class="heading">Client Reviews (<?php echo comments_number('0 Comment', '1 Comment', '% Comments'); ?>)</h4>
    <section class="post-review">
        <?php wp_list_comments('type=comment&callback=yudiho_get_comment') ?>
    </section>

    <div class="review-block">
        <form method="POST" action="<?php echo get_option('site_url'); ?>/wp-comments-post.php">
            <?php wp_nonce_field('comment_nonce'); ?>
            <input type="hidden" value="<?php the_ID(); ?>" name="comment_post_ID">
            <?php if (is_user_logged_in()): ?>
                <p> Logged in as
                    <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo wp_get_current_user()->data->user_nicename; ?></a>
                    -
                    <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout">Logout</a>
                </p>

            <?php else: ?>
                <div class="mb-3">
                    <label for="author" class="form-label">Name</label>
                    <input type="text" class="form-control" name="author" id="author" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="review_text" class="form-label">Message</label>
                <textarea name="comment" id="review_text"></textarea>
            </div>
            <button type="submit" class="btn bg-yudiho-1 yudiho-color-4 float-right">Submit</button>
        </form>
    </div>
<?php } ?>
