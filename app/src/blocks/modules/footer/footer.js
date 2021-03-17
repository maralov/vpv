import $ from 'jquery'

jQuery(function ($) {
  const $accordionHeader = $(".menu-item > a:not([href])")

  $accordionHeader.not(":first").siblings('.sub-menu').hide()

  $accordionHeader.first().addClass("is-active");

  $accordionHeader.on('click', function (e) {
    e.preventDefault();
    $(this).toggleClass('is-active').siblings('.sub-menu').slideToggle()
  })

});
