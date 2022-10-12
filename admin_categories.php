<div class="row">
    <div class="col-md-12">
        <button v-on:click="addCategory()" type="button" class="btn btn-primary btn-sm btn-icon px-3">Agregar categoria
            padre
        </button>
    </div>
</div>
<br>
<div class="accordion" id="accordionExample">
    <div class="accordion-item" v-if="categories.length > 0" v-for="category in categories">
        <div class="content-buttons">
            <button class="accordion-button collapsed" style="background-color: #fff;" type="button"
                data-bs-toggle="collapse" :data-bs-target="'#collapse'+ category.id" aria-expanded="true"
                :aria-controls="'collapse'+ category.id">
                {{category.position}} - {{category.name}} ({{ getTypeTxt(category.type) }})
            </button>
            <div class="position-absolute top-50 translate-middle main-actions">
                <a v-on:click="editCategory(children)" class="btn btn-outline-success btn-sm me-1">Editar</a>
                <a class="btn btn-outline-danger btn-sm me-1">Eliminar</a>
            </div>
        </div>

        <div :id="'collapse'+ category.id" class="accordion-collapse collapse" :aria-labelledby="'heading'+ category.id"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <table class="table" v-if="category.children && category.children.length > 0">
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
                            <td>{{children.position}}</td>
                            <td>
                                <a v-on:click="editCategory(children)"
                                    class="btn btn-outline-success btn-sm me-1">Editar</a>
                                <a class="btn btn-outline-danger btn-sm me-1">Eliminar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div style="text-align: center;">
                    <a v-on:click="addSubCategory(category)" href="#">Agregar subcategoria</a>
                </div>
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
                <select v-if="!parent" v-model="type" class="form-select" aria-label="Default select example">
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