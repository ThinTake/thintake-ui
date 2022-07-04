<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toast - ThinTake</title>

    <!-- <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/reboot.css">
    <link rel="stylesheet" href="css/buttons.css">

    <link rel="stylesheet" href="css/toast.css">
    <link rel="stylesheet" href="css/utility.css"> -->

    <?php
        require "./php-modular-css-js/modular-css-js.class.php";

        $modular = new ModularCssJs('./components', 'dist_assets', false);

        $modules = [
            'buttons/primary',
            'toast',
            'utility',
            'utility/margin',
            'utility/padding',
        ];
        $files = $modular->get('toast', $modules);

        if(isset($files['css'])){
            echo '<link rel="stylesheet" href="dist_assets/'.$files['css'].'">';
        }
        if(isset($files['js'])){
            echo '<script src="dist_assets/'.$files['js'].'"></script>';
        }
    ?>

</head>
<body class="py-2">
    <div class="container">
        <h1 class="mt-3 mb-1">Toasts</h1>

        <div class="mb-3 flex">
            <button id="tr" class="btn btn-primary">Top Right</button>
            <button id="tc" class="btn btn-primary">top center</button>
            <button id="tl" class="btn btn-primary">top left</button>
            <button id="br" class="btn btn-primary">bottom right</button>
            <button id="bc" class="btn btn-primary">bottom center</button>
            <button id="bl" class="btn btn-primary">bottom left</button>
            <button id="onClose" class="btn btn-primary">On Close</button>
            <button id="onClick" class="btn btn-primary">On Click</button>
        </div>
    </div>
<!--     
    <script src="js/root.js"></script>
    <script src="js/toast.js"></script> -->
    <script>
        document.getElementById('tr').addEventListener('click', ()=>{
            tt.toast.show({
                html: 'Top Right',
                closeOnClick: false,
                position: 'top-right'
            });
        });
        document.getElementById('tc').addEventListener('click', ()=>{
            tt.toast.show({
                html: 'Top Center',
                closeOnClick: false,
                position: 'top-center'
            });
        });
        document.getElementById('tl').addEventListener('click', ()=>{
            tt.toast.show({
                html: 'Top Left',
                closeOnClick: false,
                position: 'top-left'
            });
        });
        document.getElementById('br').addEventListener('click', ()=>{
            tt.toast.show({
                html: 'Bottom Right',
                closeOnClick: false,
                position: 'bottom-right'
            });
        });
        document.getElementById('bc').addEventListener('click', ()=>{
            tt.toast.show({
                html: 'Bottom Center',
                closeOnClick: false,
                position: 'bottom-center'
            });
        });
        document.getElementById('bl').addEventListener('click', ()=>{
            tt.toast.show({
                html: 'Bottom Center',
                closeOnClick: false,
                position: 'bottom-left'
            });
        });
        document.getElementById('onClose').addEventListener('click', ()=>{
            tt.toast.show({
                html: 'onClose',
                closeOnClick: false,
                displayDuration: 10000,
                onClose: ()=>{
                    alert('Toast Closed');
                }
            });
        });
        document.getElementById('onClick').addEventListener('click', ()=>{
            tt.toast.show({
                html: 'onClose',
                closeOnClick: false,
                displayDuration: 10000,
                onClick: ()=>{
                    alert('Toast Clicked');
                }
            });
        });
    </script>
</body>
</html>