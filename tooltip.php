<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tooltip - ThinTake</title>

    <!-- <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/reboot.css">
    <link rel="stylesheet" href="css/buttons.css">

    <link rel="stylesheet" href="css/tooltip.css">
    <link rel="stylesheet" href="css/utility.css"> -->
    <?php
        require "./php-modular-css-js/modular-css-js.class.php";

        $modular = new ModularCssJs('./components', 'dist_assets', false);

        $modules = [
            'buttons/primary',
            'tooltip',
            'utility',
            'utility/margin',
            'utility/padding',
        ];
        $files = $modular->get('tooltip', $modules);

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
        <h1 class="mt-3 mb-1">Tooltip</h1>

        <div class="mb-3 flex">
            <button class="btn btn-primary" data-tooltip="top" title="My Tooltip">Top</button>

            <button class="btn btn-primary" data-tooltip="bottom" title="My Tooltip">Bottom</button>
            <button class="btn btn-primary" data-tooltip="left" title="My Tooltip">Left</button>
            <button class="btn btn-primary" data-tooltip="right" title="My Tooltip">Right</button>

            <button class="btn btn-primary" data-tooltip="top" data-on-focus="false" title="My Tooltip">On Focus FALSE</button>
        </div>

    </div>

    <div id="test"></div>
    
    <!-- <script src="js/root.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/tooltip.js"></script> -->
    <script>
        tt.init();
    </script>
</body>
</html>