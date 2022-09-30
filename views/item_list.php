<div id="app">
    <!-- TABS -->
    <div class="row ecn_content_types" style="padding-right: 15%; padding-left: 15%">
        <div v-for="type in types" class="col-md-4" style="text-align:center;">
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
    <!-- TABS -->


    <!-- STATIC SECTION -->
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
    <!-- STATIC SECTION -->

    <!-- FILTERS -->
    <div v-if="typeActive && typeActive.id == 1" class="row g-0 ecn_content_filters">
        <div v-for="category in categories" class="col-md">
            <div class="ecn_category_header p-3" :style="{background: category.color}">
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
                        :aria-labelledby="'heading'+ category.id" :data-bs-parent="'#accordion'+ category.id">
                        <div class="accordion-body overflow-auto" style="max-height: 260px;">
                            <div v-for="children in category.children" class="row g-1 ecn_space"
                                :class="children.disabled ? 'disabled_checkbox': ''">
                                <div v-if="category.isCountry" class="col-md-1">
                                    <input class="form-check-input me-1" type="checkbox" v-model="children.checked"
                                        @change="filterItems($event,children,true)" aria-label="">
                                </div>
                                <div v-if="!category.isCountry" class="col-md-1">
                                    <input class="form-check-input me-1" type="checkbox" v-model="children.checked"
                                        :id="children.id" :disabled="children.disabled ? true: false"
                                        @change="filterItems($event,children,false)" aria-label="">
                                </div>
                                <div class="col-md-11">
                                    {{children.name}}
                                    <div v-if="children.description" class="ecn_cat_description">
                                        {{ children.description}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-me-12 mt-5 text-center">
            <button v-on:click="validateExistence([], true)" class="ecn_button_all">VER TODAS LAS FICHAS</button>
        </div>
    </div>
    <!-- END FILTERS -->

    <!-- OTHER RESULTS -->
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


    <!-- RESULT FILTERS  -->
    <div v-if="items && items.length > 0" class="row ecn_content_cards" data-masonry='{"percentPosition": true }'>
        <transition-group name="slide-fade" appear>

            <div v-for="item in items" class="col-md-3">
                <div class="card ecn_card animate__animated animate__fadeInUp">
                    <div class="ecn_card_img">
                        <img :src="defaultIcons.defaultCard" alt="">
                        <div>
                            {{item.country.name}}
                        </div>
                    </div>
                    <div class="p-4 ecn_card_title">
                        {{item.title}}
                    </div>
                    <div v-if="item.addressCard" class="p-4 ecn_card_adddres" v-html="item.addressCard.description">
                    </div>
                    <div class="p-4 ecn_card_problem">
                        <strong>Problemas que atiende</strong><br>
                        Enfrentar la mayor
                        incidencia y aparición
                        de plagas y
                        enfermedades
                    </div>
                    <div class="p-3 ecn_card_date">
                        {{item.created_at}}
                    </div>
                </div>
            </div>

        </transition-group>
    </div>
</div>

<link rel="stylesheet" href="<?php print $config['url_to_module']; ?>/css/item_list.css">
<script type="module" src="<?php print $config['url_to_module']; ?>/js/item_list.js"></script>