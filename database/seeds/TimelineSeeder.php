<?php

use App\Timeline;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = Timeline::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            Timeline::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }

        $timeline = array(
            array(
                'PetID' => '1',
                'Content' => 'Ngày 1, test 1',
                'Date' => '2020-01-01',
                'Image' => 'PetCasa/noimages_aaqvrt_opnyoy.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'PetID' => '1',
                'Content' => 'Ngày 2, test 1',
                'Date' => '2020-06-11',
                'Image' => 'PetCasa/noimages_aaqvrt_opnyoy.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'PetID' => '1',
                'Content' => 'Ngày 3, test 1',
                'Date' => '2020-09-21',
                'Image' => 'PetCasa/noimages_aaqvrt_opnyoy.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'PetID' => '1',
                'Content' => 'Ngày 4, test 1',
                'Date' => '2020-12-31',
                'Image' => 'PetCasa/noimages_aaqvrt_opnyoy.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'PetID' => '2',
                'Content' => 'Ngày 1, test 1',
                'Date' => '2020-01-01',
                'Image' => 'PetCasa/noimages_aaqvrt_opnyoy.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'PetID' => '2',
                'Content' => 'Ngày 2, test 1',
                'Date' => '2020-06-11',
                'Image' => 'PetCasa/noimages_aaqvrt_opnyoy.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'PetID' => '2',
                'Content' => 'Ngày 3, test 1',
                'Date' => '2020-09-21',
                'Image' => 'PetCasa/noimages_aaqvrt_opnyoy.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'PetID' => '2',
                'Content' => 'Ngày 4, test 1',
                'Date' => '2020-12-31',
                'Image' => 'PetCasa/noimages_aaqvrt_opnyoy.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
        );
        Timeline::insert($timeline);
    }
}
