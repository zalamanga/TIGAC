<?php

namespace Database\Seeders;

use App\Models\Newsletter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageBaseURL = 'images/newsletters/';

        $newsletters = [
            [
                "id" => "1",
                "title" => "TIGAC Berbagi Kebahagiaan Ramadan Bersama Anak-Anak Yatim Piatu",
                "content" => "<div><div>Startup di bidang industri liquid, TIGAC menyelenggarakan buka puasa bersama anak-anak yatim piatu belum lama ini. Kegiatan tersebut bersamaan dengan peresmian kantor baru di kawasan Pesanggrahan</div></div>",
                "slug" => Str::slug("TIGAC Berbagi Kebahagiaan Ramadan Bersama Anak-Anak Yatim Piatu", "-"),
                "thumbnail" => $imageBaseURL . "1.png",
                "thumbnail_short_description" => "TIGAC Berbagi Kebahagiaan Ramadan Bersama Anak-Anak Yatim Piatu",
                "is_active" => '1'
            ],
            [
                "id" => "2",
                "title" => "Vapezoo Dan Tigac Gaet Deadsquad Luncurkan Karya Baru “Enigmatic Pandemonium",
                "content" => "<div><div>Grup musik death metal, Deadsquad, tampil gahar malam ini. Mereka tampil di atas panggung dengan teknologi pencahayaan dan visual itu, Deadsquad tampil membawakan 13 lagu andal. Mereka melakukannya dengan senang hati</div></div>",
                "slug" => Str::slug("Vapezoo Dan Tigac Gaet Deadsquad Luncurkan Karya Baru “Enigmatic Pandemonium", "-"),
                "thumbnail" => $imageBaseURL . "1.png",
                "thumbnail_short_description" => "Vapezoo Dan Tigac Gaet Deadsquad Luncurkan Karya Baru “Enigmatic Pandemonium",
                "is_active" => '1'
            ],
            [
                "id" => "3",
                "title" => "Kolaborasi dengan Vapezoo dan TIGAC, Slank Luncurkan Poppies Liquid Vape",
                "content" => "<div><div>Dalam sebuah konser yang digelar secara online dan disiarkan di kanal youtube SlankTube, serta media sosial Vapezoo dan TIGAC, Slank meluncurkan produk liquid vape yang diberi nama Poppies. Nama Poppies yang identik dengan pop ice yang rasanya bermacam-macam.</div></div>",
                "slug" => Str::slug("Kolaborasi dengan Vapezoo dan TIGAC, Slank Luncurkan Poppies Liquid Vape", "-"),
                "thumbnail" => $imageBaseURL . "1.png",
                "thumbnail_short_description" => "Kolaborasi dengan Vapezoo dan TIGAC, Slank Luncurkan Poppies Liquid Vape",
                "is_active" => '1'
            ]
        ];

        foreach ($newsletters as $newsletter) {
            Newsletter::create($newsletter);
        }
    }
}
