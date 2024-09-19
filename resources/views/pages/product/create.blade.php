@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Data Produk</a></li>
                <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Tambah Produk</h5>

                        <!-- General Form Elements -->
                        <form action="{{ route('product.store') }}" method="POST">
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
                                <label for="name" class="form-label">Nama Produk</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">Stok</label>
                                <input type="number" name="stock" class="form-control" id="stock" value="{{ old('stock') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Harga</label>
                                <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi (opsional)</label>
                                <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
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
