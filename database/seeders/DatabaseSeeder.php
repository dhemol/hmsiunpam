<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use App\Models\Faq;
use App\Models\Event;
use App\Models\About;
use App\Models\Galeri;
use App\Models\Member;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Dede Maulana',
            'email' => 'dhemol@icloud.com',
            'username' => 'dhemol',
            'password' => bcrypt('dhemol'),
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

        // Post::create([
        //     'title' => 'Batas Registrasi Gelombang 2 PMB Program Studi Sistem Informasi',
        //     'category_id' => '1',
        //     'admin_id' => '1',
        //     'slug' => 'batas-registrasi-gelombang-2-pmb-program-studi-sistem-informasi',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam necessitatibus itaque unde vel totam. Quae, aperiam tempora explicabo',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam necessitatibus itaque unde vel totam. Quae, aperiam tempora explicabo, debitis facere hic rem repellendus aliquid, accusamus non sunt. Cupiditate culpa in laudantium reprehenderit sint quibusdam dolorum ab quisquam? Beatae, fugiat! Nostrum minus nisi in voluptate illo placeat! </p><p> nesciunt fuga harum repudiandae recusandae inventore sapiente explicabo voluptatibus ratione labore temporibus non quis corrupti dignissimos sequi debitis, odio molestiae sed quisquam, quas ipsam aspernatur adipisci laboriosam libero. Alias, ipsa illo rem dolores officia consequatur, reprehenderit at enim inventore, </p> <p>eius natus fugiat nam soluta ducimus iure eaque amet. Enim, tempora amet. Possimus quod, consequuntur eveniet recusandae incidunt dolorem tempore expedita nobis voluptates id sequi beatae, suscipit nam voluptatibus sint qui ipsam nesciunt quos repellat accusantium debitis modi maxime voluptatum? Harum necessitatibus eveniet nisi, odio quam fugit commodi consequatur laborum voluptas totam corporis quas distinctio dolor alias inventore repellat delectus adipisci soluta neque officia!</p>'
        // ]);

        // Post::create([
        //     'title' => 'SIFEST TOURNAMENT 2022',
        //     'category_id' => '2',
        //     'admin_id' => '1',
        //     'slug' => 'sifest-tournament-2022',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam necessitatibus itaque unde vel totam. Quae, aperiam tempora explicabo',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam necessitatibus itaque unde vel totam. Quae, aperiam tempora explicabo, debitis facere hic rem repellendus aliquid, accusamus non sunt. Cupiditate culpa in laudantium reprehenderit sint quibusdam dolorum ab quisquam? Beatae, fugiat! Nostrum minus nisi in voluptate illo placeat! </p><p> nesciunt fuga harum repudiandae recusandae inventore sapiente explicabo voluptatibus ratione labore temporibus non quis corrupti dignissimos sequi debitis, odio molestiae sed quisquam, quas ipsam aspernatur adipisci laboriosam libero. Alias, ipsa illo rem dolores officia consequatur, reprehenderit at enim inventore, </p> <p>eius natus fugiat nam soluta ducimus iure eaque amet. Enim, tempora amet. Possimus quod, consequuntur eveniet recusandae incidunt dolorem tempore expedita nobis voluptates id sequi beatae, suscipit nam voluptatibus sint qui ipsam nesciunt quos repellat accusantium debitis modi maxime voluptatum? Harum necessitatibus eveniet nisi, odio quam fugit commodi consequatur laborum voluptas totam corporis quas distinctio dolor alias inventore repellat delectus adipisci soluta neque officia!</p>'
        // ]);

        // Post::create([
        //     'title' => 'BEASISWA UKT 2022',
        //     'category_id' => '3',
        //     'admin_id' => '1',
        //     'slug' => 'beasiswa-ukt-2022',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam necessitatibus itaque unde vel totam. Quae, aperiam tempora explicabo',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam necessitatibus itaque unde vel totam. Quae, aperiam tempora explicabo, debitis facere hic rem repellendus aliquid, accusamus non sunt. Cupiditate culpa in laudantium reprehenderit sint quibusdam dolorum ab quisquam? Beatae, fugiat! Nostrum minus nisi in voluptate illo placeat! </p><p> nesciunt fuga harum repudiandae recusandae inventore sapiente explicabo voluptatibus ratione labore temporibus non quis corrupti dignissimos sequi debitis, odio molestiae sed quisquam, quas ipsam aspernatur adipisci laboriosam libero. Alias, ipsa illo rem dolores officia consequatur, reprehenderit at enim inventore, </p> <p>eius natus fugiat nam soluta ducimus iure eaque amet. Enim, tempora amet. Possimus quod, consequuntur eveniet recusandae incidunt dolorem tempore expedita nobis voluptates id sequi beatae, suscipit nam voluptatibus sint qui ipsam nesciunt quos repellat accusantium debitis modi maxime voluptatum? Harum necessitatibus eveniet nisi, odio quam fugit commodi consequatur laborum voluptas totam corporis quas distinctio dolor alias inventore repellat delectus adipisci soluta neque officia!</p>'
        // ]);

        // Post::create([
        //     'title' => 'MAKRAB & UPGRADING PENGURUS HMSI UNPAM 2022/2023',
        //     'category_id' => '4',
        //     'admin_id' => '1',
        //     'slug' => 'makrab-upgrading-pengurus-hmsi-unpam-2022-2023',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam necessitatibus itaque unde vel totam. Quae, aperiam tempora explicabo',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam necessitatibus itaque unde vel totam. Quae, aperiam tempora explicabo, debitis facere hic rem repellendus aliquid, accusamus non sunt. Cupiditate culpa in laudantium reprehenderit sint quibusdam dolorum ab quisquam? Beatae, fugiat! Nostrum minus nisi in voluptate illo placeat! </p><p> nesciunt fuga harum repudiandae recusandae inventore sapiente explicabo voluptatibus ratione labore temporibus non quis corrupti dignissimos sequi debitis, odio molestiae sed quisquam, quas ipsam aspernatur adipisci laboriosam libero. Alias, ipsa illo rem dolores officia consequatur, reprehenderit at enim inventore, </p> <p>eius natus fugiat nam soluta ducimus iure eaque amet. Enim, tempora amet. Possimus quod, consequuntur eveniet recusandae incidunt dolorem tempore expedita nobis voluptates id sequi beatae, suscipit nam voluptatibus sint qui ipsam nesciunt quos repellat accusantium debitis modi maxime voluptatum? Harum necessitatibus eveniet nisi, odio quam fugit commodi consequatur laborum voluptas totam corporis quas distinctio dolor alias inventore repellat delectus adipisci soluta neque officia!</p>'
        // ]);

        // Post::create([
        //     'title' => 'PKM DI DESA PENARI OLEH PENGURUS HMSI UNPAM',
        //     'category_id' => '5',
        //     'admin_id' => '1',
        //     'slug' => 'pkm-di-desa-penari-oleh-pengurus-hmsi-unpam',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam necessitatibus itaque unde vel totam. Quae, aperiam tempora explicabo',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam necessitatibus itaque unde vel totam. Quae, aperiam tempora explicabo, debitis facere hic rem repellendus aliquid, accusamus non sunt. Cupiditate culpa in laudantium reprehenderit sint quibusdam dolorum ab quisquam? Beatae, fugiat! Nostrum minus nisi in voluptate illo placeat! </p><p> nesciunt fuga harum repudiandae recusandae inventore sapiente explicabo voluptatibus ratione labore temporibus non quis corrupti dignissimos sequi debitis, odio molestiae sed quisquam, quas ipsam aspernatur adipisci laboriosam libero. Alias, ipsa illo rem dolores officia consequatur, reprehenderit at enim inventore, </p> <p>eius natus fugiat nam soluta ducimus iure eaque amet. Enim, tempora amet. Possimus quod, consequuntur eveniet recusandae incidunt dolorem tempore expedita nobis voluptates id sequi beatae, suscipit nam voluptatibus sint qui ipsam nesciunt quos repellat accusantium debitis modi maxime voluptatum? Harum necessitatibus eveniet nisi, odio quam fugit commodi consequatur laborum voluptas totam corporis quas distinctio dolor alias inventore repellat delectus adipisci soluta neque officia!</p>'
        // ]);

        Post::factory(18)->create();
        Event::factory(1)->create();
        Member::factory(100)->create();

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
