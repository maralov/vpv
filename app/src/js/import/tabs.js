import $ from 'jquery'

jQuery(function ($) {

  $("#tabsContent .tabs-content-item").not(":first").hide()
  $("#tabsNav ul li:first").addClass("is-current");

  $("#tabsNav a").on('click', function (e) {
    e.preventDefault();
    $(this).closest('li').addClass("is-current").siblings().removeClass("is-current");
    $($(this).attr('href')).removeClass("is-hide").show().siblings('.tabs-content-item').addClass("is-hide");
  });

  const hash = $.trim(window.location.hash).replace(/[^a-z]+/g, '');
  console.log(hash);

  if (hash) $(`#tabsNav a[href="#${hash}"]`).trigger('click');


});