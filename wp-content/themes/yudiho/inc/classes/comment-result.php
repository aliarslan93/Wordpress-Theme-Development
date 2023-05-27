<?php
function yudiho_enqueue_script()
{

}

add_action('wp_enqueue_scripts', 'yudiho_enqueue_script');
function yudiho_get_comment($comments = null, $args = array(), $depth = null)
{
    $GLOBALS['comment'] = $comments;
    extract($args, EXTR_SKIP);
    $comment_id = get_comment_ID();
    $post_id = get_the_ID();
    $author = get_comment_author($comment_id);

    $comment_author_email = get_comment_author_email($comment_id);
    $comment_author_url = get_comment_author_url($comment_id);
    $comment_author_name = get_comment_author_url($comment_id);

    ?>
    <div class="client-review" <?php comment_class(empty($args['has_children']) ? "" : "parent"); ?>
         id="comment-<?php echo $comment_id; ?>">
        <img class="client-review__image" src="<?php echo get_avatar_src($comment_author_email, 100) ?>" alt="ASD">
        <div class="client-review__detail">

            <span class="client-review__name"> <?php echo comment_author($comment_id); ?> </span>
            <span class="client-review__date"> <?php
                printf(
                    __('%1$s at %2$s'),
                    get_comment_date(),
                    get_comment_time()
                );
                ?> </span>
            <?php if ($comments->comment_approved == "0"): ?>
                <p class="col-xs-12"><?php _e('Your comment is awaiting.'); ?></p>
            <?php endif; ?>
            <p class="client-review__description"><?php comment_text(); ?></p>
            <p>

            </p>
        </div>
        <?php /* ?>
        <div class="reply-comment">
            <img class="reply-comment__image" src="https://via.placeholder.com/100x100" alt="ASD">
            <div class="reply-comment__detail">
                <span class="reply-comment__name">Ali ARSLAN</span>
                <p class="reply-comment__description">Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır
                    metinlerdir. Lorem
                    Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı
                    galerisini
                    alarak karıştırdığı 1500'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır.
                    Beşyüz
                    yıl
                    boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de
                    sıçramıştır.
                    1960'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın
                    zamanda
                    Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler
                    olmuştur.</p>
            </div>
        </div>
        <?php */ ?>

    </div>
    <?php
}


function get_avatar_src($author_idOrEMAIL = 0, $size = 50)
{
    $author_email = $author_idOrEMAIL;
    if (is_numeric($author_idOrEMAIL)) {
        $author_email = get_the_author_meta('email', $author_idOrEMAIL);
    }
    $default = get_bloginfo('template_directory') . "images/defaultavatar.png";
    return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($author_email))) . "?d=" . urlencode($default) . "&s=" . $size;
}

?>