@extends('layouts.app')

@section('title', 'Register Petugas')

@section('content')
<div style="max-width: 480px; margin: 3rem auto;">
    <div class="card">
        <div class="card-header" style="margin-bottom: 1.25rem; text-align: center;">
            📝 Register Petugas BPBD
        </div>

        @if ($errors->any())
            <div style="background:#fef2f2; color:#991b1b; border:1px solid #fecaca; border-radius:10px; padding:.85rem 1rem; margin-bottom:1rem;">
                <ul style="margin:0; padding-left:1.2rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('laporbanjir.register.submit') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="name">Nama Lengkap</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        </form>

        <div style="text-align:center; margin-top:1rem; color:#64748b; font-size:.9rem;">
            Sudah punya akun? <a href="{{ route('laporbanjir.login') }}" style="color:#1d4ed8; font-weight:700;">Masuk</a>
        </div>
    </div>
</div>
@endsection
