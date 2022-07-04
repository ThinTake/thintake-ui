/*!
 {{ IMPORT: root }}
 */

 const tt_select = (function() {
    const bindEvents = (element) => {
        let select = element.querySelector('select');

        if(select == null) return;

        if (select.selectedIndex != 0) {
            element.classList.add('_hasValue');
        }

        /* select.addEventListener('focus', handleFocus);
        select.addEventListener('blur', handleBlur);
        select.addEventListener('change', handleChange); */

        select.addEventListener('focus', (e) => {
            e.target.closest('.select').classList.add('_focused');
        });
        
        select.addEventListener('blur', (e) => {
            e.target.closest('.select').classList.remove('_focused');
        });

        select.addEventListener('change', (e) => {
            if(e.target.selectedIndex != 0) {
                e.target.closest('.select').classList.add('_hasValue');
                return;
            }
            else{
                e.target.closest('.select').classList.remove('_hasValue');
            }
        });
    }

    const init = (parentSelector = null) => {
        let selector = tt.d;
        if(parentSelector !== null){
            selector = tt.d.querySelector(parentSelector);
        }
        selector.querySelectorAll('.select').forEach((element)=>{
            bindEvents(element);
        });
    }

    return{
        init: init
    }
})();

tt.select = tt_select;
tt.addToInit(tt_select.init);