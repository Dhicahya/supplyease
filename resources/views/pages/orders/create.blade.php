@extends('layouts.app')

@section('title', 'Buat Pesanan Baru')

@section('content')
    <div class="pagetitle">
        <h1>Buat Pesanan Baru</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Data Pesanan</a></li>
                <li class="breadcrumb-item active">Buat Pesanan Baru</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Buat Pesanan Baru</h5>

                        <!-- General Form Elements -->
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf

                            <!-- Menampilkan error jika ada -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="supplier_id" class="form-label">Supplier</label>
                                <select class="form-control" id="supplier_id" name="supplier_id" required>
                                    <option value="">Pilih Supplier</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="product_ids" class="form-label">Produk</label>
                                <select multiple class="form-control" id="product_ids" name="product_ids[]" required>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="quantities" class="form-label">Jumlah</label>
                                <input type="text" class="form-control" id="quantities" name="quantities[]" placeholder="Misalnya: 2, 3, 1" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                        <!-- End General Form Elements -->
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
