<script>
var apiUrl = "<?php print api_url(); ?>";
</script>


<div class="card style-1 mb-3 ">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="mdi mdi-fruit-cherries text-primary mr-3"></i><strong>Admin Encontrar</strong>
        </h5>
    </div>
    <div class="card-body pt-3" id="app">
        @verbatim
        <div class="mw-packages-browser-nav-tabs-nav">
            <div class="row">
                <div class="col-12">
                    <nav class="nav nav-pills nav-justified btn-group btn-group-toggle btn-hover-style-3">
                        <a class="btn btn-outline-secondary justify-content-center active" data-bs-toggle="tab"
                            id="js-packages-tab-template" href="#template"><i class="mdi mr-1 mdi-pencil-ruler"></i>
                            Categorias
                        </a>
                        <a class="btn btn-outline-secondary justify-content-center" data-bs-toggle="tab"
                            id="js-packages-tab-module" href="#module"><i class="mdi mr-1 mdi-view-grid-plus"></i>
                            Module
                        </a>
                        <a class="btn btn-outline-secondary justify-content-center" data-bs-toggle="tab"
                            href="#template-updates">Template Updates&nbsp; <sup
                                class="badge badge-success badge-sm badge-pill">3</sup>
                        </a>
                    </nav>
                    <div class="tab-content py-3">
                        <div class="tab-pane fade active show" id="template">
                            <?php include_once($config['path_to_module'].'admin_categories.php'); ?>
                        </div>
                        <div class="tab-pane fade" id="module">2</div>
                        <div class="tab-pane fade" id="template-updates">3</div>
                    </div>
                </div>
            </div>
        </div>
        @endverbatim
    </div>
</div>


<link rel="stylesheet" href="<?php print $config['url_to_module']; ?>/css/admin.css">
<script type="module" src="<?php print $config['url_to_module']; ?>/js/script.js"></script>