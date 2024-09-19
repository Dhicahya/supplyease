@extends('layouts.app')

@section('title', isset($supplier) ? 'Edit Supplier' : 'Tambah Supplier')

@section('content')
    <div class="pagetitle">
        <h1>{{ isset($supplier) ? 'Edit Supplier' : 'Tambah Supplier' }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Data Supplier</a></li>
                <li class="breadcrumb-item active">{{ isset($supplier) ? 'Edit Supplier' : 'Tambah Supplier' }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form {{ isset($supplier) ? 'Edit' : 'Tambah' }} Supplier</h5>

                        <!-- General Form Elements -->
                        <form action="{{ isset($supplier) ? route('supplier.update', $supplier->id) : route('supplier.store') }}" method="POST">
                            @csrf
                            @if(isset($supplier))
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
                                <label for="name" class="form-label">Nama Supplier</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($supplier) ? $supplier->name : '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="contact" class="form-label">Kontak</label>
                                <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact', isset($supplier) ? $supplier->contact : '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea class="form-control" id="address" name="address" required>{{ old('address', isset($supplier) ? $supplier->address : '') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ isset($supplier) ? 'Perbarui' : 'Tambah' }} Supplier</button>
                        </form>
                        <!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
