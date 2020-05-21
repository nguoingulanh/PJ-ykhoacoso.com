let body = $("body");

body.on('submit', '#addToCart', function (e) {
    e.preventDefault();
    let url = window.location.href;
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
