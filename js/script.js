import { createApp } from "https://unpkg.com/vue@3/dist/vue.esm-browser.js";

const app = createApp({
  data() {
    return {
      types: [
        { id: 0, title: "Selecciona el tipo" },
        { id: 1, title: "Area tematica" },
        { id: 2, title: "Problemas" },
      ],
      categories: [],
      currentCategory: {},
      modalOptions: {
        title: "",
        error: "",
      },
      // form items
      type: 0, // defaul
      title: null,
      position: null,
    };
  },
  methods: {
    getCategories() {
      var self = this;

      const url = apiUrl + "get_enc_categories";
      var get = $.get(url);
      get.done(function (data) {
        self.categories = data;
        console.log(self.categories);
      });
    },
    addCategory() {
      this.modalOptions.title = "Crear categoria padre";
      var myModal = new bootstrap.Modal(document.getElementById("exampleModal"));
      myModal.show();
    },
    saveCategory() {
      this.modalOptions.error = "";
      if (!this.title || !this.position || this.type === 0) {
        this.modalOptions.error = "Porfavor completa los campos requeridos";
      }

      try {
        const url = apiUrl + "save_enc_categories";
        const form = {};
        form.name = this.title;
        form.position = this.position;
        form.type = this.type;

        var post = $.post(url, form);
        var self = this;

        post.done(function (data) {
          bootstrap.Modal.getOrCreateInstance(document.getElementById("exampleModal")).hide();
          self.getCategories();
          self.clearForm();
        });
      } catch (error) {
        console.log("save category:", error);
      }
    },
    editCategory(children) {
      console.log(children);
      var myModal = new bootstrap.Modal(document.getElementById("exampleModal"));
      myModal.show();
    },
    clearForm() {
      this.title = null;
      this.position = null;
      this.type = 0;
    },
  },
  mounted() {
    this.getCategories();
  },
});

app.mount("#app");
