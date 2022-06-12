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
                                            <h5>Add Specimen</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form class="user" @submit.prevent="addSpecimen">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-sm-6">
                             <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Name" v-model="form.name">
                            <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small>
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
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },

    data(){
    return {
      form:{
        name: null,
      },
      errors:{}
    }
  },
  methods:{

    addSpecimen(){
        let id = User.id();
        let data = {name:this.form.name , Admin_id:id}
        axios.post('/api/specimen', data)
        .then(()=>{
        this.$router.push({name:'all_specimen'})

        Toast.fire({
        icon: 'success',
        title: 'Specimen inserted Successfully'


        })
        })
        .catch(error=>this.errors = errors.response.data.errors)


    }
  }
}
</script>

<style>

</style>
