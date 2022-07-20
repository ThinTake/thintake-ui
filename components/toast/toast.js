/*!
 {{ IMPORT: root }}
 */

 const tt_toast = (function() {
    const containers = {};
    const options  = {};
    const callBacks = {};
    const defaultParams = {
        title       : '',
        message     : '',
        icon        : '',
        action: {
            text    : '',
            class   : null,
            id      : '',
            onClick : undefined,
        },
        position        : 'top-right',
        class           : null,
        duration        : 4000,
        showClose       : true,
        closeOnClick    : true,
        onClick         : undefined,
        onClose         : undefined,
    };

    var mobilePosition='bottom';/* bottom|top|default */

    const setDefaults = (new_options)=>{
        Object.entries(new_options).forEach(([option, value]) => {
            defaultParams[option] = value;
        });
    };

    const show = (new_options={})=>{
        Object.assign(options, defaultParams);
        Object.entries(new_options).forEach(([option, value]) => {
            options[option] = value;
        });

        const id = tt.getUID('toast_');

        var toast = document.createElement('div');
        toast.classList.add('toast');
        toast.id = id;
        toast.dataset.closeOnClick = options.closeOnClick;

        if(options.class != null){
            toast.classList.add(options.class);
        }

        var content = document.createElement('div');
        content.classList.add('toastContent');
        toast.append(content);

        var textContent = document.createElement('div');
        textContent.classList.add('textContent');
        content.append(textContent);
        
        if(options.title != ''){
            var title = document.createElement('span');
            title.classList.add('title');
            title.innerHTML = options.title;
            textContent.append(title);
            toast.classList.add('hasTitle');
        }

        if(options.message != ''){
            var message = document.createElement('span');
            message.classList.add('message');
            message.insertAdjacentHTML('afterbegin', options.message);
            textContent.append(message);
            toast.classList.add('hasMessage');
        }

        if(options.icon != ''){
            var iconTemplate = document.createElement('template');
            iconTemplate.innerHTML = options.icon.trim();

            var icon = iconTemplate.content.firstChild;
            icon.classList.add('icon');

            content.prepend(icon);
            toast.classList.add('hasIcon');
        }

        if(options.showClose || options.action.text.length > 0){
            var actions = document.createElement('div');
            actions.classList.add('toastActions');

            if(options.action.text != ''){
                var action = document.createElement('button');
                if(options.action.class != null){
                    action.classList.add(options.action.class);
                }
                action.id = options.action.id;
                action.textContent = options.action.text;

                if(options.action.onClick !== undefined){
                    action.addEventListener('click', function(e){
                        e.stopPropagation();
                        options.action.onClick(e);
                    });
                }
                actions.append(action);
                toast.classList.add('hasAction');
            }
            if(options.showClose){
                var closebtn = document.createElement('button');
                closebtn.classList.add('close');
                closebtn.insertAdjacentHTML('afterbegin', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.021 512.021" width="10" height="10px"><path d="M301.258 256.01L502.645 54.645c12.501-12.501 12.501-32.769 0-45.269s-32.769-12.501-45.269 0h0L256.01 210.762 54.645 9.376c-12.501-12.501-32.769-12.501-45.269 0s-12.501 32.769 0 45.269L210.762 256.01 9.376 457.376c-12.501 12.501-12.501 32.769 0 45.269s32.769 12.501 45.269 0L256.01 301.258l201.365 201.387c12.501 12.501 32.769 12.501 45.269 0s12.501-32.769 0-45.269L301.258 256.01z"/></svg>');
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
        setTimeout(() => {
            toast.classList.add('shown');
        }, 1);

        if(options.duration > 0){
            setTimeout(()=>{
                close(id);
            }, options.duration);
        }
        return id;
    };

    const handleOnClick = (e)=>{
        var callBack = getCallBack(e.target.id, 'onClick');
        if(callBack !== undefined){
            callBack();
        }
        if(e.currentTarget.dataset.closeOnClick !== 'false'){
            close(e.currentTarget.id);
        }
    };

    const getContainer = (position='top-right')=>{
        if(containers[position]){
            return containers[position];
        }
        else{
            var container = document.createElement('div');
            container.classList.add('toastContainer');
            container.dataset.position = position;
            container.dataset.mobilePosition = mobilePosition;

            containers[position] = container;
            document.body.appendChild(container);
            return container;
        }
    };

    const close = (id)=>{
        var toRemove = document.getElementById(id);
        if(toRemove !== null){
            var position = toRemove.parentNode.dataset.position;
            
            var callBack = getCallBack(id, 'onClose');
            if(callBack !== undefined){
                callBack();
            }
            toRemove.classList.remove('shown');
            removeCallBacks(id);
            removeContainer(position);
            
            setTimeout(() => {
                toRemove.remove();
            }, 250);
        }
    };

    const removeContainer = (position)=>{
        if(containers[position] && !containers[position].hasChildNodes()){
            containers[position].remove();
            delete containers[position];
        }
    };

    const setMobilePosition = (position)=>{
        mobilePosition = position;
        Object.entries(containers).forEach(([position, element]) => {
            element.dataset.mobilePosition = mobilePosition;
        });
    };

    const addCallBacks = (id, onClick, onClose) => {
        callBacks[id+'onClick'] = onClick;
        callBacks[id+'onClose'] = onClose;
    };

    const getCallBack = (id, type) => {
        return callBacks[id+type];
    };

    const removeCallBacks = (id) => {
        delete callBacks[id+'onClick'];
        delete callBacks[id+'onClose'];
    };

    return {
        show: show,
        close: close,
        setMobilePosition: setMobilePosition,
        setDefaults: setDefaults,
    };
})();

tt.toast = tt_toast;