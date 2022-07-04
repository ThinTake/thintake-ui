/*!
 {{ IMPORT: root }}
 */

 const tt_toast = (function() {
    const containers = {};
    const options  = {};
    const callBacks = {};
    const defaultParams = {
        html: '',
        icon: '',
        action: {
            text: '',
            classes: null,
            id:'',
            onClick: undefined,
        },
        position: 'top-right',
        classes: null,
        displayDuration: 4000,
        showClose: true,
        closeOnClick: true,
        onClick: undefined,
        onClose: undefined,
    };

    let mobilePosition='bottom';/* bottom|top|default */

    const setDefaults = (new_options)=>{
        Object.entries(new_options).forEach(([option, value]) => {
            defaultParams[option] = value;
        });
    }

    const show = (new_options={})=>{
        Object.assign(options, defaultParams);
        Object.entries(new_options).forEach(([option, value]) => {
            options[option] = value;
        });

        const id = tt.getUID('toast_');

        let toast = document.createElement('div');
        toast.classList.add('toast');
        toast.id = id;
        toast.dataset.closeOnClick = options.closeOnClick;

        if(options.classes != null){
            toast.classList.add(options.classes);
        }

        let content = document.createElement('div');
        content.classList.add('content');

        let title = document.createElement('div');
        title.classList.add('title');
        title.insertAdjacentHTML('afterbegin', options.html);
        content.append(title);
        
        if(options.icon.length > 0){
            content.insertAdjacentHTML('afterbegin', options.icon);
        }
        toast.append(content);

        if(options.showClose || options.action.text.length > 0){
            let actions = document.createElement('div');
            actions.classList.add('toast_actions');

            if(options.action.text.length > 0){
                let action = document.createElement('button');
                if(options.action.classes != null){
                    action.classList.add(options.action.classes);
                }
                action.id = options.action.id;
                action.textContent = options.action.text;

                if(options.action.onClick !== undefined){
                    action.addEventListener('click', options.action.onClick);
                }
                actions.append(action);
            }
            if(options.showClose){
                let closebtn = document.createElement('button');
                closebtn.classList.add('close');
                closebtn.insertAdjacentHTML('afterbegin', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.021 512.021" width="10" height="10px"><path d="M301.258 256.01L502.645 54.645c12.501-12.501 12.501-32.769 0-45.269s-32.769-12.501-45.269 0h0L256.01 210.762 54.645 9.376c-12.501-12.501-32.769-12.501-45.269 0s-12.501 32.769 0 45.269L210.762 256.01 9.376 457.376c-12.501 12.501-12.501 32.769 0 45.269s32.769 12.501 45.269 0L256.01 301.258l201.365 201.387c12.501 12.501 32.769 12.501 45.269 0s12.501-32.769 0-45.269L301.258 256.01z"/></svg>')
                closebtn.addEventListener('click', (e)=>{
                    e.stopPropagation();
                    close(id);
                });
                actions.append(closebtn);
            }
            toast.append(actions);
        }
        toast.addEventListener('click', handleOnClick);
        addCallBacks(id, options.onClick, options.onClose);

        getContainer(options.position).prepend(toast);

        if(options.displayDuration > 0){
            setTimeout(()=>{
                close(id);
            }, options.displayDuration);
        }

        return id;
    }

    const handleOnClick = (e)=>{
        let callBack = getCallBack(e.target.id, 'onClick');
        if(callBack !== undefined){
            callBack();
        }
        if(e.target.dataset.closeOnClick !== 'false'){
            close(e.target.id);
        }
    }

    const getContainer = (position='top-right')=>{
        if(containers[position]){
            return containers[position];
        }
        else{
            let container = document.createElement('div');
            container.classList.add('toast-container');
            container.dataset.position = position;
            container.dataset.mobilePosition = mobilePosition;

            containers[position] = container;
            document.body.appendChild(container);
            return container;
        }
    }

    const close = (id)=>{
        let toRemove = document.getElementById(id);
        if(toRemove !== null){
            let position = toRemove.parentNode.dataset.position;
            
            let callBack = getCallBack(id, 'onClose');
            if(callBack !== undefined){
                callBack();
            }
            toRemove.remove();
            removeCallBacks(id);
            removeContainer(position);
        }
    }

    const removeContainer = (position)=>{
        if(containers[position] && !containers[position].hasChildNodes()){
            containers[position].remove();
            delete containers[position];
        }
    }

    const setMobilePosition = (position)=>{
        mobilePosition = position;
        Object.entries(containers).forEach(([position, element]) => {
            element.dataset.mobilePosition = mobilePosition;
        });
    }

    const addCallBacks = (id, onClick, onClose) => {
        callBacks[id+'onClick'] = onClick;
        callBacks[id+'onClose'] = onClose;
    }

    const getCallBack = (id, type) => {
        return callBacks[id+type];
    }

    const removeCallBacks = (id) => {
        delete callBacks[id+'onClick'];
        delete callBacks[id+'onClose'];
    }

    return {
        show: show,
        close: close,
        setMobilePosition: setMobilePosition,
        setDefaults: setDefaults,
    }
})();

tt.toast = tt_toast;