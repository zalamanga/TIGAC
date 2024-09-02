<?php

namespace Database\Seeders;

use App\Models\VideoHomeBanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoHomeBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'TIGAC Video',
            'description' => null,
            'video_path' => 'https://s3-figma-videos-production-sig.figma.com/video/1377240793861400146/TEAM/21ed/4f21/-0976-456b-83fc-01bd435a3264?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=oF6yT6m4lUEZ4USosBVA6MxjLMv5oBdNrrMBP6qgs429qadQag6QZ0~Wb0q9n3Uj5J8bkvft3~YaqlqaRTzpUxXAwUhM~Uj4rDIhmLDMsCk7t7YN3mMAVNqk1iM6nd6vA20cp4FqRYnRtgEFKgA3ugdOD1Iq~T9TXzZgmr8LiaRLwkZMbCkTKxTp7GnTJUk4Xi772LuStqnNoo9vcvgw~WefwezqclfIBit~7eWKl2Fn6Qu2N6EHnP7yeDnUoVsn~mx~ERuqKjrcK0mZEU~GitRMYAIJ~yyBbtACIfZ8JT0j2JsSHZozCMEK30k5EHmStbRyaOs-DA7uTe~6bv6knw__'
        ];

        VideoHomeBanner::create($data);
    }
}
