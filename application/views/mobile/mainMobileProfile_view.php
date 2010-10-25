<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.css" />
        <script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.js"></script>
        <style>
            span.foo {
                margin-left: 30px;
            }
        </style>
    </head>
    <body>
        <div data-role="page">

            <div data-role="header">
                <h1>CSH Members</h1>
            </div><!-- /header -->

            <div data-role="content">
                <h3><?=$user['givenname']." ".$user['sn']?></h3>
                <?php
                foreach ($display_fields as $field => $display)
                {
                    echo '<h4>' . $display . '</h4>';
                    if ($field == 'mail')
                    {
                        foreach ($user[$field] as $email)
                        {
                            echo '<span class="foo"><a href="mailto:' . $email['email'] . '">' . $email['email'] . '</a></span><br>';
                        }
                    }
                    else
                    {
                        echo '<span class="foo">'.$user[$field].'</span>';
                    }
                }
                ?>
            </div><!-- /content -->

            <div data-role="footer">
                <h4>Page Footer</h4>
            </div><!-- /header -->
        </div><!-- /page -->

    </body>
</html>