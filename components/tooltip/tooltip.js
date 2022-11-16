/*!
 {{ IMPORT: root, popper }}
 */

 const tt_tooltip = (function() {

    var tooltip = (element)=>{
        var popperInstance = null, triggerType = 'mouseenter', active = false;

        var onFocus = (element.dataset.onFocus != undefined && element.dataset.onFocus == 'false')? false: true;
        var onHover = (element.dataset.onHover != undefined && element.dataset.onHover == 'false')? false: true;

        if(onFocus){
            element.addEventListener('focusin', handleOver);
            element.addEventListener('focusout', handleOut);
        }
        if(onHover){
            element.addEventListener('mouseenter', handleOver);
            element.addEventListener('mouseleave', handleOut);
        }

        function handleOver(e) {
            if(active){
                if(e.type == 'focusin'){
                    triggerType = e.type;
                }
                return;
            }
            
            popperInstance = show(e.target);
            triggerType = e.type;
            active = true;
        }

        function handleOut(e) {
            if(e.type == 'focusout' && triggerType != 'focusin' || e.type == 'mouseleave' && triggerType != 'mouseenter'){
                return;
            }

            active = false;
            resetTip(e.target);
            destroyPopper(popperInstance);
            popperInstance = null;
        }
    }

    var show = (target) => {
        let title = target.getAttribute('title');
        if(title != null && title.length > 0){
            
            target.dataset.ttTitle = title;
            target.removeAttribute('title');
            let tip = createTooltip(title);

            target.setAttribute('aria-describedby', tip.id);

            let popperInstance = Popper.createPopper(target, tip.element, {
                placement: (target.dataset.tooltip.length > 0)? target.dataset.tooltip: 'top',
                name: 'offset',
                modifiers: [
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
                    }
                ]
            });
            tip.element.classList.add('show');
            return popperInstance;
        }
    }

    var createTooltip = (title) => {
        let tip = tt.d.createElement('div');
        tip.classList.add('tooltip', 'fade');
        tip.id = tt.getUID('tooltip_');
        tip.innerHTML = title;
        tip.setAttribute('role', 'tooltip'); 

        let arrow = tt.d.createElement('div');
        arrow.setAttribute('data-popper-arrow', '');
        arrow.classList.add('arrow');
        tip.append(arrow);

        tt.d.body.append(tip);

        return {id: tip.id, element: tip};
    }

    var resetTip = (element, id=null, now = false) => {
        if(element !== null){
            if(element.dataset.ttTitle != undefined){
                element.setAttribute('title', element.dataset.ttTitle);
            }
            
            let tip = document.getElementById(element.getAttribute('aria-describedby'));
            if(tip != null){
                tip.classList.remove('show');
            }

            delete element.dataset.ttTitle;
            delete element.dataset.tooltipId;
            element.removeAttribute('aria-describedby');
            
            if(now){
                removeTip(tip);
                return null;
            }
            else{
                return setTimeout(() => {
                    removeTip(tip);
                }, 200);
            }
        }
        else if(id != null){
            removeTip(tt.d.getElementById(id));
            return null;
        }
    }

    var removeTip = (tip)=>{
        if(tip !== null){
            tip.remove();
        }
    }

    var destroyPopper = (instance) => {
        if(instance != null){
            instance.destroy();
        }
    }

    var init = (parentSelector = null) => {
        if (typeof Popper === 'undefined') {
            throw new TypeError('Tooltips require Popper (https://popper.js.org)')
        }
        
        let selector = tt.d;
        if(parentSelector !== null){
            selector = tt.d.querySelector(parentSelector);
        }

        selector.querySelectorAll('[data-tooltip]').forEach((element)=>{
            tooltip(element);
        });
    }

    return{
        init: init
    }
})();

tt.tooltip = tt_tooltip;
tt.addToInit(tt_tooltip.init);