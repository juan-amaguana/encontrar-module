import { createApp } from "https://unpkg.com/vue@3/dist/vue.esm-browser.js";

const app = createApp({
  data() {
    return {
      detail: "hola mundo",
    };
  },
  methods: {
    async itemById(id) {
      this.detail = await this.getRequest("get_enc_items_by_id?itemId=" + id);
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
    this.itemById(itemId);
  },
});

app.mount("#app");
