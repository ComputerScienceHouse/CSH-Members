<div id="leftColLarge" class="column">
    <script type="text/javascript">
        var update_url = "<?=site_url('search/search_members')?>";
    </script>
    <h1>Member Search</h1>
    <div class="heading">
        Search Members
    </div>
    <div class="content">
        <?php
            $form = Form_Framework::search_form();

            foreach($form as $item)
            {
                echo $item;
            }
        ?>
    </div>
    <div class="heading">
        Search Results
    </div>
    <div class="content" id="results"></div>
</div>





