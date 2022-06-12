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
                                            <h5>Add Patient</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form class="user" @submit.prevent="addPatient" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-sm-6">
                              <label>Name</label>
                             <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Name" v-model="form.name">
                            <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small>
                            </div>

                            <div class="col-sm-6">
                              <label>Email</label>
                             <input type="email" class="form-control" id="exampleInputFirstName" placeholder="Enter Email" v-model="form.email">
                              <small class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </small>
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                     <div class="form-row">
                            <div class="col-md-4">
                              <label>Cnic</label>
                             <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Cnic" v-model="form.cnic">
                          <small class="text-danger" v-if="errors.cnic"> {{ errors.cnic[0] }} </small>
                          </div>

                            <div class="col-md-4">
                              <label>Age</label>
                             <input type="number" class="form-control" id="Age" placeholder="Enter Age in years" v-model="form.age">
                             <small class="text-danger" v-if="errors.age"> {{ errors.age[0] }} </small>
                            </div>
                            <div class="col-md-4">
                              <label>Refered</label>
                             <input type="text" class="form-control" id="Age" placeholder="Refered By" v-model="form.reffered_by">
                             <small class="text-danger" v-if="errors.age"> {{ errors.age[0] }} </small>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                     <div class="form-row">
                            <div class="col-md-6">
                              <label>Gender</label>
                              <select class="form-control" v-model="form.gender">
                                  <option value="Male"><li>Male</li>  </option>
                                  <option value="Female"><li>Female</li>  </option>
                                  <option value="Other"><li>Other</li>  </option>

           </select>

                            </div>

                            <div class="col-md-6">
                              <label>Phone</label>
                             <input type="number" class="form-control" id="phone" placeholder="Enter Phone" v-model="form.phone" >
                             <small class="text-danger" v-if="errors.phone"> {{ errors.phone[0] }} </small>
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                         <div class="form-row">
                      <div class="custom-file col-md-6">
                        <input type="file" class="custom-file-input" id="customFile" @change="onfileselected">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>

                       <div class="col-md-6">

                        <img :src="form.photo" id="image" style="height:50px; width:50px;">
                      </div>


                         </div>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Add</button>
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


export default{

 created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },

    data(){
    return {
      form:{
        name: null,
        email: null,
        age:null,
        cnic: null,
        gender:null,
        phone:null,
        reffered_by:null,
        photo:null
      },
      errors:{}
    }
  },
  methods:{
    onfileselected(event){

        let file = event.target.files[0];
        if(file.size > 1048770 ){

         Toast.fire({
      icon: 'error',
      title: 'Image size succeed to 1mb'
                })

        }else{

          let reader = new FileReader();
          reader.onload = event =>{
            this.form.photo = event.target.result
            console.log(event.target.result)
          };

          reader.readAsDataURL(file);

        }

    },
    addPatient(){

        if(User.role() == 2)
        {
        let Admin_id = User.Admin_id();
        var data = {name:this.form.name, email:this.form.email, age:this.form.age, cnic:this.form.cnic, gender:this.form.gender, phone:this.form.phone,reffered_by:this.form.reffered_by,photo:this.form.photo, Admin_id:Admin_id}
        axios.post('/api/patient', data)
        .then(()=>{

        this.$router.push({name:'all_patient'})

        Toast.fire({
        icon: 'success',
        title: 'Patient inserted Successfully'


        })
        })
        .catch(error=>this.errors = errors.response.data.errors)
        }
        else
        {

        let Admin_id = User.id();
        var data = {name:this.form.name, email:this.form.email, age:this.form.age, cnic:this.form.cnic, gender:this.form.gender, phone:this.form.phone,reffered_by:this.form.reffered_by,photo:this.form.photo, Admin_id:Admin_id}
        axios.post('/api/patient', data)
        .then(()=>{

        this.$router.push({name:'all_patient'})

        Toast.fire({
        icon: 'success',
        title: 'Patient inserted Successfully'


        })
        })
        .catch(error=>this.errors = errors.response.data.errors)

        }



    }
  }
}
</script>

<style>

</style>
