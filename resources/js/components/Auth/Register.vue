<template>
    <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Register</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body>
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
                        <i class="feather icon-user-plus auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Sign up</h3>
                    <form class="user" @submit.prevent="Signup">
                    <div class="input-group mb-3">
                         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Name" v-model="form.name">
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address" v-model="form.email">
                    </div>
                    <div class="input-group mb-4">
                         <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" v-model="form.password">
                    </div>

                    <div class="input-group mb-4">
                        <input type="password" class="form-control" id="exampleInputPasswordRepeat"
                        placeholder="Confirm Password" v-model="form.password_confirmation">

                        <small class="text-danger" v-if="errors.password" > {{ errors.password[0] }}</small>
                    </div>





                    <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-1" checked="">
                            <label for="checkbox-fill-1" class="cr"> Save Details</label>
                        </div>
                    </div>
                    <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-2" id="checkbox-fill-2">
                            <label for="checkbox-fill-2" class="cr">Send me the <a href="#!"> Newsletter</a> weekly.</label>
                        </div>
                    </div>
                    <button class="btn btn-primary shadow-2 mb-4">Sign up</button>
                    </form>
                    <p class="mb-0 text-muted">Allready have an account? <Router-link to="/">Log in</router-link></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
</template>


<script type="text/javascript">


export default{

 created(){
      if (User.loggedIn()) {
        this.$router.push({name: 'Home'})
      }
    },

    data(){
    return {
      form:{
        name: null,
        email: null,
        password: null,
        password_confirmation: null
      },
      errors:{}
    }
  },
  methods:{
    Signup(){
      var data = {name:this.form.name, email:this.form.email, password:this.form.password, password_confirmation:this.form.password_confirmation, role:1}
      axios.post('/api/auth/Signup', data)
      .then(res => {
        User.responseAfterLogin(res)
        Toast.fire({
          icon: 'success',
          title: 'Signed in successfully'
        })
        this.$router.push({ name: 'Home'})
      })

       .catch(error =>this.errors = error.response.data.errors)

    }
  }



}




</script>

<style>

</style>
