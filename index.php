<script>
var apiUrl = "<?php print api_url(); ?>";
var moduleUrl = "<?php print $config['url_to_module']; ?>";
</script>


<div class="row" id="app">
    <div v-for="type in types" class="col-md">
        <div class="icon-category">
            <img :src="type.icon" alt="">
        </div>
        <div class="description">
            Búsqueda por {{type.title}} de cada experiencia
        </div>
        <div class="footer-category">

        </div>
    </div>
</div>


<script type="module" src="<?php print $config['url_to_module']; ?>/js/public.js"></script>