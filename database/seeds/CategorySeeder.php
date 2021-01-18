<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = Category::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            Category::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }
        $category = array(
            array(
                'Name'       => 'Quá trình cứu hộ',
                'Status'     => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'Name'       => 'Tin tức và sự kiện',
                'Status'     => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'Name'       => 'Kiến thức nuôi boss',
                'Status'     => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
        );
        Category::insert($category);
    }
}
