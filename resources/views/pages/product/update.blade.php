@extends('layouts.app')

@section('title', isset($product) ? 'Edit Produk' : 'Tambah Produk')

@section('content')
    <div class="pagetitle">
        <h1>{{ isset($product) ? 'Edit Produk' : 'Tambah Produk' }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Data Produk</a></li>
                <li class="breadcrumb-item active">{{ isset($product) ? 'Edit Produk' : 'Tambah Produk' }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form {{ isset($product) ? 'Edit' : 'Tambah' }} Produk</h5>

                        <!-- General Form Elements -->
                        <form action="{{ isset($product) ? route('product.update', $product->id) : route('product.store') }}" method="POST">
                            @csrf
                            @if(isset($product))
                                @method('PUT')
                            @endif

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
                                <label for="name" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($product) ? $product->name : '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">Stok</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', isset($product) ? $product->stock : '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', isset($product) ? $product->price : '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi (opsional)</label>
                                <textarea class="form-control" id="description" name="description">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Perbarui' : 'Tambah' }} Produk</button>
                        </form>
                        <!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
