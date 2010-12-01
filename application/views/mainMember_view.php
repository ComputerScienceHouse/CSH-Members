<div id="leftColLarge" class="column">
    <script type="text/javascript">
        var update_url = "<?=site_url('main/sort_members')?>";
        var user_id = "<?=$user['uid'][0]?>";
        var update_field_url = '<?=site_url('me/submit_change')?>';
    </script>
    <h1><?=$user['cn'][0].' ('.$user['uid'][0].')'?></h1>
    <?php
        
        $content_editable = '';
        
       
        // loop over all the fields that we want to display to the page
        foreach($field_order as $field => $value)
        {
            // make sure that user actually HAS the field, otherwise, shit will break
            if(array_key_exists($field, $user))
            {
                echo '<div class="heading">'.$value.'</div>';
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
                    else if($field == 'address')
                    {


                        foreach($val as $adkey => $adval)
                        {
                            if($adkey == 'addressname')
                            {
                                echo '<div class="heading">';
                                echo $adval[0];
                                echo '</div>';
                            }
                            else if($adkey != 'objectclass')
                            {
                                echo '<div class="content"><div class="inner" '.$content_editable.' value="'.$adkey.'" id="'.$adval.'">';
                                echo $adkey.': '.$adval[0];
                                echo '</div></div>';
                            }
                            //echo $adkey.':';
                            //Util::printr($adval);
                            //echo '<br>';
                        }
                        //echo '<br>';
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
        Util::printr($user);
    ?>
</div>




