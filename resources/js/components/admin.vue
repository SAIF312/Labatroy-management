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
    <div class="row">
    <!--[ daily sales section ] start-->
    <div  class="col-md-6 col-xl-3 admin">
    <div class="card daily-sales">
    <div class="card-block">
    <h6 class="mb-4">Daily Sales</h6>
    <div class="row d-flex align-items-center">
    <div class="col-9">
    <h5 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>Rs:{{todaysell}}</h5>
    </div>


    </div>
    <div class="progress m-t-30" style="height: 7px;">
    <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    </div>
    </div>
    </div>
    <!--[ daily sales section ] end-->
    <!--[ Monthly  sales section ] starts-->
    <div  class="col-md-6 col-xl-3 admin">
    <div class="card Monthly-sales top-card">
        <a @click="href()" >
    <div class="card-block">
    <h6 class="mb-4">Patient Tests</h6>
    <div class="row d-flex align-items-center">
    <div class="col-9">
    <h5 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-down text-c-red f-30 m-r-10"></i>{{todayorders}}</h5>
    </div>
    <!-- <div class="col-3 text-right">
    <p class="m-b-0">36%</p>
    </div> -->
    </div>
    <div class="progress m-t-30" style="height: 7px;">
    <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    </div>
        </a>
    </div>
    </div>
    <!--[ Monthly  sales section ] end-->
    <!--[ year  sales section ] starts-->
    <div  class="col-md-12 col-xl-3 admin">
    <div class="card yearly-sales top-card">
    <div class="card-block">
    <h6 class="mb-4">Total Dues</h6>
    <div class="row d-flex align-items-center">
    <div class="col-9">
    <h5 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>{{due}}</h5>
    </div>
    <!-- <div class="col-3 text-right">
    <p class="m-b-0">80%</p>
    </div> -->
    </div>
    <div class="progress m-t-30" style="height: 7px;">
    <div class="progress-bar progress-c-theme" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    </div>
    </div>
    </div>
    <!--[ year  sales section ] end-->

     <!--[ Monthly  sales section ] starts-->
    <div  class="col-md-6 col-xl-3 admin">
    <div class="card Monthly-sales top-card">
        <a @click="href()" >
    <div class="card-block">
    <h6 class="mb-4">Employees</h6>
    <div class="row d-flex align-items-center">
    <div class="col-9">
    <h5 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-down text-c-red f-30 m-r-10"></i>{{totalEmployees}}</h5>
    </div>
    <!-- <div class="col-3 text-right">
    <p class="m-b-0">36%</p>
    </div> -->
    </div>
    <div class="progress m-t-30" style="height: 7px;">
    <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    </div>
        </a>
    </div>
    </div>
    <!--[ Monthly  sales section ] end-->

    <!--[ Stock ] start-->
    <div  class="col-xl-5 col-md-3 admin">
    <div class="card Recent-Users top-card">
    <div class="card-header">
    <h5>Stock</h5>
    </div>
    <div class="card-block px-0 py-3">
    <div class="table-responsive">
    <table class="table align-items-center table-flush">
    <thead class="thead-light">
    <tr>
    <th>Name</th>
    <th>Photo</th>

    <th>Buying Price</th>
    <th>Status</th>
    <th>Quantity</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="stock in stocks" :key="stock.id">
    <td> {{ stock.product_name }} </td>

    <td><img :src="stock.image" id="em_photo"></td>

    <td>{{ stock.buying_price }}</td>
    <td v-if="stock.product_quantity  >= 1 "><span class="badge badge-success">Available </span></td>
    <td v-else=" "><span class="badge badge-danger">Stock Out </span></td>
    <td>{{ stock.product_quantity }}</td>
    <td>

    </td>
    </tr>

    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    <!--[ Stock ] end-->

    <!-- [Order tabel] -->

    <!-- [order table end] -->
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
    if (!User.loggedIn() || User.role() == 2) {
        this.$router.push({name: '/'})
      }

    Reload.$on('AfterAdd',() =>{

    })

    },
     mounted(){

    this.TodayDue();
    this.TodaySell();
    this.totalOrders();
     this.Stock();
     this.Allemployees();
     this.PendingSalaries();



    },


    data(){
        return{
             due:'',
             todaysell:'',
             todayorders:'',
             totalEmployees:'',
             stocks:[],
             PendingSalaries:[],

        }
    },


    methods:{
    TodayDue(){
        let id = User.id();
    axios.get('/api/today/due/' +id)
    .then(({data}) => (this.due = data))
    .catch()
    },

    totalOrders(){
    let id = User.id();
    axios.get('/api/today/order/' +id)
    .then(({data}) => (this.todayorders = data))
    .catch()
    },
     TodaySell(){
        let id = User.id();
    axios.get('/api/today/sell/' +id)
    .then(({data}) => (this.todaysell = data))
    .catch()
    },
    Stock(){
        let id = User.id();
    axios.get('/api/data/stock/' +id)
    .then(({data}) => (this.stocks = data))
    .catch()
    },
     Allemployees(){
    let id = User.id();
    axios.get('/api/data/employees/' +id)
    .then(({data}) => (this.totalEmployees = data))
    .catch()
    },


    href(){

    this.$router.push({name: 'order'})
    }

    }



     }
    </script>


    <style>




    .card a:link {
        text-decoration: none;
        }
        .card:hover {

        cursor: pointer;
        }

    .patient {


    width:100rem;

    }


    html {
    font-size: 1rem;
    }

    </style>
