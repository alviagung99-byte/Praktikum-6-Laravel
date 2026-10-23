@extends('layouts.app')

@section('title', 'Login Petugas')

@section('content')
<div style="max-width: 440px; margin: 3rem auto;">
    <div class="card">
        <div class="card-header" style="margin-bottom: 1.25rem; text-align: center;">
            🔐 Login Petugas BPBD
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

        <form method="POST" action="{{ route('laporbanjir.login.submit') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </form>

        <div style="text-align:center; margin-top:1rem; color:#64748b; font-size:.9rem;">
            Belum punya akun? <a href="{{ route('laporbanjir.register') }}" style="color:#1d4ed8; font-weight:700;">Daftar petugas</a>
        </div>
    </div>
</div>
@endsection
