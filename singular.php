<?php get_header(); ?>

<main>
  <div class="page post">

    <div class="container">

      <?php
      if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="page-breadcrumbs mb-3">', '</div>');
      }
      ?>

      <div class="post-container mb-5">
        <div class="page-content__header">

          <h1 class="page-title mb-4"><?php the_title(); ?></h1>

          <div class="mb-5 d-flex txt-muted">
            <?php if (!empty(get_the_tags())) : ?>
              <div class="me-4 txt-muted tags"><?php the_tags(''); ?></div>
            <?php endif; ?>
            <?php the_date('d.m.Y H:m'); ?>
          </div>

        </div>
        <!-- ./page-content__header -->
        <div class="post-content border-bottom-secondary">
          <?php the_content(); ?>
        </div>
        <!-- ./post-content -->
        <div class="d-flex justify-content-between txt-muted">
          <div class="d-none d-sm-block">
            <?php echo get_the_date('d.m.Y'); ?>
          </div>

          <div class="ms-auto post-share">
            <span>Поділитись статтею:</span>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_post_permalink() ?>" target="_blank" class="post-share-item">
              <img src="<?php echo THEME_ROOT ?>/assets/img/icons/ic-fb.svg" alt="">
            </a>
            <a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&;url=<?php echo get_post_permalink() ?>" target="_blank" class="post-share-item">
              <img src="<?php echo THEME_ROOT ?>/assets/img/icons/ic-twitter.svg" alt="">
            </a>
          </div>
          <!-- ./post-share -->
        </div>
      </div>
      <!-- ./post-container" -->
      <div class="row mb-5 justify-content-between flex-nowrap pt-5">
        <div class="col-auto page-title">
          Схожі статті
        </div>
        <!-- ./col -->
        <div class="col-auto">
          <a class="link" href="http://">
            <span>Дивитися усі</span>
            <svg class="link-ic">
              <use xlink:href="<?php echo THEME_ROOT ?>/assets/img/svg/sprite.svg#ic-arrow"></use>
            </svg>
          </a>
        </div>
        <!-- ./col -->
      </div>
      <!-- ./row -->

      <div class="row">
        <div class="col-sm-4 mb-4 mb-sm-0">
          <article class="card card--border-radius-none card--border-none">
            <a class="card__link" href="<?php echo get_the_permalink(124) ?>">
              <div class="mb-3 img-responsive">
                <img src="<?php the_field('post_preview_img', 124) ?>" alt="">
              </div>
              <h3 class="card__title h-2"><?php echo get_the_title(124) ?>...</h3><!-- crop title  -->
              <div class="txt-muted">
                <?php echo get_the_date('d.m.Y H:i'); ?>
              </div>
            </a>
          </article>
        </div>
        <!-- ./col-sm-4 -->
        <div class="col-sm-4 mb-4 mb-sm-0">
          <article class="card card--border-radius-none card--border-none">
            <a class="card__link" href="<?php echo get_the_permalink(124) ?>">
              <div class="mb-3 img-responsive">
                <img src="<?php the_field('post_preview_img', 124) ?>" alt="">
              </div>
              <h3 class="card__title h-2"><?php echo get_the_title(124) ?>...</h3><!-- crop title  -->
              <div class="txt-muted">
                <?php echo get_the_date('d.m.Y H:i'); ?>
              </div>
            </a>
          </article>
        </div>
        <!-- ./col-sm-4 -->
        <div class="col-sm-4">
          <article class="card card--border-radius-none card--border-none ">
            <a class="card__link" href="<?php echo get_the_permalink(124) ?>">
              <div class="mb-3 img-responsive">
                <img src="<?php the_field('post_preview_img', 124) ?>" alt="">
              </div>
              <h3 class="card__title h-2"><?php echo get_the_title(124) ?>...</h3><!-- crop title  -->
              <div class="txt-muted">
                <?php echo get_the_date('d.m.Y H:i'); ?>
              </div>
            </a>
          </article>
        </div>
        <!-- ./col-sm-4 -->
      </div>
      <!-- ./row -->
    </div>
    <!-- ./container -->
  </div>
</main>
<?php get_footer(); ?>