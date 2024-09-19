@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Pesanan Berdasarkan Status</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Pesanan Berdasarkan Status</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <!-- Daftar Pesanan dengan Status Approved -->
            <h2>Approved</h2>
            @if(isset($orders['approved']) && $orders['approved']->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Supplier</th>
                                <th>Status</th>
                                <th>Total Harga</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders['approved'] as $index => $order)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $order->supplier->name }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('order.show', $order->id) }}" class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>Tidak ada pesanan dengan status Approved.</p>
            @endif

            <!-- Daftar Pesanan dengan Status Pending -->
            <h2>Pending</h2>
            @if(isset($orders['pending']) && $orders['pending']->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Supplier</th>
                                <th>Status</th>
                                <th>Total Harga</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders['pending'] as $index => $order)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $order->supplier->name }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('order.show', $order->id) }}" class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>Tidak ada pesanan dengan status Pending.</p>
            @endif

            <!-- Daftar Pesanan dengan Status Cancelled -->
            <h2>Cancelled</h2>
            @if(isset($orders['cancelled']) && $orders['cancelled']->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Supplier</th>
                                <th>Status</th>
                                <th>Total Harga</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders['cancelled'] as $index => $order)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $order->supplier->name }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('order.show', $order->id) }}" class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>Tidak ada pesanan dengan status Cancelled.</p>
            @endif

        </div>
    </div>
</section>

@endsection
