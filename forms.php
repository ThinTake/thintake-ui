<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms - ThinTake</title>
    <!-- <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/reboot.css">
    
    <link rel="stylesheet" href="css/forms.css">
    
    <link rel="stylesheet" href="css/utility.css"> -->

    <?php
        require "./php-modular-css-js/modular-css-js.class.php";

        $modular = new ModularCssJs('./components', 'dist_assets', false);

        $modules = [
            'forms',
            'utility',
            'utility/margin',
            'utility/padding',
            'password-meter',
        ];
        $files = $modular->get('forms', $modules);

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
        <h1 class="mt-3 mb-1">Form Inputs</h1>
        <hr class="mt-1">

        <h5>Text Input</h5>
        <div class="mb-3 flex" style="flex-direction: column;max-width: 400px;">
            <div class="input">
                <div class="input-wrapper">
                    <input type="text" name="input" id="input" placeholder="Placeholder" autocomplete="off">
                    <label for="isnput">Label</label>
                </div>
            </div>
        </div>

        <h5>Password Input</h5>
        <div class="mb-3 flex" style="flex-direction: column;max-width: 400px;">
            <div class="input group" id="password-input">
                <div class="input-wrapper">
                    <div>
                        <input type="password" name="password" id="password" placeholder="Create a new password" autocomplete="off" minlength="6" maxlength="25">
                        <label for="password">Password</label>
                    </div>
                    <button type="button" class="password-btn" id="togglePassword">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="24px" width="24px" class="show"><path fill="currentColor" d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="24px" width="24px" class="hide"><path fill="currentColor" d="M10.94,6.08A6.93,6.93,0,0,1,12,6c3.18,0,6.17,2.29,7.91,6a15.23,15.23,0,0,1-.9,1.64,1,1,0,0,0-.16.55,1,1,0,0,0,1.86.5,15.77,15.77,0,0,0,1.21-2.3,1,1,0,0,0,0-.79C19.9,6.91,16.1,4,12,4a7.77,7.77,0,0,0-1.4.12,1,1,0,1,0,.34,2ZM3.71,2.29A1,1,0,0,0,2.29,3.71L5.39,6.8a14.62,14.62,0,0,0-3.31,4.8,1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20a9.26,9.26,0,0,0,5.05-1.54l3.24,3.25a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Zm6.36,9.19,2.45,2.45A1.81,1.81,0,0,1,12,14a2,2,0,0,1-2-2A1.81,1.81,0,0,1,10.07,11.48ZM12,18c-3.18,0-6.17-2.29-7.9-6A12.09,12.09,0,0,1,6.8,8.21L8.57,10A4,4,0,0,0,14,15.43L15.59,17A7.24,7.24,0,0,1,12,18Z"/></svg>
                    </button>
                    <div class="password-strength">
                        <div class="strength" id="password-strength"></div>
                    </div>
                </div>
                <div class="help on-invalid">Hh, Error</div>
            </div>
        </div>

        <h5>Text Input With Icons <code>.group</code></h5>
        <div class="mb-3 flex" style="flex-direction: column;max-width: 400px;">
            <div class="input group">
                <div class="input-wrapper">
                    <i class="uil uil-airplay"></i>
                    <div>
                        <input type="text" name="input" id="input" placeholder="Placeholder" autocomplete="off">
                        <label for="isnput">Label</label>
                    </div>
                </div>
            </div>
            
            <div class="input group">
                <div class="input-wrapper">
                    <div>
                        <input type="text" name="input" id="input" placeholder="Placeholder" autocomplete="off">
                        <label for="isnput">Label</label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M12,13a1.49,1.49,0,0,0-1,2.61V17a1,1,0,0,0,2,0V15.61A1.49,1.49,0,0,0,12,13Zm5-4V7A5,5,0,0,0,7,7V9a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V12A3,3,0,0,0,17,9ZM9,7a3,3,0,0,1,6,0V9H9Zm9,12a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H17a1,1,0,0,1,1,1Z"/></svg>
                </div>
            </div>
        </div>

        <h5>Text Input With Buttons <code>.group</code></h5>
        <div class="mb-3 flex" style="flex-direction: column;max-width: 400px;">
            <div class="input group">
                <div class="input-wrapper">
                    <div>
                        <input type="text" name="input" id="input" placeholder="Placeholder" autocomplete="off">
                        <label for="isnput">Label</label>
                    </div>
                    <button><i class="uil uil-eye"></i></button>
                </div>
            </div>
            <div class="input group">
                <div class="input-wrapper">
                    <button><i class="uil uil-eye"></i></button>
                    <div>
                        <input type="text" name="input" id="input" placeholder="Placeholder" autocomplete="off">
                        <label for="isnput">Label</label>
                    </div>
                </div>
            </div>

            <div class="input group">
                <div class="input-wrapper">
                    <div>
                        <input type="text" name="input" id="input" disabled value="Value" placeholder="Placeholder" autocomplete="off">
                        <label for="isnput">Disabled with button</label>
                    </div>
                    <button><i class="uil uil-eye"></i></button>
                </div>
            </div>
        </div>

        <h5>Text Input With Help text</h5>
        <div class="mb-3 flex" style="flex-direction: column;max-width: 400px;">
            <div class="input">
                <div class="input-wrapper">
                    <input type="text" name="input" id="input" placeholder="Placeholder" autocomplete="off">
                    <label for="isnput">Label</label>
                </div>
                <div class="help">This is for help</div>
            </div>
        </div>

        <h5>Validation <code>.valid & .invalid</code></h5>
        <div class="mb-3 flex" style="flex-direction: column;max-width: 400px;">
            <div class="input primary valid">
                <div class="input-wrapper">
                    <input type="text" name="input" id="input" placeholder="Placeholder" autocomplete="off">
                    <label for="isnput">Label</label>
                </div>
            </div>
            <div class="input group primary valid">
                <div class="input-wrapper">
                    <div>
                        <input type="text" name="input" id="input" placeholder="Placeholder" autocomplete="off">
                        <label for="isnput">Label</label>
                    </div>
                    <button><i class="uil uil-eye"></i></button>
                </div>
            </div>
            <div class="input group primary invalid">
                <div class="input-wrapper">
                    <button><i class="uil uil-eye"></i></button>
                    <div>
                        <input type="text" name="input" id="input" placeholder="Placeholder" autocomplete="off">
                        <label for="isnput">Label</label>
                    </div>
                </div>
            </div>
            
            <div class="input group primary valid">
                <div class="input-wrapper">
                    <div>
                        <input type="text" name="input" disabled id="input" placeholder="Placeholder" autocomplete="off">
                        <label for="isnput">Disabled</label>
                    </div>
                    <button><i class="uil uil-eye"></i></button>
                </div>
            </div>
        </div>

        <h5>Validation <code>.help</code> with <code>.valid</code> & <code>.invalid</code> (Using <code>.onvalid</code> & <code>.oninvalid</code>)</h5>
        <div class="mb-3 flex" style="flex-direction: column;max-width: 400px;">
            <div class="input primary valid">
                <div class="input-wrapper">
                    <input type="text" name="input" id="input" placeholder="Placeholder" autocomplete="off">
                    <label for="isnput">Label</label>
                </div>
                <div class="help">Wow, Success</div>
            </div>
            <div class="input group primary valid">
                <div class="input-wrapper">
                    <div>
                        <input type="text" name="input" id="input" placeholder="Placeholder" autocomplete="off">
                        <label for="isnput">Label</label>
                    </div>
                    <button><i class="uil uil-eye"></i></button>
                </div>
                <div class="help on-valid">Wow, Success</div>
            </div>
            <div class="input group primary invalid">
                <div class="input-wrapper">
                    <button><i class="uil uil-eye"></i></button>
                    <div>
                        <input type="text" name="input" id="input" placeholder="Placeholder" autocomplete="off">
                        <label for="isnput">Label</label>
                    </div>
                </div>
                <div class="help on-invalid">Hh, Error</div>
            </div>
        </div>

        <h1 class="mt-3 mb-1">Textarea</h1>
        <hr class="mt-1">

        <h5>Textarea</h5>
        <div class="mb-3 flex" style="flex-direction: column;max-width: 400px;">
            <div class="input">
                <div class="input-wrapper">
                    <textarea name="textarea" id="textarea1" placeholder="hii"></textarea>
                    <label for="textarea1">Description</label>
                </div>
            </div>
        </div>

        <h5>Disabled Textarea</h5>
        <div class="mb-3 flex" style="flex-direction: column;max-width: 400px;">
            <div class="input">
                <div class="input-wrapper">
                    <textarea name="textarea" id="textarea" placeholder="hii" disabled>Hii</textarea>
                    <label for="isnput">Description</label>
                </div>
            </div>
        </div>

        <h5>Textarea With Help</h5>
        <div class="mb-3 flex" style="flex-direction: column;max-width: 400px;">
            <div class="input">
                <div class="input-wrapper">
                    <textarea name="textarea" id="textarea" placeholder="hii"></textarea>
                    <label for="isnput">Description</label>
                </div>
                <div class="help">This is for help</div>
            </div>
        </div>

        <h5>Textarea Height by rows</h5>
        <div class="mb-3 flex" style="flex-direction: column;max-width: 400px;">
            <div class="input">
                <div class="input-wrapper">
                    <textarea name="textarea" id="textarea" rows="4"></textarea>
                    <label for="isnput">Label</label>
                </div>
            </div>
        </div>

        <h5>Textarea With Validation</h5>
        <div class="mb-3 flex" style="flex-direction: column;max-width: 400px;">
            <div class="input valid">
                <div class="input-wrapper">
                    <textarea name="textarea" id="textarea" placeholder="hii"></textarea>
                    <label for="isnput">Description</label>
                </div>
                <div class="help">This is for help</div>
            </div>
            <div class="input invalid">
                <div class="input-wrapper">
                    <textarea name="textarea" id="textarea" placeholder="hii"></textarea>
                    <label for="isnput">Description</label>
                </div>
                <div class="help">This is for help</div>
            </div>
        </div>

    </div>
    <!-- <script src="js/root.js"></script>
    <script src="js/forms.js"></script> -->
    <script>
        tt.init();
        
        window.addEventListener('load', function () {
            passwordButton = document.getElementById('togglePassword');
            passwordButton.addEventListener('click', function(e){
                if (passwordButton.dataset.showPass != undefined) {
                    delete passwordButton.dataset.showPass;
                    document.getElementById('password').setAttribute('type', 'password');
                    return;
                }
                passwordButton.dataset.showPass = '';
                document.getElementById('password').setAttribute('type', 'text');
            });

            document.getElementById('password').addEventListener('keyup', function (e) {

                var passwordScore = tt.passwordMeter(e.target.value);

                document.getElementById('password-strength').style.width = `${passwordScore}%`;

                var color = '#FF0000';
                if (passwordScore <= 20) {
                    color = '#FF0000';
                }
                else if (passwordScore <= 50) {
                    color = 'var(--danger, #F93154)';
                }
                else if (passwordScore <= 70) {
                    color = 'var(--warning, #FFA900)';
                }
                else if (passwordScore <= 90) {
                    color = 'var(--success, #00B74A)';
                }
                else if (passwordScore <= 100) {
                    color = '#009908';
                }
                document.getElementById('password-strength').style.backgroundColor = color;
            });
        });
        

    </script>
</body>
</html>