@extends('layouts.auth')

@section('content')
    <div class="container mt-5">
        <div class="mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 my-5">
                    <div class="card mt-5 shadow">
                        <div class="card-body">
                            <h3 class="text-center font-weight-bold">Login</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('loginStore') }}">
                                @csrf
                                <div class="form-group mt-5 mb-4">
                                    <input type="email" class="form-control" id="email"name="email" placeholder="Masukkan Email" value="{{ old('email') }}"
                                        required>
                                </div>
                                <div class="input-group my-4">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Masukkan Password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="togglePassword">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>                        
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i>
                                    Login</button>
                            </form>
                        </div>
                        <hr>
                        <div class="text-center small">
                            <p>Belum Punya akun? <a href="{{ route('register') }}">Daftar Sekarang!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
