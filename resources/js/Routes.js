

let Login = require('./components/Auth/Login.vue').default;
let Register = require('./components/Auth/Register.vue').default;
let ForgotPassword = require('./components/Auth/ForgotPassword.vue').default;
let Home = require('./components/Home.vue').default;
let Logout = require('./components/Auth/Logout.vue').default;

// employee components
let Add_employee = require('./components/Employee/create.vue').default;
let all_employee = require('./components/Employee/index.vue').default;
let edit_employee = require('./components/Employee/edit.vue').default;

//Supplier routes
let Add_supplier = require('./components/Supplier/create.vue').default;
let all_supplier = require('./components/Supplier/index.vue').default;
let edit_supplier = require('./components/Supplier/edit.vue').default;

//Categbory routes
let Add_category = require('./components/Category/create.vue').default;
let all_category = require('./components/Category/index.vue').default;
let edit_category = require('./components/Category/edit.vue').default;

//Product Components
let Add_product = require('./components/Product/create.vue').default;
let all_product = require('./components/Product/index.vue').default;
let edit_product = require('./components/Product/edit.vue').default;
let stock = require('./components/Product/stock.vue').default;
let edit_stock = require('./components/Product/edit-stock.vue').default;

// Expenses Components

let Add_expense = require('./components/Expense/create.vue').default;
let all_expense = require('./components/Expense/index.vue').default;
let edit_expense = require('./components/Expense/edit.vue').default;

//Salary Components

let Add_salary = require('./components/Salary/create.vue').default;
let all_salary = require('./components/Salary/index.vue').default;
let edit_salary = require('./components/Salary/edit.vue').default;
let view_salary = require('./components/Salary/view.vue').default;
let pay_salary = require('./components/Salary/all_employees.vue').default;


// Customer Components

let Add_customer = require('./components/Customer/create.vue').default;
let all_customer = require('./components/Customer/index.vue').default;
let edit_customer = require('./components/Customer/edit.vue').default;

// point of sale component
let pointofsale = require('./components/Pos/pointofsale.vue').default;



// Order Component
let order = require('./components/Order/order.vue').default;
let vieworder = require('./components/Order/vieworder.vue').default;
let searchorder = require('./components/Order/search.vue').default;

// Patient Components
let add_patient  = require('./components/Patient/create.vue').default;
let all_patient  = require('./components/Patient/index.vue').default;
let edit_patient = require('./components/Patient/edit.vue').default;

// tests components

let add_test  = require('./components/Test/create.vue').default;
let all_test  = require('./components/Test/index.vue').default;
let edit_test = require('./components/Test/edit.vue').default;

// specimen components

let add_specimen  = require('./components/Specimen/create.vue').default;
let all_specimen  = require('./components/Specimen/index.vue').default;
let edit_specimen = require('./components/Specimen/edit.vue').default;

// User components
let add_user  = require('./components/User/create.vue').default;
let all_user  = require('./components/User/index.vue').default;
let edit_user = require('./components/User/edit.vue').default;



// Dashboard
let Admin  = require('./components/admin.vue').default;
let User  = require('./components/Home.vue').default;

// routes Section

export const routes = [
    { path: '/', component: Login , name:'/'},
    { path: '/Register', component: Register, name:'Register' },
    { path: '/ForgotPassword', component: ForgotPassword, name:'ForgotPassword' },
    { path: '/Home', component: Home, name:'Home' },
    { path: '/Logout', component: Logout, name:'Logout' },
        // Employee routes
    { path: '/add_employee', component: Add_employee, name:'add_employee' , meta: {
        auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}}},
    { path: '/all_employee', component: all_employee, name:'all_employee' },
    { path: '/edit_employee', component: edit_employee, name:'edit_employee' },

    // Supplier Routes

    { path: '/add_supplier', component: Add_supplier, name:'add_supplier' },
    { path: '/all_supplier', component: all_supplier, name:'all_supplier' },
    { path: '/edit_supplier', component: edit_supplier, name:'edit_supplier' },

    // Category Routes

    { path: '/add_category', component: Add_category, name:'add_category' },
    { path: '/all_category', component: all_category, name:'all_category' },
    { path: '/edit_category', component: edit_category, name:'edit_category' },

    //Product Routes

    { path: '/add_product', component: Add_product, name:'add_product' },
    { path: '/all_product', component: all_product, name:'all_product' },
    { path: '/edit_product', component: edit_product, name:'edit_product' },
    { path: '/stock', component: stock, name:'stock' },
    { path: '/edit_stock', component: edit_stock, name:'edit_stock' },

    // Expenses routes
    { path: '/add_expense', component: Add_expense, name:'add_expense' },
    { path: '/all_expense', component: all_expense, name:'all_expense' },
    { path: '/edit_expense', component: edit_expense, name:'edit_expense' },

    // Salary Routes

    { path: '/add_salary', component: Add_salary, name:'add_salary' },
    { path: '/all_salary', component: all_salary, name:'all_salary' },
    { path: '/edit_salary', component: edit_salary, name:'edit_salary' },
    { path: '/view_salary', component: view_salary, name:'view_salary' },
    { path: '/pay_salary', component: pay_salary, name:'pau_salary' },

    // Customer Routes


    { path: '/add_customer', component: Add_customer, name:'add_customer' },
    { path: '/all_customer', component: all_customer, name:'all_customer' },
    { path: '/edit_customer', component: edit_customer, name:'edit_customer' },

    //Point of sale
    { path: '/pointofsale', component: pointofsale, name:'pointofsale' },


    // order routes

    { path: '/order', component: order, name:'order'},
    { path: '/view-order/:id', component: vieworder, name:'view-order'},
    { path: '/searchorder', component: searchorder, name:'searchorder'},


    // Patient routes

    { path: '/add_patient', component: add_patient, name:'add_patient'},
    { path: '/all_patient', component: all_patient, name:'all_patient'},
    { path: '/edit_patient', component: edit_patient, name:'edit_patient'},


    // test routes
    { path: '/add_test', component: add_test, name:'add_test'},
    { path: '/all_test', component: all_test, name:'all_test'},
    { path: '/edit_test', component: edit_test, name:'edit_test'},

    //Specimen Routes
    { path: '/add_specimen', component: add_specimen, name:'add_specimen'},
    { path: '/all_specimen', component: all_specimen, name:'all_specimen'},
    { path: '/edit_specimen', component: edit_specimen, name:'edit_specimen'},


    // user routes

    { path: '/add_user', component: add_user, name:'add_user'},
    { path: '/all_user', component: all_user, name:'all_user'},
    { path: '/edit_user', component: edit_user, name:'edit_user'},

    // Dashboard

    { path: '/Admin', component: Admin, name:'Admin'},
    { path: '/User', component: User, name:'User'},

  ]
