<?php

use App\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = Account::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            Account::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }

        Account::create(array(
            'id'           => 1,
            'PasswordHash' => md5("admin" . "12345"),
            'Salt'         => '12345',
            'Slug'         => '123-adminer',
            'FullName'     => 'adminer',
            'Email'        => 'admin@admin',
            'PhoneNumber'  => '0583788236',
            'Address'      => 'So 7 Ton That Thuyet',
            'IDNo'         => '251160427',
            'DateOfBirth'  => '2002-07-29',
            'Avatar'       => '/PetCasa/TeamPage/4_ebsvyh',
            'Role_id'      => 2,
            'Status'       => 1,
            'created_at'   => \Carbon\Carbon::now(),
            'updated_at'   => \Carbon\Carbon::now(),
        ));
        Account::create(array(
            'id'           => 2,
            'PasswordHash' => md5("user" . "12345"),
            'Salt'         => '12345',
            'Slug'         => '123-user',
            'FullName'     => 'user',
            'Email'        => 'user@user',
            'PhoneNumber'  => '084558392801',
            'Address'      => 'So 6 Ton That Thuyet',
            'IDNo'         => '251160427',
            'DateOfBirth'  => '2002-07-29',
            'Avatar'       => '/PetCasa/TeamPage/1_txbfni',
            'Role_id'      => 1,
            'Status'       => 1,
            'created_at'   => \Carbon\Carbon::now(),
            'updated_at'   => \Carbon\Carbon::now(),
        ));
        Account::create(array(
            'id'           => 3,
            'PasswordHash' => md5("superadmin" . "12345"),
            'Salt'         => '12345',
            'Slug'         => '123-superadminer',
            'FullName'     => 'superadminer',
            'Email'        => 'superadmin@superadmin',
            'PhoneNumber'  => '084558392801',
            'Address'      => 'So 7 Ton That Thuyet',
            'IDNo'         => '251160427',
            'DateOfBirth'  => '2002-07-29',
            'Avatar'       => '/PetCasa/TeamPage/5_yvbsvu.jpg',
            'Role_id'      => 3,
            'Status'       => 1,
            'created_at'   => \Carbon\Carbon::now(),
            'updated_at'   => \Carbon\Carbon::now(),
        ));
        $account = array(
            array(
                'id'           => 4,                                // Cái sau cao hơn cái trước , tăng dần
                'PasswordHash' => md5("mat_khau" . "12345"),     // Mật khẩu - Thêm mật khẩu vào sau md5("*"."12345")
                'Salt'         => '12345',                          // Cái này không cần thay đổi
                'Slug'         => '123-ho_va_ten',                  // Slug giống bên Pet -> Số ngẫu nhiên + họ và tên không viết hoa viết thường
                'FullName'     => 'Họ Và Tên',                      // Họ và tên
                'Email'        => 'hovaten@hovaten',                // Email
                'PhoneNumber'  => '084558392801',                   // Số điện thoại
                'Address'      => 'So 7 Ton That Thuyet',           // Địa chỉ
                'IDNo'         => '251160427',                      // CMT nhân dân
                'DateOfBirth'  => '2002-07-29',                     // Ngày sinh ( Năm , tháng , ngày )
                'Avatar'       => '/PetCasa/TeamPage/5_yvbsvu.jpg', // Anrh đại diện  # Cái này anh cứ để đây em chỉ anh chỉnh sau
                'Role_id'      => 1,                                // không chỉnh
                'Status'       => 1,                                // ngẫu nhiên 0 hoặc 1
                'created_at'   => \Carbon\Carbon::now(),            // Không chỉnh
                'updated_at'   => \Carbon\Carbon::now(),            // Không chỉnh
            )
        );
        Account::insert($account);
//        \Illuminate\Support\Facades\DB::statement('ALTER SEQUENCE post_id_seq RESTART WITH 9');
    }
}
