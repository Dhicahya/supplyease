@extends('layouts.app')

@section('title', 'Tambah Supplier')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Supplier</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Data Supplier</a></li>
                <li class="breadcrumb-item active">Tambah Supplier</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Tambah Supplier</h5>

                        <!-- General Form Elements -->
                        <form action="{{ route('supplier.store') }}" method="POST">
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
                                <label for="name" class="form-label">Nama Supplier</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="contact" class="form-label">Nomor Telepon</label>
                                <input type="text" name="contact" class="form-control" id="contact" value="{{ old('contact') }}" required>
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
