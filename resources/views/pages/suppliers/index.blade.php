@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Daftar Supplier</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Daftar Supplier</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Daftar Supplier</h5>
                        <a href="{{ route('supplier.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="bi bi-plus-lg"></i> Tambah Supplier
                        </a>
                    </div>

                    <!-- Flash message untuk notifikasi sukses -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tabel untuk menampilkan daftar supplier -->
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Supplier</th>
                                    <th scope="col">Kontak</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suppliers as $index => $supplier)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $supplier->name }}</td>
                                        <td>{{ $supplier->contact }}</td>
                                        <td>{{ $supplier->address }}</td>
                                        <td>
                                            <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-success">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">
                                                <i class="bi bi-trash3"></i>
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
