import './bootstrap'

let appUrl;
let currentRouteName;

let pageOnload = async function() {
    await allOnload();

    if(currentRouteName === "home.index") {
        homeOnload();
    } else if(currentRouteName === "admin.orders.index") {
        adminOrdersOnload();
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
$(document).on("submit", "#checkout-form", function(e) {
    e.preventDefault();

    $("#modal-place-order-confirmation").modal("show");
});

$(document).on("click", "#place-order", function() {
    let closeButtons = $("#modal-place-order-confirmation [data-bs-dismiss='modal']");
    closeButtons.addClass("d-none");

    let button = $(this);
    button.prop("disabled", true);
    button.html('Placing Order');

    let data = new FormData($("#checkout-form")[0]);
    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            initializeReloadButton(response.data.redirect);

            $("#modal-success .message").html("Success! Your order is confirmed and will be processed shortly. Thank you for your purchase!");
            $("#modal-success").modal("show");
        }).catch((error) => {
            showRequestError(error);
        }).then(() => {
            closeButtons.removeClass("d-none");

            button.prop("disabled", false);
            button.html('Confirm');

            $("#modal-place-order-confirmation").modal("hide");
        });
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

// Shop
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
