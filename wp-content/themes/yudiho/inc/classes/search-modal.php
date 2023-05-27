<?php
add_action('wp_ajax_search_form', 'do_search_terms');
add_action( 'wp_ajax_nopriv_search_form', 'do_search_terms' );

function do_search_terms()
{
    $args = array(
        's' => $_POST['search_terms'],
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'post_type' => 'post',
    );
    $query = new WP_Query($args);
    wp_reset_query();
    $search_result = $query->posts;
    if (is_array($search_result) && !empty($search_result)):
        ?>
        <div class="search-form__result">
            <div class="container">
                <div class="row">
                    <?php foreach ($search_result as $result):
                        echo get_template_part('template-parts/search-form/result-card', null, $result);
                    endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    endif;
    wp_die();
}

function register_search_js()
{
    wp_enqueue_script('search_modal', YUDIHO_DIR_URI . "/assets/js/search-modal.js", array(), '', true);

    wp_localize_script('search_modal', 'searchFile', array(
        'url' => admin_url('admin-ajax.php')
    ));
}

add_action('wp_enqueue_scripts', 'register_search_js');

?>