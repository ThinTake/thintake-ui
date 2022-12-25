/*!
 {{ IMPORT: root }}
 */

const tt_input = (function() {
    function handleFocus(e) {
        e.target.closest('.input').classList.add('_focused');
        showlaceholder(e.target);
    };

    function showlaceholder(input) {
        if(input.dataset.placeholder != undefined){
            input.setAttribute('placeholder', input.dataset.placeholder);
        }
    };

    function handleBlur(e) {
        e.target.closest('.input').classList.remove('_focused');
        if(!e.target.value) {
            e.target.closest('.input').classList.remove('_hasValue');
        }
        else{
            e.target.closest('.input').classList.add('_hasValue');
        }
        e.target.removeAttribute('placeholder');
    };

    function handleInput (e) {
        updateHeight(e.target);
    };

    function updateHeight(element) {
        if(element.getAttribute('rows') != null) return;
        
        if(element.value == ''){
            element.style.height = '0';
            return;
        }
        element.style.height = 'auto';
        element.style.height = (element.scrollHeight)+"px";
        
        let styles = window.getComputedStyle(element);
        if(parseFloat(styles.maxHeight) < element.scrollHeight){
            element.style.overflow = 'auto';
        }
        else{
            element.style.overflow = 'hidden';
        }
    }

    function init(parentSelector = null){
        let selector = tt.d;
        if(parentSelector !== null){
            selector = tt.d.querySelector(parentSelector);
        }

        selector.querySelectorAll('.input').forEach((element)=>{
            let input = element.querySelector('input');
            let type = 'input';
            if(input == null){
                input = element.querySelector('textarea');
                type = 'textarea';
                element.classList.add('_textarea');
            }
            if(input == null) return;
            
            let placeholder = input.getAttribute('placeholder');
            if (placeholder != null) {
                input.dataset.placeholder = placeholder;
                input.removeAttribute('placeholder');
            }

            if (input.value) {
                element.classList.add('_hasValue');
            }
            if(tt.d.activeElement == input){
                element.classList.add('_focused');
                showlaceholder(input);
            }

            input.addEventListener('focus', handleFocus);
            input.addEventListener('blur', handleBlur);
            if(type == 'textarea'){
                input.addEventListener('input', handleInput);
                updateHeight(input);
            }
        });
    };

    return{
        init: init
    }
})();

tt.input = tt_input;
tt.addToInit(tt_input.init);