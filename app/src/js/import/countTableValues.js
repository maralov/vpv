import $ from 'jquery'

jQuery(function ($) {

  const summValue = elem => {
    let total = 0;
    $(elem).each((k, i) => {
      total += parseInt(i.textContent.replace(/\s+/g, ''))
    })
    return total
  }

  const setValue = elem => {
    let summ = summValue(`${elem}-summ`);
    let text = ''

    if (summ > 999999) {
      summ = (summ / 1000000).toFixed(1)
      text = summ + ' млн'
    } else if (summ > 1099 && summ < 1000000) {
      summ = (summ / 1000).toFixed(1)
      text = summ + ' тис'
    } else if (summ > 99 && summ < 1100) {
      text = summ + ' шт'
    } else {
      text = summ + ''
    }

    $(elem).text(text.replace(".", ","))

  }

  setValue('.js-population')
  setValue('.js-locality')
  setValue('.js-point')
  setValue('.js-otg')
  setValue('.js-dump')

});