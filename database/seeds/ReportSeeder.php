<?php

use App\Report;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = Report::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            Report::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }
        $reports = array(
            array(
                'FullName'    => 'Nguyễn Đức Trung',
                'PhoneNumber' => '0583973384',
                'Address'     => 'Ở khu số 2 ! Ngõ 157 Đường Mai Quốc Việt',
                'Thumbnails'  => "",
                'Content'     => "Có 1 ổ mèo con bị thương ",
                'Status'      => 0,
                'created_at'  => \Carbon\Carbon::now()->addDays(rand(-30, 30)),
                'updated_at'  => \Carbon\Carbon::now(),
            ),
            array(
                'FullName'    => 'Nguyễn Đức Trung',
                'PhoneNumber' => '0583973384',
                'Address'     => 'Ở khu số 11 ! Ngõ 33/22/1 Đường Mai Quốc Việt',
                'Thumbnails'  => "",
                'Content'     => "Ở khu số 5 ! Ngõ 159 Đường Mai Quốc Việt",
                'Status'      => 1,
                'created_at'  => \Carbon\Carbon::now()->addDays(rand(-30, 30)),
                'updated_at'  => \Carbon\Carbon::now(),
            ),
            array(
                'FullName'    => 'Nguyễn Đức Trung',
                'PhoneNumber' => '0583973384',
                'Address'     => 'Ở khu số 2 ! Ngõ 90 Đường Mai Quốc Việt',
                'Thumbnails'  => "",
                'Content'     => "Ở khu số 10 ! Ngõ 157 Đường Mai Quốc Việt",
                'Status'      => 2,
                'created_at'  => \Carbon\Carbon::now()->addDays(rand(-30, 30)),
                'updated_at'  => \Carbon\Carbon::now(),
            ),
            array(
                'FullName'    => 'Nguyễn Đức Trung',
                'PhoneNumber' => '0583973384',
                'Address'     => 'Ở khu số 2 ! Ngõ 90 Đường Mai Quốc Việt',
                'Thumbnails'  => "",
                'Content'     => "Ở khu số 10 ! Ngõ 157 Đường Mai Quốc Việt",
                'Status'      => 3,
                'created_at'  => \Carbon\Carbon::now()->addDays(rand(-30, 30)),
                'updated_at'  => \Carbon\Carbon::now(),
            ),
            array(
                'FullName'    => 'Nguyễn Đức Trung',
                'PhoneNumber' => '0583973384',
                'Address'     => 'Ở khu số 2 ! Ngõ 157 Đường Mai Quốc Việt',
                'Thumbnails'  => "#",
                'Content'     => "Có 1 ổ mèo con bị thương ",
                'Status'      => 0,
                'created_at'  => \Carbon\Carbon::now()->addDays(rand(-30, 30)),
                'updated_at'  => \Carbon\Carbon::now(),
            ),
            array(
                'FullName'    => 'Nguyễn Đức Trung',
                'PhoneNumber' => '0583973384',
                'Address'     => 'Ở khu số 11 ! Ngõ 33/22/1 Đường Mai Quốc Việt',
                'Thumbnails'  => "",
                'Content'     => "Ở khu số 5 ! Ngõ 159 Đường Mai Quốc Việt",
                'Status'      => 1,
                'created_at'  => \Carbon\Carbon::now()->addDays(rand(-30, 30)),
                'updated_at'  => \Carbon\Carbon::now(),
            ),
            array(
                'FullName'    => 'Nguyễn Đức Trung',
                'PhoneNumber' => '0583973384',
                'Address'     => 'Ở khu số 2 ! Ngõ 90 Đường Mai Quốc Việt',
                'Thumbnails'  => "",
                'Content'     => "Ở khu số 10 ! Ngõ 157 Đường Mai Quốc Việt",
                'Status'      => 2,
                'created_at'  => \Carbon\Carbon::now()->addDays(rand(-30, 30)),
                'updated_at'  => \Carbon\Carbon::now(),
            ),
            array(
                'FullName'    => 'Nguyễn Đức Trung',
                'PhoneNumber' => '0583973384',
                'Address'     => 'Ở khu số 2 ! Ngõ 90 Đường Mai Quốc Việt',
                'Thumbnails'  => "",
                'Content'     => "Ở khu số 10 ! Ngõ 157 Đường Mai Quốc Việt",
                'Status'      => 3,
                'created_at'  => \Carbon\Carbon::now()->addDays(rand(-30, 30)),
                'updated_at'  => \Carbon\Carbon::now(),
            ),
        );
        Report::insert($reports);
    }
}
