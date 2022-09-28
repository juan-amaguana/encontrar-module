import { createApp } from "https://unpkg.com/vue@3/dist/vue.esm-browser.js";

const app = createApp({
  data() {
    return {
      defaultIcons: {
        type: moduleUrl + "/img/type.png",
      },
      types: [
        { id: 1, title: "Área temática", icon: moduleUrl + "/img/tematica.png", active: 0 },
        { id: 2, title: "Problemas", icon: moduleUrl + "/img/problemas.png", active: 0 },
        { id: 3, title: "Acceso geográfico", icon: moduleUrl + "/img/maps.png", active: 0 },
      ],
      typeActive: null,
      categories: [],
      countries: [],
      categoriesFilter: [],
    };
  },
  methods: {
    selectType(typeSelected) {
      for (const type of this.types) {
        if (typeSelected.id == type.id) {
          type.active = 1;
          this.typeActive = type;
        } else {
          type.active = 0;
        }
      }
    },
    async getCategoriesFilter() {
      this.categoriesFilter = await this.getRequest("get_enc_filter_categories");
    },
    async getCountries() {
      this.countries = await this.getRequest("get_enc_countries");
    },
    async getCategories() {
      this.categories = await this.getRequest("get_enc_categories");
    },
    async getRequest(method) {
      try {
        const url = apiUrl + method;
        var get = $.get(url);
        const result = await get.done(function (data) {
          console.log(`Result ${method}:`, data);
          self.countries = data;
        });
        return result;
      } catch (error) {
        return {
          error: err.message,
        };
      }
    },
  },
  mounted() {
    this.getCategories();
    this.getCountries();
    this.getCategoriesFilter();
  },
});

app.mount("#app");
