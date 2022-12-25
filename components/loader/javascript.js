/*!
 {{ IMPORT: root }}
 */

tt.loadScript = function(url) {
    return new Promise(function (resolve, reject) {
        const parent = document.head || document.body || document.documentElement;
        if (parent.querySelector(`script[src*="${url}"]`)) {
            resolve(url);
            return;
        }
        const script = document.createElement('script');
        script.src = url;
        script.addEventListener('load', function () {
            // The script is loaded completely
            resolve(url);
        });
        parent.appendChild(script);
    });
};

// Perform all promises in the order
tt.waterfall = function(promises) {
    return promises.reduce(
        function (p, c) {
            // Waiting for `p` completed
            return p.then(function () {
                // and then `c`
                return c.then(function (result) {
                    return true;
                });
            });
        },
        // The initial value passed to the reduce method
        Promise.resolve([])
    );
};

// Load an array of scripts in order
tt.loadScriptsInOrder = function(arrayOfJs) {
    const promises = arrayOfJs.map(function (url) {
        return tt.loadScript(url);
    });
    return tt.waterfall(promises);
};