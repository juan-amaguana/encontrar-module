<script>
var apiUrl = "<?php print api_url(); ?>";
var moduleUrl = "<?php print $config['url_to_module']; ?>";
</script>


<div id="app">
    <div class="row ecn_content_types" style="padding-right: 15%; padding-left: 15%">
        <div v-for="type in types" class="col-md" style="text-align:center;">
            <div :class=" type.active ? 'ecn_ct_active': 'ecn_ct_inactive'" v-on:click="selectType(type)">
                <div class="icon-category">
                    <img :src="type.icon" alt="">
                </div>
                <div class="ecn_description">
                    Búsqueda por <strong>{{type.title}}</strong> de cada experiencia
                </div>
                <div class="footer-category">
                    <img :src="defaultIcons.type" alt=""> {{type.title}}
                </div>
            </div>
        </div>
    </div>


    <div v-if="!typeActive" class="row ecn_experiences">
        <div class="col-md-12 enc_exp_title">
            <img :src="defaultIcons.left" alt=""> Experiencias <img :src="defaultIcons.right" alt="">
        </div>

        <div class="col-md-12 enc_exp_text">
            Recuerde que puede AportAR a este repositorio con sus propias experiencias. Si considera que tiene una
            experiencia sistematizada o por sistematizar,  ingrese aquí al formulario para AportAR con su
            Experiencia.
        </div>
    </div>


    <div v-if="typeActive && typeActive.id == 1" class="row g-0 ecn_content_filters">
        <div v-for="category in categories" class="col-md">
            <div class="ecn_category_header" :style="{background: category.color}">
                {{ category.name}}
            </div>
            <div class="accordion" :id="'accordion'+ category.id">
                <div class="accordion-item">
                    <h2 class="accordion-header" :id="'heading'+ category.id">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            :data-bs-target="'#collapse'+ category.id" aria-expanded="true"
                            :aria-controls="'collapse'+ category.id">
                            Filtar por {{ category.name}}
                        </button>
                    </h2>
                    <div :id="'collapse'+ category.id" class="accordion-collapse collapse show"
                        :aria-labelledby="'heading'+ category.id" data-bs-parent="'#accordion'+ category.id">
                        <div class="accordion-body">
                            <div v-for="children in category.children" class="row g-1 ecn_space">
                                <div class="col-md-1">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                </div>
                                <div class="col-md-11">
                                    {{children.name}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div v-if="typeActive && typeActive.id == 2" class="row g-0 ecn_content_filters">
        <div class="row">
            <div class="col-md">
                No disponible
            </div>
        </div>
    </div>

    <div v-if="typeActive && typeActive.id == 3" class="row g-0 ecn_content_filters"
        style="padding-right: 5%; padding-left: 5%">
        <div class="row">
            <div class="col-md">
                No disponible
            </div>
        </div>
    </div>
</div>


<style>
.ecn_content_types .icon-category {
    margin-top: 25px;
}

.ecn_content_types .ecn_description {
    margin-top: 15px;
    padding: 0px 10px 0px 10px;
    font-size: 1.3rem;
}

.ecn_content_types .footer-category {
    margin-top: 25px;
    padding: 15px 0px 15px 0px;
    font-size: 2rem;
    background: #3F4C5D;
    color: #fff;
}

.ecn_ct_inactive {
    border: 2px solid #3F4C5D;
}

.ecn_ct_active {
    border: 2px solid #F7941D;
}

.ecn_ct_active .footer-category {
    background: #F7941D !important;
}

/* DIV STATIC */
.ecn_experiences {
    padding: 5% 15% 5% 15%;
    text-align: center;
}

.enc_exp_title {
    /*font-family: 'Montserrat';*/
    font-style: normal;
    font-weight: 400;
    font-size: 3rem;
    line-height: 46px;
    color: #C1502A;
}

.enc_exp_text {
    margin-top: 3%;
    font-size: 1.3rem;
    color: #777777;
}

/* FILTERS */
.ecn_content_filters {
    background: #FFEFDC;
    padding: 3% 5% 5% 5%
}

.ecn_category_header {
    color: #fff;
    font-size: 1rem;
    padding: 15px 10px 15px 10px;
}

.ecn_space {
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>

<script type="module" src="<?php print $config['url_to_module']; ?>/js/public.js"></script>