
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
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tests List</h6>
                  <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Rate</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="test in filtersearch" :key="test.id">
                        <td> {{ test.Testname }} </td>
                        <td>{{ test.Testrate }}</td>
            <td>
   <router-link :to="{name: 'edit_test', params:{id:test.id}}" class="btn btn-sm btn-primary">Edit</router-link>

  <a @click="deletetest(test.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
            </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->



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

</template>



<script type="text/javascript">

  export default {
    created(){
       if (!User.loggedIn() || User.role() == 2) {
        this.$router.push({name: '/'})
      }
    },
    data(){
      return{
        tests:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.tests.filter(test => {
         return test.Testname.match(this.searchTerm)

      })

      }
    },

  methods:{
    allTest(){

          if(User.role() == 2)
        {
            let id = User.Admin_id();
            axios.get('/api/data/test/'+id)
            .then(({data}) => (this.tests = data))
            .catch()
        }
        else{
             let id = User.id();
             axios.get('/api/data/test/'+id)
            .then(({data}) => (this.tests = data))
            .catch()
        }
    },
  deletetest(id){
             Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                axios.delete('/api/test/'+id)
               .then(() => {
                this.tests = this.tests.filter(test => {
                  return test.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'all_test'})
               })
                Swal.fire(
                  'Deleted!',
                  'Test has been deleted.',
                  'success'
                )
              }
            })

  }

  },
  created(){
    this.allTest();
  }


  }
</script>


<style type="text/css">

</style>
