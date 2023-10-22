import './bootstrap'

let appUrl;
let currentRouteName;

let pageOnload = async function() {
    await allOnload();

    if(currentRouteName === "home.index") {
        homeOnload();
    } else if(currentRouteName === "admin.subscribers.index") {
        adminSubscribersOnload();
    }
};
let allOnload = async function() {
    appUrl = $("input[name='app_url']").val();
    currentRouteName = $("input[name='route_name']").val();

    $(window).trigger('scroll');
};

let homeOnload = function() {
    $('.autoplay').slick({
        slidesToScroll: 1,
        slidesToShow: 4,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: true,
        prevArrow: '<i class="fa-light fa-circle-chevron-left font-size-200 text-color-2" style="position: absolute; top: 50%; left:0; transform: translate(0, -50%)"></i>',
        nextArrow: '<i class="fa-light fa-circle-chevron-right font-size-200 text-color-2" style="position: absolute; top: 50%; right:0; transform: translate(0, -50%)"></i>',
        responsive: [
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 4
                }
            }
        ]
    });
};
let adminSubscribersOnload = function() {
    initializeDataTables();
};

let numberFormat = function(x, decimal) {
    x = parseFloat(x);
    let parts = x;

    if(decimal !== false) {
        parts = parts.toFixed(decimal)
    }

    parts = parts.toString().split(".");

    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    if(decimal !== 0) {
        return parts.join(".");
    } else {
        return parts[0];
    }
};
let initializeReloadButton = function(link) {
    let modalSuccess = $("#modal-success");

    modalSuccess.attr("data-bs-backdrop", "static");
    modalSuccess.attr("data-bs-keyboard", "false");

    modalSuccess.find("button").removeAttr("data-bs-dismiss");
    modalSuccess.find("button").addClass("reload-page");

    modalSuccess.find("button").attr("data-link", link);
};
let initializeDataTables = function() {
    $(".data-table").DataTable({
        aaSorting: [],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        exportOptions: {
            format: {
                body: function ( data, row, column, node ) {
                    if (column === 5) {
                        //need to change double quotes to single
                        data = data.replace( /"/g, "'" );
                        //split at each new line
                        let splitData = data.split('\n');
                        data = '';
                        for (let i=0; i < splitData.length; i++) {
                            //add escaped double quotes around each line
                            data += '\"' + splitData[i] + '\"';
                            //if its not the last line add CHAR(13)
                            if (i + 1 < splitData.length) {
                                data += ', CHAR(13), ';
                            }
                        }
                        //Add concat function
                        data = 'CONCATENATE(' + data + ')';
                        return data;
                    }
                    return data;
                }
            }
        }
    });
    $(".loading-text").addClass("d-none");
    $(".data-table").removeClass("d-none");
};
let showRequestError = function(error) {
    let content = "Something went wrong.";

    if(error.response) {
        if(error.response.data) {
            content = error.response.data.message;
            for (let prop in error.response.data.errors) {
                if (Object.prototype.hasOwnProperty.call(error.response.data.errors, prop)) {
                    content += ' ' + error.response.data.errors[prop];
                }
            }
        }
    }

    $("#modal-error .message").html(content);
    $("#modal-error").modal("show");
};
function getOffset(el) {
    const rect = el.getBoundingClientRect();
    return {
        left: rect.left + window.scrollX,
        top: rect.top + window.scrollY
    };
}

$(document).ready(function() {
    pageOnload();
});

$(window).on('scroll', function() {
    let navbar = $(".navbar");

    if($(this).scrollTop() > 0) {
        navbar.addClass("scrolled");
    } else {
        navbar.removeClass("scrolled");
    }
});

$(document).on("click", ".reload-page", function() {
    $(this).prop("disabled", true);
    let link = $(this).attr("data-link");

    if(link) {
        $(this).text("Redirecting");
        window.location.href = link;
    } else {
        $(this).text("Reloading Page");
        window.location.reload();
    }
});

$(document).on("submit", "#email-subscription-form", function(e) {
    e.preventDefault();

    let form = $(this);
    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('SUBMITTING');

    let data = new FormData($(this)[0]);
    let url = data.get("url").toString();

    axios.post(url, data)
        .then((response) => {
            form.find('input[type="text"]').val("");
            form.find('input[type="email"]').val("");

            $("#modal-success .message").html("Thanks for subscribing!<br>We’ll keep you posted.");
            $("#modal-success").modal("show");
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            button.prop("disabled", false);
            button.html('KEEP ME POSTED!');
        });
});

$(document).on("submit", "#contact-form", function(e) {
    e.preventDefault();

    let form = $(this);
    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('SUBMITTING');

    let data = new FormData($(this)[0]);
    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            form.find('input').val("");
            form.find('textarea').val("");

            $("#modal-success .message").html("Message sent! Please wait for our email. We’ll contact you the soonest.");
            $("#modal-success").modal("show");
        }).catch((error) => {
        showRequestError(error);
    }).then(() => {
        button.prop("disabled", false);
        button.html('SUBMIT');
    });
});

$(document).on("submit", "#register-form", function(e) {
    e.preventDefault();

    let form = $(this);
    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('Submitting');

    let data = new FormData($(this)[0]);
    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            button.html('Redirecting');
            window.location = response.data.redirect;
        }).catch((error) => {
            button.prop("disabled", false);
            button.html('Submit');

            showRequestError(error);
        })
});

$(document).on("submit", "#user-login-form", function(e) {
    e.preventDefault();

    let form = $(this);
    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('Logging In');

    let data = new FormData($(this)[0]);
    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            button.html('Redirecting');
            window.location = response.data.redirect;
        }).catch((error) => {
            button.prop("disabled", false);
            button.html('Log In');

            showRequestError(error);
        })
});

// Admin Log In
$(document).on("submit", "#login-form", function(e) {
    e.preventDefault();

    let form = $(this);

    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('Logging In');

    let url = $(this).attr("action");
    let data = new FormData($(this)[0]);

    axios.post(url, data)
        .then((response) => {
            button.html("REDIRECTING");
            window.location = response.data.redirect;
        }).catch((error) => {
            button.prop("disabled",false);
            button.html("Log In");

            showRequestError(error);
        });
});
