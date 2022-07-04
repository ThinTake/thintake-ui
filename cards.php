<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards - ThinTake</title>

    <!-- <link rel="stylesheet" href="styles/root/root.css">
    <link rel="stylesheet" href="styles/reboot/reboot.css">
    <link rel="stylesheet" href="styles/cards/cards.css">
    <link rel="stylesheet" href="styles/buttons/buttons.css">
    <link rel="stylesheet" href="styles/utility/utility.css"> -->

    <?php
        require "./php-modular-css-js/modular-css-js.class.php";

        $modular = new ModularCssJs('./components', 'dist_assets', false);

        $modules = [
            'cards',
            'buttons/primary',
            'utility',
            'utility/margin',
            'utility/padding',
        ];
        $files = $modular->get('cards', $modules);

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
        <h1 class="mt-3 mb-1">Cards</h1>
        <hr class="mt-1">

        <div class="flex flex-wrap" style="--gap: 2rem;">
            <div class="mb-3" style="width: 400px;">
                <h5>Simple Card</h5>
                <div class="card">
                    <div class="card-body">
                        <p class="m-0">Hello, I am a very simple card. I am good at containing small bits of information.</p>
                    </div>
                </div>
            </div>

            <div class="mb-3" style="width: 400px;">
                <h5>Card With Header And Footer</h5>
                <div class="card">
                    <div class="card-header flex justify-content-between align-items-center">
                        <span>Card Header</span>

                        <button class="btn btn-primary-ghost btn-icon btn-sm">
                            <i class="uil uil-times"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <p class="m-0">Hello, I am a very simple card. I am good at containing small bits of information.</p>
                    </div>
                    <div class="card-footer flex justify-content-between align-items-center">
                        <span>Card Footer</span>
                        <button class="btn btn-primary">Button</button>
                    </div>
                </div>
            </div>

            <div class="mb-3" style="width: 400px;">
                <h5>Card With Image</h5>
                <div class="card">
                    <img class="card-img-top" src="https://via.placeholder.com/400x200.png?text=Image" alt="Image">
                    <div class="card-body">
                        <p class="m-0">Hello, I am a very simple card. I am good at containing small bits of information.</p>
                    </div>
                    <div class="card-footer flex justify-content-between align-items-center">
                        <span>Card Footer</span>
                        <button class="btn btn-primary">Button</button>
                    </div>
                </div>
            </div>

            <div class="mb-3" style="width: 400px;">
                <h5>Card With Header and Image</h5>
                <div class="card">
                    <div class="card-header">Card Header</div>
                    <img class="card-img-top r-0" src="https://via.placeholder.com/400x200.png?text=Image" alt="Image">
                    <div class="card-body">
                        <p class="m-0">Hello, I am a very simple card. I am good at containing small bits of information.</p>
                        
                        <button class="btn btn-primary mb-1 mt-2">Test Button</button>
                    </div>
                </div>
            </div>

            <div class="mb-3" style="width: 400px;">
                <h5>Card With Bottom Image</h5>
                <div class="card">
                    <div class="card-body">
                        <p class="m-0">Hello, I am a very simple card. I am good at containing small bits of information.</p>
                    </div>
                    <img class="card-img-bottom" src="https://via.placeholder.com/400x200.png?text=Image" alt="Image">
                </div>
            </div>
        </div>


    </div>
</body>

</html>