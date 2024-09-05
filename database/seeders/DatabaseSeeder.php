<?php

namespace Database\Seeders;

use App\Models\artikel;
use App\Models\barang;
use App\Models\booking;
use App\Models\bukti;
use App\Models\detail_transaksi;
use App\Models\detailTransaksi;
use App\Models\mekanik;
use App\Models\pesan;
use App\Models\rating;
use App\Models\transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Membuat data pengguna
        User::create([
            'nama' => 'Zakia',
            'email' => 'zakia@gmail.com',
            'password' => bcrypt('1'),
            'role' => 'Admin',
            'kontak' => '0895746128',
            'profil' => 'img/sapa.jpeg',
            'alamat' => 'Jl. Jaya Indah No. 45, RT 03 RW 05, Kelurahan Suka Maju, Kecamatan Harapan, Kota Bandung, Provinsi Nusantara, 12345'
        ]);
        User::create([
            'nama' => 'Sri',
            'email' => 'sri@gmail.com',
            'password' => bcrypt('2'),
            'role' => 'Pengguna',
            'kontak' => '0890846128',
            'profil' => 'img/mega.jpeg',
            'alamat' => 'Jl. Merpati Indah No. 45, RT 03 RW 05, Kelurahan Suka Maju, Kecamatan Harapan Jaya, Kota Sejahtera, Provinsi Nusantara, 12345'
        ]);
        User::create([
            'nama' => 'Wati',
            'email' => 'wati@gmail.com',
            'password' => bcrypt('3'),
            'role' => 'Owner',
            'kontak' => '0870643854384',
            'profil' => 'img/lawak.jpeg',
            'alamat' => 'Jl. Asriii No. 45, RT 03 RW 05, Kelurahan Suka kamu, Kecamatan Cisaat, Kota Sejahtera, Provinsi Nusantara, 12345'
        ]);
        User::create([
            'nama' => 'Rahma',
            'email' => 'rahma@gmail.com',
            'password' => bcrypt('4'),
            'role' => 'Mekanik',
            'kontak' => '0845474332200',
            'profil' => 'img/bean.jpeg',
            'alamat' => 'Jl. Merpati Indah No. 45, RT 03 RW 05, Kelurahan Suka Maju, Kecamatan Harapan Jaya, Kota S Sukabuami, Provinsi Nusantara, 12345'
        ]);
        User::create([
            'nama' => 'Ati',
            'email' => 'ati@gmail.com',
            'password' => bcrypt('5'),
            'role' => 'Mekanik',
            'kontak' => '0874642544',
            'profil' => 'img/meng.jpeg',
            'alamat' => 'Jl. Merah No. 45, RT 03 RW 05, Kelurahan Suka kamu, Kecamatan Cisaat, Kota Sejahtera, Provinsi Nusantara, 12345'
        ]);
        User::create([
            'nama' => 'Zack',
            'email' => 'zack@gmail.com',
            'password' => bcrypt('6'),
            'role' => 'Kasir',
            'kontak' => '0888753445',
            'profil' => 'img/ta.jpeg',
            'alamat' => 'Jl. Kuning No. 45, RT 03 RW 05, Kelurahan Suka kamu, Kecamatan Cisaat, Kota Sejahtera, Provinsi Nusantara, 12345'
        ]);
        pesan::create([
            'user_id' => 2,
            'merek_motor' => 'Honda',
            'mesin_motor' => '150cc',
            'seri_motor' => 'Vario',
            'no_plat' => 'F 4B4D UBD',
            'jenis_service' => 'Ganti Oli Mesin dan Oli Gardan',
            'tgl_service' => '2024-07-03',
            // 'foto'=> 'img/rimuru.jpg',
            'status_orderan' => 'diterima',
            'deskripsi' => 'mau ganti oli dengan oli yang berkualitas',
        ]);
        rating::create([
            'user_id' => 1,
            'rating' => '9/10',
            'deskripsi' => 'pelayanan yang sangat cepat dan sempurna'
        ]);
        artikel::create([
            'user_id' => 1,
            'gambar' => 'img/asian.jpg',
            'judul' => 'Cara Merawat Motor dengan Baik & Benar',
            'berita' => 'Untuk menjaga kendaraan Anda berfungsi dengan baik dan tahan lama, Anda harus rutin merawatnya. Berikut adalah beberapa tindakan penting yang dapat Anda lakukan:

Servis Berkala: Ganti oli, pemeriksaan rem, dan pengecekan komponen penting lainnya seperti rantai dan aki adalah bagian dari perawatan berkala yang disarankan oleh pabrik.

Terlalu sedikit atau terlalu kotor oli dapat menyebabkan kerusakan yang signifikan pada mesin. Pastikan tingkat oli mesin selalu berada di bawah ambang normal.

Periksa Tekanan Ban: Ban yang terlalu kempis atau aus dapat mengurangi kenyamanan dan keselamatan berkendara.

Bersihkan Filter Udara: Untuk menjaga performa motor yang baik, bersihkan atau ganti filter udara secara teratur karena filter udara yang kotor dapat mengurangi efisiensi mesin dan mengkonsumsi lebih banyak bahan bakar.

Evaluasi Sistem'
        ]);
        artikel::create([
            'user_id' => 1,
            'gambar' => 'img/seve.jpg',
            'judul' => 'Cara Merawat Mesin Agar Tetap Prima',
            'berita' => 'Mobil Daihatsu Terios TS Extra keluaran tahun 2008 atau biasa disebut Gen 1 besutan Mamang, yang terkenal dengan Mamang Project-nya ini berhasil membuat mobil keluarga itu kelihatan gahar namun tetap elegan sporty dengan tampilan dengan lapisan stiker wrap warna dandelion yellow by  Good Fix Sticker'
        ]);
        artikel::create([
            'user_id' => 1,
            'gambar' => 'img/see.jpg',
            'judul' => 'Strategi Servis yang Tepat',
            'berita' => 'Untuk menjaga mesin motor berfungsi dengan baik dan memperpanjang umur kendaraan, perawatan yang tepat sangat penting. Berikut ini adalah beberapa saran bermanfaat untuk menjaga mesin motor dalam kondisi baik:

Ganti Oli Secara Berkala: Gunakan oli yang sesuai dengan spesifikasi mesin motor Anda untuk melumasi dan mendinginkan bagian mesin. Gantilah oli setiap beberapa bulan sekali atau sesuai dengan rekomendasi jarak tempuh.

Periksa dan Bersihkan Busi: Busi yang kotor atau aus dapat mengurangi efisiensi pembakaran dan membuat mesin sulit dihidupkan. Periksa busi secara berkala, bersihkan, atau ganti jika diperlukan untuk memastikan percikan api yang ideal.

Pastikan Sistem Pendingin Berfungsi Baik. Mesin yang terlalu panas dapat menyebabkan kerusakan besar. Untuk motor yang menggunakan pendingin cair, pastikan radiator bersih dan tingkat cairan pendingin tepat. Seandainya motor menggunakan'
        ]);
        artikel::create([
            'user_id' => 1,
            'gambar' => 'img/vaa.jpg',
            'judul' => 'Cara Efektif Menjaga Performa Maksimal',
            'berita' => 'Mobil Daihatsu Terios TS Extra keluaran tahun 2008 atau biasa disebut Gen 1 besutan Mamang, yang terkenal dengan Mamang Project-nya ini berhasil membuat mobil keluarga itu kelihatan gahar namun tetap elegan sporty dengan tampilan dengan lapisan stiker wrap warna dandelion yellow by  Good Fix Sticker'
        ]);

        barang::create([
            'pesan_id' => 1,
            'nama_barang' => 'oli mesin yamaha blue',
            'harga_barang' => '50000',
            'stock' => '100',
        ]);
        barang::create([
            'pesan_id' => 1,
            'nama_barang' => 'Kanvas Rem',
            'harga_barang' => '70000',
            'stock' => '100',
        ]);
        transaksi::create([
            'user_id' => 1,
            'pesan_id' => 1,
            'tgl_transaksi' => Carbon::now()->subDays(10),
            'keterangan' => 'Service Oli Mesin dan Gardan',
            'pemasukan' => 100000,
            'pengeluaran' => 0,
        ]);
        detail_transaksi::create([
            'pesan_id' => 1,
            'user_id' => 2,
            'barang_id' => 1,
            'transaksi_id' => 1,
            'jumlah' => 1,
            'biaya_penanganan' => 20000,
            'subtotal' => 70000
        ]);
        
         bukti::create([
            'user_id'=>2,
             'pesan_id'=>1,
             'foto'=> 'img/baru.jpg'
         ]);
    }
}
