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
                                                    <form class="user" @submit.prevent="ProductInsert" enctype="multipart/form-data">

        <div class="form-group">

          <div class="form-row">
            <div class="col-md-6">
              <label for="exampleFormControlSelect1">Product Name</label>
         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Product Name" v-model="form.product_name">
       <small class="text-danger" v-if="errors.product_name"> {{ errors.product_name[0] }} </small>
            </div>


     <div class="col-md-6">
      <label for="exampleFormControlSelect1">Product Code</label>
         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Product Code" v-model="form.product_code">
         <small class="text-danger" v-if="errors.product_code"> {{ errors.product_code[0] }} </small>
            </div>

          </div>
        </div>


         <div class="form-group">

          <div class="form-row">
            <div class="col-md-6">
      <label for="exampleFormControlSelect1">Product Category</label>
  <select class="form-control" id="exampleFormControlSelect1" v-model="form.category_id">
     <option :value="category.id" v-for="category in categories">{{ category.CategoryName }}</option>

                      </select>

            </div>


     <div class="col-md-6">
          <label for="exampleFormControlSelect1">Product Supplier</label>
 <select class="form-control" id="exampleFormControlSelect1" v-model="form.supplier_id">

    <option :value="supplier.id" v-for="supplier in suppliers">{{ supplier.name }}</option>

                      </select>
            </div>

          </div>
        </div>




 <div class="form-group">

          <div class="form-row">
            <div class="col-md-4">
              <label for="exampleFormControlSelect1">Product Root</label>
         <input type="text" class="form-control" id="exampleInputFirstName"  v-model="form.root">
       <small class="text-danger" v-if="errors.root"> {{ errors.root[0] }} </small>
            </div>


 <div class="col-md-4">
              <label for="exampleFormControlSelect1">Buying Price</label>
         <input type="text" class="form-control" id="exampleInputFirstName"  v-model="form.buying_price">
       <small class="text-danger" v-if="errors.buying_price"> {{ errors.buying_price[0] }} </small>
            </div>



     <div class="col-md-4">
      <label for="exampleFormControlSelect1">Selling Price</label>
         <input type="text" class="form-control" id="exampleInputFirstName" v-model="form.selling_price">
         <small class="text-danger" v-if="errors.selling_price"> {{ errors.selling_price[0] }} </small>
            </div>

          </div>
        </div>








        <div class="form-group">

          <div class="form-row">
            <div class="col-md-6">
              <label for="exampleFormControlSelect1">Buying Date</label>
         <input type="date" class="form-control" id="exampleInputFirstName" v-model="form.buying_date">
  <small class="text-danger" v-if="errors.buying_date"> {{ errors.buying_date[0] }} </small>
            </div>


     <div class="col-md-6">
      <label for="exampleFormControlSelect1">Product Quantity</label>
         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Quantity" v-model="form.product_quantity">
         <small class="text-danger" v-if="errors.product_quantity"> {{ errors.product_quantity[0] }} </small>
            </div>

          </div>
        </div>






         <div class="form-group">

          <div class="form-row">
            <div class="col-md-6">

   <input type="file" class="custom-file-input" id="customFile" @change="onFileSelected">

  <small class="text-danger" v-if="errors.image"> {{ errors.image[0] }} </small>
       <label class="custom-file-label" for="customFile">Choose file</label>
            </div>


     <div class="col-md-6">
        <img :src="form.image" style="height: 40px; width: 40px;">
            </div>

          </div>
        </div>




        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
        product_name: null,
        product_code: null,
        category_id: null,
        supplier_id: null,
        root: null,
        buying_price: null,
        selling_price: null,
        buying_date: null,
        image: null,
        product_quantity: null
      },
      errors:{},
      categories:{},
      suppliers:{},
    }
  },

  methods:{
    onFileSelected(event){
     let file = event.target.files[0];
     if (file.size > 1048770) {
      Notification.image_validation()
     }else{
      let reader = new FileReader();
      reader.onload = event =>{
        this.form.image = event.target.result
        console.log(event.target.result);
      };
      reader.readAsDataURL(file);
     }

    },
  ProductInsert(){
      let Admin_id = User.id();
      let data = {  Admin_id:Admin_id,product_name:this.form.product_name, product_code:this.form.product_code, category_id:this.form.category_id, supplier_id:this.form.supplier_id, buying_price:this.form.buying_price, selling_price:this.form.selling_price,buying_date:this.form.buying_date ,image:this.form.image, product_quantity:this.form.product_quantity,}
       axios.post('/api/product', data)
       .then(() => {
        this.$router.push({ name: 'all_product'})
        Toast.fire({
        icon: 'success',
        title: 'Product inserted Successfully'})


       })
       .catch(error =>this.errors = error.response.data.errors)
     },
  },
  created(){
    let id= User.id();
    axios.get('/api/data/Category/' +id)
    .then(({data}) => (this.categories = data))

    axios.get('/api/data/supplier/' +id)
    .then(({data}) => (this.suppliers = data))

  }


  }

</script>

<style>

</style>
