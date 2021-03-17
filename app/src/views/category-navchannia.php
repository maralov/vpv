<?php
/*
	
 */
$queried_object = get_queried_object();
$cat_id = $queried_object->term_id;

$info_sub_cats = get_categories(array(
  'child_of' => $info_cat_ID,
  'hide_empty' => false
));

get_header(); ?>

<main>
  <div class="page">
    <div class="container">
      <?php
      if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="page-breadcrumbs">', '</div>');
      }
      ?>

      <div class="mb-5 d-flex justify-content-between align-items-center">
        <h1 class="page-title"><?php echo get_cat_name($cat_id); ?></h1>

        <div class="sort-block">
          <div class="sort-block__item">Сортувати за:</div>
          <div class="sort-block__item sort-block__action">Назвою (А-Я)</div>
          <div class="sort-block__item sort-block__action">Нові</div>
          <div class="sort-block__item sort-block__action">Популярні</div>
        </div>
      </div>

      <section class="page-content">

        <div class="page-content__header d-flex justify-content-between align-items-center">

          <h2 class="h-2"><?php echo get_cat_name($cat_id); ?></h2>



        </div>
        <!-- ./page-content__header -->
        <div class="row">
          <?php $args = array(
            // 'posts_per_page' => 50,
            'cat' => $cat_id
          );

          $query = new WP_Query($args);
          // Цикл
          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
              <div class="col-12 pb-4 border-bottom mb-4">
                <div class="info-card">
                  <a href="<?php echo get_permalink() ?>">
                    <div class="info-card__img">
                      <?php
                      $post_preview_img = get_field('post_preview_img');
                      echo kama_thumb_img(array(
                        'src' => $post_preview_img,
                        'w' => 420,
                        'h' => 200,
                        'alt' => get_the_title(),
                      )); ?>

                    </div>
                  </a>
                  <div class="info-card__body">
                    <a href="<?php echo get_permalink() ?>">
                      <h4 class="info-card__title">
                        <?php the_title(); ?>
                      </h4>
                      <div>
                        <?php
                        $excerpt_text = wp_strip_all_tags(get_the_content());
                        echo kama_excerpt(array('maxchar' => 145, 'text' => $excerpt_text)); ?>
                      </div>
                    </a>
                    <div class="info-card__footer d-flex">
                      <?php if (!empty(get_the_tags())) : ?>
                        <div class="me-4 txt-muted tags"><?php the_tags(''); ?></div>
                      <?php endif; ?>

                      <?php the_date('d.m.Y'); ?>
                    </div>
                  </div>

                </div>
              </div>
          <?php wp_reset_query();
            endwhile;
          endif; ?>

          <div class="col-12 mt-4 d-flex justify-content-center">
            <button type="button" class="btn btn-outline-primary">Показати ще</button>
          </div>
        </div>

      </section>

      <!-- page-content -->
    </div>
  </div>

</main>

<?php get_footer(); ?>