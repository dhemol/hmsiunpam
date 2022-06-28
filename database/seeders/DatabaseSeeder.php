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
use App\Models\Position;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'name' => 'None',
            'slug' => 'none',
        ]);

        Position::create([
            'name' => 'Anggota',
            'slug' => 'anggota',
        ]);

        Position::create([
            'name' => 'Ketua Umum',
            'slug' => 'ketua-umum',
        ]);

        Position::create([
            'name' => 'Wakil Ketua Umum',
            'slug' => 'wakil-ketua-umum',
        ]);

        Position::create([
            'name' => 'Sekretaris Umum',
            'slug' => 'sekretaris-umum',
        ]);

        Position::create([
            'name' => 'Wakil Sekretaris Umum',
            'slug' => 'wakil-sekretaris-umum',
        ]);

        Position::create([
            'name' => 'Bendahara Umum',
            'slug' => 'bendahara-umum',
        ]);

        Position::create([
            'name' => 'Wakil Bendahara Umum',
            'slug' => 'wakil-bendahara-umum',
        ]);

        Position::create([
            'name' => 'Ketua Bidang',
            'slug' => 'ketua-bidang',
        ]);

        Position::create([
            'name' => 'Wakil Sekretaris Bidang',
            'slug' => 'wakil-sekretaris-bidang',
        ]);


        Field::create([
            'name' => 'None',
            'slug' => 'none',
        ]);

        Field::create([
            'name' => 'Badan Pengurus Harian',
            'slug' => 'badan-pengurus-harian',
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
            'field_id' => 1,
            'name' => 'Latihan Dasar Kepemimpinan Organisasi',
            'slug' => 'latihan-dasar-kepemimpinan-organisasi',
        ]);

        Department::create([
            'field_id' => 1,
            'name' => 'None',
            'slug' => 'none',
        ]);

        Department::create([
            'field_id' => 1,
            'name' => 'Pengkaderan',
            'slug' => 'pengkaderan',
        ]);

        Department::create([
            'field_id' => 1,
            'name' => 'Developer Web',
            'slug' => 'developer-web',
        ]);

        Department::create([
            'field_id' => 1,
            'name' => 'Editor',
            'slug' => 'editor',
        ]);

        Department::create([
            'field_id' => 1,
            'name' => 'Admin Sosial Media',
            'slug' => 'admin-sosial-media',
        ]);

        Department::create([
            'field_id' => 1,
            'name' => 'Kajian Kerohanian',
            'slug' => 'kajian-kerohanian',
        ]);

        Department::create([
            'field_id' => 1,
            'name' => 'Toleransi dan Kepribadian',
            'slug' => 'toleransi-dan-kepribadian',
        ]);

        Department::create([
            'field_id' => 1,
            'name' => 'Humas Internal',
            'slug' => 'humas-internal',
        ]);

        Department::create([
            'field_id' => 1,
            'name' => 'Humas External',
            'slug' => 'humas-external',
        ]);

        Department::create([
            'field_id' => 1,
            'name' => 'Kegiatan Olahraga Mingguan',
            'slug' => 'kegiatan-olahraga-mingguan',
        ]);

        Department::create([
            'field_id' => 1,
            'name' => 'Koordinator Lomba',
            'slug' => 'koordinator-lomba',
        ]);

        User::create([
            'name' => 'Akram Daffa',
            'nba' => 4,
            'username' => 'akramdaffa',
            'email' => 'akramdaffa@gmail.com',
            'password' => bcrypt('akram123'),
            'address' => 'Karawaci, Tangerang',
            'no_hp' => '088866667777',
            'position_id' => 1,
            'field_id' => 2,
            'department_id' => 2
        ]);

        User::create([
            'name' => 'Vega Anggara Saputra',
            'nba' => 3,
            'username' => 'vegaanggara',
            'email' => 'vegaanggara@gmail.com',
            'password' => bcrypt('vega123'),
            'address' => 'Karawaci, Tangerang',
            'no_hp' => '088866668888',
            'position_id' => 1,
            'field_id' => 5,
            'department_id' => 1
        ]);

        User::create([
            'name' => 'Dede Maulana',
            'nba' => 2,
            'username' => 'dhemol',
            'email' => 'dhemol@icloud.com',
            'password' => bcrypt('dhemol123'),
            'address' => 'Serua, Bojongsari, Depok',
            'no_hp' => '085157740434',
            'role' => 'admin',
            'position_id' => 1,
            'field_id' => 1,
            'department_id' => 1
        ]);

        User::create([
            'name' => 'Selly Septiani, S.Si, M.Kom',
            'nba' => 1,
            'username' => 'sellyseptiani',
            'email' => 'sellyseptiani@gmail.com',
            'password' => bcrypt('selly123'),
            'address' => 'Serang, Banten',
            'no_hp' => '08886666666',
            'role' => 'superadmin',
            'position_id' => 1,
            'field_id' => 1,
            'department_id' => 1
        ]);


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
            'location' => 'Universitas Pamulang',
            'image' => 'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60',

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
    }
}
