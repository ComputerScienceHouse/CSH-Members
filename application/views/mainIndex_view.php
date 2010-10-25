<div id="leftColLarge" class="column">
    <script type="text/javascript">
        var update_url = "<?=site_url('main/sort_members')?>";
    </script>
    <h1>Members</h1>
    <div class="heading">
        Members Alphabetically
    </div>
    <div class="content">
        <?php
            for($i = 65; $i < 91; $i++)
            {
                echo '<a href="#" onClick="getContent(\''.chr($i).'\', 1);">'.chr($i).'</a>';
                if($i == 90)
                {
                    echo '<br>';
                }
                else
                {
                    echo ', ';
                }

            }
        ?>
    </div>
    <div class="heading">
        Artists
    </div>
    <div class="content" id="artistResults">
    </div>
</div>




