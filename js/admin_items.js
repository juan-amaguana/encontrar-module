import { createApp } from "https://unpkg.com/vue@3/dist/vue.esm-browser.js";

const app = createApp({
  data() {
    return {
      items: [],
    };
  },
  methods: {
    async listItems(page) {
      const result = await this.getRequest(`get_enc_list_items?page=${page}`);
      this.items = result;
    },
    goPage(link) {
      console.log(link.url);
      if (link.url) {
        const url = new URL(link.url);
        const searchParams = url.searchParams;
        const page = searchParams.get("page");
        this.listItems(page);
      }
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
    this.listItems();
  },
});

app.mount("#adminItems");
