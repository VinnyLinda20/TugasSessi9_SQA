<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Mahasiswa;

class MahasiswaFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_tambah_mahasiswa_baru(): void
    {
        $response = $this->post('/simpan-data',data: [
            'nim' => '12345678',
            'nama_lengkap' => 'Vinny Lindawaty',
            'jurusan' => 'Informatika',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2000-01-01',
            'no_hp' => '08983640722',
            'email' => 'vinnylindawaty@gmail.com',
            'alamat_tinggal' => 'Bandung'
            // 'foto' => 'foto_vinny.jpg'
        ]);

        $response->assertStatus( 302);
        $this->assertDatabaseHas('mahasiswa', [
            'nim' => '12345678',
            'nama_lengkap' => 'Vinny Lindawaty',

        ]);
    }
}
