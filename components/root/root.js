const tt = (()=>{
    var toInit = [], d = document;

    var addToInit = (toAdd)=>{
        toInit.push(toAdd);
    }
    var init = (selector = null)=>{
        toInit.forEach((item)=>{
            item(selector);
        });
    }

    var getUID = (prefix = 'tt_')=>{
        do {
          prefix += Math.floor(Math.random() * 1000000);
        } while (d.getElementById(prefix));
    
        return prefix;
    };

    

    var innerHTML = (element, html) => {
        element.innerHTML = html;
        Array.from(element.querySelectorAll('script')).forEach(oldScript=>{
            var script = document.createElement( "script" );
            Array.from(oldScript.attributes).forEach( attr => script.setAttribute(attr.name, attr.value) );
            script.appendChild(document.createTextNode(oldScript.innerHTML));
            oldScript.parentNode.replaceChild(script, oldScript);
        });
    }

    return {
        d:d,
        init: init,
        addToInit: addToInit,
        getUID: getUID,
        innerHTML: innerHTML,
    }
})();