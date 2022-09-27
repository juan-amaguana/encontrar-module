
<script>
    var apiUrl = "<?php print api_url(); ?>";
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="mw-module-category-manager admin-side-content" id="app">
@verbatim
    <div class="card style-1 mb-3">
    <h1>Admin part my module</h1> 
    <?php include_once($config['path_to_module'].'admin_categories.php'); ?>
    </div>
@endverbatim
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>


<script type="module" src="<?php print $config['url_to_module']; ?>/js/script.js"></script>


