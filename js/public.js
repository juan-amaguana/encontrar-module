import { createApp } from "https://unpkg.com/vue@3/dist/vue.esm-browser.js";

const app = createApp({
  data() {
    return {
      types: [
        { id: 1, title: "Área temática", icon: moduleUrl + "/img/tematica.png" },
        { id: 2, title: "Problemas", icon: moduleUrl + "/img/problemas.png" },
        { id: 3, title: "Acceso geográfico", icon: moduleUrl + "/img/maps.png" },
      ],
      categoriesFilter: [],
    };
  },
  methods: {
    getCategories() {
      var self = this;

      const url = apiUrl + "get_enc_filter_categories";
      var get = $.get(url);
      get.done(function (data) {
        console.log(data);
        self.categoriesFilter = data;
      });
    },
  },
  mounted() {
    this.getCategories();
  },
});

app.mount("#app");
