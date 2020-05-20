/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/custom.js":
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var body = $('body');
body.on('submit', '#handle-form-trash', function (e) {
  var _this = this;

  e.preventDefault();
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then(function (result) {
    if (result.value) {
      var data = $(_this).serialize();
      $.ajax({
        url: $(_this).attr('action'),
        type: 'POST',
        data: data,
        success: function success(data) {
          location.reload();
        },
        error: function error(request, status, _error) {
          showError();
        }
      });
    }
  });
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#image-preview').attr('hidden', false);
      $('#image-preview').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function () {
  readURL(this);
});
$('.change-status').on('click', function (e) {
  var me = $(this);
  var url = me.attr('data-url');

  if (url) {
    $.ajax({
      url: url,
      type: 'POST',
      data: {
        '_method': 'PUT',
        '_token': me.attr('data-data')
      },
      success: function success(data) {
        showSuccess();
      },
      error: function error(request, status, _error2) {
        showError();
      }
    });
  }
}); // start media

$('#btn-add-folder').click(function (e) {
  $('#form-add-folder #alert-error p').text('');
  $('#form-add-folder #alert-error').hide();
  $("#modal-add-folder input").select();
  $('#modal-add-folder').modal('show');
});
body.on('click', '.treeItem', function (e) {
  var element = $(e.currentTarget);

  if (!checkSelectMultiKeyPress(e)) {
    $('.treeItem').removeClass('active');
  }

  if (checkSelectMultiKeyPress(e) && element.hasClass('active')) {
    element.removeClass('active');
  } else {
    element.addClass('active');
    var data = $.parseJSON($(this).attr('data-data'));
    var type = data.type;
    var url = '';
    var urlFull = '';
    var size = '';
    var modified = '';

    if (type === "folder") {
      url = data.path;
      urlFull = '/assets/images/folder.png';
      size = '';
      modified = '';
    } else {
      url = data.url;
      urlFull = data.urlFull;
      size = data.size;
      modified = data.lastModified;
    }

    var name = data.name;
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
  var url = $('meta[name="admin-url"]').attr('content') + '/media';
  $.ajax({
    type: "GET",
    url: url,
    data: {
      'is-modal': true
    },
    success: function success(data) {
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
      'dataFile': data
    },
    error: function error(_error3) {
      showError();
    },
    success: function success(data) {
      $('.reload-box').empty().html(data);
    }
  });
}

window.fileSelect = $('.fileselect-fmg');
window.fileSelect.change(function () {
  var _$$val;

  var url = $(this).attr('data-files');
  var data = new FormData();
  $.each($(this)[0].files, function (i, file) {
    data.append('files[]', file);
  });
  data.append('_token', $(this).attr('data-data'));
  data.append('folder', (_$$val = $('input[name="currentFolder"]').val()) !== null && _$$val !== void 0 ? _$$val : "/");
  $.ajax({
    url: url,
    type: 'POST',
    processData: false,
    contentType: false,
    data: data,
    success: function success(result) {
      showSuccess();
      $('#filedrag-fmg').append(result);
    },
    error: function error(_error4) {
      showError();
    }
  });
});
body.on('submit', '#form-add-folder', function (e) {
  e.preventDefault();
  var url = $(this).attr('action');
  var data = $(this).serialize() + '&currentFolder=' + $("input[name=current-folder]").val();

  if (url && data) {
    $.ajax({
      url: url,
      type: 'POST',
      data: data,
      success: function success(data) {
        showSuccess();
        $('#modal-add-folder').modal('hide');
        $('#filedrag-fmg').append(data);
        $('.table-caption').hide();
      },
      error: function error(_error5) {
        showError();
      }
    });
  }
}); // end media

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

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/custom.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! E:\HM\nguoingulanh\shopbook\resources\js\custom.js */"./resources/js/custom.js");


/***/ })

/******/ });