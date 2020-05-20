let body = $('body');

body.on('submit', '#handle-form-trash', function (e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            let data = $(this).serialize();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: data,
                success: function success(data) {
                    location.reload();
                },
                error: function (request, status, error) {
                    showError();
                }
            });
        }
    })
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image-preview').attr('hidden', false);
            $('#image-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function () {
    readURL(this);
});

$('.change-status').on('click', function (e) {
    let me = $(this);
    let url = me.attr('data-url');

    if (url) {
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                '_method': 'PUT',
                '_token': me.attr('data-data'),
            },
            success: function (data) {
                showSuccess();
            },
            error: function (request, status, error) {
                showError();
            }
        });
    }
});

// start media

$('#btn-add-folder').click(function (e) {
    $('#form-add-folder #alert-error p').text('');
    $('#form-add-folder #alert-error').hide();
    $("#modal-add-folder input").select();

    $('#modal-add-folder').modal('show');
});

body.on('click', '.treeItem', function (e) {
    let element = $(e.currentTarget);

    if (!checkSelectMultiKeyPress(e)) {
        $('.treeItem').removeClass('active');
    }

    if (checkSelectMultiKeyPress(e) && element.hasClass('active')) {
        element.removeClass('active');
    } else {
        element.addClass('active');
        let data = $.parseJSON($(this).attr('data-data'));
        let type = data.type;
        let url = '';
        let urlFull = '';
        let size = '';
        let modified = '';
        if (type === "folder") {
            url = data.path;
            urlFull = '/assets/images/folder.png';
            size = '';
            modified = '';
        }else {
            url = data.url;
            urlFull = data.urlFull;
            size = data.size;
            modified = data.lastModified;
        }
        let name = data.name;
        showPreview(type, name, url, urlFull, size, modified);
    }
    e.stopPropagation();
});

body.on('click', '.treePanel', function (e) {

    $('.treeItem').removeClass('active');
    hiddenPreview();

});

function showPreview(type, name, url, urlFull, size, modified) {
    $("#img-preview").attr('src', urlFull);
    $("#name-preview").text(name);
    $("#url-preview").text(url);
    $("#type-preview").text(type);
    $("#size-preview").text(size);
    $("#last-modified-preview").text(modified);
}

function hiddenPreview() {
    $("#img-preview").attr('src', '/assets/images/default-image.png');
    $("#name-preview").text('No selected');
    $("#url-preview").text('No selected');
    $("#type-preview").text('No selected');
    $("#size-preview").text('No selected');
    $("#last-modified-preview").text('No selected');
}

function checkSelectMultiKeyPress(e) {
    if (e.ctrlKey || e.metaKey) return true;
    return false;
}

body.on('dblclick', '.folder-item', function (e) {
    e.preventDefault();
    e.stopPropagation();
    loadNewContent($(this).attr('data-id'), $(this).attr('data-data'));
});

body.on('click', '.load-media', function () {
    let url = $('meta[name="admin-url"]').attr('content')+'/media';
    $.ajax({
        type: "GET",
        url: url,
        data: {
            'is-modal': true,
        },
        success: function (data) {
            $('.model-file').empty().html(data);
            $("#modal-popup-file").modal('show');
        }
    });
});

function loadNewContent(url, data) {
    $.ajax({
        type: "GET",
        url: $(this).attr('data-task-list-update-url'),
        data: {
            'path': url,
            'dataFile': data,
        },
        error: function (error) {
            showError();
        },
        success: function (data) {
            $('.reload-box').empty().html(data);
        }
    });
}


window.fileSelect = $('.fileselect-fmg');
window.fileSelect.change(function () {
    let url = $(this).attr('data-files');
    let data = new FormData();
    $.each($(this)[0].files, function (i, file) {
        data.append('files[]', file);
    });
    data.append('_token', $(this).attr('data-data'));
    data.append('folder', $('input[name="currentFolder"]').val() ?? "/");
    $.ajax({
        url: url,
        type: 'POST',
        processData: false,
        contentType: false,
        data: data,
        success: function (result) {
            showSuccess();
            $('#filedrag-fmg').append(result);
        },
        error: function (error) {
            showError();
        }
    });
});

body.on('submit', '#form-add-folder', function (e) {
    e.preventDefault();
    let url = $(this).attr('action');
    let data = $(this).serialize() + '&currentFolder=' + $("input[name=current-folder]").val();
    if (url && data) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (data) {
                showSuccess();
                $('#modal-add-folder').modal('hide');
                $('#filedrag-fmg').append(data);
                $('.table-caption').hide();
            },
            error: function (error) {
                showError();
            }
        })
    }
});

// end media

function showError() {
    Swal.fire({
        "title": "Error System",
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

function showSuccess() {
    Swal.fire({
        "title": "Success",
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


$('.select2').select2();
$('.summernote').summernote();
