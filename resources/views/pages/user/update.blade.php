@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
    <div class="pagetitle">
        <h1>Edit Data Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Data Pengguna</a></li>
                <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">General Form Elements</h5>
                        <!-- General Form Elements -->
                        <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="image_path" class="form-label">Foto</label>
                                <input type="file" name="image_path" class="form-control" id="image_path"
                                    value="{{ $user->image_path }}">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ $user->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    value="{{ $user->username }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="email"
                                    value="{{ $user->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password (isi jika ingin ganti password)</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="password">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="role" id="roleStaff"
                                            value="staff" {{ $user->role == 'staff' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="roleStaff">Staff</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="role" id="roleAdmin"
                                            value="admin" {{ $user->role == 'admin' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="roleAdmin">Admin</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </form>
                        <!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.container-fluid -->
@endsection
