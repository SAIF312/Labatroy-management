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
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Phone</th>
                        <th>Sallery</th>
                        <th>Joining Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="employee in filtersearch" :key="employee.id">
                        <td> {{ employee.name }} </td>
                        <td><img :src="employee.photo" id="em_photo"></td>
                        <td>{{ employee.phone }}</td>
                        <td>{{ employee.salary }}</td>
                        <td>{{ employee.jd }}</td>
            <td>
   <router-link :to="{name: 'add_salary', params:{id:employee.id}}" class="btn btn-sm btn-primary">Pay Salary</router-link>


            </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
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
  }
</style>
