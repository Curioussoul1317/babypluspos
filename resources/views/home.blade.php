@extends('layouts.app')

@section('content')


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
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">

        <div class="row" style="margin-bottom: 15px;">
            <div class="col-12 text-center">
                <img src="{{asset('/img/logo.png')}}" alt="Tabler" class="">
            </div>
        </div>

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
                                <div style="color:#2e9acf" class="svgdiv">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                    </svg>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                    </svg>
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
                                <div style="color:#2e9acf" class="svgdiv">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                    </svg>
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
                                <div style="color:#2e9acf" class="svgdiv">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                    </svg>
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
                                <div style="color:#2e9acf" class="svgdiv">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                    </svg>
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
                                <div style="color:#2e9acf" class="svgdiv">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                    </svg>
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
                                <div style="color:#2e9acf" class="svgdiv">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                    </svg>
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
                                <div style="color:#2e9acf" class="svgdiv">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                    </svg>
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
@endsection