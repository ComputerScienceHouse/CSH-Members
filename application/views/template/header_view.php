<html>
    <head>
        <title>CSH Member Profiles</title>
        <link href="<?=site_url('js/ext-3.2.1/resources/css/ext-all.css')?>" rel="stylesheet" type="text/css">
        <link href="<?=site_url('js/ext-3.2.1/resources/css/xtheme-gray.css')?>" rel="stylesheet" type="text/css">
        <script src="<?=site_url('js/ext-3.2.1/adapter/ext/ext-base-debug.js')?>" type="text/javascript"></script>
        <script src="<?=site_url('js/ext-3.2.1/ext-all-debug.js')?>" type="text/javascript"></script>

        <link href="<?=site_url('css/main-style.css')?>" rel="stylesheet" type="text/css">
        <?php
            foreach($css as $styles)
            {
                echo '<link href="'.$styles.'" type="text/css" rel="stylesheet">';
            }

            foreach($javascript as $js)
            {
                echo '<script src="'.$js.'" type="text/javascript"></script>';
            }
        ?>
        
    </head>
    <body>
        <div id="header">
            <div class="logo">
                CSH Member Profiles
            </div>
            <div class="right">
                <b>Welcome <a href="<?=site_url('me')?>"><?=$_SERVER['WEBAUTH_LDAP_CN']?></a>!</b>
            </div>
        </div>
        <div id="container">