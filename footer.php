<footer class="footer">

    <div class="container">

        <div class="footer__header">
            <?php
            wp_nav_menu([
                'theme_location'  => 'footer_menu',
                'container'       => 'div',
                'menu_class' => 'footer-nav',
            ]);
            ?>
        </div>


    </div>

    <div class="footer-content">
        <div class="container">
            <div class="row mb-4">

                <div class="col-12 col-sm-2 mb-4 mb-lg-0">
                    <div class="footer__logo">
                        <a href="<?php echo get_home_url(); ?>"><img src="<?php the_field('footer_logo', 'option'); ?>" alt="Логотип <?php echo wp_get_document_title(); ?>"></a>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3  mb-4 mb-sm-0">

                    <div class="row footer-partners">
                        <div class="col-12 mb-3">
                            <p class="fw-medium">Партнери</p>
                        </div>

                        <?php if (have_rows('footer_partners', 'option')) : ?>

                            <?php while (have_rows('footer_partners', 'option')) : the_row();
                            ?>

                                <div class=" col-6 d-flex align-items-center footer-partners__item">
                                    <?php $link = get_sub_field('link');

                                    if (!empty($link)) : ?>
                                        <a href="<?php echo $link ?>">
                                            <img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('name'); ?>" title="<?php the_sub_field('name'); ?>">
                                        </a>
                                    <?php else : ?>
                                        <img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('name'); ?>" title="<?php the_sub_field('name'); ?>">
                                    <?php endif; ?>
                                </div>

                            <?php endwhile; ?>

                        <?php endif; ?>
                    </div>

                </div>

                <div class="col-12 col-sm-8 mb-4 mb-lg-0 col-lg-4">
                    <p class="fw-medium mb-4">Контакти</p>

                    <div class="footer-contacs">
                        <div class="footer-contacs__item footer-contacs__item--address">
                            <?php the_field('footer_adress', 'option'); ?>
                        </div>
                        <div class="footer-contacs__item footer-contacs__item--tel">
                            <?php the_field('footer_contacts', 'option'); ?>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-sm-6 col-lg-3 order-2 order-lg-0">

                    <p class="fw-medium mb-4"> Слідкуй за нами тут:</p>
                    <div class="footer-social">

                        <?php if (have_rows('footer_social', 'option')) : ?>

                            <?php while (have_rows('footer_social', 'option')) : the_row();
                            ?>

                                <div class="footer-social-item">

                                    <a href="<?php the_sub_field('link'); ?>" target="_blank">
                                        <img src="<?php the_sub_field('icon'); ?>" alt="">
                                    </a>

                                </div>

                            <?php endwhile; ?>

                        <?php endif; ?>
                    </div>

                </div>

            </div>

            <div class="row ">
                <div class="col-12">
                    <p class="footer-content-copy pt-4 ">&copy; <?php echo date("Y"); ?> <?php echo wp_get_document_title(); ?></p>
                </div>
            </div>
        </div>
    </div>
    </div>

</footer>

<?php wp_footer(); ?>
</body>

</html>