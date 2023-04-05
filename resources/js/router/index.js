import { createRouter, createWebHistory } from 'vue-router'

import Dashboard from "../components/Dashboard";
import CustomerIndex from "../components/customers/index";
import CustomerCreate from "../components/customers/create";
import CustomerEdit from "../components/customers/edit";
import EmployeeIndex from "../components/employees/index";
import EmployeeCreate from "../components/employees/create";
import EmployeeEdit from "../components/employees/edit";
import ProductIndex from "../components/products/index";
import ProductCreate from "../components/products/create";
import ProductEdit from "../components/products/edit";
import OrderIndex from "../components/orders/index";
import OrderCreate from "../components/orders/create";
import OrderEdit from "../components/orders/edit";

const routes = [
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard
    },
    {
        path: '/customers',
        name: 'customers.index',
        component: CustomerIndex
    },
    {
        path: '/customer/create',
        name: 'customer.create',
        component: CustomerCreate
    },
    {
        path: '/customer/:id/edit',
        name: 'customer.edit',
        component: CustomerEdit,
        props: true
    },
    {
        path: '/employees',
        name: 'employees.index',
        component: EmployeeIndex
    },
    {
        path: '/employee/create',
        name: 'employee.create',
        component: EmployeeCreate
    },
    {
        path: '/employee/:id/edit',
        name: 'employee.edit',
        component: EmployeeEdit,
        props: true
    },
    {
        path: '/products',
        name: 'products.index',
        component: ProductIndex
    },
    {
        path: '/product/create',
        name: 'product.create',
        component: ProductCreate
    },
    {
        path: '/product/:id/edit',
        name: 'product.edit',
        component: ProductEdit,
        props: true
    },
    {
        path: '/orders',
        name: 'orders.index',
        component: OrderIndex
    },
    {
        path: '/order/create',
        name: 'order.create',
        component: OrderCreate
    },
    {
        path: '/order/:id/edit',
        name: 'order.edit',
        component: OrderEdit,
        props: true
    },
    {
        path: '/offices',
        name: 'offices.index',
        component: OrderIndex
    },
    {
        path: '/order/create',
        name: 'order.create',
        component: OrderCreate
    },
    {
        path: '/order/:id/edit',
        name: 'order.edit',
        component: OrderEdit,
        props: true
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})
