<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buttons - ThinTake</title>
    <!-- <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/reboot.css">
    
    <link rel="stylesheet" href="css/buttons.css">
    
    <link rel="stylesheet" href="css/utility.css"> -->

    <?php
        require "./php-modular-css-js/modular-css-js.class.php";

        $modular = new ModularCssJs('./components', 'dist_assets', false);

        $modules = [
            'buttons/primary',
            'buttons/secondary',
            'buttons/info',
            'buttons/success',
            'buttons/warning',
            'buttons/danger',
            'utility',
            'utility/border',
            'utility/margin',
            'utility/padding',
        ];
        $files = $modular->get('buttons', $modules);

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
        <h1 class="mt-3 mb-1">Button Types</h1>
        <hr class="mt-1">

        <h5>Buttons Primary</h5>
        <div class="mb-3 flex">
            <button class="btn btn-primary">Button</button>
            <button class="btn btn-primary-outline">Button</button>
            <button class="btn btn-primary-ghost">Button</button>
            <button class="btn btn-primary btn-progress inprogress">
                <svg class="spinner" viewBox="0 0 50 50">
                    <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
                </svg>
                <span class="text">Button</span>
            </button>
        </div>

        <h5>Buttons Disabled</h5>
        <div class="mb-3 flex">
            <button class="btn btn-primary" disabled>Disabled</button>
            <button class="btn btn-primary-outline" disabled>Disabled</button>
            <button class="btn btn-primary-ghost" disabled>Disabled</button>
        </div>
    
        <h5>Buttons With Images</h5>
        <div class="mb-3 flex">
            <button class="btn btn-primary">
                <img class="r-circle start" src="https://taiga-ui.dev/bf2e94ae58ee713717faf397958a8e3d.jpg" alt="img">
                Start
            </button>
            <button class="btn btn-primary">
                End
                <img class="r-circle end" src="https://taiga-ui.dev/bf2e94ae58ee713717faf397958a8e3d.jpg" alt="img">
            </button>
            <button class="btn btn-primary-outline">
                <img class="r-circle start" src="https://taiga-ui.dev/bf2e94ae58ee713717faf397958a8e3d.jpg" alt="img">
                Button
            </button>
            <button class="btn btn-primary-ghost">
                <img class="r-circle start" src="https://taiga-ui.dev/bf2e94ae58ee713717faf397958a8e3d.jpg" alt="img">
                Button
            </button>
        </div>
    
        <h5>Buttons With Icons</h5>
        <div class="mb-3 flex">
            <button class="btn btn-primary">
                <i class="uil uil-user"></i>
                Start
            </button>
            <button class="btn btn-primary">
                End
                <i class="uil uil-angle-right-b"></i>
            </button>
            <button class="btn btn-primary-outline">
                <i class="uil uil-angle-left-b"></i>
                Button
            </button>
            <button class="btn btn-primary-ghost">
                <i class="uil uil-angle-left-b"></i>
                Button
            </button>
        </div>
    
        <h5>Buttons With SVG</h5>
        <div class="mb-3 flex">
            <button class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#fff" d="M8.5,12.8l5.7,5.6c0.4,0.4,1,0.4,1.4,0c0,0,0,0,0,0c0.4-0.4,0.4-1,0-1.4l-4.9-5l4.9-5c0.4-0.4,0.4-1,0-1.4c-0.2-0.2-0.4-0.3-0.7-0.3c-0.3,0-0.5,0.1-0.7,0.3l-5.7,5.6C8.1,11.7,8.1,12.3,8.5,12.8C8.5,12.7,8.5,12.7,8.5,12.8z"/></svg>
                Start
            </button>
            <button class="btn btn-primary">
                End
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#fff" d="M15.54,11.29,9.88,5.64a1,1,0,0,0-1.42,0,1,1,0,0,0,0,1.41l4.95,5L8.46,17a1,1,0,0,0,0,1.41,1,1,0,0,0,.71.3,1,1,0,0,0,.71-.3l5.66-5.65A1,1,0,0,0,15.54,11.29Z"/></svg>
            </button>
            <button class="btn btn-primary-outline">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="var(--primary)" d="M8.5,12.8l5.7,5.6c0.4,0.4,1,0.4,1.4,0c0,0,0,0,0,0c0.4-0.4,0.4-1,0-1.4l-4.9-5l4.9-5c0.4-0.4,0.4-1,0-1.4c-0.2-0.2-0.4-0.3-0.7-0.3c-0.3,0-0.5,0.1-0.7,0.3l-5.7,5.6C8.1,11.7,8.1,12.3,8.5,12.8C8.5,12.7,8.5,12.7,8.5,12.8z"/></svg>
                Button
            </button>
            <button class="btn btn-primary-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="var(--primary)" d="M8.5,12.8l5.7,5.6c0.4,0.4,1,0.4,1.4,0c0,0,0,0,0,0c0.4-0.4,0.4-1,0-1.4l-4.9-5l4.9-5c0.4-0.4,0.4-1,0-1.4c-0.2-0.2-0.4-0.3-0.7-0.3c-0.3,0-0.5,0.1-0.7,0.3l-5.7,5.6C8.1,11.7,8.1,12.3,8.5,12.8C8.5,12.7,8.5,12.7,8.5,12.8z"/></svg>
                Button
            </button>
        </div>
    
        <h5>Icon Only Buttons</h5>
        <div class="mb-3 flex">
            <button class="btn btn-primary btn-icon">
                <i class="uil uil-user"></i>
            </button>
            <button class="btn btn-primary btn-icon">
                <img class="r-circle end" src="https://taiga-ui.dev/bf2e94ae58ee713717faf397958a8e3d.jpg" alt="img">
            </button>
            <button class="btn btn-primary btn-icon r-circle">
                <i class="uil uil-user"></i>
            </button>
            <button class="btn btn-primary-outline btn-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="var(--primary)" d="M8.5,12.8l5.7,5.6c0.4,0.4,1,0.4,1.4,0c0,0,0,0,0,0c0.4-0.4,0.4-1,0-1.4l-4.9-5l4.9-5c0.4-0.4,0.4-1,0-1.4c-0.2-0.2-0.4-0.3-0.7-0.3c-0.3,0-0.5,0.1-0.7,0.3l-5.7,5.6C8.1,11.7,8.1,12.3,8.5,12.8C8.5,12.7,8.5,12.7,8.5,12.8z"/></svg>
            </button>
            <button class="btn btn-primary-outline btn-icon r-circle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="var(--primary)" d="M8.5,12.8l5.7,5.6c0.4,0.4,1,0.4,1.4,0c0,0,0,0,0,0c0.4-0.4,0.4-1,0-1.4l-4.9-5l4.9-5c0.4-0.4,0.4-1,0-1.4c-0.2-0.2-0.4-0.3-0.7-0.3c-0.3,0-0.5,0.1-0.7,0.3l-5.7,5.6C8.1,11.7,8.1,12.3,8.5,12.8C8.5,12.7,8.5,12.7,8.5,12.8z"/></svg>
            </button>
            <button class="btn btn-primary-ghost btn-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="var(--primary)" d="M8.5,12.8l5.7,5.6c0.4,0.4,1,0.4,1.4,0c0,0,0,0,0,0c0.4-0.4,0.4-1,0-1.4l-4.9-5l4.9-5c0.4-0.4,0.4-1,0-1.4c-0.2-0.2-0.4-0.3-0.7-0.3c-0.3,0-0.5,0.1-0.7,0.3l-5.7,5.6C8.1,11.7,8.1,12.3,8.5,12.8C8.5,12.7,8.5,12.7,8.5,12.8z"/></svg>
            </button>
            <button class="btn btn-primary-ghost btn-icon r-circle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="var(--primary)" d="M8.5,12.8l5.7,5.6c0.4,0.4,1,0.4,1.4,0c0,0,0,0,0,0c0.4-0.4,0.4-1,0-1.4l-4.9-5l4.9-5c0.4-0.4,0.4-1,0-1.4c-0.2-0.2-0.4-0.3-0.7-0.3c-0.3,0-0.5,0.1-0.7,0.3l-5.7,5.6C8.1,11.7,8.1,12.3,8.5,12.8C8.5,12.7,8.5,12.7,8.5,12.8z"/></svg>
            </button>
        </div>

        <h5>Small Buttons</h5>
        <div class="mb-5 pb-3 flex">
            <button class="btn btn-primary btn-sm">Button</button>
            <button class="btn btn-primary btn-icon btn-sm">
                <img class="r-circle end" src="https://taiga-ui.dev/bf2e94ae58ee713717faf397958a8e3d.jpg" alt="img">
            </button>
            <button class="btn btn-primary-outline btn-icon btn-sm">
                <i class="uil uil-user"></i>
            </button>
            <button class="btn btn-primary-ghost btn-sm">Button</button>
        </div>

        <h1 class="mb-1">Colors</h1>
        <hr class="mt-1">
        
        <h5>Buttons Secondary</h5>
        <div class="mb-3 flex">
            <button class="btn btn-secondary">Button</button>
            <button class="btn btn-secondary-outline">Button</button>
            <button class="btn btn-secondary-ghost">Button</button>
        </div>

        <h5>Buttons Info</h5>
        <div class="mb-3 flex">
            <button class="btn btn-info">Button</button>
            <button class="btn btn-info-outline">Button</button>
            <button class="btn btn-info-ghost">Button</button>
        </div>

        <h5>Buttons Success</h5>
        <div class="mb-3 flex">
            <button class="btn btn-success">Button</button>
            <button class="btn btn-success-outline">Button</button>
            <button class="btn btn-success-ghost">Button</button>
        </div>

        <h5>Buttons Warning</h5>
        <div class="mb-3 flex">
            <button class="btn btn-warning">Button</button>
            <button class="btn btn-warning-outline">Button</button>
            <button class="btn btn-warning-ghost">Button</button>
        </div>

        <h5>Buttons Danger</h5>
        <div class="mb-3 flex">
            <button class="btn btn-danger">Button</button>
            <button class="btn btn-danger-outline">Button</button>
            <button class="btn btn-danger-ghost">Button</button>
        </div>

    </div>
</body>
</html>