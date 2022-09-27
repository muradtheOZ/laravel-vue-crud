import { createWebHistory,createRouter } from "vue-router";
import Home from "./pages/home.vue";
import AddEmployee from './pages/addEmployee.vue';
import EditEmployee from './pages/editEmployee.vue';


// make routes variable
const routes = [
    { path: '/employees',name:'Home',component: Home },
    // { path: '/',name:'Home',component: Home },
    { path: '/add-employee',name:'AddEmployee',component: AddEmployee },
    { path: '/employee/edit/:id',name:'EditEmployee',component: EditEmployee, props:true },

];

// create router
const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;