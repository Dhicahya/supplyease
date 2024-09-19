@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Daftar Pesanan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Daftar Pesanan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Daftar Pesanan</h5>
                        <a href="{{ route('order.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="bi bi-plus-lg"></i> Buat Pesanan Baru
                        </a>
                    </div>

                    <!-- Flash message untuk notifikasi sukses -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tabel untuk menampilkan daftar pesanan -->
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $index => $order)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $order->supplier->name }}</td>
                                        <td>
                                            <form action="{{ route('order.updateStatus', $order->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="approved" {{ $order->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('order.show', $order->id) }}" class="btn btn-info btn-sm">
                                                <i class="bi bi-eye"></i> Detail
                                            </a>
                                            <form action="{{ route('order.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">
                                                    <i class="bi bi-trash3"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
