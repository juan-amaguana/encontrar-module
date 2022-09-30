import { createApp } from "https://unpkg.com/vue@3/dist/vue.esm-browser.js";

const app = createApp({
  data() {
    return {
      defaultIcons: {
        type: moduleUrl + "/img/type.png",
        right: moduleUrl + "/img/tright.png",
        left: moduleUrl + "/img/tleft.png",
        defaultCard: moduleUrl + "/img/default-card.jpg",
      },
      types: [
        { id: 1, title: "Área temática", icon: moduleUrl + "/img/tematica.png", active: 0 },
        { id: 2, title: "Problemas", icon: moduleUrl + "/img/problemas.png", active: 0 },
        { id: 3, title: "Acceso geográfico", icon: moduleUrl + "/img/maps.png", active: 0 },
      ],
      typeActive: null,
      categories: [],
      countriesFilter: [],
      categoriesFilter: [],
      items: [],
      formFilter: {
        country_ids: [],
        category_ids: [],
      },
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
      this.countriesFilter = {
        id: 0,
        name: "País",
        color: "#C1502A",
        position: 1,
        isCountry: true,
        children: [],
      };
      const result = await this.getRequest("get_enc_countries");
      for (const country of result) {
        this.countriesFilter.children.push(country);
      }
    },
    async getCategories() {
      this.categories = await this.getRequest("get_enc_categories");
      // this.categories.unshift(this.countriesFilter);
      // add checked status
      for (const category of this.categories) {
        for (const children of category.children) {
          children.checked = false;
          children.disabled = false;
        }
      }
    },
    async getItems(form = {}) {
      const result = await this.postRequest("get_enc_items", form);
      // transform data
      for (const item of result.items) {
        item.created_at = moment(item.created_at).format("MMMM , YYYY");
        for (const detail of item.details) {
          if (detail.type === "geographical_context") {
            //show in card;
            let foundAddress = await detail.items.sub_items.find((_item) => {
              if (_item.viewcard && _item.viewcard == 1) {
                return _item;
              }
            });
            item.addressCard = foundAddress;
            // console.log("result:", foundAddress);
          }
        }
      }
      this.items = result.items;
      // Validate categories
      await this.validateExistence(result.validCategoryIds);
    },
    async filterItems(event, children, isCountry) {
      if (isCountry) {
        /*if (children.checked) {
          this.formFilter.country_ids.push(children.id);
        } else {
          this.formFilter.country_ids = this.arrayRemove(this.formFilter.country_ids, children.id);
        }*/
      } else {
        if (children.checked) {
          this.formFilter.category_ids.push(children.id);
        } else {
          this.formFilter.category_ids = this.arrayRemove(
            this.formFilter.category_ids,
            children.id
          );
        }
      }

      if (this.formFilter.category_ids.length === 0) {
      }
      console.log("El formulario:", this.formFilter);
      await this.getItems(this.formFilter);
    },
    async validateExistence(categoryIds, viewall = false) {
      for (const category of this.categories) {
        for (const children of category.children) {
          if (categoryIds.length > 0) {
            const foundId = await categoryIds.find((id) => id === children.id);
            if (!foundId) {
              children.disabled = true;
            }
          } else {
            if (viewall) {
              // clear all filters
              children.checked = false;
              this.formFilter.category_ids = [];
              this.getItems();
            }
            children.disabled = false;
          }
        }
      }
    },
    arrayRemove(arr, value) {
      return arr.filter(function (ele) {
        return ele != value;
      });
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
    async postRequest(method, form) {
      try {
        const url = apiUrl + method;
        var post = $.post(url, form);
        const result = await post.done(function (data) {
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
    this.getCountries();
    this.getCategories();
    this.getCategoriesFilter();
    this.getItems();
  },
});

app.mount("#app");
