import { createRouter, createWebHistory } from "vue-router";
import HomeComponent from "./components/HomeComponent.vue";
import ExamComponent from "./components/ExamComponent.vue";
import NotFoundComponent from "./components/NotFoundComponent.vue";
import BookComponent from "./components/BookComponent.vue";

const routes = [
    {
        path: "/home",
        component: HomeComponent,
        name: "home",
    },
    {
        path: "/exam",
        component: ExamComponent,
        name: "exam",
    },
    {
        path: "/:pathMatch(.*)*",
        component: NotFoundComponent,
        name: "notFound",
    },
    {
        path: "/books",
        component: BookComponent,
        name: "books",
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
