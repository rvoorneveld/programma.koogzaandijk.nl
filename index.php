<?php include __DIR__.DIRECTORY_SEPARATOR.'Clubplugin.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Programma KZ/Thermo4U</title>
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0" >
    <meta name="description" content="Programma KZ/Thermo4U">
    <meta name="author" content="Webathletes.nl - Rick Voorneveld">
    <link rel="stylesheet" href="/assets/css/app.min.css">
</head>
<body>
    <div id="club-plugin"></div>
    <script async src="//www.googletagmanager.com/gtag/js?id=UA-115425544-2"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="<?php echo (new Clubplugin())->getUrl(); ?>"></script>
    <script>
window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-115425544-2');

        jQuery(document).ready(function ($) {
            clubplugin.load('#club-plugin');
        });
    </script>
</body>
</html>