hola aqui va el detalle
<?php 

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
    {{ detail }}
</div>


<link rel="stylesheet" href="<?php print $config['url_to_module']; ?>/css/item_detail.css">
<script type="module" src="<?php print $config['url_to_module']; ?>/js/item_detail.js"></script>