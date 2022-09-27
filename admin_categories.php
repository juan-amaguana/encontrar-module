

<div class="accordion" id="accordionExample">
  <div class="accordion-item" v-if="categories.length > 0" v-for="category in categories">
    
    <div class="row accordion-header" :id="'heading'+ category.id">

        <div class="col-md-6">
          <h3>{{category.name}}</h3>
        </div>
        <div class="col-md-6">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse'+ category.id" aria-expanded="true" :aria-controls="'collapse'+ category.id">
          </button>
        </div>

    </div>

    <div :id="'collapse'+ category.id" class="accordion-collapse collapse" :aria-labelledby="'heading'+ category.id" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Padre</th>
                <th scope="col">Posicion</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="category.children && category.children.length > 0" v-for="children in category.children">
                <th scope="row">{{children.id}}</th>
                <td>{{children.name}}</td>
                <td> {{category.name}}</td>
                <td>0</td>
                <td>
                    <span class="badge bg-primary" v-on:click="editCategory(children)">Editar</span>
                    <span class="badge bg-danger">Eliminar</span>
                </td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


