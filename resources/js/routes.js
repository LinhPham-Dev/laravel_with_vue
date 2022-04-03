import { createRouter, createWebHistory } from "vue-router";
import BookComponent from "./components/BookComponent.vue";
import BookDetailComponent from "./components/BookDetailComponent.vue";
import HomeComponent from "./components/HomeComponent.vue";
import NotFoundComponent from "./components/NotFoundComponent.vue";

const routes = [
    {
        path: "/",
        component: HomeComponent,
        name: "home",
    },
    {
        path: "/books",
        component: BookComponent,
        name: "books",
    },
    {
        path: "/book/:id",
        component: BookDetailComponent,
        name: "bookDetail",
    },
    {
        path: "/:pathMatch(.*)*",
        component: NotFoundComponent,
        name: "notFound",
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",
});
