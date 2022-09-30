hola aqui va el detalle
<?php
// <module type="encontrar" is-detail="true"  />
$urlModule = $config['url_to_module'];

if (isset($_GET['itemId']) && $_GET['itemId'] !== ""){
    echo $_GET['itemId'];
?>
<script>
var itemId = "<?php print $_GET['itemId']; ?>";
console.log("ver detalle del id:", itemId);
</script>
<?php
}
?>
<div id="app">
    <div class="container-fluid" style="background: #C1CCCF;">
        <div class="container enc-detail-top">
            <div class="row">
                <div class="col-md-5 p-3 ecn-social">
                    Compartir e imprimir
                    <img src="<?= $urlModule."img/icon-tw.png" ?>" />
                    <img src="<?= $urlModule."img/icon-fb.png" ?>" />
                    <img src="<?= $urlModule."img/icon-mail.png" ?>" />
                    <img src="<?= $urlModule."img/icon-print.png" ?>" />
                </div>
                <div class="col-md-7 p-3 text-end ecn-views">
                    1234 Vistas
                    <img src="<?= $urlModule."img/icon-view.png" ?>" />
                </div>
            </div>
        </div>
    </div>


    <div class="container p-3">
        <!-- RESUMEN STATIC -->
        <div class="row gx-0 ecn_collapse_head" style="background: peru;">
            <div class="col-md-6 ps-3 pe-3 pt-2 pb-2">
                <p>TEMÁTICA</p>
            </div>
            <div class="col-md-6 ps-3 pe-3 pt-2 pb-2 text-end">
                <div data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"
                    aria-controls="collapseExample">
                    <i class="far fa-arrow-alt-circle-up"></i>
                </div>
            </div>
        </div>
        <div class="col-md-12 collapse show ecn_collapse_body" id="collapseExample">
            <div class="row gx-0 ">
                <div class="col-md-6 pe-5 align-self-center text-end">
                    <h1 class="align-middle">{{detail.title}}</h1>
                </div>
                <div class="col-md-6">
                    <img src="<?= $urlModule."img/default-detail.jpg" ?>" />
                    <ul class="list-group text-end ecn_list_categories">
                        <li v-for="category in detail.categories" class="list-group-item pt-3 pb-3">
                            {{category.category.name}}
                            <strong v-if="category.category.description"> <br>{{category.category.description}}</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- RESUMEN STATIC -->

        <!-- ITEMS DINAMIC -->
        <div v-if="detail.details" v-for="det in detail.details">
            <div class="row gx-0 ecn_collapse_head mt-5"
                :style="{background: det.items && det.items.color ? det.items.color : '#F7941D' }">
                <div class="col-md-6 ps-3 pe-3 pt-2 pb-2">
                    <p>{{det.header}}</p>
                </div>
                <div class="col-md-6 ps-3 pe-3 pt-2 pb-2 text-end">
                    <div data-bs-toggle="collapse" :data-bs-target="'#collapse'+det.id" aria-expanded="false"
                        :aria-controls="'collapse'+det.id">
                        <i class="far fa-arrow-alt-circle-up"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-12 collapse show ecn_collapse_body" :id="'collapse'+det.id">
                <div v-if="det.description" class="row gx-0 mt-4">
                    <div class="col-md-12 ecn_item_description" v-html="det.description">
                    </div>
                </div>

                <div v-if="det.items && det.items.sub_items && det.items.sub_items.length > 0" class="row mt-4">
                    <div v-for="subItem in det.items.sub_items" class="mt-2 mb-2"
                        :class="subItem.item_size ? subItem.item_size : 'col-md-12'">
                        <div v-if="subItem.title && subItem.title!== ''" class="ecn_list_items_title mb-3">
                            {{ subItem.title }}
                        </div>
                        <div v-if="subItem.description && subItem.description!= ''"
                            :style="{'border-color': det.items.color ? det.items.color : '#F7941D' }"
                            v-html="subItem.description" class="p-3 ecn_list_items ">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END ITEMS DINAMIC -->
    </div>

</div>

<br>


<link rel="stylesheet" href="<?php print $config['url_to_module']; ?>/css/item_detail.css">
<script type="module" src="<?php print $config['url_to_module']; ?>/js/item_detail.js"></script>