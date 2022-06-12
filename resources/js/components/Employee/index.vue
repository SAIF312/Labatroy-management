

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
                  <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
                  <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Sallery</th>
                        <th>Joining Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr  v-for="employee in filtersearch" :key="employee.id">
                          <td class="employee_name"><img :src="employee.photo" id="em_photo"> {{ employee.name }} </td>
                        <td>{{ employee.phone }}</td>
                        <td >{{ employee.salary }}</td>
                        <td>{{ employee.jd }}</td>
            <td>
   <router-link :to="{name: 'edit_employee', params:{id:employee.id}}" class="btn btn-sm btn-primary">Edit</router-link>

 <a @click="deleteEmployee(employee.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
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
      return{
        employees:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.employees.filter(employee => {
         return employee.name.match(this.searchTerm)

      })

      }
    },

  methods:{
    allEmployee(){
        let id = User.id();
      axios.get('/api/data/employee/'+ id)
      .then(({data}) => (this.employees = data))
      .catch()
    },
  deleteEmployee(id){
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
                axios.delete('/api/employee/'+id)
               .then(() => {
                this.employees = this.employees.filter(employee => {
                  return employee.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'all_employee'})
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
