

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


                           <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Search Order</h1>
                  </div>

      <form class="user" @submit.prevent="searchDate">

        <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
        <label for="exampleFormControlTextarea1"><b>Search By Date </b></label>
      <input type="date" class="form-control" id="exampleInputFirstName" required="" v-model="date">

            </div>

          </div>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Search</button>
        </div>

      </form>
                  <hr>
                  <div class="text-center">


                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>




<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                     <tr>
                        <th>Patient Name</th>
                        <th>Total Amount </th>
                        <th>Pay</th>
                        <th>Due</th>
                        <th>PayBy</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="order in orders" :key="order.id">
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
    return {
      date:'',
      orders:{}

    }
  },

  methods:{

  searchDate(){
      let admin_id = User.id();
      var data = {date:this.date , Admin_id:admin_id}
       axios.post('/api/search/order/',data)
        .then(({data}) => (this.orders = data))
        .catch(error =>this.errors = error.response.data.errors)
     },
  }


  }

</script>


<style type="text/css">

</style>
