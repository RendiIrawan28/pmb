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
        \App\Models\refRole::insert([
            [
                'nama_role' => 'calon_mahasiswa',
            ],
            [
                'nama_role' => 'admin',
            ],
            [
                'nama_role' => 'super_admin',
            ],
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

        \App\Models\RefBerkas::insert([
            [
                'jenis_berkas' => 'KK',
            ],
            [
                'jenis_berkas' => 'Ijazah',
            ],
            [
                'jenis_berkas' => 'SKHUN',
            ],
        ]);
        \App\Models\refBuktiPembayaran::insert([
            [
                'jenis_berkas_pembayaran' => 'Bank BRI',
            ],
            [
                'jenis_berkas_pembayaran' => 'Bank Jateng',
            ],
            [
                'jenis_berkas_pembayaran' => 'Bank Mandiri',
            ],
        ]);
        \App\Models\refJenisKelamin::insert([
            [
                'jenis_kelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_kelamin' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);

        \App\Models\RefAgama::insert([
            [
                'nama_agama' => 'Islam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_agama' => 'Kristen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_agama' => 'Katolik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_agama' => 'Hindu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_agama' => 'Budha',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_agama' => 'Konghucu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_agama' => 'Lainnya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        \App\Models\RefPenghasilanOrangTua::insert([
            [
                'penghasilan_orang_tua' => 'Rp. 0 - Rp. 1.000.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penghasilan_orang_tua' => 'Rp. 1.000.000 - Rp. 2.000.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'penghasilan_orang_tua' => 'Rp. 2.000.000 - Rp. 3.000.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'penghasilan_orang_tua' => 'Rp. 3.000.000 - Rp. 4.000.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'penghasilan_orang_tua' => 'Rp. 4.000.000 - Rp. 5.000.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'penghasilan_orang_tua' => 'Rp. 5.000.000 - Rp. 6.000.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'penghasilan_orang_tua' => 'Rp. 6.000.000 - Rp. 7.000.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'penghasilan_orang_tua' => 'Rp. 7.000.000 - Rp. 8.000.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'penghasilan_orang_tua' => 'Rp. 8.000.000 - Rp. 9.000.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'penghasilan_orang_tua' => 'Rp. 9.000.000 - Rp. 10.000.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'penghasilan_orang_tua' => 'Lebih dari Rp. 10.000.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        \App\Models\User::insert([
            [
                'name' => 'test1',
                'email' => 'test@gmail.com',
                'password' => bcrypt('asdasdasd'),
                'email_verified_at' => now(),
                'id_role' => 1,
            ],
            [
                'name' => 'test2',
                'email' => 'test2@gmail.com',
                'password' => bcrypt('asdasdasd'),
                'email_verified_at' => now(),
                'id_role' => 2,
            ],
            [
                'name' => 'test3',
                'email' => 'test3@gmail.com',
                'password' => bcrypt('asdasdasd'),
                'email_verified_at' => now(),
                'id_role' => 3,
            ],
            ]);

    }
}
