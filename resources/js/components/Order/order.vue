

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
                  <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
                  <input type="text" v-model="searchTerm" class="form-control" style="width: 360px;" placeholder="Search Order by ID">
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Patient Name</th>
                        <th>Total Amount </th>
                        <th>Pay</th>
                        <th>Due</th>
                        <th>PayBy</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="order in filtersearch" :key="order.id">
                          <td> {{ order.id }} </td>
                        <td> {{ order.name }} </td>
                        <td> {{ order.total }} </td>
                        <td> {{ order.pay }}  </td>
                        <td> {{ order.due }}   </td>
                        <td> {{ order.payby }} </td>

            <td>
   <router-link :to="{name: 'view-order', params:{id:order.id}}" class="btn btn-sm btn-primary">View</router-link>


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
        orders:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.orders.filter(order => {
         return order.name.match(this.searchTerm)
      })
      }
    },

  methods:{
    allOrder(){
        let id = User.id();
        axios.get('/api/orders/all/'+ id)
        .then(({data}) => (this.orders = data))
        .catch()
    },


  },
  created(){
    this.allOrder();
  }


  }
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>
