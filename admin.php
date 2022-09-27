<script>
var apiUrl = "<?php print api_url(); ?>";
</script>


<div class="mw-module-category-manager admin-side-content" id="app">
    @verbatim
    <div class="card style-1 mb-3">
        <h1>Admin part my module</h1>
        <?php include_once($config['path_to_module'].'admin_categories.php'); ?>
    </div>
    @endverbatim
</div>


<script type="module" src="<?php print $config['url_to_module']; ?>/js/script.js"></script>