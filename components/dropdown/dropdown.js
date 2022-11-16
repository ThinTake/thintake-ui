/*!
 {{ IMPORT: root, popper }}
 */

 const tt_dropdown = (function() {
    var hasOnclick = false; // if we have a onclick event, we don't need to add the event listener again
    var clickElements = []; // elements that have onclick event
    var shownDropdown = null; // dropdown that is currently shown
    var popperInstance = null; // popper instance
    
    var dropdown = (element)=>{
        if(element.dataset.dropdownOn != undefined && element.dataset.dropdownOn == 'hover'){
            element.addEventListener('mouseenter', showDropdown);
            element.addEventListener('mouseleave', hideDropdown);
        }
        else{
            if(!hasOnclick){
                tt.d.addEventListener('click', handleClick);
                hasOnclick = true;
            }
            clickElements.push(element);
        }
    };

    var handleClick = (e) => {
        var hasTarget = false;
        var path = e.composedPath();
        for (let i = 0; i < path.length; i++) {
            var target = path[i];
            if(clickElements.includes(target)){
                hasTarget = true;
                showDropdown(null, target);
                break;
            }
        }
        if(!hasTarget){
            hideDropdown();
        }
    };

    var showDropdown = (e, target=null)=>{
        if(target == null){
            target = e.target;
        }
        if(target.dataset.dropdown == undefined || target.dataset.dropdown == ''){
            hideDropdown();
            return;
        }
        var targetDropdown = tt.d.querySelector(target.dataset.dropdown);
        if(targetDropdown == null){
            hideDropdown();
            return;
        }
        
        if(shownDropdown != null && shownDropdown == targetDropdown){
            hideDropdown();
            return;
        }

        hideDropdown().then(()=>{
            var popperModifiers = [
                {
                    name: 'offset',
                    options: {
                            offset: [0, 8],
                    },
                },
                {
                    name: 'flip',
                    options: {
                        fallbackPlacements: ['top', 'right', 'bottom', 'left']
                    }
                },
            ];

            if(target.dataset.dropdownArrow != undefined){
                var arrow = targetDropdown.querySelector('.arrow');
                if(arrow == null){
                    arrow = document.createElement("div");
                    arrow.classList.add('arrow');
                    targetDropdown.appendChild(arrow);
                }
                popperModifiers.push({
                    name: 'arrow',
                    options: {
                        element: arrow,
                    },
                });
            }
            popperInstance = Popper.createPopper(target, targetDropdown, {
                placement: (target.dataset.dropdownPlacement != undefined)? target.dataset.dropdownPlacement: 'top',
                name: 'offset',
                modifiers: popperModifiers,
            });
            
            targetDropdown.classList.add('show');
            shownDropdown = targetDropdown;
        });
    };

    var hideDropdown = ()=>{
        return new Promise((resolve, reject) => {
            if(shownDropdown != null){
                setTimeout(()=>{
                    shownDropdown.classList.remove('show');
                    destroyPopper();
                    shownDropdown = null;
                    resolve();
                }, 50);
            }
            else{
                resolve();
            }
        })
    };

    var destroyPopper = () => {
        if(popperInstance != null){
            popperInstance.destroy();
        }
    };

    var init = (parentSelector = null) => {
        if (typeof Popper === 'undefined') {
            throw new TypeError('dropdowns require Popper (https://popper.js.org)')
        }
        
        let selector = tt.d;
        if(parentSelector !== null){
            selector = tt.d.querySelector(parentSelector);
        }

        selector.querySelectorAll('[data-dropdown]').forEach((element)=>{
            dropdown(element);
        });
    };

    return{
        init: init
    };
})();

tt.dropdown = tt_dropdown;
tt.addToInit(tt_dropdown.init);