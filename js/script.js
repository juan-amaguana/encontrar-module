import { createApp } from "https://unpkg.com/vue@3/dist/vue.esm-browser.js";

const app = createApp({
  data() {
    return {
      types: [],
      categories: [],
      currentCategory: {},
      modalOptions: {
        title: "",
        error: "",
      },
      // form items
      parent: null,
      type: 0, // defaul
      title: null,
      position: null,
    };
  },
  methods: {
    async getTypes() {
      this.types = await this.getRequest("get_enc_types");
      this.types.unshift({ id: 0, title: "Selecciona el tipo" });
    },
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
      this.parent = null;
      this.modalOptions.title = "Crear categoria padre";
      var myModal = new bootstrap.Modal(document.getElementById("exampleModal"));
      myModal.show();
    },
    addSubCategory(parentCategory) {
      this.modalOptions.title = "Crear categoria hija";
      this.type = parentCategory.type;
      this.parent = parentCategory.id;

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

        if (this.parent) {
          form.parent = this.parent;
        }

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
    async getRequest(method) {
      try {
        const url = apiUrl + method;
        var get = $.get(url);
        const result = await get.done(function (data) {
          console.log(`Result ${method}:`, data);
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
    this.getTypes();
    this.getCategories();
  },
});

app.mount("#app");
