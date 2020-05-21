let body = $("body");

body.on('submit', '#addToCart', function (e) {
    e.preventDefault();
    let url = $(this).attr('action');
    let data = $(this).serialize();
    $.ajax({
        url: url,
        data: data,
        type: 'POST',
        success: function (data) {
            showSuccessCart(data[0]);
            $('.count-cart').text([data[1]]);
        },
        error: function (request, status, error) {
            showErrorCart(request.responseText ? request.responseText : "Đã xảy ra lỗi, vui lòng thử lại sau");
        }
    })
});

$('.buy-now').on('click', function (e) {
    e.preventDefault();
    let url = $(this).attr('href');
    let data = $(this).attr('data-token');
    $.ajax({
        url: url,
        data: {
            '_token': data,
        },
        type: 'POST',
        success: function (data) {
            showSuccessCart(data[0]);
            $('.count-cart').text([data[1]]);
        },
        error: function (request, status, error) {
            showErrorCart(request.responseText ? request.responseText : "Đã xảy ra lỗi, vui lòng thử lại sau");
        }
    })
})

function showErrorCart(text) {
    Swal.fire({
        "title": text,
        "text": "",
        "timer": 5000,
        "width": "32rem",
        "padding": "1.25rem",
        "showConfirmButton": false,
        "showCloseButton": true,
        "customClass": {
            "container": null,
            "popup": null,
            "header": null,
            "title": null,
            "closeButton": null,
            "icon": null,
            "image": null,
            "content": null,
            "input": null,
            "actions": null,
            "confirmButton": null,
            "cancelButton": null,
            "footer": null
        },
        "toast": true,
        "icon": "error",
        "position": "top-end"
    });
}

function showSuccessCart(text) {
    Swal.fire({
        "title": text,
        "text": "",
        "timer": 5000,
        "width": "32rem",
        "padding": "1.25rem",
        "showConfirmButton": false,
        "showCloseButton": true,
        "customClass": {
            "container": null,
            "popup": null,
            "header": null,
            "title": null,
            "closeButton": null,
            "icon": null,
            "image": null,
            "content": null,
            "input": null,
            "actions": null,
            "confirmButton": null,
            "cancelButton": null,
            "footer": null
        },
        "toast": true,
        "icon": "success",
        "position": "top-end"
    });
}
