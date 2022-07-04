<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox - ThinTake</title>

    <!-- <link rel="stylesheet" href="styles/root/root.css">
    <link rel="stylesheet" href="styles/reboot/reboot.css">
    <link rel="stylesheet" href="styles/forms/checkbox.css">
    <link rel="stylesheet" href="styles/utility/utility.css"> -->

    <?php
        require "./php-modular-css-js/modular-css-js.class.php";

        $modular = new ModularCssJs('./components', 'dist_assets', false);

        $modules = [
            'forms/checkbox',
            'utility',
            'utility/margin',
            'utility/padding',
        ];
        $files = $modular->get('checkbox_radio', $modules);

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
        <h1 class="mt-3 mb-1">Checkbox Inputs</h1>
        <hr class="mt-1">

        <h5>Checkbox</h5>
        <div class="mb-3 flex" style="--gap: 0;flex-direction: column;max-width: 400px;">
            <div class="checkbox mb-2">
                <label>
                    <input type="checkbox">
                    <span>Checkbox</span>
                </label>
            </div>
            <div class="checkbox mb-2">
                <label>
                    <input type="checkbox" checked>
                    <span>Checkbox Checked</span>
                </label>
            </div>

            <div class="checkbox filled mb-2">
                <label>
                    <input type="checkbox">
                    <span>Checkbox Filled</span>
                </label>
            </div>
        </div>

        

        <h5>Checkbox Disabled</h5>
        <div class="mb-3 flex" style="--gap: 0;flex-direction: column;max-width: 400px;">
            <div class="checkbox mb-2">
                <label>
                    <input type="checkbox" disabled>
                    <span>Checkbox Disabled</span>
                </label>
            </div>

            <div class="checkbox mb-2">
                <label>
                    <input type="checkbox" disabled checked>
                    <span>Checkbox Checked Disabled</span>
                </label>
            </div>

            <div class="checkbox filled mb-2">
                <label>
                    <input type="checkbox" disabled checked>
                    <span>Checkbox Filled Disabled</span>
                </label>
            </div>
        </div>

        

        <h5>Radio</h5>
        <div class="mb-3 flex" style="--gap: 0;flex-direction: column;max-width: 400px;">
            <div class="radio mb-2">
                <label>
                    <input name="radio1" type="radio" value="0" checked>
                    <span>Hello</span>
                </label>
            </div>
            <div class="radio mb-2">
                <label>
                    <input name="radio1" type="radio" value="0">
                    <span>Hi</span>
                </label>
            </div>
            <div class="radio mb-2">
                <label>
                    <input name="radio1" type="radio" value="0" disabled>
                    <span>Disabled</span>
                </label>
            </div>
            <div class="radio mb-2">
                <label>
                    <input name="radio2" type="radio" value="0" disabled checked>
                    <span>Disabled</span>
                </label>
            </div>
        </div>

    </div>
    <!-- <script src="styles/root/root.js"></script> -->
    <script>
        tt.init();   
    </script>
</body>
</html>