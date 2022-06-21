<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\Faq;
use App\Models\User;
use App\Models\Event;
use App\Models\Field;
use App\Models\Department;
use App\Models\Status;
use App\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            'name' => 'Academic',
            'slug' => 'academic',
        ]);

        Category::create([
            'name' => 'Event',
            'slug' => 'event',
        ]);

        Category::create([
            'name' => 'Scholarship',
            'slug' => 'scholarship',
        ]);

        Category::create([
            'name' => 'Organization',
            'slug' => 'organization',
        ]);

        Category::create([
            'name' => 'Technology Research',
            'slug' => 'technology-research',
        ]);

        Category::create([
            'name' => 'Community Service',
            'slug' => 'community-service',
        ]);

        Post::factory(18)->create();

        Event::create([
            'title' => 'RAKASI',
            'category_id' => '4',
            'slug' => 'rakasi',
            'cost' => '100000',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam necessitatibus itaque unde vel totam. Quae, aperiam tempora explicabo',
            'start' => '2022-06-20',
            'end' => '2022-06-25',

        ]);

        Faq::create([
            'question' => 'Apa itu HMSI UNPAM?',
            'slug' => 'apa-itu-hmsi-unpam',
            'answer' => '<p>HMSI UNPAM adalah singkatan dari Himpunan Mahasiswa Sistem Informasi Universitas Pamulang yang merupakan Organisasi Kemahasiswaan yang menaungi aspirasi mahasiswa SI diberbagai bidang, baik yang bersifat akademik maupun nonakademik.</p>'
        ]);

        Faq::create([
            'question' => 'Siapa saja yang ada di HMSI UNPAM?',
            'slug' => 'siapa-saja-yang-ada-di-hmsi-unpam',
            'answer' => '<p>Seluruh mahasiswa Sistem Informasi Universitas Pamulang yang terbagi menjadi dua, yaitu:
                <b>MAHASISWA AKTIF & MAHASISWA PASIF</b>
                <blockquote> <i class="fa fa-quote-left"></i> <b>MAHASISWA AKTIF</b> adalah Mahasiswa Sistem Informasi Universitas Pamulang yang mengikuti seluruh rangkaian proses menjadi anggota resmi HMSI UNPAM. 
                <br>
                <b>MAHASISWA PASIF</b> adalah Mahasiswa Sistem Informasi Universitas Pamulang yang tidak menjadi anggota resmi HMSI UNPAM.
                </blockquote></p>'
        ]);

        Faq::create([
            'question' => 'Bagaimana cara bergabung di HMSI UNPAM?',
            'slug' => 'bagaimana-cara-bergabung-di-hmsi-unpam',
            'answer' => '<p>HMSI UNPAM membuka pendaftaran untuk calon kader setiap periodenya. Just stay tune on Our Social Media</p>'
        ]);

        Faq::create([
            'question' => 'Apa saja keuntungan menjadi anggota resmi HMSI UNPAM?',
            'slug' => 'apa-saja-keuntungan-menjadi-anggota-resmi-hmsi-unpam',
            'answer' => '<p><b>PASTINYA BANYAK SEKALI</b>, Selain dapat belajar mengenai dunia teknologi lainnya, HMSI UNPAM juga memberikan dampak yang luar biasa untuk pengalaman dalam belajar berorganisasi, meningkatkan kemampuan public speaking, leadership, kewirausahaan dan lain - lain.</p>'
        ]);

        Field::create([
            'name' => 'Pengembangan Kader Organisasi',
            'slug' => 'pengembangan-kader-organisasi',
        ]);

        Field::create([
            'name' => 'Pengembangan Ilmu Pengetahuan Komunikasi dan Informasi',
            'slug' => 'pengembangan-ilmu-pengetahuan-komunikasi-dan-informasi',
        ]);

        Field::create([
            'name' => 'Kerohanian',
            'slug' => 'kerohanian',
        ]);

        Field::create([
            'name' => 'Hubungan Masyarakat',
            'slug' => 'hubungan-masyarakat',
        ]);

        Field::create([
            'name' => 'Minat Bakat dan Olahraga',
            'slug' => 'minat-bakat-dan-olahraga',
        ]);

        Department::create([
            'field_id' => '1',
            'name' => 'Latihan Dasar Kepemimpinan Organisasi',
            'slug' => 'latihan-dasar-kepemimpinan-organisasi',
        ]);

        Department::create([
            'field_id' => '1',
            'name' => 'Pengkaderan',
            'slug' => 'pengkaderan',
        ]);

        Department::create([
            'field_id' => '2',
            'name' => 'Admin Sosial Media',
            'slug' => 'admin-sosial-media',
        ]);

        Department::create([
            'field_id' => '2',
            'name' => 'Editor',
            'slug' => 'editor',
        ]);

        Department::create([
            'field_id' => '2',
            'name' => 'Penerapan Konsep Manajemen Informasi',
            'slug' => 'penerapan-konsep-manajemen-informasi',
        ]);

        Department::create([
            'field_id' => '3',
            'name' => 'Kajian Kerohanian',
            'slug' => 'kajian-kerohanian',
        ]);

        Department::create([
            'field_id' => '3',
            'name' => 'Toleransi dan Kepribadian',
            'slug' => 'toleransi-dan-kepribadian',
        ]);

        Department::create([
            'field_id' => '4',
            'name' => 'Humas Internal',
            'slug' => 'humas-internal',
        ]);

        Department::create([
            'field_id' => '4',
            'name' => 'Humas External',
            'slug' => 'humas-external',
        ]);

        Department::create([
            'field_id' => '5',
            'name' => 'Kegiatan Olahraga Mingguan',
            'slug' => 'kegiatan-olahraga-mingguan',
        ]);

        Department::create([
            'field_id' => '5',
            'name' => 'Koordinator Lomba',
            'slug' => 'koordinator-lomba',
        ]);

        Status::create([
            'name' => 'Anggota Aktif',
            'slug' => 'anggota-aktif',
        ]);

        Status::create([
            'name' => 'Anggota Pasif',
            'slug' => 'anggota-pasif',
        ]);

        Status::create([
            'name' => 'Demisioner',
            'slug' => 'demisioner',
        ]);

        Role::create([
            'name' => 'Anggota',
            'slug' => 'anggota'
        ]);

        Role::create([
            'name' => 'Admin',
            'slug' => 'admin'
        ]);

        Role::create([
            'name' => 'Superadmin',
            'slug' => 'superadmin'
        ]);

        User::create([
            'name' => 'Akram Daffa',
            'username' => 'akramdaffa',
            'email' => 'akramdaffa@gmail.com',
            'password' => bcrypt('akram123'),
            'address' => 'Karawaci, Tangerang',
            'no_hp' => '088866667777',
            'role_id' => 1,
            'status_id' => 1,
            'field_id' => 2,
            'department_id' => 2
        ]);

        User::create([
            'name' => 'Dede Maulana',
            'username' => 'dhemol',
            'email' => 'dhemol@icloud.com',
            'password' => bcrypt('dhemol123'),
            'address' => 'Serua, Bojongsari, Depok',
            'no_hp' => '085157740434',
            'role_id' => 2,
            'status_id' => 1,
        ]);

        User::create([
            'name' => 'Selly Septiani, S.Si, M.Kom',
            'username' => 'sellyseptiani',
            'email' => 'sellyseptiani@gmail.com',
            'password' => bcrypt('selly123'),
            'address' => 'Serang, Banten',
            'no_hp' => '08886666666',
            'role_id' => 3,
            'status_id' => 1,
        ]);
    }
}
