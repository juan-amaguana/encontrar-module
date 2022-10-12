<div class="row">
    <div class="col-md-12">

        <table class="table" v-if="items.data">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Categorias</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items.data">
                    <th scope="row">{{ item.id }}</th>
                    <td class="item-title">{{ item.title }}</td>
                    <td class="item-categories">
                        <span v-for="cat in item.categories"> {{cat.category.name}},</span>
                    </td>
                    <td>{{ item.status }}</td>
                </tr>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-for="link in items.links" class="page-item" :class="link.active ? 'active' : ''">
                    <a class="page-link" href="#" v-html="link.label" v-on:click="goPage(link)"></a>
                </li>
            </ul>
        </nav>

    </div>
</div>