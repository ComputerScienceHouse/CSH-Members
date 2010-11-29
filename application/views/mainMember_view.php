<div id="leftColLarge" class="column">
    <script type="text/javascript">
        var update_url = "<?=site_url('main/sort_members')?>";
        var user_id = "<?=$user['uid']?>";
        var update_field_url = '<?=site_url('me/submit_change')?>';
    </script>
    <h1><?=$user['cn']?></h1>
    <?php
        //Util::printr($user);
        foreach($display_fields as $field => $display)
        {
            echo '<div class="heading">'.$display.'</div>';
            if($field == 'mail')
            {
                echo '<div id="'.$field.'" class="content">';
                foreach($user[$field] as $email)
                {
                    echo '<a href="mailto:'.$email['email'].'">'.$email['email'].'</a><br>';
                }
            }
            elseif($field == 'birthday')
            {
                echo '<div id="'.$field.'" class="content" CONTENTEDITABLE>';
                echo '<span class="foo">'.Util::format_birthday($user[$field]).'</span>';
            }
            elseif($field == 'aolscreenname')
            {
                echo '<div id="'.$field.'" class="content" CONTENTEDITABLE>';
                echo '<span class="foo"><a href="aim:goim?screenname='.$user[$field].'">'.$user[$field].'</a></span>';
            }
            else
            {
                echo '<div id="'.$field.'" class="content" CONTENTEDITABLE>';
                echo $user[$field];
            }
            echo '</div>';
        }

    ?>
</div>




