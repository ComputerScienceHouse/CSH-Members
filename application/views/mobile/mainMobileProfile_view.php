<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.css" />
        <link rel="stylesheet" href="<?=site_url('css/mobile-style.css')?>">
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
                    echo '<span class="heading">' . $display . '</span>: ';
                    if ($field == 'mail')
                    {
                        echo '<br><ul>';
                        foreach ($user[$field] as $email)
                        {
                            echo '<li><a href="mailto:' . $email['email'] . '" rel=external>' . $email['email'] . '</a></li>';
                        }
                        echo '</ul>';
                    }
                    elseif($field == 'cellphone' || $field == 'homephone')
                    {
                        $phone = str_replace('-', '', $user[$field]);
                        echo '<a href="tel:+'.$phone.'" rel=external>'.$phone.'</a></span><br>';
                    }
                    elseif($field == 'birthday')
                    {
                        echo '<span class="foo">'.Util::format_birthday($user[$field]).'</span><br>';
                    }
                    elseif($field == 'aolscreenname')
                    {
                        echo '<span class="foo"><a href="aim:goim?screenname='.$user[$field].'" rel=external>'.$user[$field].'</a></span><br>';
                    }
                    else
                    {
                        echo '<span class="foo">'.$user[$field].'</span><br>';
                    }
                    echo '<br>';
                }
                ?>
            </div><!-- /content -->

            <div data-role="footer">
                <h4>Page Footer</h4>
            </div><!-- /header -->
        </div><!-- /page -->

    </body>
</html>