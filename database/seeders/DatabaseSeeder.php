<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\City;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Panel;
use App\Models\Segment;
use App\Models\Schedule;
use App\Models\BroadcastLog;

use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // **************************************************
        // Ussers
        $user = User::factory()->create([
            'first' => 'Doe',
            'last' => 'Thomas',
            'url' => 'janedoe',
            'session_id' => rand(1000000000, 9999999999),
            'github_username' => '',
            'email' => 'janedoe@email.com',
            'password' => '$2y$10$1oyAGH/Ffv.O/YPzZtJlR.PdmutrNiR5OAyyV4llUUno6GGR9fMK.',
            'admin' => 0,
        ]);

        $user = User::factory()->create([
            'first' => 'Adam',
            'last' => 'Thomas',
            'session_id' => rand(1000000000, 9999999999),
            'github_username' => '',
            'email' => 'thomasadam83@hotmail.com',
            'password' => '$2y$10$1oyAGH/Ffv.O/YPzZtJlR.PdmutrNiR5OAyyV4llUUno6GGR9fMK.',
            'admin' => 1,
        ]);

        // **************************************************
        // Cities
        $city = City::factory()->create([
            'name' => 'Smart City',
            'width' => '27',
            'height' => '30',
            'url' => 'smartcity',
            'date_at' => Carbon::now(),
            'date_multiplier' => 1,
            'image' => '',
            'user_id' => $user,
        ]);

        $city->users()->save($user);
        $user->city_id = $city->id;

        $city = City::factory()->create([
            'name' => 'Second City',
            'width' => '9',
            'height' => '6',
            'url' => '',
            'date_at' => Carbon::now(),
            'date_multiplier' => 1,
            'image' => '',
            'user_id' => $user,
        ]);

        $city->users()->save($user);

        // **************************************************
        // Tags
        Tag::factory()->create(['name' => 'city']);
        Tag::factory()->create(['name' => 'harry potter']);
        Tag::factory()->create(['name' => 'starwars']);
        Tag::factory()->create(['name' => 'minecraft']);
        Tag::factory()->create(['name' => 'marvel']);

        // **************************************************
        // Settings
        $settings = array(
            [
                'name' => 'GITHUB_ACCOUNTS',
                'value' => 'codeadamca, BrickMMO',
            ],[
                'name' => 'GITHUB_LAST_IMPORT',
                'value' => '2024-07-18 13:25:36',
            ],[
                'name' => 'GITHUB_REPOS_SCANNED',
                'value' => 0,
            ],[
                'name' => 'GITHUB_ACCESS_TOKEN',
                'value' => '',
            ],[
                'name' => 'GOOGLE_ACCESS_TOKEN',
                'value' => '',
            ],[
                'name' => 'GOOGLE_DRIVE_VIDEO',
                'value' => 'STOCK_VIDEO,1351-DxRjX_siFqLzSiQGwT1SzwuXDwel',
            ],[
                'name' => 'GOOGLE_DRIVE_PHOTO',
                'value' => 'STOCK_PHOTO,1k7lntYThFwsWoheP9_fYoS84vWPCjwj6',
            ],[
                'name' => 'GOOGLE_DRIVE_AUDIO',
                'value' => 'STOCK_AUDIO,12Z9LraPPRno2ZGt3DL3nZ5cIb8ur0XJd',
            ],[
                'name' => 'BRICKSUM_WORDLIST',
                'value' => 'brick, stud, tube, plate, slope, tile, technic, axle, gear, minifigure, connector, baseplate, corner, hinge, wedge, beam, bush, pin, element, knob, plate, cylinder, cone, bar, bracket, jumper, window, door, roof, panel, flag, antenna, wheel, arch, container, holder, clip, arm, seat, vehicle, propeller, horn, dish, radar, whip, hose, harpoon, fork, tail, knife, sword, axe, hammer, tool, wrench, screwdriver, spanner, chainsaw, saw, shovel, pickaxe, binoculars, camera, flashlight, lantern, magnifying, glass, compass, map, key, gem, crystal, jewel, coin, treasure, chest, trophy, cup, medal, shield, helmet, visor, goggles, hat, cap, tiara, crown, helmet, headgear, hairpiece, beard, glasses, mask, visor, oxygen, tank, backpack, pack, sack, suitcase, briefcase, crate, barrel, bucket, shovel, rock, stone, brick, slope, head, hairpiece, helmet, visor, hat, hands, torso',
            ],[
                'name' => 'BRICKSUM_STOPWORDS',
                'value' => 'rem, sit, amet, sed, do, ut, et, qui, est, non, id, ex, nisi, pro, enim, ad, esse, irure, in, eu',
            ],[
                'name' => 'BRICKSUM_PARAGRAPHS_GENERATED',
                'value' => 0,
            ],[
                'name' => 'BRICKSUM_SENTENCES_GENERATED',
                'value' => 0,
            ],[
                'name' => 'BRICKSUM_WORDS_GENERATED',
                'value' => 0,
            ],[
                'name' => 'COLOURS_LAST_IMPORT',
                'value' => '2024-07-18 13:25:36',
            ],[
                'name' => 'STORES_LAST_IMPORT',
                'value' => '2024-07-18 13:25:36',
            ],[
                'name' => 'COUNTRIES_LAST_IMPORT',
                'value' => '2024-07-18 13:25:36',
            ],[
                'name' => 'GOOGLE_VIDEO_LAST_IMPORT',
                'value' => '2024-07-18 13:25:36',
            ],[
                'name' => 'GOOGLE_PHOTO_LAST_IMPORT',
                'value' => '2024-07-18 13:25:36',
            ],[
                'name' => 'GOOGLE_AUDIO_LAST_IMPORT',
                'value' => '2024-07-18 13:25:36',
            ]
        );

        foreach($settings as $key => $value)
        {
            Setting::factory()->create([
                'name' => $value['name'],
                'value' => $value['value'],
            ]);
        }
        
        // **************************************************
        // Panels
        $panels = [
            [
                'port_id' => 'A',
                'cartridge' => null,
                'city_id' => 1,
                'value' => 'OFF',
            ],
            [
                'port_id' => 'S1',
                'cartridge' => null,
                'city_id' => 1,
                'value' => 'BLUE',
            ],
            ['port_id' => 'B', 'cartridge' => 'BLUE', 'city_id' => 1, 'value' => '0'],
            ['port_id' => 'C', 'cartridge' => 'BLUE', 'city_id' => 1, 'value' => '0'],
            ['port_id' => 'D', 'cartridge' => 'BLUE', 'city_id' => 1, 'value' => '0'],
            ['port_id' => 'B', 'cartridge' => 'RED', 'city_id' => 1, 'value' => '0'],
            ['port_id' => 'C', 'cartridge' => 'RED', 'city_id' => 1, 'value' => '0'],
            ['port_id' => 'D', 'cartridge' => 'RED', 'city_id' => 1, 'value' => '0'],
            ['port_id' => 'B', 'cartridge' => 'BROWN', 'city_id' => 1, 'value' => '0'],
            ['port_id' => 'C', 'cartridge' => 'BROWN', 'city_id' => 1, 'value' => '0'],
            ['port_id' => 'D', 'cartridge' => 'BROWN', 'city_id' => 1, 'value' => '0'],
            ['port_id' => 'B', 'cartridge' => 'YELLOW', 'city_id' => 1, 'value' => '0'],
            ['port_id' => 'C', 'cartridge' => 'YELLOW', 'city_id' => 1, 'value' => '0'],
            ['port_id' => 'D', 'cartridge' => 'YELLOW', 'city_id' => 1, 'value' => '0'],
            ['port_id' => 'S2', 'cartridge' => 'BLUE', 'city_id' => 1, 'value' => 'OFF'],
            ['port_id' => 'S3', 'cartridge' => 'BLUE', 'city_id' => 1, 'value' => 'OFF'],
            ['port_id' => 'S4', 'cartridge' => 'BLUE', 'city_id' => 1, 'value' => 'OFF'],
            ['port_id' => 'S2', 'cartridge' => 'RED', 'city_id' => 1, 'value' => 'OFF'],
            ['port_id' => 'S3', 'cartridge' => 'RED', 'city_id' => 1, 'value' => 'OFF'],
            ['port_id' => 'S4', 'cartridge' => 'RED', 'city_id' => 1, 'value' => 'OFF'],
            ['port_id' => 'S2', 'cartridge' => 'BROWN', 'city_id' => 1, 'value' => 'OFF'],
            ['port_id' => 'S3', 'cartridge' => 'BROWN', 'city_id' => 1, 'value' => 'OFF'],
            ['port_id' => 'S4', 'cartridge' => 'BROWN', 'city_id' => 1, 'value' => 'OFF'],
            ['port_id' => 'S2', 'cartridge' => 'YELLOW', 'city_id' => 1, 'value' => 'OFF'],
            ['port_id' => 'S3', 'cartridge' => 'YELLOW', 'city_id' => 1, 'value' => 'OFF'],
            ['port_id' => 'S4', 'cartridge' => 'YELLOW', 'city_id' => 1, 'value' => 'OFF'],
        ];

        foreach ($panels as $panel) {
            Panel::create($panel);
        }

        // **************************************************
        // Radio

        // Radio - Segments
        $segments = [
            ['name' => 'Morning Talk Show'],
            ['name' => 'Colour Of the Day'],
            ['name' => 'Evening News'],
            ['name' => 'Traffic News'],
        ];

        foreach ($segments as $segment) {
            Segment::create($segment);
        }

        // Radio - Schedules
        $schedules = [
            ['segment_id' => 1, 'time' => '06:00:00'],
            ['segment_id' => 2, 'time' => '12:00:00'],
            ['segment_id' => 3, 'time' => '18:00:00'],
            ['segment_id' => 4, 'time' => '17:00:00'],
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }

        // Radio - Broadcast Logs
        $broadcastLogs = [
            ['city_id' => 1, 'segment_id' => 1, 'broadcast_time' => Carbon::now()->toDateTimeString(), 'content' => 'Welcome to the Morning Talk Show on Brick City FM!'],
            ['city_id' => 1, 'segment_id' => 2, 'broadcast_time' => Carbon::now()->addHours(6)->toDateTimeString(), 'content' => 'Here are your top hits for lunch on Brick City FM!'],
            ['city_id' => 1, 'segment_id' => 3, 'broadcast_time' => Carbon::now()->addHours(12)->toDateTimeString(), 'content' => 'Good evening, this is your Brick City FM Evening News!'],
            ['city_id' => 1, 'segment_id' => 4, 'broadcast_time' => Carbon::now()->addHours(11)->toDateTimeString(), 'content' => 'Latest updates on Traffic News.'],
        ];

        foreach ($broadcastLogs as $log) {
            BroadcastLog::create($log);
        }

    }
}
