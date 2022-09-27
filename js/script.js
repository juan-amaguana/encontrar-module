import { createApp } from "https://unpkg.com/vue@3/dist/vue.esm-browser.js";

const app = createApp({
    data() {
        return {
            isDisabled: true,
            checked: false,
            categories: [],
            currentCategory: {},
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
        editCategory(children) {
            console.log(children);
            // $("#exampleModalLabel").modal("show");
            var myModal = new bootstrap.Modal(
                document.getElementById("exampleModal")
            );
            myModal.show();
        },
    },
    mounted() {
        this.getCategories();
    },
});

app.mount("#app");
