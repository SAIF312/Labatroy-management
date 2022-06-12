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
                                <div class="col-sm-10">
                                    <div class="card">
                                    
                                        <div class="card-body">
                                            <h5>Add Product</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    

<form class="user" @submit.prevent="StockUpdate">

        <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Product Stock</label>
         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Product Name" v-model="form.product_quantity">
       <small class="text-danger" v-if="errors.product_quantity"> {{ errors.product_quantity[0] }} </small>
            </div>


     
            
          </div>
        </div>
       
        
         

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>
        
      </form>
                                                    

                                                </div>
                                            </div>
                                        </div>
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
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },

    data(){
    return {
      form:{
         product_quantity: '' 
        
      },
      errors:{},
   
    }
  },
  created(){
  	let id = this.$route.params.id
  	axios.get('/api/product/'+id)
  	.then(({data}) => (this.form = data))
  	.catch(console.log('error'))


  },

  methods:{
    
  StockUpdate(){
  	  let id = this.$route.params.id
       axios.post('/api/stock/update/'+id,this.form)
       .then(() => {
        this.$router.push({ name: 'stock'})
        Toast.fire({
        icon: 'success',
        title: 'Stock Update Successfully'})
       })
       .catch(error =>this.errors = error.response.data.errors)
     },
  } 


  }
   
</script>

<style>

</style>