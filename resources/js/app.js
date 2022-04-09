require("./bootstrap");
import router from "./routes.js";

import { createApp } from "vue";

import App from "./components/App.vue";

import { library } from "@fortawesome/fontawesome-svg-core";
import { faPhone, faStar } from "@fortawesome/free-solid-svg-icons";

library.add(faPhone, faStar);

import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

createApp({
    components: { App },
})
    .component("font-awesome-icon", FontAwesomeIcon)
    .use(router)
    .mount("#app");
