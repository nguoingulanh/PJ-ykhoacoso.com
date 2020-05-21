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

$('.remove-item-cart').on('click',function (e) {
    e.preventDefault();
    let url = $(this).attr('href');
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            '_method': 'DELETE',
            '_token': $(this).attr('data-token'),
            'id': $(this).attr('data-id'),
        },
        success: function (data) {
            location.reload();
            showSuccessCart(data);
        },
        error: function (request, status, error) {
            showErrorCart(request.responseText ? request.responseText : "Đã xảy ra lỗi, vui lòng thử lại sau");
        }
    });
});

$("#city-auth").on('change', function () {
    var dataCity = $(this).val();
    var cityAddress = $(this).find('option:selected').text();
    if (dataCity) {
        $.ajax({
            method: 'GET',
            url: '/get/location',
            data: {dataCity},
            success: function (res) {
                $("#district-auth").empty();
                $("#ward-auth").empty();
                $('#district-auth').append('<option value="">Chọn Quận/Huyện</option>');
                $('#ward-auth').append('<option value="">Chọn Phường/Xã</option>');
                $.each(res, function (key, value) {
                    $('#district-auth').append(
                        '<option value="' + value['id'] + '">' + value['name'] + '</option>'
                    );
                });
            },
            error: function (request, status, error) {
                showErrorCart(request.responseText ? request.responseText : "Đã xảy ra lỗi, vui lòng thử lại sau");
            }
        });
    }
});
$("#district-auth").on('change', function () {
    var dataDistrict = $(this).val();
    var cityAddress = $.trim($("#city-auth").find('option:selected').text());
    var districtAddress = $(this).find('option:selected').text();
    if (dataDistrict) {
        $.ajax({
            method: 'GET',
            url: '/get/location',
            data: {dataDistrict},
            success: function (res) {
                $("#ward-auth").empty();
                $('#ward-auth').append('<option value="">Chọn Phường/Xã</option>');
                $.each(res, function (key, value) {
                    $('#ward-auth').append(
                        '<option value="' + value['id'] + '">' + value['name'] + '</option>'
                    );
                });
            },
            error: function (request, status, error) {
                showErrorCart(request.responseText ? request.responseText : "Đã xảy ra lỗi, vui lòng thử lại sau");
            }
        });
    }
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
