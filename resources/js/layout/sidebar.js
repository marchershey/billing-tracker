$("#nav-links")
    .find(".dropdown")
    .each(function() {
        $(this).on("click", function(e) {
            $(this)
                .next(".dropdown-box")
                .slideToggle();
            $(this)
                .find(".caret")
                .toggleClass("fa-rotate-180");
        });
    });
