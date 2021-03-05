<?php
$queried_object = get_queried_object();
$cat_id = $queried_object->term_id;
?>

<div class="page-search">
  <input class="page-search__input" type="text" name="" id="faqSearch" placeholder="Пошук">
</div>

</div>

<section class="page-content faq-content">

  <div class="page-content__header d-flexalign-items-center">

    <h2 class="h-2"><?php echo get_cat_name($cat_id); ?></h2>

  </div>
  <!-- ./page-content__header -->

  <?php if (have_rows('faq_block', 'option')) :
    while (have_rows('faq_block', 'option')) : the_row();
  ?>

      <div class="row faq-content__row">

        <div class="col-md-4">
          <div class="h-3 txt-muted faq-cat-title"><?php the_sub_field('faq_block_name'); ?></div>
        </div>
        <div class="col-md-8">
          <div class="row faq-items">

            <?php if (have_rows('faq_block_item', 'option')) :
              while (have_rows('faq_block_item', 'option')) : the_row();
            ?>
                <div class="col-12 faq-items__col">
                  <div class="faq-block">
                    <div class="faq-block__header ">
                      <?php the_sub_field('question'); ?>
                    </div>

                    <div class="faq-block__body">
                      <?php the_sub_field('answer'); ?>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>

          </div>

        </div>

      </div>
    <?php endwhile; ?>
  <?php endif; ?>
  <!-- ./faq-content__row -->


</section>

<!-- page-content -->