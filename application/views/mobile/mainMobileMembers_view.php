<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.css" />
        <link rel="stylesheet" href="<?=site_url('css/mobile-style.css')?>">
        <script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.js"></script>
    </head>
    <body> 
        <div data-role="page">

            <div data-role="header">
                <h1>CSH Members <i>Mobile</i></h1>
            </div><!-- /header -->

            <div data-role="content" class="ui-content" role="main">
                <ul data-role="listview" class="ui-listview" role="listbox">
                    <?php
                    for ($i = 65; $i < 91; $i++)
                    {
                        echo '<li><a href="'.site_url('main/mobile_members_sorted/'.chr($i)).'">'.chr($i).'</a></li>';
                        //echo '<a href="#" onClick="getContent(\'' . chr($i) . '\', 1);">' . chr($i) . '</a>';
                    }
                    ?>
                </ul>
            </div><!-- /content -->
            <div data-role="footer">
                <h4>Page Footer</h4>
            </div><!-- /header -->
        </div><!-- /page -->

    </body>
</html>