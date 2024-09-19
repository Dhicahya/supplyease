@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <a href="{{ route('user.index') }}">

                        <div class="card-body">
                            <h5 class="card-title">Users</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ App\Models\User::count() }}</h6>
                                </div>
                            </div>
                        </div>

                    </a>
                </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">

                    <a href="{{ route('product.index') }}">

                        <div class="card-body">
                            <h5 class="card-title">Produk</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-list-task"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ App\Models\Product::count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">
                    <a href="{{ route('supplier.index') }}">
                        <div class="card-body">
                            <h5 class="card-title">Supplier</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-list-check"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ App\Models\Supplier::count() }}</h6>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>

            </div><!-- End Customers Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <a href="{{ route('order.index') }}">

                        <div class="card-body">
                            <h5 class="card-title">Order</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-question-circle"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ App\Models\Order::count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div><!-- End Revenue Card -->

        </div>
    </section>
@endsection
