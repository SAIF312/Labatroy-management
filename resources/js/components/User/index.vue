
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
                  <h6 class="m-0 font-weight-bold text-primary">Employee Accounts</h6>
                  <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Employee Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Password</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="useraccount in filtersearch" :key="useraccount.id">
                        <td> {{ useraccount.name }} </td>
                         <td> {{ useraccount.email }} </td>
                          <td> {{ useraccount.role }} </td>
                           <td> {{ useraccount.Password_indexes }} </td>
            <td>
   <router-link :to="{name: 'edit_useraccount', params:{id:useraccount.id}}" class="btn btn-sm btn-primary">Edit</router-link>

  <a @click="deleteuseraccount(useraccount.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
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
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },
    data(){
      return{
        useraccounts:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.useraccounts.filter(useraccount => {
         return useraccount.name.match(this.searchTerm)

      })

      }
    },

  methods:{
    alluseraccount(){
        var id = User.id();
      axios.get('/api/useraccount/' + id)
      .then(({data}) => (this.useraccounts = data))
      .catch()
    },
  deleteuseraccount(id){
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
                axios.delete('/api/useraccount/'+id)
               .then(() => {
                this.useraccounts = this.useraccounts.filter(useraccount => {
                  return useraccount.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'all_user'})
               })
                Swal.fire(
                  'Deleted!',
                  'useraccount has been deleted.',
                  'success'
                )
              }
            })

  }

  },
  created(){
    this.alluseraccount();
  }


  }
</script>


<style type="text/css">

</style>
