import { createWebHistory,createRouter } from "vue-router";
import Home from "./pages/home.vue";
import AddEmployee from './pages/addEmployee.vue';
import EditEmployee from './pages/editEmployee.vue';


// make routes variable
const routes = [
    { path: '/employees',name:'Employee',component: Home },
    { path: '/add-employee',name:'AddEmployee',component: AddEmployee },
    { path: '/employee/:id',name:'EditEmployee',component: EditEmployee, props:true },
    { path: '/',name:'Home',component: Home },

];

// create router
const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;