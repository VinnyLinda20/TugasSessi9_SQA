<?php

namespace Tests\Unit;

use App\Models\Mahasiswa;
use PHPUnit\Framework\TestCase;

class MahasiswaTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_hitung_usia_mahasiswa(): void
    {
        $mahasiswa = new Mahasiswa(attributes: [
            'tanggal_lahir' => '2000-01-01',
        ]);

        $this->assertEquals(24, $mahasiswa->hitungUmur());
    }
}
