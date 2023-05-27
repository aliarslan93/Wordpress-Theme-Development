<?php
$recent_comments = get_comments(array(
    'number' => 3, // number of comments to retrieve.
    'status' => 'approve', // we only want approved comments.
    'post_status' => 'publish',
    'post_type' => array( 'post'),

));

if ($recent_comments): ?>
    <section class="testimonial-card">
        <h4>Latest Comments</h4>
        <div class="row">
            <?php
            foreach ($recent_comments as $comment):
                get_template_part('template-parts/testimonial-card', null, $comment);
            endforeach;
            ?>
        </div>
    </section>
    <?php

endif; ?>