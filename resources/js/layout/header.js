$('#header')
    .find('#mobile-menu-button')
    .on('click', function() {
        console.log('test')
        $('#sidebar').toggleClass('hidden')
        $('#user-panel').addClass('hidden')
        // $("#sidebar").animate({
        //     width: "toggle"
        // });
    })

$('#header')
    .find('#user-icon')
    .on('click', function() {
        $(this).focus()
    })
