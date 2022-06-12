

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
                  <h6 class="m-0 font-weight-bold text-primary">Patient List</h6>
                  <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Age</th>
                        <th>Reffered By</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="patient in filtersearch" :key="patient.id">
                           <td>{{ patient.id }}</td>
                        <td class="employee_name"> <img :src="patient.photo" id="em_photo"> {{ patient.name }} </td>
                        <td>{{ patient.phone }}</td>
                        <td>{{ patient.age }}</td>
                        <td>{{ patient.reffered_by }}</td>
            <td>
   <router-link :to="{name: 'edit_patient', params:{id:patient.id}}" class="btn btn-sm btn-primary">Edit</router-link>

 <a @click="deletePatient(patient.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
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
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },
    data(){
      return{
        patients:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.patients.filter(patient => {
         return patient.name.match(this.searchTerm)

      })

      }
    },

  methods:{
    allPatient(){
        if(User.role() == 2)
        {
            let id = User.Admin_id();
            axios.get('/api/data/patient/' +id)
            .then(({data}) => (this.patients = data))
            .catch()
        }
        else{
             let id = User.id();
            axios.get('/api/data/patient/' +id)
            .then(({data}) => (this.patients = data))
            .catch()
        }
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
    this.allPatient();
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

