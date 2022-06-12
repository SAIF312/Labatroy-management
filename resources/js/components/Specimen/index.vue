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
                  <h6 class="m-0 font-weight-bold text-primary">Soecimen List</h6>
                  <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="specimen in filtersearch" :key="specimen.id">
                        <td> {{ specimen.name }} </td>
            <td>
   <router-link :to="{name: 'edit_specimen', params:{id:specimen.id}}" class="btn btn-sm btn-primary">Edit</router-link>

 <a @click="deletespecimen(specimen.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
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
        specimens:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.specimens.filter(specimen => {
         return specimen.name.match(this.searchTerm)

      })

      }
    },

  methods:{
    allSpecimen(){
        if(User.role() == 2){
            let id = User.Admin_id();
            axios.get('/api/data/specimen/'+id)
      .then(({data}) => (this.specimens = data))
      .catch()
        }
        else{
            let id = User.id();
            axios.get('/api/data/specimen/'+id)
      .then(({data}) => (this.specimens = data))
      .catch()
        }

    },
  deletespecimen(id){
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
                axios.delete('/api/specimen/'+id)
               .then(() => {
                this.specimens = this.specimens.filter(specimen => {
                  return specimen.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'all_specimen'})
               })
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })

  }

  },
  created(){
    this.allSpecimen();
  }


  }
</script>


<style type="text/css">

</style>
