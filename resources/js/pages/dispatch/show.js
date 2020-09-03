var timeout

$('.stop-input')
    .on('keypress', function(event) {
        var keycode = event.keyCode ? event.keyCode : event.which
        if (keycode == '13') {
            event.preventDefault()
        }
    })
    .on('input', function(el) {
        var $this = $(el.target)
        var $resultsContainer = $this.siblings('.stop-results-container')
        var $loadingIcon = $this.next('.stop-loading')

        stopSearchStart($this, $resultsContainer, $loadingIcon)
    })
    .on('focusin', function(el) {
        var $this = $(el.target)
        var $resultsContainer = $this.siblings('.stop-results-container')
        var $loadingIcon = $this.next('.stop-loading')

        stopSearchStart($this, $resultsContainer, $loadingIcon)
    })
    .on('focusout', function(el) {
        var $resultsContainer = $(el.target).siblings('.stop-results-container')
        $resultsContainer.slideUp()
    })

function stopSearchStart($this, $resultsContainer, $loadingIcon) {
    $loadingIcon.show()

    if ($this.val().length > 0 || $this.val() != '') {
        $this.next('.stop-loading')
        clearTimeout(timeout)
        timeout = setTimeout(() => {
            getStops($this.val(), $resultsContainer, $this.next('.stop-loading'))
            stopSearchDone($this.next('.stop-loading'))
        }, 500)
    } else {
        stopSearchReset($resultsContainer, $this.next('.stop-loading'))
    }
}

function stopSearchReset($resultsContainer, $loadingIcon) {
    $loadingIcon.hide()
    $resultsContainer.find('.stop-no-results').slideUp()
    $resultsContainer.find('.stop-item-list').text('')
}

function stopSearchDone($loadingIcon) {
    $loadingIcon.hide()
}

function stopSearchNoResults($resultsContainer) {
    $resultsContainer.find('.stop-no-results').slideDown()
}

function getStops(string, $resultsContainer, $loadingIcon) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    })
    $.ajax({
        type: 'POST',
        url: './warehouse',
        data: {
            string: string,
        },
        success: function(results) {
            stopSearchReset($resultsContainer, $loadingIcon)
            if (results < 1) {
                stopSearchNoResults($resultsContainer)
            } else {
                $.each(results, function(key, result) {
                    // $('<a class="stop-item block border-b p-2 hover:bg-gray-100 cursor-pointer" data-id="' + result.id + '" data-name="' + result.name + '"><h1 class="text-sm font-semibold">' + result.name + '</h1><p class="stop-item-address text-xs uppercase truncate">' + result.address + ' ' + result.city + ' ' + result.state + ' ' + result.zip + '</p></a>').appendTo($resultsContainer.find('.stop-item-list'))
                    $('<a class="stop-item block border-b p-2 hover:bg-gray-100 cursor-pointer" data-id="' + result.id + '" data-name="' + result.name + '"><h1 class="text-sm font-semibold">' + result.name + '</h1></a>').appendTo($resultsContainer.find('.stop-item-list'))
                })

                $resultsContainer.find('.stop-item-list').slideDown()
            }
        },
        complete: function() {
            $resultsContainer.slideDown()
            stopSearchDone($loadingIcon)
        },
    })
}

// -----

$('.stop-item-list').on('click', '.stop-item', function(event) {
    var $this = $(event.currentTarget)
    var id = $this.data('id')
    var name = $this.data('name')
    console.log($this.data())
    var $hiddenInput = $this
        .parent()
        .parent()
        .parent()
        .children('.stop')
    var $input = $hiddenInput.siblings('.stop-input')
    var $resultsContainer = $this.parent().parent()

    $hiddenInput.val(id)
    $input.val(name)
    $resultsContainer.slideUp()
})

$('.stop-type-selection')
    .change(function() {
        $(this)
            .find('option:selected')
            .each(function() {
                var stopDataType = $(this).text()
                var $stopDataGroup = $(this)
                    .parent()
                    .parent()
                    .parent()
                    .siblings('.stop-data-group')
                var $stopDataMiles = $stopDataGroup.find('.miles')
                var $stopDataDropHook = $stopDataGroup.find('.drophook')
                var $stopDataTrayCount = $stopDataGroup.find('.tray')
                var $stopDataRollOffCount = $stopDataGroup.find('.rolloff')
                var $stopDataPackOutCount = $stopDataGroup.find('.packout')
                var $stopDataDifferent = $stopDataGroup.find('.different')
                var $stopDataType = $stopDataGroup.find('.stop-type')

                switch (stopDataType) {
                    case 'Drop & Hook':
                        $stopDataType.val('drop')
                        $stopDataMiles
                            .slideDown()
                            .children()
                            .children('input')
                            .removeAttr('disabled')
                        $stopDataDropHook
                            .slideDown()
                            .children()
                            .children('input')
                            .removeAttr('disabled')

                        $stopDataTrayCount
                            .slideUp()
                            .children()
                            .children('input')
                            .attr('disabled', 'disabled')
                        $stopDataRollOffCount
                            .slideUp()
                            .children()
                            .children('input')
                            .attr('disabled', 'disabled')
                        $stopDataPackOutCount
                            .slideUp()
                            .children()
                            .children('input')
                            .attr('disabled', 'disabled')
                        $stopDataDifferent
                            .slideUp()
                            .children()
                            .children('input')
                            .attr('disabled', 'disabled')
                        break
                    case 'Roll Off':
                        $stopDataType.val('rolloff')
                        $stopDataMiles
                            .slideDown()
                            .children()
                            .children('input')
                            .removeAttr('disabled')
                        $stopDataDropHook
                            .slideDown()
                            .children()
                            .children('input')
                            .removeAttr('disabled')
                        $stopDataTrayCount
                            .slideDown()
                            .children()
                            .children('input')
                            .removeAttr('disabled')

                        $stopDataRollOffCount
                            .slideUp()
                            .children()
                            .children('input')
                            .attr('disabled', 'disabled')
                        $stopDataPackOutCount
                            .slideUp()
                            .children()
                            .children('input')
                            .attr('disabled', 'disabled')
                        $stopDataDifferent
                            .slideUp()
                            .children()
                            .children('input')
                            .attr('disabled', 'disabled')

                        break
                    case 'Pack Out':
                        $stopDataType.val('packout')
                        $stopDataMiles
                            .slideDown()
                            .children()
                            .children('input')
                            .removeAttr('disabled')
                        $stopDataDropHook
                            .slideDown()
                            .children()
                            .children('input')
                            .removeAttr('disabled')
                        $stopDataTrayCount
                            .slideDown()
                            .children()
                            .children('input')
                            .removeAttr('disabled')
                        $stopDataDifferent
                            .slideDown()
                            .children()
                            .children('input')
                            .removeAttr('disabled')

                        $stopDataRollOffCount.slideUp()
                        $stopDataPackOutCount.slideUp()
                        break
                    case '':
                        $stopDataType.val('')
                        $stopDataMiles
                            .slideUp()
                            .children()
                            .children('input')
                            .attr('disabled', 'disabled')
                        $stopDataDropHook
                            .slideUp()
                            .children()
                            .children('input')
                            .attr('disabled', 'disabled')
                        $stopDataTrayCount
                            .slideUp()
                            .children()
                            .children('input')
                            .attr('disabled', 'disabled')
                        $stopDataRollOffCount
                            .slideUp()
                            .children()
                            .children('input')
                            .attr('disabled', 'disabled')
                        $stopDataPackOutCount
                            .slideUp()
                            .children()
                            .children('input')
                            .attr('disabled', 'disabled')
                        $stopDataDifferent
                            .slideUp()
                            .children()
                            .children('input')
                            .attr('disabled', 'disabled')
                        break
                }

                // $stopDataGroup.slideDown()
            })
    })
    .change()

function calcRate($input, value, data_type, stop_type) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    })
    $.ajax({
        type: 'POST',
        url: './rate',
        data: {
            value: value,
            data_type: data_type,
            stop_type: stop_type,
        },
        success: function(results) {
            $input.text('$' + results)
        },
        complete: function() {
            //
        },
    })
}

$('.stop-data-input')
    .on('keypress', function(e) {
        var verified = e.which == 8 || e.which == undefined || e.which == 0 ? null : String.fromCharCode(e.which).match(/[^0-9]/)
        if (verified) {
            e.preventDefault()
        }
    })
    .on('focus', function() {
        $(this).val('')
    })
    .on('blur', function() {
        if ($(this).val() == '') {
            $(this).val('0')
            $(this)
                .next('.stop-data-rate')
                .text('$0.00')
        }
    })
    .on('input', function() {
        if ($(this).val() != '') {
            clearTimeout(timeout)
            timeout = setTimeout(() => {
                calcRate(
                    $(this).next('.stop-data-rate'),
                    $(this).val(),
                    $(this)
                        .siblings('.stop-data-type')
                        .val(),
                    $(this)
                        .parent()
                        .parent()
                        .siblings('.stop-type')
                        .val()
                )
            }, 500)
        } else {
            $(this)
                .next('.stop-data-rate')
                .text('$0.00')
        }
    })
    .each(function(value, input) {
        if ($(input).val() != 0) {
            calcRate(
                $(input).next('.stop-data-rate'),
                $(input).val(),
                $(input)
                    .siblings('.stop-data-type')
                    .val(),
                $(input)
                    .parent()
                    .parent()
                    .siblings('.stop-type')
                    .val()
            )
        }
    })

$('.different-checkbox')
    .change(function() {
        var $stopDataGroup = $(this)
            .parent()
            .parent()
            .parent()
        var $stopDataTrayCount = $stopDataGroup.find('.tray')
        var $stopDataRollOffCount = $stopDataGroup.find('.rolloff')
        var $stopDataPackOutCount = $stopDataGroup.find('.packout')

        if (
            $stopDataGroup
                .parent()
                .find('.stop-type-selection')
                .val() == '3'
        ) {
            if ($(this).is(':checked')) {
                $stopDataTrayCount
                    .hide()
                    .children()
                    .children('input')
                    .attr('disabled', 'disabled')
                $stopDataRollOffCount
                    .slideDown()
                    .children()
                    .children('input')
                    .removeAttr('disabled')
                $stopDataPackOutCount
                    .slideDown()
                    .children()
                    .children('input')
                    .removeAttr('disabled')
            } else if ($(this).is(':not(:checked)')) {
                $stopDataTrayCount
                    .slideDown()
                    .children()
                    .children('input')
                    .removeAttr('disabled')
                $stopDataRollOffCount
                    .hide()
                    .children()
                    .children('input')
                    .attr('disabled', 'disabled')
                $stopDataPackOutCount
                    .hide()
                    .children()
                    .children('input')
                    .attr('disabled', 'disabled')
            }
        }
    })
    .change()
