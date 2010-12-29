<div id="leftColLarge" class="column">
    <script type="text/javascript">
        var update_url = "<?=site_url('main/sort_members')?>";
        var user_id = "<?=$user['uid'][0]?>";
        var update_field_url = '<?=site_url('me/submit_change')?>';
        var submit_change_address = '<?=site_url('me/submit_change_address')?>';
    </script>
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
                    else if($field == 'birthday')
                    {
                        $bd = substr($val, 0, 8);
                        echo '<div class="inner" '.$content_editable.' value="'.$key.'" id="'.$field.'">';
                        echo substr($bd, 4, 2)."/".substr($bd,6,2).'/'.substr($bd,0,4);
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
        // print the address fields at the very bottom
        //Util::printr($user['address']);
        echo '<div class="heading">Addresses</div>';
        echo '<div class="content">';
        foreach($user['address'] as $add_key => $add_val)
        {
            foreach($add_val as $add_index => $add_array)
            {

                if ($add_index == 'addressname')
                {
                    echo '<div class="heading" id="addressname_'.$add_key.'">';
                    echo $add_array[0];
                    echo '</div>';
                }
                else if ($add_index != 'objectclass')
                {
                    $content_editable = '';
                    if($this->uri->segment(1) == 'me')
                    {
                        $content_editable = 'CONTENTEDITABLE';
                    }
                    echo '<div class="content">
                          <div class="inner">';
                    echo '<div class="field">'.$address_fields[$add_index] . ':  </div>';
                    
                    echo '<div class="field-value" '.$content_editable.' value="'.$add_index.'_'.$add_key.'" id="address"> ' . $add_array[0].'</div>';
                    
                    echo '</div></div><br>';
                }
                else
                {
                
                }

            }

        }
        echo '</div>'
    ?>
</div>
