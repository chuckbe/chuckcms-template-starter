<?php

namespace Chuckbe\ChuckcmsTemplateStarter\seeds;

use Chuckbe\Chuckcms\Models\Template;
use Illuminate\Database\Seeder;

class ChuckcmsTemplateStarterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// php artisan db:seed --class=Chuckbe\\ChuckcmsTemplateStarter\\seeds\\ChuckcmsTemplateStarterTableSeeder
        $fonts = [];
        $fonts['raw'] = 'Poppins:100,200,300,400,500,600,700,800,900';
        
        $css = [];
        $css['bootstrap']['href'] = 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css';
        $css['bootstrap']['asset'] = 'false';

        $css['custom']['href'] = 'chuckbe/chuckcms-template-starter/css/custom.css';
        $css['custom']['asset'] = 'true';
        
        $js = []; 
        $js['jquery']['href'] = 'https://code.jquery.com/jquery-3.2.1.slim.min.js';
        $js['jquery']['asset'] = 'false';https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js

        $js['popperjs']['href'] = 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js';
        $js['popperjs']['asset'] = 'false';

        $js['bootstrapjs']['href'] = 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js';
        $js['bootstrapjs']['asset'] = 'false';

        $js['masonry']['href'] = 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js';
        $js['masonry']['asset'] = 'false';

        $json = [];
        $json['footer_subscribe_title'] = [];
        $json['footer_subscribe_title']['label'] = 'Footer Subscribe: Title';
        $json['footer_subscribe_title']['type'] = 'text';
        $json['footer_subscribe_title']['value'] = 'Altijd op de hoogte zijn?';

        $json['footer_subscribe_subtitle'] = [];
        $json['footer_subscribe_subtitle']['label'] = 'Footer Subscribe: Subtitle';
        $json['footer_subscribe_subtitle']['type'] = 'text';
        $json['footer_subscribe_subtitle']['value'] = 'Abonneer op onze nieuwsbrief';

        $json['footer_subscribe_subsubtitle'] = [];
        $json['footer_subscribe_subsubtitle']['label'] = 'Footer Subscribe: Subsubtitle';
        $json['footer_subscribe_subsubtitle']['type'] = 'text';
        $json['footer_subscribe_subsubtitle']['value'] = 'voor nieuws, events, en exclusieve kortingen!';

        $json['footer_address_title'] = [];
        $json['footer_address_title']['label'] = 'Footer Address: Title';
        $json['footer_address_title']['type'] = 'text';
        $json['footer_address_title']['value'] = 'Gegevens';

        $json['footer_contact_title'] = [];
        $json['footer_contact_title']['label'] = 'Footer Contact: Title';
        $json['footer_contact_title']['type'] = 'text';
        $json['footer_contact_title']['value'] = 'Contacteren';

        $json['footer_hours_title'] = [];
        $json['footer_hours_title']['label'] = 'Footer Hours: Title';
        $json['footer_hours_title']['type'] = 'text';
        $json['footer_hours_title']['value'] = 'Openingsuren';

        $json['footer_hours_hours'] = [];
        $json['footer_hours_hours']['label'] = 'Footer Hours: Hours seperated by |';
        $json['footer_hours_hours']['type'] = 'text';
        $json['footer_hours_hours']['value'] = 'ma - vr: 10:00 - 18:00|za - zo: 10:00 - 18:30';


        // create template
        Template::updateOrCreate(
            ['slug' => 'chuckcms-template-starter'],
            ['name' => 'ChuckCMS Template Starter',
            'hintpath' => 'chuckcms-template-starter',
            'path' => 'chuckbe/chuckcms-template-starter',
            'type' => 'default',
            'version' => '0.2',
            'author' => 'Karel Brijs (karel@chuck.be)',
            'fonts' => $fonts,
            'css' => $css,
            'js' => $js,
            'json' => $json,
            'active' => 1]
        );
    }
}
