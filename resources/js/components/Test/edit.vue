<template>
    <!DOCTYPE html>
<html lang="en">

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
                                            <h5>Update Supplier</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form class="user" @submit.prevent="Supplier_update">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                             <input type="text" class="form-control" id="exampleInputFirstName"  v-model="form.Testname">
                            <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small>
                            </div>

                            <div class="col-md-6">
                             <input type="number" class="form-control" id="exampleInputFirstName"  v-model="form.Testrate">
                              <small class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </small>
                            </div>
                        </div>

                    </div>



                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Update</button>
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


</html>
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
        Testname: '',
        Testemail: '',

      },
      errors:{}
    }
  },
created(){
  	let id = this.$route.params.id
  	axios.get('/api/test/'+id)
  	.then(({data}) => (this.form = data))
  	.catch(console.log('error'))
  },
  methods:{

    Supplier_update(){
        let id = this.$route.params.id
        axios.patch('/api/test/'+id, this.form)
        .then(()=>{

          this.$router.push({name:'all_test'})
        Toast.fire({
        icon: 'success',
        title: 'Test Updated Successfully'


        })
        })
        .catch(error=>this.errors = errors.response.data.errors)


    }
  }
}
</script>

<style>

</style>
