@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
    <div class="pagetitle">
        <h1>Detail Pesanan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Daftar Pesanan</a></li>
                <li class="breadcrumb-item active">Detail Pesanan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <!-- Card for Order Details -->
                <div class="card mb-3">
                    <div class="card-header">
                        Pesanan dari {{ $order->supplier->name }}
                    </div>
                    <div class="card-body">
                        <p><strong>Supplier:</strong> {{ $order->supplier->name }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                        <p><strong>Total Harga:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- Card for Ordered Products -->
                <div class="card">
                    <div class="card-header">
                        Produk yang Dipesan
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td>Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="{{ route('order.index') }}" class="btn btn-secondary">Kembali ke Daftar Pesanan</a>
                </div>
            </div>
        </div>
    </section>
@endsection
