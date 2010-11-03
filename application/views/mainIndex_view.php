<div id="leftColLarge" class="column">
    <script type="text/javascript">
        var update_url = "<?=site_url('main/sort_members')?>";
    </script>
    <h1>Members</h1>
    <div class="heading">
        Members Alphabetically
    </div>
    <div class="content">
        <a class="foooooobar" href="#">Foo</a>
        <?php
            for($i = 65; $i < 91; $i++)
            {
                //echo '<a class="sort_letter" href="#" onClick="getContent(\''.chr($i).'\', 1);">'.chr($i).'</a>';
                echo '<a class="sort_letter" href="#" value="fooobar">'.chr($i).'</a>';
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
        Members
    </div>
    <div class="content" id="member_results">
    </div>
</div>




