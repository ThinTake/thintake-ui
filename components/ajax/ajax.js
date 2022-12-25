/*!
 {{IMPORT root, utility/merge}}
 */

// ! NOT TESTED

tt.ajax = function (options) {
    options = tt.merge(options, {
        method: 'GET',
        url: '',
        data: '',
        success: function () {},
        error: function () {},
    });

    var xhr = new XMLHttpRequest();
    xhr.open(options.method || 'GET', options.url, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {
            var res = JSON.parse(xhr.responseText);
            options.success(res, xhr);
        } else {
            options.error(xhr);
        }
    };
    xhr.onerror = function () {
        options.error(xhr);
    };
    xhr.send(options.data);

    return xhr;
};