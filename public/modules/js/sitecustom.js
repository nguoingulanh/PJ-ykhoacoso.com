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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/sitecustom.js":
/*!************************************!*\
  !*** ./resources/js/sitecustom.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var body = $("body");
body.on('submit', '#addToCart', function (e) {
  e.preventDefault();
  var url = $(this).attr('action');
  var data = $(this).serialize();
  $.ajax({
    url: url,
    data: data,
    type: 'POST',
    success: function success(data) {
      showSuccessCart(data[0]);
      $('.count-cart').text([data[1]]);
    },
    error: function error(request, status, _error) {
      showErrorCart(request.responseText ? request.responseText : "Đã xảy ra lỗi, vui lòng thử lại sau");
    }
  });
});
$('.buy-now').on('click', function (e) {
  e.preventDefault();
  var url = $(this).attr('href');
  var data = $(this).attr('data-token');
  $.ajax({
    url: url,
    data: {
      '_token': data
    },
    type: 'POST',
    success: function success(data) {
      showSuccessCart(data[0]);
      $('.count-cart').text([data[1]]);
    },
    error: function error(request, status, _error2) {
      showErrorCart(request.responseText ? request.responseText : "Đã xảy ra lỗi, vui lòng thử lại sau");
    }
  });
});
$('.remove-item-cart').on('click', function (e) {
  e.preventDefault();
  var url = $(this).attr('href');
  $.ajax({
    url: url,
    type: 'POST',
    data: {
      '_method': 'DELETE',
      '_token': $(this).attr('data-token'),
      'id': $(this).attr('data-id')
    },
    success: function success(data) {
      location.reload();
      showSuccessCart(data);
    },
    error: function error(request, status, _error3) {
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
      data: {
        dataCity: dataCity
      },
      success: function success(res) {
        $("#district-auth").empty();
        $("#ward-auth").empty();
        $('#district-auth').append('<option value="">Chọn Quận/Huyện</option>');
        $('#ward-auth').append('<option value="">Chọn Phường/Xã</option>');
        $.each(res, function (key, value) {
          $('#district-auth').append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
        });
      },
      error: function error(request, status, _error4) {
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
      data: {
        dataDistrict: dataDistrict
      },
      success: function success(res) {
        $("#ward-auth").empty();
        $('#ward-auth').append('<option value="">Chọn Phường/Xã</option>');
        $.each(res, function (key, value) {
          $('#ward-auth').append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
        });
      },
      error: function error(request, status, _error5) {
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

/***/ }),

/***/ 2:
/*!******************************************!*\
  !*** multi ./resources/js/sitecustom.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! E:\HM\nguoingulanh\shopbook\resources\js\sitecustom.js */"./resources/js/sitecustom.js");


/***/ })

/******/ });