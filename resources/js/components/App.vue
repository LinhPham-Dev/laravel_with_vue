<template>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Vue and Laravel App</a>
            <div class="collapse navbar-collapse text-center">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'home' }"
                            >Home page</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'exam' }"
                            >Exam page</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'books' }"
                            >Books page</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'notFound' }"
                            >Error page</router-link
                        >
                    </li>
                </ul>
            </div>
        </nav>

        <div class="my-4"><router-view /></div>
    </div>
</template>
