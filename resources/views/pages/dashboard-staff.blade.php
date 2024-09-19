@extends('layouts.staff')

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
