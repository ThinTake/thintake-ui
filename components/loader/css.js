/*!
 {{IMPORT root}}
 */

tt.loadCssFile = function(url) {
    return new Promise(function (resolve, reject) {

        const parent = document.head || document.body || document.documentElement;
        if (parent.querySelector(`link[href*="${url}"]`)) {
            resolve(url);
            return;
        }
        
        var link = document.createElement('link');
        link.setAttribute('rel', 'stylesheet');
        link.setAttribute('href', url);
        link.classList.add('added_by_spa');

        link.addEventListener('load', function () {
            // The script is loaded completely
            resolve(url);
        });
        parent.appendChild(link);
    });
};