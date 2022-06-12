    <template>


    <div class="pcoded-main-container" style="font-size:13px;">
    <div class="pcoded-wrapper">
    <div class="pcoded-content">
    <div class="pcoded-inner-content">
    <!-- [ breadcrumb ] start -->

    <!-- [ breadcrumb ] end -->
    <div class="main-body" style="font-size:13px;">
    <div class="page-wrapper">
    <!-- [ Main Content ] start -->
    <div class="row" style="font-size:13px;">


    <!-- [Patient entery] -->

    <div class="card patient user" >

    <div class="card-body">
    <table class="table">
    <thead>
    <tr class="table">
    <th scope="col">Patient</th>
    <th scope="col">Test</th>
    <th scope="col">Rate</th>
    <th scope="col">Reporting-date</th>
    <th scope="col">Specimen</th>
    <th scope="col">Collect</th>
    <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>


    <tr v-for="carttest in carttests" :key="carttest.id">
    <td> <select style="font-size:13px;" class="custom-select" v-model="patient_id">Select
    <option :value="patient.id" v-for="patient in patients">  {{ patient.name }} </option>

    </select> </td>
    <td v-for="cartpatient in cartpatients" :key="cartpatient.id" style="display:none">{{ patient_id = cartpatient.pat_id }}</td>
    <td >{{ carttest.test_name }}</td>
    <td >{{ carttest.test_rate }}</td>
    <td><input style="font-size:13px;" class= "form-control" type="date"  v-model="date" ></td>
    <td> <select style="font-size:13px;" class="custom-select" v-model="specimen_id">
    <option selected>Open this select menu</option>
    <option :value="specimen.id" v-for="specimen in specimens">  {{ specimen.name }} </option>

    </select> </td>
    <td > <select style="font-size:13px;" class="custom-select" v-model="collect">
    <option vlaue='in'>IN</option>
    <option vlaue='in'>Out</option>
    </select> </td>
    <td><a @click="removeItem(carttest.id)" class="badge btn  btn-primary" style="font-size:13px; padding:5px 5px 5px 5px;"><font color="#ffffff">x</font></a></td>
    </tr>



    </tbody>
    </table>
    <div class="card-footer" style="font-size:12px;">
    <ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">Total Quantity:
    <strong>{{ qty }}</strong>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center"> Total:
    <strong>{{ subtotal }} </strong>
    </li>
    </ul>
    <br>
    <form @submit.prevent="orderdone">
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

    <!-- [patient enery end ] -->

    <!-- [ Tests List ] start -->
    <div  class="col-xl-3 col-md-4 user">
    <div class="card card-event">
    <div class="card-block ">
    <div class="">
    <div class="card-header">
    <h5 class="m-0">Test List</h5>

    </div>
<input type="text" v-model="searchTermtest" class="form-control" style="margin-bottom:3px; font-size:12px; padding:3.5px 3.5px 3.5px 3.5px;" placeholder="Search Test">





    <div class="table-responsive  abc">
    <table class="table align-items-center table-flush">
    <thead class="thead-light">
    <tr>
    <th>Name</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="test in filtersearchtest" :key="test.id">
    <td> {{ test.Testname }} </td>
    <td>
    <a @click="AddTest(test.id)" class="btn  btn-warning" style="font-size:12px; padding:3.5px 3.5px 3.5px 3.5px;"><font color="#ffffff">Select</font></a>
    </td>
    </tr>

    </tbody>
    </table>
    </div>



    </div>

    </div>
    </div>

    </div>
    <!-- [ Tests list ] end -->


    </div>
    <!-- [ Main Content ] end -->
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
    this.todayOrder();
    this.allOrder();
    this.weekOrder();
    this.allPatient();
    this.allTest();
    this.allSpecimen();

    Reload.$on('AfterAdd',() =>{
    this.cartPatient();
    this.cartTest();
    })

    },

    data(){
    return{
    todaysell:'',
    income:'',
    due:'',
    expense:'',
    products:'',
    todayorders:[],
    worders:[],
    orders:[],
    patients:[],
    tests:[],
    specimens:[],
    searchTerm:'',
    searchTermtest:'',
    cartpatients:[],
    carttests:[],
    i:0,
    }

    },
    mounted(){
    this.TodaySell();
    this.TodayIncome();
    this.TodayDue();
    this.TodayExpense();
    this.StockOut();
    this.AllProduct();


    },
    computed:{
    filtersearch(){
    return this.patients.filter(patient => {
    return patient.name.match(this.searchTerm)

    })

    },
    filtersearchtest(){
    return this.tests.filter(test => {
    return test.Testname.match(this.searchTermtest)

    })

    },
    qty(){
    let sum = 0;
    for(let i = 0; i<this.carttests.length; i++){
    sum += i;
    }
    return sum;
    },
    subtotal(){
    let sum = 0;
    for(let i = 0; i<this.carttests.length; i++){
    sum += parseFloat(this.carttests[i].test_rate);
    }
    return sum;

    },
    },
    methods:{


    todayOrder(){
    axios.get('/api/orders')
    .then(({data}) => (this.todayorders = data))
    .catch()
    },
    allOrder(){
    axios.get('/api/orders/all')
    .then(({data}) => (this.orders = data))
    .catch()
    },
    weekOrder(){
    axios.get('/api/orders/week')
    .then(({data}) => (this.worders = data))
    .catch()
    },

    TodaySell(){
    axios.get('/api/today/sell')
    .then(({data}) => (this.todaysell = data))
    .catch()
    },
    TodayIncome(){
    axios.get('/api/today/income')
    .then(({data}) => (this.income = data))
    .catch()
    },

    TodayExpense(){
    axios.get('/api/today/expense')
    .then(({data}) => (this.expense = data))
    .catch()
    },

    StockOut(){
    axios.get('/api/today/stockout')
    .then(({data}) => (this.products = data))
    .catch()
    },


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
    allTest(){

         if(User.role() == 2)
        {
            let id = User.Admin_id();
            axios.get('/api/data/test/'+id)
            .then(({data}) => (this.tests = data))
            .catch()
        }
        else{
             let id = User.id();
             axios.get('/api/data/test/'+id)
            .then(({data}) => (this.tests = data))
            .catch()
        }




    },
    allSpecimen(){
        if(User.role() == 2 )
        {
            let id = User.Admin_id();
            axios.get('/api/data/specimen/'+id)
    .then(({data}) => (this.specimens = data))
    .catch()
        }

    else {
        let id = User.id();
        axios.get('/api/data/specimen/'+id)
    .then(({data}) => (this.specimens = data))
    .catch()
    }


    },
    AddPatient(id){
    axios.get('/api/addToCartPatient/'+id)
    .then(() => {
    Reload.$emit('AfterAdd');
    Toast.fire({
    icon: 'success',
    title: 'Patient add'
    })
    })
    .catch()
    },

    AddTest(id){

    axios.get('/api/addToCartTest/'+id)
    .then(() => {
    Reload.$emit('AfterAdd');
    Toast.fire({
    icon: 'success',
    title: 'Test  Select'
    })
    })
    .catch()
    },
    cartTest(){
    axios.get('/api/cart/test/')
    .then(({data}) => (this.carttests = data))
    .catch()
    },

    cartPatient(){
    axios.get('/api/cart/patient/')
    .then(({data}) => (this.cartpatients = data))
    .catch()
    },

    orderdone(){
    let Admin_id = User.Admin_id();
    let id = User.id();
    let total =this.subtotal;
    var data = {qty:this.qty, subtotal:this.subtotal, patient_id:this.patient_id, payby:this.payby, pay:this.pay, due:this.due, total:total, Admin_id:Admin_id, id:id}
    axios.post('/api/orderdone',data)
    .then(() => {
    Reload.$emit('AfterAdd');
    Toast.fire({
    icon: 'success',
    title: 'Order Processed'
    })

    this.$router.push({name: '/'})
    })

    },

    removeItem(id){
    axios.get('/api/remove/cart/'+id)
    .then(() => {
    Reload.$emit('AfterAdd');
    Toast.fire({
    icon: 'success',
    title: 'row remove successfully'
    })
    })
    .catch()
    },
    },



    }
    </script>



    <style>

    .patient {

    width:100rem;

    }

    .abc {
        height: 20rem;
        font-size:13px;
    }
    </style>
