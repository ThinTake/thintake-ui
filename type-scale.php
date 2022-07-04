<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title>Type Scale - ThinTake</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/reboot.css"> -->

    <?php
        require "./php-modular-css-js/modular-css-js.class.php";

        $modular = new ModularCssJs('./components', 'dist_assets', false);

        $modules = [
            'reboot',
        ];
        $files = $modular->get('type-scale', $modules);

        if(isset($files['css'])){
            echo '<link rel="stylesheet" href="dist_assets/'.$files['css'].'">';
        }
        if(isset($files['js'])){
            echo '<script src="dist_assets/'.$files['js'].'"></script>';
        }
    ?>

</head>
<body>
<h1>A Visual Type Scale</h1>

<p>What looked like a small patch of purple grass, above five feet square, was moving across the sand in their direction.</p>

<p>When it came near enough he perceived that it was not grass; there were no blades, but only purple roots. The roots were revolving, for each small plant in the whole patch, like the spokes of a rimless wheel.</p>

<h2>A Visual Type Scale</h2>

<p>What looked like a small patch of purple grass, above five feet square, was moving across the sand in their direction.</p>

<p>When it came near enough he perceived that it was not grass; there were no blades, but only purple roots. The roots were revolving, for each small plant in the whole patch, like the spokes of a rimless wheel.</p>

<h3>A Visual Type Scale</h3>

<p>What looked like a small patch of purple grass, above five feet square, was moving across the sand in their direction.</p>

<p>When it came near enough he perceived that it was not grass; there were no blades, but only purple roots. The roots were revolving, for each small plant in the whole patch, like the spokes of a rimless wheel.</p>

<h4>A Visual Type Scale</h4>

<p>What looked like a small patch of purple grass, above five feet square, was moving across the sand in their direction.</p>

<p>When it came near enough he perceived that it was not grass; there were no blades, but only purple roots. The roots were revolving, for each small plant in the whole patch, like the spokes of a rimless wheel.</p>

<h5>A Visual Type Scale</h5>

<p>What looked like a small patch of purple grass, above five feet square, was moving across the sand in their direction.</p>

<p>When it came near enough he perceived that it was not grass; there were no blades, but only purple roots. The roots were revolving, for each small plant in the whole patch, like the spokes of a rimless wheel.</p>

<p class="text_small">— Excerpt from A Voyage to Arcturus, by David Lindsay.</p>

</body>
</html>
