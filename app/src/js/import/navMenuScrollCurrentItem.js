(function ($) {
  $(function () {

    if (window.matchMedia("(max-width: 768px)").matches) {

      const $postNavMenu = $('#pageNavMenu');

      if ($postNavMenu.length < 0) return

      const $currentItem = $postNavMenu.find('.is-current')[0];
      const $prevCurrentItems = $postNavMenu.find('.is-current').prevAll();
      let sumScrollLeft = 0;

      $prevCurrentItems.each(function (key, item) {
        sumScrollLeft += item.offsetWidth;
      });

      const wrapperScrollLeft = sumScrollLeft - $currentItem.offsetWidth

      $postNavMenu[0].scrollLeft = wrapperScrollLeft;

    }
  })
}(jQuery));
