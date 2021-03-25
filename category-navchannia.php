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

      <div class=" row justify-content-between align-items-center">
        <div class="col-md-3 mb-4">
          <h1 class="page-title"><?php echo get_cat_name($cat_id); ?></h1>
        </div>
        <div class="col-md-9 mb-4 order-1 order-md-0 d-md-flex justify-content-end">
          <div class="sort-block">
            <div class="sort-block__item">Сортувати за:</div>
            <div class="sort-block__item sort-block__action">Назвою (А-Я)</div>
            <div class="sort-block__item sort-block__action">Нові</div>
            <div class="sort-block__item sort-block__action">Популярні</div>
          </div>
        </div>
        <div class="col-md-12 mb-4">
          <div class="page-filter">
            <a href="#" class="page-filter__item page-filter-tag active">Усі</a>
            <a href="#" class="page-filter__item page-filter-tag">Для населення</a>
            <a href="#" class="page-filter__item page-filter-tag">Для працівників</a>
            <a href="#" class="page-filter__item page-filter-tag">Для садочків/шкіл</a>
            <a href="#" class="page-filter__item page-filter-tag">Для держслужбовців</a>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="col-sm-6 col-md-4 mb-4">
          <article class="card bg-light">
            <div class="card__img img-responsive">
              <img src="<?php the_field('post_preview_img', 161) ?>" alt="">
            </div>
            <div class="card__body">
              <div class="card__tags"><span class="page-filter-tag page-filter-tag-sm">Для держслужбовців</span></div>
              <h3 class="card__title text-uppercase h-3"><?php echo get_the_title(161) ?></h3>
              <div class="card__txt">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id ac metus porttitor sed enim tellus
                  gravida.
                </p>
              </div>
              <div class="card__action">
                <a href="<?php echo get_the_permalink(161) ?>" class="btn bg-primary btn-outline-primary"> Розпочати </a>
              </div>
            </div>
          </article>
        </div>
        <div class="col-sm-6 col-md-4 mb-4">
          <article class="card bg-light">
            <div class="card__img img-responsive">
              <img src="<?php the_field('post_preview_img', 161) ?>" alt="">
            </div>
            <div class="card__body">
              <div class="card__tags"><span class="page-filter-tag page-filter-tag-sm">Для держслужбовців</span></div>
              <h3 class="card__title text-uppercase h-3"><?php echo get_the_title(161) ?></h3>
              <div class="card__txt">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id ac metus porttitor sed enim tellus
                  gravida.
                </p>
              </div>
              <div class="card__action">
                <a href="<?php echo get_the_permalink(161) ?>" class="btn bg-primary btn-outline-primary"> Розпочати </a>
              </div>
            </div>
          </article>
        </div>
        <div class="col-sm-6 col-md-4 mb-4">
          <article class="card bg-light">
            <div class="card__img img-responsive">
              <img src="<?php the_field('post_preview_img', 161) ?>" alt="">
            </div>
            <div class="card__body">
              <div class="card__tags"><span class="page-filter-tag page-filter-tag-sm">Для держслужбовців</span></div>
              <h3 class="card__title text-uppercase h-3"><?php echo get_the_title(161) ?></h3>
              <div class="card__txt">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id ac metus porttitor sed enim tellus
                  gravida.
                </p>
              </div>
              <div class="card__action">
                <a href="<?php echo get_the_permalink(161) ?>" class="btn bg-primary btn-outline-primary"> Розпочати </a>
              </div>
            </div>
          </article>
        </div>
        <div class="col-sm-6 col-md-4 mb-4">
          <article class="card bg-light">
            <div class="card__img img-responsive">
              <img src="<?php the_field('post_preview_img', 161) ?>" alt="">
            </div>
            <div class="card__body">
              <div class="card__tags"><span class="page-filter-tag page-filter-tag-sm">Для держслужбовців</span></div>
              <h3 class="card__title text-uppercase h-3"><?php echo get_the_title(161) ?></h3>
              <div class="card__txt">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id ac metus porttitor sed enim tellus
                  gravida.
                </p>
              </div>
              <div class="card__action">
                <a href="<?php echo get_the_permalink(161) ?>" class="btn bg-primary btn-outline-primary"> Розпочати </a>
              </div>
            </div>
          </article>
        </div>
        <div class="col-sm-6 col-md-4 mb-4">
          <article class="card bg-light">
            <div class="card__img img-responsive">
              <img src="<?php the_field('post_preview_img', 161) ?>" alt="">
            </div>
            <div class="card__body">
              <div class="card__tags"><span class="page-filter-tag page-filter-tag-sm">Для держслужбовців</span></div>
              <h3 class="card__title text-uppercase h-3"><?php echo get_the_title(161) ?></h3>
              <div class="card__txt">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id ac metus porttitor sed enim tellus
                  gravida.
                </p>
              </div>
              <div class="card__action">
                <a href="<?php echo get_the_permalink(161) ?>" class="btn bg-primary btn-outline-primary"> Розпочати </a>
              </div>
            </div>
          </article>
        </div>
        <div class="col-sm-6 col-md-4 mb-4">
          <article class="card bg-light">
            <div class="card__img img-responsive">
              <img src="<?php the_field('post_preview_img', 161) ?>" alt="">
            </div>
            <div class="card__body">
              <div class="card__tags"><span class="page-filter-tag page-filter-tag-sm">Для держслужбовців</span></div>
              <h3 class="card__title text-uppercase h-3"><?php echo get_the_title(161) ?></h3>
              <div class="card__txt">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id ac metus porttitor sed enim tellus
                  gravida.
                </p>
              </div>
              <div class="card__action">
                <a href="<?php echo get_the_permalink(161) ?>" class="btn bg-primary btn-outline-primary"> Розпочати </a>
              </div>
            </div>
          </article>
        </div>
        <!-- ./col-md-4 -->
        <div class="col-12 mt-4 d-flex justify-content-center">
          <button type="button" class="btn btn-outline-primary">Показати ще</button>
        </div>
        <!-- ./col-12 mt-4 -->
      </div>
      <!-- ./row -->
    </div>
    <!-- ./container -->
  </div>
  <!-- ./page -->
</main>

<?php get_footer(); ?>