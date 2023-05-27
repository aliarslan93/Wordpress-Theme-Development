<?php
$blog_class = \Yudiho_THEME\Inc\Blog::get_instance();
$postID = $args->comment_post_ID;
$image = wp_get_attachment_image_src(get_post_thumbnail_id($postID), 'testimonial_big');
$post = get_post($postID);

?>
<div class="col-lg-4 col-sm-12 col-md-12">
    <div class="testomonial-card">
        <a href="<?php echo get_permalink($postID); ?>">
        <img src="<?php echo $image[0] ?>" class="full-width img-fluid" alt="<?php echo $post->post_title; ?>">
        <div class="testomonial-body">
            <h5 class="testomonial-heading"><?php echo $post->post_title; ?></h5>
            <p class="testomonial-description"><?php echo ($post->post_excerpt) ? $post->post_excerpt : $args->comment_content; ?></p>
        </div>
        </a>
    </div>
</div>