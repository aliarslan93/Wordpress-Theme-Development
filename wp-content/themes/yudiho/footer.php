<?php
/**
 * Footer Template
 * @package Yudiho
 */
?>
<?php wp_footer(); ?>
<footer class="footer-section">
    <div class="container">
        <div class="footer-content pt-5 pb-5">
            <div class="row">
                <div class="footer-logo">
                    <?php if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    } ?>

                </div>
                <?php dynamic_sidebar('footer-sidebar-widget'); ?>


            </div>
        </div>
    </div>

    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <?php /* ?>
                <div class="col-xl-6 col-lg-6 col-sm-12 text-center text-lg-left">
                    <div class="copyright-text">
                        <p>
                            Copyright &copy; 2021, All Right Reserved <a href="#">Yudiho.com</a>
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Policy</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
  <?php */ ?>
            </div>
        </div>
    </div>

</footer>
<?php get_template_part('template-block/block/search-modal') ?>
</body>
</html>