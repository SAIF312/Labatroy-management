<template>


<div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->

                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                          <!-- =============================================================================================================
                          ==================================================================================================================
                          =================================================================================================================
                          ================================================================================================================= -->

<div class="row">
     <div class="card text-center" style="width:50%;">
                <div class="card-body">
                    <div class="mb-4">
                        <i class="feather icon-user-plus auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Create an employee account</h3>


                    <div  v-for="employeecart in employeecarts" :key="employeecart.id" >
                                    <div class="row">
                                <h1 class="col-1-xl"> {{employeecart.name}} </h1>
                                <button  @click="removeItem(employeecart.id)"   class="btn-primary">x</button>
                             </div>

                    </div>
                    <form class="user" @submit.prevent="Create">
                         <!-- <tr v-for="carttest in carttests" :key="carttest.id"> -->

                             <div style="display:none;" v-for="employeecart in employeecarts" :key="employeecart.id" >
                                   <div class="input-group mb-4">
                                <h1> {{employeecart.name}} </h1>
                            {{ Admin_id = employeecart.Admin_id}}>
                            {{ Employee_id = employeecart.employee_id}}>
                           {{ name = employeecart.name}}>
                           {{ email = employeecart.email}}>
                    </div>

                             </div>

                    <div class="input-group mb-4">
                         <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" v-model="form.password">
                    </div>

                    <div class="input-group mb-4">
                        <input type="password" class="form-control" id="exampleInputPasswordRepeat"
                        placeholder="Confirm Password" v-model="form.password_confirmation">

                        <small class="text-danger" v-if="errors.password" > {{ errors.password[0] }}</small>
                    </div>
                    <button class="btn btn-primary shadow-2 mb-4">Create</button>
                    </form>
                </div>
            </div>
<div  class="col-xl-3 col-md-4  user">
    <div class="card card-event">
    <div class="card-block">
    <div class="card-header">
    <h5 class="m-0">Employee List</h5>
    </div>
    <input type="text" v-model="searchTerm" class="form-control" style="margin-bottom:3px;font-size:12px; padding:3.5px 3.5px 3.5px 3.5px;" placeholder="Search Patient">
    <div class="table-responsive abc">
    <table class="table align-items-center table-flush">
    <thead class="thead-light">
    <tr>
    <th>Name</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="employee in filtersearch" :key="employee.id">
    <td> {{ employee.name }} </td>
    <td>
    <button type="button" @click="InsertEmployee(employee.id)" class="btn btn-lg btn-warning" style="font-size:12px; padding:3.5px 3.5px 3.5px 3.5px;" >Select</button>
    </td>
    </tr>
    </tbody>
    </table>
    </div>





    </div>
    </div>

    </div>
</div>




                          <!-- =============================================================================================================
                          ==================================================================================================================
                          =================================================================================================================
                          ================================================================================================================= -->

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script type="text/javascript">


export default{

 created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }

    Reload.$on('AfterAdd',() =>{
    this.InsertEmployee();
    this.removeItem();
    })

    },

    data(){
      return{
        form:{
        role: null,
        password: null,
        password_confirmation:null,

      },
        errors:{},
        employees:[],
        employeecarts:[],
        searchTerm:''
      }
    },
   computed:{
      filtersearch(){
      return this.employees.filter(employee => {
         return employee.name.match(this.searchTerm)

      })

      }
    },
  methods:{
    InsertEmployee(id){
    let admin_id = User.id();
    axios.get('/api/addToCartemployee/'+id + admin_id)
    .then(() => {
    Reload.$emit('AfterAdd');
    Toast.fire({
    icon: 'success',
    title: 'Employee add'
    })
    })
    .catch()

     axios.get('/api/cart/employee')
      .then(({data}) => (this.employeecarts = data))

      .catch()

    },
    allEmployee(){
        let id = User.id();
      axios.get('/api/data/employee/'+id)
      .then(({data}) => (this.employees = data))
      .catch()
    },

     Create(){

      var data = {Admin_id:this.Admin_id, Employee_id:this.Employee_id, name:this.name, email:this.email , role: 2, password:this.form.password, password_confirmation:this.form.password_confirmation}
      axios.post('/api/auth/Create', data)
      .then(res => {
        Toast.fire({
          icon: 'success',
          title: 'Account create successfully'
        })
        this.$router.push({ name: 'all_user'})
      })

       .catch(error =>this.errors = error.response.data.errors)

    },
      removeItem(id){
    axios.get('/api/remove/employeecart/'+id)
    .then(() => {
    Reload.$emit('AfterAdd');
    Toast.fire({
    icon: 'success',
    title: 'row remove successfully'
    })
    })
    .catch()
    },

  },

  created(){
    this.allEmployee();
  }




}
</script>

<style>

</style>
