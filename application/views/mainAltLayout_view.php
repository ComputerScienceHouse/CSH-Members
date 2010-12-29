<div id="leftColLarge" class="column">
    <script type="text/javascript">
        var update_url = "<?=site_url('main/sort_members_alt')?>";
        var get_member = '<?=site_url('main/alt_layout_fetch_member')?>';
    </script>
    <h1>Members</h1>
    <div class="heading">
        Members Alphabetically
    </div>
    <div class="letter-col">
        <?php
            for($i = 65; $i < 91; $i++)
            {
                //echo '<a class="sort_letter" href="#" onClick="getContent(\''.chr($i).'\', 1);">'.chr($i).'</a>';
                echo '<a class="sort_letter" href="#" value="fooobar">'.chr($i).'</a><br>';
            }
        ?>
    </div>
    <div class="letter-results" id="member_results">
    </div>
    <div class="member-profile" id="member-profile">

    </div>
</div>




