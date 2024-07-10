<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('asdasdasd'),
            'email_verified_at' => now(),
        ]);


        \App\Models\ProgramStudi::insert([
            [
                'nama_program_studi' => 'Teknik Informatika',
            ],
            [
                'nama_program_studi' => 'Teknik Elektro',
            ],
            [
                'nama_program_studi' => 'Teknik Mesin',
            ],
            [
                'nama_program_studi' => 'Teknik Sipil',
            ],
            [
                'nama_program_studi' => 'Teknik Kimia',
            ],
            
        ]);

        \App\Models\SumberInformasi::insert([
            [
                'nama_sumber_informasi' => 'Instagram',
            ],
            [
                'nama_sumber_informasi' => 'Facebook',
            ],
            [
                'nama_sumber_informasi' => 'Twitter',
            ],
            [
                'nama_sumber_informasi' => 'Teman',
            ],
            [
                'nama_sumber_informasi' => 'Sekolah',
            ],
            [
                'nama_sumber_informasi' => 'Keluarga',
            ],
            [
                'nama_sumber_informasi' => 'Lainnya',
            ],
        ]);

        \App\Models\JalurPendaftaran::insert([
            [
                'nama_jalur_pendaftaran' => 'SNMPTN',
            ],
            [
                'nama_jalur_pendaftaran' => 'SBMPTN',
            ],
            [
                'nama_jalur_pendaftaran' => 'Mandiri',
            ],
            [
                'nama_jalur_pendaftaran' => 'Lainnya',
            ],
        ]);

        \App\Models\RencanaTempatTinggal::insert([
            [
                'nama_rencana_tempat_tinggal' => 'Asrama',
            ],
            [
                'nama_rencana_tempat_tinggal' => 'Kos',
            ],
            [
                'nama_rencana_tempat_tinggal' => 'Kontrakan',
            ],
            [
                'nama_rencana_tempat_tinggal' => 'Rumah Sendiri',
            ],
            [
                'nama_rencana_tempat_tinggal' => 'Lainnya',
            ],
        ]);
    }
}
