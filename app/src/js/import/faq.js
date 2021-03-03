import $ from 'jquery'

jQuery(function ($) {

  $('.faq-block').on('click', e => {
    const $target = $(e.target);

    if (!$target.hasClass('faq-block__header')) return;

    $target.parent('.faq-block').toggleClass('is-open')

    $target.siblings('.faq-block__body').slideToggle(100)

  })

});