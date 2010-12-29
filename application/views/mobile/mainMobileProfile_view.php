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
                <h1><?=$user['cn'][0].' ('.$user['uid'][0].')'?></h1>
    <?php

        $content_editable = '';

        $address_displayed = false;

        // loop over all the fields that we want to display to the page
        foreach($field_order as $field => $value)
        {
            // make sure that user actually HAS the field, otherwise, shit will break
            if(array_key_exists($field, $user))
            {
                echo '<span class="heading">'.$value.'</span>';
                echo '<div class="content">';

                // check for fields that we want the user to be able to edit
                if(in_array($field, $non_edit_fields))
                {
                    $content_editable = '';
                }
                else
                {
                    if($this->uri->segment(1) == 'me')
                    {
                        $content_editable = 'CONTENTEDITABLE';
                    }
                }

                // loop over the values for $user['index']
                // If a user has multiple values for an attribute (eg. mail and addresses), this is where
                // we can display all that data
                foreach($user[$field] as $key => $val)
                {
                    // $key is the index in the array. We use this to identify the
                    // values (such as email addresses) when editing.
                    if($field == 'mail')
                    {
                        echo '<div class="inner" '.$content_editable.' value="'.$key.'" id="'.$field.'">';
                        echo '<a href="mailto:'.$val.'">'.$val.'</a><br>';
                        echo '</div>';
                    }
                    else if($field == 'alumni' || $field == 'drinkadmin' || $field == 'active' || $field == 'onfloor')
                    {
                        // display 1's and 0's as Yes's and No's
                        echo '<div class="inner" value="'.$key.'" id="'.$field.'" '.$content_editable.'>';
                        if($val == 0)
                        {
                            echo 'No';
                        }
                        else
                        {
                            echo 'Yes';
                        }
                        echo '</div>';
                    }
                    else
                    {
                        echo '<div class="inner" '.$content_editable.' value="'.$key.'" id="'.$field.'">';
                        echo $val;
                        echo '</div>';
                    }// end conditional field formatting


                } // end field display loop
                echo '</div>';
            } // end array key check
        }// end field loop
    ?>
            </div><!-- /content -->

            <div data-role="footer">
                <h4>Page Footer</h4>
            </div><!-- /header -->
        </div><!-- /page -->

    </body>
</html>