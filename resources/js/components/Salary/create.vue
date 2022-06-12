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
                                <div class="col-sm-10">
                                    <div class="card">

                                        <div class="card-body">
                                            <h5>Pay Salary</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form class="user" @submit.prevent="SalaryPaid">

        <div class="form-group">

          <div class="form-row">
            <div class="col-md-6">
            	<label for="exampleFormControlSelect1"><b>Name</b></label>
         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Full Name" v-model="form.name">
       <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small>
            </div>


     <div class="col-md-6">
     	<label for="exampleFormControlSelect1"><b>Email</b></label>
         <input type="email" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Email" v-model="form.email">
         <small class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </small>
            </div>

          </div>
        </div>


         <div class="form-group">

          <div class="form-row">
            <div class="col-md-6">
      <label for="exampleFormControlSelect1"><b>Months</b></label>

  <select class="form-control" id="exampleFormControlSelect1" v-model="form.salary_month">
     <option value="January"> January </option>
     <option value="February"> February </option>
     <option value="March"> March </option>
     <option value="April"> April </option>
     <option value="May"> May </option>
     <option value="Jun"> Jun </option>
     <option value="July"> July </option>
     <option value="August"> August </option>
     <option value="September"> September </option>
     <option value="October"> October </option>
     <option value="November"> November </option>
     <option value="December"> December </option>


                      </select>
   <small class="text-danger" v-if="errors.salary_month"> {{ errors.salary_month[0] }} </small>
            </div>


     <div class="col-md-6">
     	<label for="exampleFormControlSelect1"><b>Salary</b></label>
         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Sallery" v-model="form.sallery">
         <small class="text-danger" v-if="errors.sallery"> {{ errors.sallery[0] }} </small>
            </div>

          </div>
        </div>







        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">PayNow</button>
        </div>

      </form>
                                                </div>
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

  export default {
    created(){
       if (!User.loggedIn() || User.role() == 2) {
        this.$router.push({name: '/'})
      }
    },

    data(){
    return {
      form:{
        name: '',
        email: '',
        salary_month: '',
        sallery: ''

      },
      errors:{}
    }
  },
  created(){
  	let id = this.$route.params.id
  	axios.get('/api/employee/'+id)
  	.then(({data}) => (this.form = data))
  	.catch(console.log('error'))
  },

  methods:{

  SalaryPaid(){
      let Admin_id = User.id();
  	  let id = this.$route.params.id
        let data = {name:this.form.name, email:this.form.email, salary_month:this.form.salary_month, sallery:this.form.sallery, Admin_id:Admin_id }
       axios.post('/api/salary/paid/'+id , data)
       .then(() => {
        this.$router.push({ name: 'all_salary'})
        Toast.fire({
        icon: 'success',
        title: 'Salary paid Successfully'
        })
       })
       .catch(error =>this.errors = error.response.data.errors)


     },
  }


  }

</script>

<style>

</style>
