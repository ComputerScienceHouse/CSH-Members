<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.css" />
        <script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.js"></script>
    </head>
    <body>
        <div data-role="page">

            <div data-role="header">
                <h1>CSH Members</h1>
            </div><!-- /header -->

            <div data-role="content" class="ui-content" role="main">
                <ul data-role="listview" class="ui-listview" role="listbox">
                    <?php
                    foreach($users as $user)
                    {
                        echo '<li><a href="'.site_url('main/mobile_profile/'.$user['uid']).'">'.$user['sn'].', '.$user['givenname'].'</a></li>';
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