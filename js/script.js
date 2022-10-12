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
        action: "save", // save, update, delete
      },
      // form items
      category: {
        id: null,
        name: null,
        color: null,
        parent: null,
        type: 0, //default
        position: null,
      },
    };
  },
  methods: {
    async getTypes() {
      this.types = await this.getRequest("get_enc_types");
      // this.types.unshift({ id: "", title: "Selecciona el tipo" });
    },
    getTypeTxt(id) {
      const foundType = this.types.find((type) => type.id == id);
      if (foundType) {
        return foundType.title;
      }
      return "not found";
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
      this.modalOptions.title = "Crear categoria padre";
      this.clearForm();
      var myModal = new bootstrap.Modal(document.getElementById("exampleModal"));
      myModal.show();
    },
    addSubCategory(parentCategory) {
      this.clearForm();
      this.modalOptions.title = "Crear categoria hija";
      this.category.type = parentCategory.type;
      this.category.parent = parentCategory.id;

      var myModal = new bootstrap.Modal(document.getElementById("exampleModal"));
      myModal.show();
    },
    saveCategory() {
      this.modalOptions.error = "";
      if (!this.category.name || !this.category.position) {
        this.modalOptions.error = "Porfavor completa los campos requeridos";
        return;
      }

      try {
        const url = apiUrl + "save_enc_categories";
        const form = JSON.parse(JSON.stringify(this.category));
        console.log(form);
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
    editCategory(category) {
      console.log(category);
      this.category = category;
      this.modalOptions.title = "Actualizar categoria";
      this.modalOptions.action = "update";
      var myModal = new bootstrap.Modal(document.getElementById("exampleModal"));
      myModal.show();
    },
    updateCategory() {
      this.modalOptions.error = "";
      if (!this.category.name || !this.category.position) {
        this.modalOptions.error = "Porfavor completa los campos requeridos";
        return;
      }

      try {
        const url = apiUrl + "update_enc_categories";
        const form = JSON.parse(JSON.stringify(this.category));
        console.log(form);
        var post = $.post(url, form);
        var self = this;
        post.done(function (data) {
          bootstrap.Modal.getOrCreateInstance(document.getElementById("exampleModal")).hide();
          self.getCategories();
          self.clearForm();
        });
      } catch (error) {
        console.log("update category:", error);
      }
    },
    clearForm() {
      this.category = {
        id: null,
        name: null,
        color: null,
        parent: null,
        type: 0, //default
        position: null,
      };
      this.modalOptions.error = "";
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
