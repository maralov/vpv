<?php
/*
* Template Name: Пост навчання
* Template post type: post
*/
get_header();
global $post;

$categories = get_the_category($post->ID);
$cat_name = $categories[0]->name;

?>

<main>
  <div class="page post">

    <div class="container">

      <?php
      if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="page-breadcrumbs mb-3">', '</div>');
      }
      ?>
      <div class="page-content__header">
        <h1 class="page-title"><?php the_title(); ?></h1>
      </div>
    </div>
    <!-- /.container -->
    <div class="post-info">
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-5 mb-5 mb-md-0">
            <p class="h-3 mb-4 pb-3">Отримайте сертифікат, що засвідчує успішне проходження базового курсу з управління відходами <?php echo mb_strtolower($cat_name); ?></p>
            <ul class="post-info-list mb-4 pb-3">
              <li class="post-info-list__item post-info-list__item--cat">Категорія: <?php echo $cat_name; ?></li>
              <li class="post-info-list__item post-info-list__item--time">Тривалість лекцій: 4-7 хвилин</li>
              <li class="post-info-list__item post-info-list__item--count">Кількість лекцій: 6</li>
            </ul>

            <a href="#goto-video" class="btn btn-primary">До програми курсу</a>
          </div>
          <!-- /.col-md-5 -->
          <div class="col-md-6">
            <?php
            $post_preview_img = get_field('post_preview_img');
            echo kama_thumb_img(array(
              'src' => $post_preview_img,
              'w' => 660,
              'h' => 337,
              'alt' => get_the_title(),
            )); ?>
          </div>
          <!-- /.col-md-6 -->
        </div>
      </div>
      <!-- /.container -->
    </div>

    <section class="bg-light">
      <div class="container">
        <div class="row pt-5 ">
          <div class="col-md-6">
            <h2 class="page-title mt-0 mb-4 mb-md-0">Про що ця освітня програма?</h2>
          </div>
          <div class="post-content col-md-6">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>

    <section class="post-letcure">
      <div class="container">
        <h2 class="page-title mt-0 mb-4 mb-md-5 txt-center">Програма курсу</h2>

        <!-- js-lecture-done меняет текст и цвет кнопки, убирает .d-none у Пройдено-->
        <div class="js-lecture-done border-top-secondary border-bottom-secondary row align-items-center justify-content-center justify-sm-content-between py-4 py-sm-3">
          <div class="col-sm-7 col-lg-8 mb-3 mb-sm-0">Лекція 1 - Навіщо держслужбовцю вміти правильно управляти відходами</div>
          <!-- /.col-md-10 -->
          <div class="col-sm-2 mb-3 mb-sm-0 txt-center txt-primary d-none">Пройдено</div>
          <!-- /.col-sm-7 col-lg-8 mb-3 mb-sm-0 -->
          <div class="col-sm-3 col-lg-2 p-0 d-flex d-lg-block">
            <a href="#" class="btn btn-primary mx-auto ms-md-auto">Розпочати</a>
          </div>
          <!-- /.col-md-2 -->
        </div>

        <div class="border-bottom-secondary row align-items-center justify-content-between py-3">
          <div class="col-sm-7 col-lg-8 mb-3 mb-sm-0">Лекція 2 - Управління відходами</div>
          <!-- /.col-md-10 -->
          <div class="col-sm-2 mb-3 mb-sm-0 txt-center txt-primary d-none">Пройдено</div>
          <!-- /.col-sm-7 col-lg-8 mb-3 mb-sm-0 -->
          <div class="col-sm-3 col-lg-2 p-0 d-flex d-lg-block"><a href="#" class="btn btn-primary mx-auto ms-md-auto">Розпочати</a></div>
          <!-- /.col-md-2 -->
        </div>

        <!-- .lecture-disabled не активная лекция   -->
        <div class="lecture-disabled border-bottom-secondary row align-items-center justify-content-between py-3">
          <div class="col-sm-7 col-lg-8 mb-3 mb-sm-0">Лекція 3 - Скло</div>
          <!-- /.col-md-10 -->
          <div class="col-sm-2 mb-3 mb-sm-0 txt-center txt-primary d-none">Пройдено</div>
          <!-- /.col-sm-7 col-lg-8 mb-3 mb-sm-0 -->
          <div class="col-sm-3 col-lg-2 p-0 d-flex d-lg-block"><a href="#" class="btn btn-primary mx-auto ms-md-auto">Розпочати</a></div>
          <!-- /.col-md-2 -->
        </div>

        <div class="lecture-disabled border-bottom-secondary row align-items-center justify-content-between py-3">
          <div class="col-sm-7 col-lg-8 mb-3 mb-sm-0">Лекція 4 - Пластик</div>
          <!-- /.col-md-10 -->
          <div class="col-sm-2 mb-3 mb-sm-0 txt-center txt-primary d-none">Пройдено</div>
          <!-- /.col-sm-7 col-lg-8 mb-3 mb-sm-0 -->
          <div class="col-sm-3 col-lg-2 p-0 d-flex d-lg-block"><a href="#" class="btn btn-primary mx-auto ms-md-auto">Розпочати</a></div>
          <!-- /.col-md-2 -->
        </div>

        <div class="lecture-disabled border-bottom-secondary row align-items-center justify-content-between py-3">
          <div class="col-sm-7 col-lg-8 mb-3 mb-sm-0">Лекція 5 - Органичні відходи</div>
          <!-- /.col-md-10 -->
          <div class="col-sm-2 mb-3 mb-sm-0 txt-center txt-primary d-none">Пройдено</div>
          <!-- /.col-sm-7 col-lg-8 mb-3 mb-sm-0 -->
          <div class="col-sm-3 col-lg-2 p-0 d-flex d-lg-block"><a href="#" class="btn btn-primary mx-auto ms-md-auto">Розпочати</a></div>
          <!-- /.col-md-2 -->
        </div>

        <div class="lecture-disabled border-bottom-secondary row align-items-center justify-content-between py-3">
          <div class="col-sm-7 col-lg-8 mb-3 mb-sm-0">Лекція 6 - Підсумки</div>
          <!-- /.col-md-10 -->
          <div class="col-sm-2 mb-3 mb-sm-0 txt-center txt-primary d-none">Пройдено</div>
          <!-- /.col-sm-7 col-lg-8 mb-3 mb-sm-0 -->
          <div class="col-sm-3 col-lg-2 p-0 d-flex d-lg-block"><a href="#" class="btn btn-primary mx-auto ms-md-auto">Розпочати</a></div>
          <!-- /.col-md-2 -->
        </div>

        <div class="lecture-disabled border-bottom-secondary row align-items-center justify-content-between py-3">
          <div class="col-sm-7 col-lg-8 mb-3 mb-sm-0">Фінальне тестування</div>
          <!-- /.col-md-10 -->
          <div class="col-sm-2 mb-3 mb-sm-0 txt-center txt-primary d-none">Пройдено</div>
          <!-- /.col-sm-7 col-lg-8 mb-3 mb-sm-0 -->
          <div class="col-sm-3 col-lg-2 p-0 d-flex d-lg-block"><a href="#" class="btn btn-primary mx-auto ms-md-auto">Розпочати</a></div>
          <!-- /.col-md-2 -->
        </div>

      </div>
      <!-- /.container -->
    </section>
    <!-- /.post-letcure -->
  </div>
</main>
<?php get_footer(); ?>