import { createRouter, createWebHistory } from "vue-router";

const routes = [
   {
     path: "/",
     component: () => import("@/views/Home.vue"),
     meta: {
        public: true
     }
   }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

// router.beforeEach((to) => {
//   const token = localStorage.getItem("token");

//   if (!to.meta.public && !token) {
//     return "/login";
//   }

//   if (to.path === "/login" && token) {
//     return "/";
//   }
// });

export default router;
