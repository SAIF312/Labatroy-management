<template>
    <div class="col-xl-7 col-md-6">


    <div class="card Recent-Users">
                                        <div class="card-header">
      


      <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" @click="allProduct()" >All Products</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" >Category</a>
    <ul class="dropdown-menu">
      <li class="nav-item" v-for="category in categories" :key="category.id">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" @click="subProduct(category.id)" >{{ category.CategoryName }}</a>
  </li>
    </ul>
  </li>
  <li class="nav-item">
     <input type="text" v-model="searchTerm" class="form-control" style="width: 300px; float:right;" placeholder="Search Here">
  </li>
</ul>



                    
                                    </div>
                                        <div class="card-block px-0 py-3">
                                            <div class="table-responsive">
                                                <div class="card-block">

 
                    
                                           

                                       
                                          
                                        </div>
                                            </div>
                                        </div>
                                    </div>





                                    <div class="card card-event">
                                        
                                    </div>
                                    
                                </div>
</template>