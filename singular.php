<?php get_header(); ?>

<main>
  <div class="page post">

    <div class="container">

      <?php
      if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="page-breadcrumbs mb-3">', '</div>');
      }
      ?>

      <div class="post-container">
        <div class="page-content__header">

          <h1 class="page-title mb-4"><?php the_title(); ?></h1>

          <div class="mb-5 d-flex txt-muted">
            <?php if (!empty(get_the_tags())) : ?>
              <div class="me-4 txt-muted tags"><?php the_tags(''); ?></div>
            <?php endif; ?>
            <?php the_date('d.m.Y H:m'); ?>
          </div>

        </div>

        <div class="post-content">
          <?php the_content(); ?>
        </div>

        <div class="d-flex justify-content-between txt-muted">
          <div>
            <?php echo get_the_date('d.m.Y'); ?>
          </div>

          <div class="ms-auto post-share d-flex align-items-center">
            <span>Поділитись статтею:</span>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_post_permalink() ?>" target="_blank" class="post-share-item">
              <img src="<?php echo THEME_ROOT ?>/assets/img/icons/ic-fb.svg" alt="">
            </a>
            <a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&;url=<?php echo get_post_permalink() ?>" target="_blank" class="post-share-item">
              <img src="<?php echo THEME_ROOT ?>/assets/img/icons/ic-twitter.svg" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>
<?php get_footer(); ?>