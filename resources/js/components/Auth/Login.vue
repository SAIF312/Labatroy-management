<template>
   <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-unlock auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Login</h3>
                    <form class="user" @submit.prevent="login">
                    <div class="input-group mb-3">
                         <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address" v-model="form.email" >

                    </div>
                    <div>
                         <small class="text-danger" v-if="errors.email" > {{ errors.email[0] }}</small>
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" v-model="form.password" >

                    </div>
                    <div>
                         <small class="text-danger" v-if="errors.password" > {{ errors.password[0] }}</small>
                    </div>
                    <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                            <label for="checkbox-fill-a1" class="cr"> Save Details</label>
                        </div>
                    </div>
                    <button class="btn btn-primary shadow-2 mb-4">Login</button>
                    </form>
                    <p class="mb-2 text-muted">Forgot password? <router-link to="ForgotPassword">Reset</router-link></p>
                    <p class="mb-0 text-muted">Don’t have an account? <router-link to="Register">Create an Account</router-link></p>
                </div>
            </div>
        </div>
    </div>

</template>
<script type="text/javascript">



export default{


  created(){

    if(User.loggedIn() && User.role() == 2){

      this.$router.push({name:'Home'})


    }
     if(User.loggedIn() && User.role()==1){

      this.$router.push({name:'Admin'})


    }



  },

  data(){
    return{
      form:{
        email: null,
        password: null
      },
      errors:{}
    }
  },
  methods: {

    login(){

       axios.post('/api/auth/login', this.form)
      .then( res =>
      { User.responseAfterLogin(res)
       Toast.fire({
      icon: 'success',
      title: "Login successfully"

                })
                 window.location.reload(self);

                if( User.role() == '2'){

                    this.$router.push({ name : 'Home' })

                }
                else
                {

                        this.$router.push({ name : 'Admin' })

                }

       })
       .catch(error => this.errors = Toast.fire({
      icon: 'error',
      title: "email or password incorrect",
                }))







    }


  }



}




</script>

<style>

</style>
