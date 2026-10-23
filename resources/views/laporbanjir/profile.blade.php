@extends('layouts.app')

@section('title', 'Profil Petugas')

@section('content')
<div style="max-width: 620px; margin: 2rem auto;">
    <div class="card">
        <div class="card-header">👤 Profil Petugas</div>

        <div style="display:grid; gap:1rem;">
            <div>
                <div style="font-size:.8rem; color:#64748b; text-transform:uppercase; letter-spacing:.08em; font-weight:700; margin-bottom:.35rem;">Nama</div>
                <div style="font-size:1.2rem; font-weight:700; color:#0c4a6e;">{{ $user->name }}</div>
            </div>

            <div>
                <div style="font-size:.8rem; color:#64748b; text-transform:uppercase; letter-spacing:.08em; font-weight:700; margin-bottom:.35rem;">Email</div>
                <div style="font-size:1rem; color:#1f2937;">{{ $user->email }}</div>
            </div>

            <div>
                <div style="font-size:.8rem; color:#64748b; text-transform:uppercase; letter-spacing:.08em; font-weight:700; margin-bottom:.35rem;">Waktu Pembuatan Akun</div>
                <div style="font-size:1rem; color:#1f2937;">{{ $user->created_at->translatedFormat('d F Y, H:i') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
