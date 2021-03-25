<?php
/*
	Template Name: Головна
 */
get_header(); ?>

<main>
  <div class="page">
    <div class="container">
      <?php
      if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="page-breadcrumbs">', '</div>');
      } ?>

      <h1 class="page-title page__title"><?php the_title(); ?></h1>

      <div class="page-content">

        <div class="page-content__header border-bottom">

          <ul id="tabsNav" class="page-nav " role="navigation">
            <li class="page-nav-item is-current">
              <a class="page-nav-link" href="#report">Аналітичний звіт</a>
            </li>
            <li class="page-nav-item">
              <a class="page-nav-link" href="#geography">Географія</a>
            </li>
            <li class="page-nav-item">
              <a class="page-nav-link" href="#dynamic">Динаміка</a>
            </li>
          </ul>

        </div>

        <div id="tabsContent">

          <div id="report" class="tabs-content-item report-content">

            <section class="report-content__item total-value">
              <h2 class="h-3 mb-5">Основні показники Полтавської області</h2>

              <div class="row justify-content-between flex-lg-nowrap">
                <div class="col-sm-auto mb-4 md-sm-0">
                  <p class="txt-muted text-uppercase ">
                    населення
                  </p>
                  <p class="total-value-count js-population">
                  </p>
                </div>
                <div class="col-sm-auto mb-4 md-sm-0">
                  <p class="txt-muted text-uppercase ">
                    НАСЕЛЕНИХ ПУНКТІВ
                  </p>
                  <p class="total-value-count js-locality">
                  </p>
                </div>
                <div class="col-sm-auto mb-4 md-sm-0">
                  <p class="txt-muted text-uppercase">
                    ОТГ
                  </p>
                  <p class="total-value-count  js-otg">
                  </p>
                </div>
                <div class="col-sm-auto mb-4 md-sm-0">
                  <p class="txt-muted text-uppercase">
                    пунктів прийому
                  </p>
                  <p class="total-value-count  js-point">
                  </p>
                </div>
                <div class="col-sm-auto">
                  <p class="txt-muted text-uppercase">
                    ЗВАЛИЩ
                  </p>
                  <p class="total-value-count js-dump">
                  </p>
                </div>
              </div>
            </section>
            <!-- report-content__item -->
            <?php if (have_rows('poltava_trash_volume_td')) : ?>
              <section class="report-content__item">
                <h2 class="h-3 mb-4"><?php the_field('poltava_trash_volume_table_name'); ?></h2>
                <div class="table-responsive">
                  <table class="table table-striped-rows">
                    <thead>
                      <tr>
                        <th scope="col">Район</th>
                        <th scope="col">Населення</th>
                        <th scope="col">Пунктів прийому</th>
                        <th scope="col">Об'єм</th>
                        <th scope="col">Звалищ</th>
                        <th scope="col">Населених пунктів</th>
                        <th scope="col" class="d-none">отг</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php while (have_rows('poltava_trash_volume_td')) : the_row();
                        $district = get_sub_field('district');
                        $population = get_sub_field('population');
                        $point = get_sub_field('point');
                        $dump = get_sub_field('dump');
                        $value = get_sub_field('value');
                        $locality = get_sub_field('locality');
                        $otg = get_sub_field('otg');
                      ?>
                        <tr>
                          <td class="js-district txt-no-break "><?php echo $district ?></td>
                          <td class="js-population-summ"><?php echo $population ?></td>
                          <td class="js-point-summ"><?php echo $point ?></td>
                          <td class="js-dump-summ"><?php echo $dump ?></td>
                          <td class="js-value-summ"><?php echo $value ?></td>
                          <td class="js-locality-summ"><?php echo $locality ?></td>
                          <td class="d-none js-otg-summ"><?php echo $otg ?></td>
                        </tr>
                      <?php endwhile; ?>


                    </tbody>
                  </table>
                </div>
              </section>
              <!-- report-content__item -->
            <?php endif; ?>

            <?//php if (have_rows('poltava_stage_td')) : ?>
            <?php if (true) : ?>
              <section class="report-content__item">
                <h2 class="h-3 mb-4"><?php the_field('poltava_stage_table_name'); ?></h2>
                <div class="table-responsive">
                  <table class="table table-border-rows">
                    <thead>
                      <tr>
                        <th scope="col">Район</th>
                        <th scope="col"><span class='d-none d-sm-inline'>Стадія</span> 1</th>
                        <th scope="col"><span class='d-none d-sm-inline'>Стадія</span> 2</th>
                        <th scope="col"><span class='d-none d-sm-inline'>Стадія</span> 3</th>
                        <th scope="col"><span class='d-none d-sm-inline'>Стадія</span> 4</th>
                        <th scope="col"><span class='d-none d-sm-inline'>Стадія</span> 5</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php while (have_rows('poltava_stage_td')) : the_row();
                        $value = get_sub_field('value');
                      ?>
                        <tr>
                          <td><?php the_sub_field('district'); ?></td>
                          <td colspan="5">
                            <div class="progress" style="height: 32px;">
                              <div class="progress-bar" role="progressbar" style="width: <?php echo $value . '%' ?>;" aria-valuenow="<?php echo $value ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $value . '%' ?></div>
                            </div>
                          </td>

                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </section>
              <!-- report-content__item -->

            <?php endif; ?>
          </div>
          <!-- tabs-content-item report-content -->

          <div id="geography" class="tabs-content-item is-hide">
            <div class="ratio ratio-4x3">
              <?php $geo_src = get_field('analytics_geograpfy_pc');
              if (wp_is_mobile()) :
                $geo_src = get_field('analytics_geograpfy_mob');
              endif; ?>
              <iframe style="width: 100%; height: 100vh" src="<?php echo $geo_src ?>" frameborder="0"></iframe>
            </div>
          </div>

          <div id="dynamic" class="tabs-content-item is-hide">
            <div class="ratio ratio-4x3">
              <?php
              $dyn_src = get_field('dynamic_geograpfy_pc');
              if (wp_is_mobile()) :
                $dyn_src = get_field('dynamic_geograpfy_mob');
              endif; ?>
              <iframe style="width: 100%; height: 100vh" src="<?php echo $dyn_src ?>" frameborder="0"></iframe>
            </div>
          </div>

        </div>
        <!--tabsContent  -->
      </div>

      <!-- page-content -->

    </div>
  </div>

</main>

<?php get_footer(); ?>