<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthMiddlewareTest extends TestCase
{
    public function test_guest_is_redirected_from_internal_smartedu_pages_to_login(): void
    {
        $protectedPages = [
            '/staff-tu/dashboard',
            '/guru/dashboard',
            '/siswa/dashboard',
            '/orang-tua/dashboard',
            '/staff-tu/pengguna',
            '/staff-tu/kelas',
            '/staff-tu/mapel',
            '/siswa/materi',
            '/siswa/materi/MTK-01',
            '/siswa/latihan',
            '/siswa/latihan/MTK-01',
        ];

        foreach ($protectedPages as $page) {
            $this->get($page)->assertRedirect('/login');
        }
    }

    public function test_public_pages_remain_accessible_to_guests(): void
    {
        $this->get('/')->assertOk();
        $this->get('/login')->assertOk();
        $this->get('/pendaftaran')->assertOk();
    }
}
