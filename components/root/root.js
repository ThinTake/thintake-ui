const tt = (()=>{
    var toInit = [], d = document;

    var addToInit = function (toAdd){
        toInit.push(toAdd);
    };
    var init = function(selector = null){
        toInit.forEach((item)=>{
            item(selector);
        });
    };

    var getUID = function(prefix = 'tt_'){
        do {
          prefix += Math.floor(Math.random() * 1000000);
        } while (d.getElementById(prefix));
    
        return prefix;
    };

    var setCookie = function (cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    };
      
    var getCookie = function (cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    };

    var removeCookie = function (cname) {
        setCookie(cname, "", -1);
    };

    var innerHTML = function (element, html) {
        element.innerHTML = html;
        Array.from(element.querySelectorAll('script')).forEach(oldScript=>{
            var script = document.createElement( "script" );
            Array.from(oldScript.attributes).forEach( attr => script.setAttribute(attr.name, attr.value) );
            script.appendChild(document.createTextNode(oldScript.innerHTML));
            oldScript.parentNode.replaceChild(script, oldScript);
        });
    };

    return {
        d:d,
        init: init,
        addToInit: addToInit,
        getUID: getUID,
        innerHTML: innerHTML,
        setCookie: setCookie,
        getCookie: getCookie,
        removeCookie: removeCookie,
    }
})();