<script>
var apiUrl = "<?php print api_url(); ?>";
var moduleUrl = "<?php print $config['url_to_module']; ?>";
</script>


<div id="app">
    <div class="row" style="padding-right: 15%; padding-left: 15%">
        <div v-for="type in types" class="col-md" style="text-align:center;">
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


    <div class="row" style="padding-right: 5%; padding-left: 5%">
        <div class="col-md"></div>
    </div>
</div>



<script type="module" src="<?php print $config['url_to_module']; ?>/js/public.js"></script>