<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = Post::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            Post::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }
        $orders = array(
            array(
                'Title' => 'Quá trình phục hồi kì diệu của Gấu liệt', // Tiêu đề bài viết
                'Pet_id' => 'Nguyễn Văn Tài', // ID pet
                'Account_id' => '0583973384', // Id tài khoản
                'Content' => "Các bạn còn nhớ bé Gấu liệt - code 290 bị vứt bãi rác Hà Đông chúng mình cứu đầu tháng 5 không 🥰 
<br>
Có chị đi làm thấy bé bị bỏ ở chỗ tập kết rác. Cả người bẩn thỉu, bị liệt hai chân sau, cơ phần mông teo lại, các xương biến dạng.. Trên người bé có 3 vết thương một vết cắt ở cổ và hai vết loét ở mông. Chúng mình đã tiếp nhận và đưa bé đi điều trị ở các phòng khám.
<br>
Trải qua một quá trình dài điều trị vết thương và tập phục hồi chân. Giờ bé đã có thể chạy nhảy tung tăng rồi đó. 
<br>
Nếu các bạn xem clip này và nhìn phần xương bé khi chụp xquang bạn sẽ thấy đây là một điều kì diệu. ", // Nội dung bài viết
                'Status' => 1, // Trạng thái bài viết ( 1 : active ; 0 : deactive )
                'created_at' => \Carbon\Carbon::now()->addDays(rand(-30,30)),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'Title' => 'Nhận nuôi', // Tiêu đề bài viết
                'Pet_id' => 'Nguyễn Văn Tài', // ID pet
                'Account_id' => '0583973384', // Id tài khoản
                'Content' => '0583973384', // Nội dung bài viết
                'Status' => 1, // Trạng thái bài viết ( 1 : active ; 0 : deactive )
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
        );
    }
}
