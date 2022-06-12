

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


import {routes} from './Routes'


//   Sweetalert2

import Swal from 'sweetalert2'

window.Swal = Swal;



window.Reload = new Vue;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

window.Toast = Toast;




const router = new VueRouter({
    routes, // short for `routes: routes`
    mode : 'history'
  })

// import user class
  import User from './Helpers/User'

  window.User = User;

  // import noty class
  import Notification from './Helpers/Notification'
  window.Notification = Notification;

const app = new Vue({
    el: '#app',
    router
});
