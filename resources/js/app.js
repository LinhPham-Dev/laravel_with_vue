require("./bootstrap");
import router from "./routes.js";

import { createApp } from "vue";

import App from "./components/App.vue";

createApp({
    components: { App },
})
    .use(router)
    .mount("#app");
