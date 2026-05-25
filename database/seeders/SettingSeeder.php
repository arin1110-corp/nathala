<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nathala_setting')->insert([
            [
                'setting_id' => 1,

                'site_name' => 'Nathala Picks',
                'site_tagline' => 'Temukan Produk Favoritmu',
                'site_description' => 'Nathala Picks adalah platform rekomendasi produk affiliate pilihan yang membantu kamu menemukan produk terbaik dengan tampilan rapi, mudah dijelajahi, dan praktis untuk dibeli.',

                'site_logo' => null,
                'site_favicon' => null,

                'site_email' => 'hello@nathalapicks.com',
                'site_phone' => '+62 812 3456 7890',
                'site_whatsapp' => '6281234567890',

                'site_instagram' => 'https://instagram.com/nathalapicks',
                'site_tiktok' => 'https://tiktok.com/@nathalapicks',
                'site_youtube' => 'https://youtube.com/@nathalapicks',
                'site_facebook' => 'https://facebook.com/nathalapicks',

                'site_meta_title' => 'Nathala Picks | Rekomendasi Produk Affiliate Pilihan',
                'site_meta_description' => 'Temukan rekomendasi produk affiliate terbaik dari berbagai kategori seperti parfum, gadget, fashion, dan kebutuhan sehari-hari hanya di Nathala Picks.',

                'site_google_analytics' => '<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag(\'js\', new Date());
gtag(\'config\', \'G-XXXXXXXXXX\');
</script>',

                'site_meta_pixel' => '<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{
if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;
n.push=n;
n.loaded=!0;
n.version=\'2.0\';
n.queue=[];
t=b.createElement(e);
t.async=!0;
t.src=v;
s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s);
}(window, document,\'script\',
\'https://connect.facebook.net/en_US/fbevents.js\');

fbq(\'init\', \'123456789012345\');
fbq(\'track\', \'PageView\');
</script>',

                'theme_primary' => '#dd2273',
                'theme_secondary' => '#f0f0f0',
                'theme_accent' => '#ffffff',
                'theme_text' => '#000000',
                'theme_footer' => '#f2f2f2',

                'created_at' => Carbon::parse('2026-05-25 02:07:14'),
                'updated_at' => Carbon::parse('2026-05-25 05:26:43'),
            ]
        ]);
    }
}