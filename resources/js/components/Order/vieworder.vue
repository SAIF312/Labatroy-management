

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
            <div class="col-lg-6 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Order Details </h6>
                </div>
                <div class="table-responsive">

        <ul class="list-group">
          <li class="list-group-item"><b>Name :</b> {{ orders.name }} </li>
          <li class="list-group-item"><b>Phone :</b> {{ orders.phone }}</li>
          <li class="list-group-item"><b>Address :</b> {{ orders.address }}</li>
          <li class="list-group-item"><b>Gender :</b> {{ orders.gender }}</li>
          <li class="list-group-item"><b>Age :</b> {{ orders.age }}</li>
          <li class="list-group-item"><b>Cnic :</b> {{ orders.cnic }}</li>
          <li class="list-group-item"><b>Date :</b> {{ orders.order_date }}</li>
          <li class="list-group-item"><b>Pay Through :</b> {{ orders.payby }}</li>
        </ul>


                </div>
                <div class="card-footer"></div>
              </div>
            </div>




<div class="col-lg-6 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
                </div>
                <div class="table-responsive">


          <ul class="list-group">
          <li class="list-group-item"><b>Total :</b> {{ orders.total }} $</li>
          <li class="list-group-item"><b>Pay Amount :</b> {{ orders.pay }} $</li>
          <li class="list-group-item"><b>Due Amount :</b> {{ orders.due }} $</li>
        </ul>



                </div>
                <div class="card-footer"></div>
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
                        <th>Test</th>
                        <th>Price </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="detail in details">
                       <td>{{ detail.name	 }}</td>
                       <td>{{ detail.test_name}} </td>
                       <td>{{ detail.test_price}} </td>
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

      errors:{},
      orders:{},
      details:{},
    }
  },
  created(){
  	let id = this.$route.params.id
  	axios.get('/api/order/details/'+id)
  	.then(({data}) => (this.orders = data))
  	.catch(console.log('error'))

    axios.get('/api/order/orderdetails/'+id)
    .then(({data}) => (this.details = data))
    .catch(console.log('error'))


  },

  methods:{


  }


  }

</script>


<style type="text/css">
   #em_photo{
    height: 40px;
    width: 40px;
  }
</style>
