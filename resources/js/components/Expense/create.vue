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
                                            <h5>Add Expense</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form class="user" @submit.prevent="expenseInsert">

        <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
         <label for="exampleFormControlTextarea1"><b>Expense Details</b></label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="form.details"></textarea>
  <small class="text-danger" v-if="errors.details"> {{ errors.details[0] }} </small>
            </div>

 <div class="col-md-12"><br>
 	<label for="exampleFormControlTextarea1"><b>Expense Amount</b></label>
         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Amount" v-model="form.amount">
  <small class="text-danger" v-if="errors.amount"> {{ errors.amount[0] }} </small>
            </div>



          </div>
        </div>





        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },

    data(){
    return {
      form:{
        details: '',
        amount: '',

      },
      errors:{},
    }
  },

  methods:{

  expenseInsert(){
       let Admin_id = User.id();
       var data = {details:this.form.details, amount:this.form.amount , Admin_id:Admin_id}
       axios.post('/api/expense', data)
       .then(() => {
        this.$router.push({ name: 'all_expense'})
        Toast.fire({
        icon: 'success',
        title: 'Expense inserted Successfully'


        })
       })
       .catch(error =>this.errors = error.response.data.errors)
     },
  }


  }

</script>

<style>

</style>
