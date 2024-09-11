<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Apakah produk TIGAC aman digunakan?',
                'answer' =>
                'Ya, produk-produk kami sangat aman. e-juice TIGAC telah melalui serangkaian uji lab untuk memastikan tidak ada bahan kimia berbahaya yang tidak diperlukan untuk vaping. Semua produk kami diproduksi sendiri di ruang khusus yang telah distandarisasi, memastikan tidak ada kontaminan yang masuk ke dalam proses produksi e-juice',
            ],
            [
                'question' => 'Bagaimana cara memesan produk TIGAC?',
                'answer' =>
                'Anda dapat memesan produk TIGAC melalui toko-toko vape terdekat atau melalui platform online resmi kami.',
            ],
            [
                'question' => 'Apa saja varian rasa yang ditawarkan oleh TIGAC?',
                'answer' =>
                'TIGAC menawarkan beragam varian rasa e-liquid yang memikat, mulai dari buah-buahan segar hingga pilihan rasa manis dan gurih. Anda dapat menemukan varian seperti buah-buahan tropis, permen, dan bahkan rasa minuman atau desert yang terinspirasi dari berbagai macam pilihan produk kami.',
            ],
            [
                'question' => 'Bagaimana cara memastikan keaslian produk TIGAC?',
                'answer' =>
                'Untuk memastikan keaslian produk TIGAC, pastikan untuk membeli produk hanya dari pengecer resmi atau platform online kami yang terpercaya. Setiap produk asli TIGAC akan memiliki label keaslian.',
            ],
            [
                'question' => 'Apakah ada program loyalitas atau promosi khusus bagi pelanggan dan mitra bisnis TIGAC?',
                'answer' =>
                'Ya, kami memiliki program loyalitas dan sering menawarkan promosi khusus bagi pelanggan setia kami. Pastikan untuk bergabung dengan milis kami atau mengikuti akun media sosial dan mengecek website resmi kami untuk mendapatkan informasi terbaru tentang penawaran, diskon, dan acara khusus yang sedang berlangsung.',
            ],
            [
                'question' => 'Bagaimana caranya KLAIM hadiah yang di dapatkan ?',
                'answer' =>
                'Silakan menghubungi Customer Service TIGAC untuk claim hadiah ke nomor berikut 0811-8888-2305.',
            ],
            [
                'question' => 'Bagaimana cara mengetahui Ketersediaan Produk untuk Wholesale?',
                'answer' =>
                'Silakan menghubungi Customer Service TIGAC untuk mengetahui stock ketersedian ke nomor berikut 0811-8888-2305 dan mengisi form yang di sediakan.',
            ],
            [
                'question' => 'Apakah produk e-juice TIGAC legal?',
                'answer' =>
                'Produk e-juice TIGAC termasuk dalam kategori produk tembakau alternatif yang diatur oleh pemerintah Indonesia. Penjualan dan distribusi e-juice di Indonesia harus mematuhi regulasi yang berlaku, seperti perizinan dan ketentuan label kesehatan. TIGAC berkomitmen untuk mematuhi semua peraturan tersebut guna memastikan bahwa produk yang dijual legal dan aman bagi konsumen. ',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
