const { includes } = require('lodash')

window._ = require('lodash')

try {
    // include jquery
    window.$ = window.jQuery = require('jquery')
    // utils
    window.moment = require('moment')
    require('@fortawesome/fontawesome-free/js/all')
    require('./utils/updateVh')
    // pages / sections
    require('./layout/alerts')
    require('./layout/header')
    require('./layout/sidebar')
    require('./pages/email/verify')
    require('./pages/dispatch/show')
} catch (e) {
    console.log(e)
}

// moment
$('.format-date').each(function() {
    $(this).text(
        moment($(this).text(), 'YYYY-MM-DD').calendar(null, {
            nextWeek: '[This] dddd',
            nextDay: '[Tomorrow]',
            sameDay: '[Today]',
            lastDay: '[Yesterday]',
            lastWeek: '[Last] dddd',
            sameElse: 'DD/MM/YYYY',
        })
    )
})
