import './bootstrap'

let appUrl;
let currentRouteName;

let pageOnload = async function() {
    await allOnload();

    if(currentRouteName === "home.index") {
        homeOnload();
    } else if(currentRouteName === "admin.orders.index") {
        adminOrdersOnload();
    } else if(currentRouteName === "admin.inventory.index") {
        adminInventoryOnload();
    } else if(currentRouteName === "admin.accounts.index") {
        adminAccountsOnload();
    } else if(currentRouteName === "admin.subscribers.index") {
        adminSubscribersOnload();
    }
};
let allOnload = async function() {
    appUrl = $("input[name='app_url']").val();
    currentRouteName = $("input[name='route_name']").val();

    $(window).trigger('scroll');

    if(currentRouteName === "home.index") {
        // localStorage.removeItem('savedDate');

        let savedDate = localStorage.getItem('savedDate');
        let currentDate = new Date();

        if (!savedDate || (currentDate - new Date(savedDate)) > (24 * 60 * 60 * 1000)) {
            savedDate = currentDate.toString();
            localStorage.setItem('savedDate', savedDate);

            $("#modal-newsletter-subscription").modal("show");
        }
    }
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
let adminOrdersOnload = function() {
    adminOrderTable = $('#orders-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: $("#orders-table").attr("data-url"),
        columns: [
            { data: 'date_time', name: 'orders.created_at' },
            { data: 'reference', name: 'orders.reference' },
            { data: 'name', name: 'users.name' },
            { data: 'delivery_details', name: 'delivery_details', orderable: false, searchable: false },
            { data: 'price', name: 'orders.price' },
            { data: 'status', name: 'order_statuses.status' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ]
    });

    $(".loading-text").addClass("d-none");
    $(".data-table").removeClass("d-none");
};
let adminInventoryOnload = function() {
    initializeDataTables();
};
let adminAccountsOnload = function() {
    initializeDataTables();
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
let formatDateTime = function(date, type) {
    date = new Date(date);

    if(type === 'llll') {
        const options = {
            weekday: 'short',
            month: 'short',
            day: 'numeric',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            timeZone: 'Asia/Manila',
            hour12: true
        };

        const formatter = new Intl.DateTimeFormat('en-US', options);

        return formatter.format(date);
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

    if(content === "Unauthenticated.") {
        $("#modal-login-warning").modal("show");
        return 0;
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

$(document).on("input", ".use-numeric-no-leading-zero-rule", function() {
    let value = $(this).val();

    if (value === null || value === 0 || value === undefined) return value

    let numericValue = value.replace(/[^0-9]/g, '')
    numericValue = numericValue.replace(/^0+/, '') || '1'

    $(this).val(numericValue);
});

$(document).on("click", ".toggle-password-show", function() {
    let input = $(this).closest(".position-relative").find("input");
    let icon = $(this).find("i");

    if(input.attr("type") === "text") {
        input.attr("type", "password");

        icon.addClass('fa-eye');
        icon.removeClass('fa-eye-slash');
    } else {
        input.attr("type", "text");

        icon.removeClass('fa-eye');
        icon.addClass('fa-eye-slash');
    }
});

$(document).on("mouseenter", ".shop-dropdown", function() {
    document.getElementById("shopDropdown").classList.add("show");

});

$(document).on("mouseleave", ".shop-dropdown", function() {
    document.getElementById("shopDropdown").classList.remove("show");
});

// Cart
let updateCartQuantity = function(cartQuantity, cartTotalPrice) {
    if(cartQuantity > 0) {
        $("#cart-quantity-badge").html(cartQuantity);
        $("#cart-quantity-badge").removeClass("d-none");
    } else {
        $("#cart-container").addClass("d-none")
        $("#cart-empty-container").removeClass("d-none")

        $("#cart-quantity-badge").addClass("d-none");
    }

    if(cartTotalPrice) {
        $("#cart-total-price").html(cartTotalPrice);
    }
};

$(document).on("click", ".cart-quantity-decrement", function() {
    let cartItem = $(this).closest(".cart-item");
    let quantityField = cartItem.find('.cart-quantity');

    let quantity = parseInt(quantityField.val()) - 1;

    if(isNaN(quantity) || quantity === 0) {
        quantity = 1;
    }

    quantityField.val(quantity);

    quantityField.trigger("change");
});

$(document).on("click", ".cart-quantity-increment", function() {
    let cartItem = $(this).closest(".cart-item");
    let quantityField = cartItem.find('.cart-quantity');

    let quantity = parseInt(quantityField.val()) + 1;

    quantityField.val(quantity);

    quantityField.trigger("change");
});

$(document).on("change", ".cart-quantity", function() {
    let quantityField = $(this);

    let productId = quantityField.attr("data-product-id");
    let quantity = quantityField.val();

    if(quantity === '') {
        quantity = '1';
        quantityField.val(quantity);
    }

    let cartItem = quantityField.closest(".cart-item");
    let decrementButton = cartItem.find(".cart-quantity-decrement");
    let incrementButton = cartItem.find(".cart-quantity-increment");

    decrementButton.prop("disabled", true);
    incrementButton.prop("disabled", true);

    let url = quantityField.attr('data-url');
    let data = new FormData();
    data.append('product_id', productId);
    data.append('quantity', quantity);

    axios.post(url, data)
        .then((response) => {
            quantityField.val(response.data.quantity);
            updateCartQuantity(response.data.cartQuantity, response.data.cartTotalPrice);
            cartItem.find(".cart-price").html(response.data.price);
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            decrementButton.prop("disabled", false);
            incrementButton.prop("disabled", false);
        });
});

$(document).on("click", ".cart-item-delete", function() {
    let deleteButton = $(this);
    let productId = deleteButton.attr("data-product-id");

    deleteButton.prop("disabled", true);

    let url = deleteButton.attr('data-url');
    let data = new FormData();
    data.append('product_id', productId);

    axios.post(url, data)
        .then((response) => {
            updateCartQuantity(response.data.cartQuantity, response.data.cartTotalPrice);
            deleteButton.closest('.cart-item').remove();
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            deleteButton.prop("disabled", false);
        });
});

// Check Out
$(document).on("change", "[name='promo_code']", function() {
    let promoCode = $(this).val();

    let data = new FormData();
    data.append('promo_code', promoCode);

    let url = $(this).attr("data-url");

    let promoCodeStatus = $("#promo-code-status");

    if(promoCode) {
        promoCodeStatus.html("Checking...");
        promoCodeStatus.removeClass("d-none");
        promoCodeStatus.removeClass("text-success");
        promoCodeStatus.removeClass("text-danger");

        $("#promo-code-discount-row").addClass("d-none");

        axios.post(url, data)
            .then((response) => {
                if(response.data.isValid) {
                    promoCodeStatus.html("You get a 10% discount with this promo code.");
                    promoCodeStatus.addClass("text-success");

                    $("#promo-code-discount-row").removeClass("d-none");

                    let price = parseFloat($("#total-price").attr('data-sub-price'));
                    price *= 0.9;
                    price += 100;

                    $("#total-price").html(numberFormat(price,2));
                    $(".total-price").html(numberFormat(price,2));
                } else {
                    promoCodeStatus.html("Your promo code is invalid.");
                    promoCodeStatus.addClass("text-danger");

                    let price = parseFloat($("#total-price").attr('data-sub-price'));
                    price += 100;

                    $("#total-price").html(numberFormat(price,2));
                    $(".total-price").html(numberFormat(price,2));
                }
            }).catch((error) => {
                showRequestError(error);
            });
    } else {
        let price = parseFloat($("#total-price").attr('data-sub-price'));
        price += 100;

        $("#total-price").html(numberFormat(price,2));
        $(".total-price").html(numberFormat(price,2));

        promoCodeStatus.addClass("d-none");
    }
});

$(document).on("submit", "#checkout-form", function(e) {
    e.preventDefault();

    let form = $(this);

    let button = form.find("[type='submit']")
    button.prop("disabled", true);
    button.html('PROCESSING');

    let data = new FormData(form[0]);
    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            window.location.href = response.data.checkout_url;
        }).catch((error) => {
            showRequestError(error);

            button.prop("disabled", false);
            button.html('PROCEED TO PAYMENT');
        });
});

$(document).on("click", "#attach-payment", function() {
    $("input[name='payment']").trigger("click");
});

$(document).on("change", "input[name='payment']", function() {
    let reader = new FileReader();

    let container = $("#attach-payment");

    reader.onload = function(event) {
        let img = new Image();

        img.onload = function() {
            container.find("div").addClass("d-none");
            container.css("background-image", "url('" + img.src + "')");
        };

        img.src = event.target.result;
    };

    if($(this)[0].files.length) {
        reader.readAsDataURL($(this)[0].files[0]);
    }
});

// Contact Form
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

            $("#modal-success .message").html("Success! You're subscribed. Get ready for the latest launches, insider tips, and exclusive offers straight to your inbox.");
            $("#modal-success").modal("show");
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            $("#modal-newsletter-subscription").modal("hide");

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
            form.find("input[type='text']").val("");
            form.find("input[type='email']").val("");
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

// Authentication
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

$(document).on("submit", "#forgot-password-form", function(e) {
    e.preventDefault();

    let form = $(this);
    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('Processing');

    let data = new FormData($(this)[0]);
    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            form.find("input[type='email']").val("");

            $("#modal-success .message").html("Password Reset Email Successfully Sent");
            $("#modal-success").modal("show");
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            button.prop("disabled", false);
            button.html('Send Password Reset Email');

            $("#modal-forgot-password").modal("hide");
        });
});

$(document).on("submit", "#password-update-form", function(e) {
    e.preventDefault();

    let form = $(this);
    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('Processing');

    let data = new FormData($(this)[0]);
    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            form.find("input[type='email']").val("");
            form.find("input[type='password']").val("");
            form.find("input[type='text']").val("");

            initializeReloadButton(response.data.redirect);

            $("#modal-success .message").html("Password Successfully Updated");
            $("#modal-success").modal("show");
        }).catch((error) => {
            button.prop("disabled", false);
            button.html('Reset Password');

            showRequestError(error);
        })
});

// Shop
let activePhotoIndex = 0;
let photoChangeInterval;
let searchTimeout;
let cancelTokenSource = axios.CancelToken.source();

$(document).on("input", "#search-form [name='keyword']", function() {
    let form = $(this).closest('form');
    let data = new FormData(form[0]);
    let url = data.get('url').toString();

    clearTimeout(searchTimeout);

    cancelTokenSource.cancel();
    cancelTokenSource = axios.CancelToken.source();

    if(data.get('keyword').toString() === "") {
        $("#search-spinner").addClass("d-none");
    } else {
        $("#search-spinner").removeClass("d-none");
    }

    searchTimeout = setTimeout(function() {
        axios.post(url, data, {
            cancelToken: cancelTokenSource.token
        })
            .then((response) => {
                $("#search-results-container").html(response.data.content);
                $("#search-spinner").addClass("d-none");
            });
    }, 1000);
});

$(document).on("mouseenter", ".hover-photo", function() {
    let images = [];
    let i = 0;

    $(this).find("img").each(function() {
        $(this).css("opacity", (i === 0) ? 1 : 0);
        i++;

        images.push($(this));
    });

    let updatePhoto = function() {
        let nextPhotoIndex = (activePhotoIndex === (images.length - 1)) ? 0 : activePhotoIndex + 1;

        images[activePhotoIndex].css("opacity", 0)
        images[nextPhotoIndex].css("opacity", 1)

        activePhotoIndex = nextPhotoIndex;
    };

    updatePhoto();

    photoChangeInterval = setInterval(function() {
        updatePhoto();
    }, 2000);
});

$(document).on("mouseleave", ".hover-photo", function() {
    clearInterval(photoChangeInterval);
    activePhotoIndex = 0;

    let i = 0;

    $(this).find("img").each(function() {
        $(this).css("opacity", (i === 0) ? 1 : 0);
        i++;
    });
});

$(document).on("click", ".variation-card", function() {
    if($(this).attr("data-price")) {
        $(".variation-card").removeClass('active');
        $(this).addClass('active');

        $("#price").html($(this).attr("data-price"));
    }
});

$(document).on("submit", ".update-cart-form", function(e) {
    e.preventDefault();

    let form = $(this);
    let data = new FormData(form[0]);
    let variations = JSON.parse(data.get('variations').toString());
    let content = '';

    for(let i = 0; i < variations.length; i++) {
        content += '<div class="variation mb-2">';
        content += '    <p class="text-color-6 font-size-90 text-center mb-2">' + variations[i].name + '</p>';
        content += '    <div class="row justify-content-center tw-mx-[10px]" data-variation="' + i + '">';
        for(let j = 0; j < variations[i].values.length; j++) {
            content += '    <input type="hidden" name="variation_name_' + i + '" value="' + variations[i].name + '" />';
            content += '    <div class="col-12 px-1 mb-2">';
            content += '        <input type="radio" name="variation_' + i + '" class="d-none" value="' + variations[i].values[j] + '" ' + ((j === 0) ? 'checked' : '') + '/>';
            content += '        <button type="button" class="btn py-1 font-size-90 w-100 variation-radio ' + ((j === 0) ? 'active' : '') + '">' + variations[i].values[j] + '</button>';
            content += '    </div>';
        }
        content += '    </div>';
        content += '</div>';
    }

    $("#variation-container").html(content);

    $("#add-to-cart-form [name='name']").val(data.get('name').toString());
    $("#add-to-cart-form [name='category']").val(data.get('category').toString());
    $("#modal-variation").modal("show");
});

$(document).on("click", ".variation-radio", function() {
    $(this).closest(".col-12").find("[type='radio']").prop("checked", true);

    let variation = $(this).closest(".row").attr("data-variation");

    $(".row[data-variation='" + variation + "'] .variation-radio").removeClass("active");

    $(this).addClass("active");
});

$(document).on("submit", "#add-to-cart-form", function(e) {
    e.preventDefault();

    let form = $(this);
    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('Adding to Cart');

    let data = new FormData($(this)[0]);
    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            alertify.set('notifier','position', 'top-right');
            alertify.success('Product successfully added to cart!', 5);

            $(".ajs-message").addClass("bg-color-1");
            $(".ajs-message").css("text-shadow", "initial");

            updateCartQuantity(response.data.cartQuantity, null);
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            $("#modal-variation").modal("hide");

            button.html('Add to Cart');
            button.prop("disabled", false);
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
            button.html("Redirecting");
            window.location = response.data.redirect;
        }).catch((error) => {
            button.prop("disabled",false);
            button.html("Log In");

            showRequestError(error);
        });
});

// Admin Change Password
$(document).on("submit", "#change-password-form", function(e) {
    e.preventDefault();

    let form = $(this);

    $("#modal-change-password [data-bs-dismiss='modal']").addClass("d-none");

    let button = form.find("[type='submit']");
    button.prop("disabled", true);
    button.html('Processing');

    let data = new FormData(form[0]);
    let url = data.get('url');

    console.log(url);

    axios.post(url, data)
        .then((response) => {
            form.find("input[type='password']").val("");

            $("#modal-success .message").html("Your password has been successfully updated.");
            $("#modal-success").modal("show");
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            $("#modal-change-password").modal("hide");
            $("#modal-change-password [data-bs-dismiss='modal']").removeClass("d-none");

            button.html("Submit");
            button.prop("disabled", false);
        });
});

// Admin Orders
let adminOrderTable;

$(document).on("click", ".view-order-items", function() {
    $("#order-items-container").html($(this).closest("td").find(".order-items-table-container").html());
    $("#modal-view-order-items").modal("show");
});

$(document).on("click", ".update-order-status", function() {
    let orderStatuses = JSON.parse($(this).closest("td").find(".order-status-container").html());
    let currentOrderStatus = $(this).closest("td").find(".order-status-container").attr("data-current-status");
    let orderId = $(this).closest("td").find(".order-status-container").attr("data-order-id");

    $("#order-status").val(currentOrderStatus);
    $("#update-order-status").val(orderId);

    let content = '';
    content += '<div class="table-responsive">';
    content += '    <table class="table table-bordered font-size-90 mb-0">';
    content += '        <thead>';
    content += '            <tr>';
    content += '                <th class="align-middle">Date&nbsp;&amp; Time</th>';
    content += '                <th class="align-middle">Status</th>';
    content += '            </tr>';
    content += '        </thead>';
    content += '        <tbody>';
    for (let i = 0; i < orderStatuses.length; i++) {
        content += '        <tr>';
        content += '            <td class="align-middle">' + formatDateTime(orderStatuses[i].created_at, 'llll') + '</td>';
        content += '            <td class="align-middle">' + orderStatuses[i].status + '</td>';
        content += '        </tr>';
    }
    content += '        </thead>';
    content += '    </table>';
    content += '</div>';

    $("#order-status-table-container").html(content);
    $("#modal-update-order-status").modal("show");
});

$(document).on("click", "#update-order-status", function() {
    let button = $(this);

    button.prop("disabled", true);

    $("#modal-update-order-status [data-bs-dismiss='modal']").addClass("d-none");

    let url = $(this).attr("data-url");
    let data = new FormData();
    data.append('status', $("#order-status").val());
    data.append('order_id', button.val());

    axios.post(url, data)
        .then((response) => {
            adminOrderTable.ajax.reload(null, false);

            $("#modal-success .message").html("The order status has been updated successfully.");
            $("#modal-success").modal("show");
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            button.prop("disabled", false);
            $("#modal-update-order-status [data-bs-dismiss='modal']").removeClass("d-none");
            $("#modal-update-order-status").modal("hide");
        });
});

// Admin Inventory
$(document).on("click", ".set-inventory", function() {
    $("#product-name").html($(this).closest("tr").find(".product-name").html());
    $("#variation").html($(this).closest("tr").find(".product-variation").html());

    $("#set-inventory").val($(this).val());
    $("#modal-set-inventory").modal("show");
});

$(document).on("click", "#set-inventory", function() {
    let button = $(this);

    button.prop("disabled", true);
    button.html("Submitting");

    $("#modal-set-inventory [data-bs-dismiss='modal']").addClass("d-none");

    let quantity = $("#quantity").val();
    let type = $("[name='type']:checked").val();

    let url = $(this).attr("data-url");
    let data = new FormData();
    data.append('quantity', quantity);
    data.append('product_id', button.val());
    data.append('type', type);

    axios.post(url, data)
        .then((response) => {
            let cell = $(".stock[data-product-id='" + button.val() + "']");
            let stock = parseInt(cell.attr("data-stock"));

            if(type === "add") {
                stock += parseInt(quantity);
            } else {
                stock -= parseInt(quantity);
            }

            cell.html(stock);
            cell.attr("data-stock", stock);

            $("#modal-success .message").html("Stock successfully updated.");
            $("#modal-success").modal("show");
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            button.prop("disabled", false);
            button.html("Submit");
            $("#modal-set-inventory [data-bs-dismiss='modal']").removeClass("d-none");
            $("#modal-set-inventory").modal("hide");
        });
});
