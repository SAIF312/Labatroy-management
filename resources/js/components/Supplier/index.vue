

<template>

  <div>

<br>

<br>


<div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
   <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
                  <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Phone</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="supplier in filtersearch" :key="supplier.id">
                        <td class="employee_name"> <img :src="supplier.photo" id="em_photo"> {{ supplier.name }} </td>
                        <td>{{ supplier.phone }}</td>
                     <td>
   <router-link :to="{name: 'edit_supplier', params:{id:supplier.id}}" class="btn btn-sm btn-primary">Edit</router-link>

 <a @click="deleteSupplier(supplier.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
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
        suppliers:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.suppliers.filter(supplier => {
         return supplier.name.match(this.searchTerm)

      })

      }
    },

  methods:{
    allEmployee(){
        let id = User.id();
        axios.get('/api/data/supplier/'+id)
       .then(({data}) => (this.suppliers = data))
       .catch()
    },
  deleteSupplier(id){
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
                axios.delete('/api/supplier/'+id)
               .then(() => {
                this.suppliers = this.suppliers.filter(supplier => {
                  return supplier.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'all_supplier'})
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
    this.allEmployee();
  }


  }
</script>



<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
    border-radius:50%;
    margin-right:5px;
  }
  .employee_name{
    font-weight: bold;
  }
.table td, .table th {
    padding: .75rem;
    vertical-align: middle;
    border-top: 1px solid #dee2e6;
}
</style>
