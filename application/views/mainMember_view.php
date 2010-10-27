<div id="leftColLarge" class="column">
    <script type="text/javascript">
        var update_url = "<?=site_url('main/sort_members')?>";
    </script>
    <h1><?=$user['cn']?></h1>
    <?php
        //Util::printr($user);
        foreach($display_fields as $field => $display)
        {
            echo '<div class="heading">'.$display.'</div>';
            echo '<div class="content">';
            if($field == 'mail')
            {
                foreach($user[$field] as $email)
                {
                    echo '<a href="mailto:'.$email['email'].'">'.$email['email'].'</a><br>';
                }
            }
            elseif($field == 'birthday')
            {
                echo '<span class="foo">'.Util::format_birthday($user[$field]).'</span>';
            }
            elseif($field == 'aolscreenname')
            {
                echo '<span class="foo"><a href="aim:goim?screenname='.$user[$field].'">'.$user[$field].'</a></span>';
            }
            else
            {
                echo $user[$field];
            }
            echo '</div>';
        }

    ?>
</div>




