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
                                            <h5>Add Test</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form class="user" @submit.prevent="addTest">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-sm-6">
                             <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Test Name" v-model="form.Testname">
                            <small class="text-danger" v-if="errors.Testname"> {{ errors.Testname[0] }} </small>
                            </div>

                            <div class="col-sm-6">
                             <input type="number" class="form-control" id="exampleInputFirstName" placeholder="Enter Test rate" v-model="form.Testrate">
                              <small class="text-danger" v-if="errors.rate"> {{ errors.rate[0] }} </small>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Add</button>
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


export default{

 created(){
       if (!User.loggedIn() || User.role() == 2) {
        this.$router.push({name: '/'})
      }
    },

    data(){
    return {
      form:{
        Testname: null,
        Testrate: null,
      },
      errors:{}
    }
  },
  methods:{

    addTest(){
       let Admin_id = User.id();
       var data = {Testname:this.form.Testname, Testrate:this.form.Testrate , Admin_id:Admin_id}
        axios.post('/api/test', data)
        .then(()=>{
        this.$router.push({name:'all_test'})
        Toast.fire({
        icon: 'success',
        title: 'Test inserted Successfully'


        })
        })
        .catch(error=>this.errors = errors.response.data.errors)


    }
  }
}
</script>

<style>

</style>
