/*!
 {{ IMPORT: root }}
 */

const tt_input = (function() {
    const handleFocus = (e) => {
        e.target.closest('.input').classList.add('_focused');
        e.target.closest('.input').classList.add('_hasValue');

        showlaceholder(e.target);
    }

    const showlaceholder = (input)=>{
        if(input.dataset.placeholder != undefined){
            input.setAttribute('placeholder', input.dataset.placeholder);
        }
    }

    const handleBlur = (e) => {
        e.target.closest('.input').classList.remove('_focused');
        if(!e.target.value) {
            e.target.closest('.input').classList.remove('_hasValue');
        }
        e.target.removeAttribute('placeholder');
    }

    const handleInput = (e) => {
        if(e.target.getAttribute('rows') != null) return;
        
        if(e.target.value == ''){
            e.target.style.height = '0';
            return;
        }
        e.target.style.height = 'auto';
        e.target.style.height = (e.target.scrollHeight)+"px";
        
        let styles = window.getComputedStyle(e.target);
        if(parseFloat(styles.maxHeight) < e.target.scrollHeight){
            e.target.style.overflow = 'auto';
        }
        else{
            e.target.style.overflow = 'hidden';
        }
    }

    const init = (parentSelector = null) => {
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
            if(document.activeElement == input){
                element.classList.add('_focused');
                showlaceholder(input);
            }

            input.addEventListener('focus', handleFocus);
            input.addEventListener('blur', handleBlur);
            if(type == 'textarea'){
                input.addEventListener('input', handleInput);
            }
        });
    }

    return{
        init: init
    }
})();

tt.input = tt_input;
tt.addToInit(tt_input.init);