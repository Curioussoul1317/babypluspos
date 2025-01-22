@extends('layouts.app')

@section('content')


<!-- Page body -->
<div class="page-body">
    <div class="container-xl">

       

        <style>
        .cardlink {
            width: 100%;
            display: flex;
            transition: .3s;
            color: rgba(var(--tblr-link-color-rgb), var(--tblr-link-opacity, 1));
            text-decoration: none;
        }

        .svgdiv svg {
            --tblr-icon-size: 5rem;
            width: var(--tblr-icon-size);
            height: var(--tblr-icon-size);
            font-size: var(--tblr-icon-size);
            stroke-width: 1.5;
        }
        </style>
        
  <div class="row justify-content-center">
    <div class="col-sm-12 col-lg-8">
        
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <h2 class="page-title">
                            Dashboard
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">

                    </div>
                </div>
            </div>
        </div>

         <div class="row" style="margin-bottom: 15px;">
            <div class="col-12 text-center"> 
                <!-- <img src="{{asset('/img/babyplus.png')}}" alt="Tabler" class=""> -->
            </div>
        </div>

        
       <div class="row row-deck row-cards">

            <div class="col-sm-6 col-lg-2">
                <a href="{{ route('brands.index') }}" class="cardlink" style="border-radius: 15px;">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 100%" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="100% Complete">
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">BRANDS</div>
                            <div class="ms-auto" style="position: absolute; bottom:0; right: 0; ">
                                <div style="color:#97cf2e" class="svgdiv">
                                   <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-category-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 4h6v6h-6z" /><path d="M4 14h6v6h-6z" /><path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M7 7m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /></svg>
                                </div>
                            </div>
                            <div id="chart-active-users" class="chart-sm"></div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-6 col-lg-2">
                <a href="{{ route('categories.index') }}" class="cardlink" style="border-radius: 15px;">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 100%" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="100% Complete">
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">CATEGORIES</div>
                            <div class="ms-auto" style="position: absolute; bottom:0; right: 0; ">
                                <div style="color:#2e9acf" class="svgdiv">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-category"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4h6v6h-6z" /><path d="M14 4h6v6h-6z" /><path d="M4 14h6v6h-6z" /><path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /></svg>
                                </div>
                            </div>
                            <div id="chart-active-users" class="chart-sm"></div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-sm-6 col-lg-2">
                <a href="{{ route('inventory.index') }}" class="cardlink" style="border-radius: 15px;">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 100%" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="100% Complete">
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">INVENTORY</div>
                            <div class="ms-auto" style="position: absolute; bottom:0; right: 0; ">
                                <div style="color:#cf6b2e" class="svgdiv">
                                   <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-list-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3.5 5.5l1.5 1.5l2.5 -2.5" /><path d="M3.5 11.5l1.5 1.5l2.5 -2.5" /><path d="M3.5 17.5l1.5 1.5l2.5 -2.5" /><path d="M11 6l9 0" /><path d="M11 12l9 0" /><path d="M11 18l9 0" /></svg>
                                </div>
                            </div>
                            <div id="chart-active-users" class="chart-sm"></div>
                        </div>
                    </div>
                </a>
            </div>





            <div class="col-sm-6 col-lg-2">
                <a href="{{ route('sales.create') }}" class="cardlink" style="border-radius: 15px;">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 100%" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="100% Complete">
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">SALES</div>
                            <div class="ms-auto" style="position: absolute; bottom:0; right: 0; ">
                                <div style="color:#cf2e2e" class="svgdiv">
                                   <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-report-money"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M12 17v1m0 -8v1" /></svg>
                                </div>
                            </div>
                            <div id="chart-active-users" class="chart-sm"></div>
                        </div>
                    </div>
                </a>
            </div>




            <div class="col-sm-6 col-lg-2">
                <a href="{{ route('sales.index') }}" class="cardlink" style="border-radius: 15px;">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 100%" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="100% Complete">
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">SALES REPORTS</div>
                            <div class="ms-auto" style="position: absolute; bottom:0; right: 0; ">
                                <div style="color:#7c2ecf" class="svgdiv">
                                   <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-report"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" /><path d="M18 14v4h4" /><path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" /><path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M8 11h4" /><path d="M8 15h3" /></svg>
                                </div>
                            </div>
                            <div id="chart-active-users" class="chart-sm"></div>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-sm-6 col-lg-2">
                <a href="{{ route('customers.index') }}" class="cardlink" style="border-radius: 15px;">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 100%" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="100% Complete">
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">CUSTOMERS</div>
                            <div class="ms-auto" style="position: absolute; bottom:0; right: 0; ">
                                <div style="color:#6d2ecf" class="svgdiv">
                                   <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                                </div>
                            </div>
                            <div id="chart-active-users" class="chart-sm"></div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-sm-6 col-lg-2">
                <a href="{{ route('users.index') }}" class="cardlink" style="border-radius: 15px;">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 100%" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="100% Complete">
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">USERS</div>
                            <div class="ms-auto" style="position: absolute; bottom:0; right: 0; ">
                                <div style="color:#2e7ccf" class="svgdiv">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                                </div>
                            </div>
                            <div id="chart-active-users" class="chart-sm"></div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-sm-6 col-lg-2">
                <a href="{{ route('cart.index') }}" class="cardlink" style="border-radius: 15px;">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 100%" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="100% Complete">
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">ORDERS</div>
                            <div class="ms-auto" style="position: absolute; bottom:0; right: 0; ">
                                <div style="color:#cf4d2e" class="svgdiv">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                                </div>
                            </div>
                            <div id="chart-active-users" class="chart-sm"></div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div> 
  </div>       
    </div>
</div>
@endsection