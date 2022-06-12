

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

 <div class="col-xl-5 col-md-6">
                                    <div class="card Recent-Users">
                                       
                                        <div class="card-block px-0 py-3">
                                            <div class="table-responsive">                             
                                                <div class="table-responsive" style="font-size: 12px;">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr >
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

          <tr v-for="cart in carts" :key="cart.id">
            <td>{{ cart.pro_name }}</td>
            <td><input type="text" readonly="" style="width: 15px;" :value="cart.pro_quantity">
       <button @click.prevent="increment(cart.id)" class="btn btn-sm btn-success">+</button>
   <button  @click.prevent="decrement(cart.id)" class="btn btn-sm btn-danger" v-if="cart.pro_quantity >= 2">-</button>
   <button class="btn btn-sm btn-danger" v-else="" disabled="">-</button>

            </td>
            <td>{{ cart.product_price  }}</td>
            <td>{{ cart.sub_total }}</td>
   <td><a @click="removeItem(cart.id)" class="btn btn-sm btn-primary"><font color="#ffffff">X</font></a></td>
          </tr>
                      
                       
                    </tbody>
                  </table>
                </div>
                    <div class="card-footer">
            <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">Total Quantity:
  <strong>{{ qty }}</strong>
   </li>
     <li class="list-group-item d-flex justify-content-between align-items-center">Sub Total:
  <strong>{{ subtotal }} </strong>
   </li>

     <li class="list-group-item d-flex justify-content-between align-items-center">Tax:
  <strong>{{ vats.vat }} </strong>
   </li>
     <li class="list-group-item d-flex justify-content-between align-items-center">Total :
  <strong>{{ subtotal}} </strong>
   </li> 
              
            </ul>   
            <br> 

        <form @submit.prevent="orderdone">
          <label>Customer Name</label>
          <select class="form-control" v-model="customer_id">
         <option :value="customer.id" v-for="customer in customers">{{customer.name }} </option>
                 
           </select>

           <label>Pay</label>
           <input type="text" class="form-control" required="" v-model="pay">

           <label>Due</label>
           <input type="text" class="form-control" required="" v-model="due">

          <label>Pay By</label>
          <select class="form-control" v-model="payby">
                 <option value="HandCash">Hand Cash </option>
                 <option value="Cheaque">Cheaque </option>
                 <option value="GiftCard">Gift Card </option>
           </select>

           <br>
           <button type="submit" class="btn btn-success">Submit</button>

        </form>    



                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

<div class="col-xl-7 col-md-6">

<div class="card mb-4">
        
   <!--  Category Wise Product -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All Product </a>
  </li>
  

  <li class="nav-item" v-for="category in categories" :key="category.id">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" @click="subProduct(category.id)" >{{ category.CategoryName }}</a>
  </li>

</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<input type="text" v-model="searchTerm" class="form-control" style="width: 560px;" placeholder="Search Product">
<div class="card-body">
 

     <div class="row">
    
        <div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="product in filtersearchp" :key="product.id">                                          
                     <a @click.prevent="AddToCart(product.id)">
<div class="card border"  >
  <img :src="product.image"  class="card-img-top" alt="">
  <div class="card-body">
    <span class="badge badge-warning" style="list-style-type:none;"> {{ product.product_name }} </span>
     <span v-if="product.product_quantity  >= 1" class="badge badge-success">Available {{product.product_quantity}}</span>
   <span v-else=" " class="badge badge-danger">Stock Out </span>
  </div>
</div>
                     </a>
                   
</div>
    
  
  </div>          

     </div>


  </div>  <!--  End TBAS HOME -->



 

  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


<input type="text" v-model="getsearchTerm" class="form-control" style="width: 560px;" placeholder="Search Product">

    
  <div class="row">
    
        <div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="subproduct in filtersearchs" :key="subproduct.id">                                          
                      <a  @click.prevent="AddToCart(subproduct.id)">
<div class="card border" >
  <img :src="subproduct.image"  class="card-img-top" alt="" >
  <div class="card-body">
    <span class="badge badge-warning" style="list-style-type:none;"> {{ subproduct.product_name }} </span>
     <span v-if="subproduct.product_quantity  >= 1" class="badge badge-success">Available {{subproduct.product_quantity}}</span>
   <span v-else=" " class="badge badge-danger">Stock Out </span>
  </div>
</div>
                      </a>
</div>
    
  
  </div>



  </div>
  
</div>
<!-- End Category Wise Product -->


                



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

  created(){
    this.allProduct();
    this.allCategory();
    this.allCustomers();
     this.cartProduct();
    this.vat();
    Reload.$on('AfterAdd',() =>{
      this.cartProduct();
    })
  },
    data(){
      return{
        customer_id:'',
       pay:'',
       due:'',
       payby:'',
        products:[],
        categories:[],
        subproducts:[],
        searchTerm:'',
        getsearchTerm:'',
        customers:[],
        errors:'',
        carts:[],
        vats:'',
      }
    },
    computed:{
      filtersearchp(){
      return this.products.filter(product => {
         return product.product_name.match(this.searchTerm) 
        
      }) 

      },
      filtersearchs(){
      return this.subproducts.filter(subproduct => {
         return subproduct.product_name.match(this.getsearchTerm) 
        
      }) 

      },
        qty(){
    let sum = 0;
    for(let i = 0; i < this.carts.length; i++){
          sum += (parseFloat(this.carts[i].pro_quantity));      
        }
        return sum;
   },
   subtotal(){
    let sum = 0;
    for(let i = 0; i < this.carts.length; i++){
    sum += (parseFloat(this.carts[i].pro_quantity) * parseFloat(this.carts[i].product_price));      
        }
       return sum;

      },
    },
 
  methods:{
      AddToCart(id){
     axios.get('/api/addToCart/'+id)
      .then(() => {
        Reload.$emit('AfterAdd');
        Toast.fire({
        icon: 'success',
        title: 'Product add to Cart'
        })
      })
      .catch()
  },
  cartProduct(){
      axios.get('/api/cart/product/')
      .then(({data}) => (this.carts = data))
      .catch()
  },
  removeItem(id){
   axios.get('/api/remove/cart/'+id)
      .then(() => {
        Reload.$emit('AfterAdd');
          Toast.fire({
        icon: 'success',
        title: 'Cart remove successfully'
        })
      })
      .catch()
  },
  increment(id){
  axios.get('/api/increment/'+id)
      .then(() => {
        Reload.$emit('AfterAdd');
       

      })
      .catch()
  },
   decrement(id){
    axios.get('/api/decrement/'+id)
      .then(() => {
        Reload.$emit('AfterAdd');
         

      })
      .catch() 
  }, 
  vat(){
       axios.get('/api/vats/')
      .then(({data}) => (this.vats = data))
      .catch()
  },
    orderdone(){
    let total = this.subtotal;
    var data = {qty:this.qty, subtotal:this.subtotal, customer_id:this.customer_id, payby:this.payby, pay:this.pay, due:this.due, vat:this.vats.vat, total:total }

        axios.post('/api/orderdone',data)
       .then(() => {
        Reload.$emit('AfterAdd');
           Toast.fire({
        icon: 'success',
        title: 'Order Processed'
        })
        
         this.$router.push({name: 'pointofsale'})
       }) 

  },
    allProduct(){
      axios.get('/api/product/')
      .then(({data}) => (this.products = data))
      .catch()
    },
    allCategory(){
      axios.get('/api/category/')
      .then(({data}) => (this.categories = data))
      .catch()
    },
     allCustomers(){
      axios.get('/api/customer/')
      .then(({data}) => (this.customers = data))
      .catch()
    },
    subProduct(id){
      axios.get('/api/get/subproduct/'+id)
      .then(({data}) => (this.subproducts = data))
      .catch()

    }

  }


  } 
</script>


<style type="text/css">


.border{
/* box-shadow:0px 0px 4px 4px rgb(61, 61, 59, .5); */
}

.border:hover{

box-shadow:0px 0px 6px 6px rgb(33, 182, 168,.8);
cursor: pointer;
}


</style>