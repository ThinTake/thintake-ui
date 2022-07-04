<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select - ThinTake</title>

    <!-- <link rel="stylesheet" href="styles/root/root.css">
    <link rel="stylesheet" href="styles/reboot/reboot.css">
    <link rel="stylesheet" href="styles/forms/select.css">
    <link rel="stylesheet" href="styles/utility/utility.css"> -->

    <?php
        require "./php-modular-css-js/modular-css-js.class.php";

        $modular = new ModularCssJs('./components', 'dist_assets', false);

        $modules = [
            'forms/select',
            'utility',
            'utility/margin',
            'utility/padding',
        ];
        $files = $modular->get('select', $modules);

        if(isset($files['css'])){
            echo '<link rel="stylesheet" href="dist_assets/'.$files['css'].'">';
        }
        if(isset($files['js'])){
            echo '<script src="dist_assets/'.$files['js'].'"></script>';
        }
    ?>
    
    <!-- UNICONS ICONS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body class="py-2">
    <div class="container">
        <h1 class="mt-3 mb-1">Select Inputs</h1>
        <hr class="mt-1">

        <h5>Select</h5>
        <div class="mb-3 flex" style="--gap: 0;flex-direction: column;max-width: 400px;">
            <div class="select mb-2">
                <div class="input-wrapper">
                    <select name="select" id="select">
                        <option value="" hidden></option>
                        <option value="1">First</option>
                        <option value="2">Second</option>
                    </select>
                    <label>Select</label>
                </div>
            </div>
            <div class="select mb-2">
                <div class="input-wrapper">
                    <select name="select" id="select">
                        <option value="" disabled hidden></option>
                        <option value="1" selected>First</option>
                        <option value="2">Second</option>
                    </select>
                    <label>Select Default</label>
                </div>
            </div>
            <div class="select mb-2">
                <div class="input-wrapper">
                    <select name="select" id="select" disabled>
                        <option value="" disabled></option>
                        <option value="1" selected>First</option>
                        <option value="2">Second</option>
                    </select>
                    <label>Select disabled</label>
                </div>
            </div>
        </div>

    </div>
    <!-- <script src="styles/root/root.js"></script>
    <script src="styles/forms/select.js"></script> -->
    <script>
        tt.init();   
    </script>
</body>
</html>