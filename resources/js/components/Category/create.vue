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
                                            <h5>Add Category</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form class="user" @submit.prevent="addCategory">


                                                         <div class="form-group">
                                                             <div class="row">

                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                                                                placeholder="Enter category name" v-model="form.CategoryName">

                                                                <!-- <small class="text-danger" v-if="errors"> {{ errors.CategoryName[0] }} </small> -->

                                                            </div>


                                                            <div class="col-md-3">
                                                            <button type="submit" class="btn btn-primary btn-block">Add</button>
                                                            </div>
                                                             </div>
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
        CategoryName: null,

      },
      errors:{}
    }
  },
  methods:{
    addCategory(){

        let Admin_id = User.id();
        let data = {CategoryName:this.form.CategoryName , Admin_id:Admin_id}
        axios.post('/api/category', data)
        .then(()=>{

        this.$router.push({name:'all_category'})
        Toast.fire({
        icon: 'success',
        title: 'Supplier inserted Successfully'


        })
        })
       .catch(error=>this.errors = errors.response.data.errors)


    }
  }
}
</script>

<style>

</style>
