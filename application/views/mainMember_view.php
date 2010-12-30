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
                        echo '<div class="inner" value="'.$key.'" id="'.$field.'">';
                        echo '<div class="data" value="'.$field.'" id="'.$field.'_'.$key.'">
                            <a href="mailto:'.$val.'">'.$val.'</a>
                          </div>';
                        if($this->uri->segment(1) == 'me')
                        {
                          echo '<div class="edit">
                            <a href="#" class="edit_field" id="'.$field.'_'.$key.'" value="edit">Edit</a>
                          </div>';
                          echo '<br>';
                          echo '</div>';
                        }
                        else
                        {
                          echo '<br>';
                          echo '</div>';
                        }

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
                        echo '<div class="inner" value="'.$key.'" id="'.$field.'">';
                        echo '<div class="data" value="'.$field.'" id="'.$field.'_'.$key.'">
                            '.$val.'
                          </div>';
                        if($this->uri->segment(1) == 'me')
                        {
                            echo '<div class="edit">
                            <a href="#" class="edit_field" id="'.$field.'_'.$key.'" value="edit">Edit</a>
                          </div>
                          <br>';
                            echo '</div>';
                        }
                        else
                        {
                            echo '<br>';
                            echo '</div>';
                        }
                    }// end conditional field formatting

                    
                } // end field display loop
                echo '</div>';
            } // end array key check
        }// end field loop
        // print the address fields at the very bottom
        //Util::printr($user['address']);
        echo '<div class="heading">Addresses</div>';
        echo '<div class="content">';
     
        //Util::printr($user['address']);
        // add_key == field name (IE city, state, etc)
        // add_value == field value (in array form)
        foreach($user['address'] as $add_key => $add_val)
        {
            //echo 'add_key: '.$add_key.' - add_val: '.$add_val.'<br>';
            // add_index == the index of the value
            // add_array the text associated with the index
            foreach($add_val as $add_index => $add_array)
            {

                if ($add_index == 'addressname')
                {
                    echo '<div class="heading" id="addressname_'.$add_key.'" value="'.$add_array[0].'">';
                    echo $add_array[0];
                    echo '</div>';
                }
                else if ($add_index != 'objectclass')
                {
                    $content_editable = '';
                    if($this->uri->segment(1) == 'me')
                    {
                        $content_editable = 'contenteditable="false"';
                    }

                    // address_*addressname*_
                    //
                    //

                   

                    echo '<div class="content" value="'.$user['address'][$add_key]['addressname'][0].'">
                        <div class="inner" value="address">
                            <div class="field">'.$address_fields[$add_index] . ':  </div>
                                <div class="data" '.$content_editable.' value="'.$add_index.'" id="'.$add_index.'_0">'
                                        .$add_array[0].
                                '   </div>';

                    if($this->uri->segment(1) == 'me')
                    {
                        echo '<div class="edit" value="address">
                                    <a href="#" class="edit_field" id="'.$add_index.'_0" value="address">Edit</a>
                                </div>
                            </div>
                       </div>';
                    }
                    else
                    {
                        echo '</div></div>';
                    }

                }
                else
                {

                }

            }

        }
        echo '</div>'
    ?>
</div>
