<div class="row">
    <div class="col-md-12">
        <button v-on:click="addCategory()" type="button" class="btn btn-primary">Agregar categoria padre</button>
    </div>
</div>
<br>
<div class="accordion" id="accordionExample">
    <div class="accordion-item" v-if="categories.length > 0" v-for="category in categories">

        <div class="row accordion-header" :id="'heading'+ category.id">

            <div class="col-md-6">
                <h3>{{category.name}}</h3>
            </div>
            <div class="col-md-6">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    :data-bs-target="'#collapse'+ category.id" aria-expanded="true"
                    :aria-controls="'collapse'+ category.id">
                </button>
            </div>

        </div>

        <div :id="'collapse'+ category.id" class="accordion-collapse collapse" :aria-labelledby="'heading'+ category.id"
            data-bs-parent="#accordionExample">
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
                        <tr v-if="category.children && category.children.length > 0"
                            v-for="children in category.children">
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> {{modalOptions.title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <select v-model="type" class="form-select" aria-label="Default select example">
                    <option v-for="type in types" :value="type.id">{{type.title}}</option>
                </select>
                <br>
                <div class="input-group">
                    <input v-model="title" type="text" class="form-control" placeholder="Nombre">
                </div>
                <br>
                <div class="input-group">
                    <input v-model="position" type="number" class="form-control" placeholder="Posición">
                </div>
                <br>
                <div style="color:red;text-align: center;">{{modalOptions.error}}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button v-on:click="saveCategory()" type="button" class="btn btn-primary">Guardar</button>
            </div>

        </div>
    </div>
</div>