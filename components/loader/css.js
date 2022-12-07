/**
 * {{IMPORT root}}
 */
tt.loadCssFile = function(url) {
    return new Promise(function (resolve, reject) {
        var link = document.createElement('link');
        link.setAttribute('rel', 'stylesheet');
        link.setAttribute('href', url);
        link.classList.add('added_by_spa');

        link.addEventListener('load', function () {
            // The script is loaded completely
            resolve(true);
        });
        document.head.appendChild(link);
    });
};