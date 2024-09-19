@extends('layouts.auth')

@section('content')
    <div class="container mt-5">
        <div class="mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 my-5">
                    <div class="card mt-5 shadow">
                        <div class="card-body">
                            <h3 class="text-center font-weight-bold">Selamat Datang!</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('registerStore') }}">
                                @csrf
                                <div class="form-group my-4">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                        placeholder="Nama" required>
                                </div>
                                <div class="form-group my-4">
                                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}"
                                        placeholder="Username" required>
                                </div>
                                <div class="form-group my-4">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                        placeholder="Masukkan Email" required>
                                </div>
                                <div class="input-group my-4">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Masukkan Password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="input-group my-4">
                                    <input type="password" class="form-control" id="password-confirm"
                                        name="password_confirmation" placeholder="Konfirmasi Password" required
                                        autocomplete="new-password">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="togglePasswordConfirm">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i>
                                    Register</button>
                            </form>
                        </div>
                        <hr>
                        <div class="text-center small">
                            <p>Sudah Punya akun? <a href="{{ route('login') }}">Login!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
