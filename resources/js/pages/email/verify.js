$("#verify")
    .find("#sendnewlinkform")
    .on("submit", function() {
        $(this)
            .find("#sendnewlinkbutton")
            .prop("disabled", true)
            .removeClass("hover:bg-blue-400")
            .addClass("opacity-50 cursor-not-allowed")
            .html('<i class="fas fa-spinner fa-spin"></i>');
    });
