<?php

use App\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class NewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = News::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            News::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }
        $news = array(
            array(
                'Slug' => 'Cuu_ho_be_cun_bi_bo_roi_o_ha_noi',
                'Title' => 'Cứu hộ bé cún ghẻ bị bỏ rơi ở Hà Nội',
                'Category_id' => 1,
                'Content' => 'Hôm trước mình có đi lượn qua và thấy chú chó này đang bới rác để tìm thứ lót dạ. Lúc đầu nhìn thấy nó mình giật mình, bề ngoài đen thui, lông rụng gần hết, gầy gò ốm yếu, trên người còn có những vết thương nữa như kiểu bị chủ đánh đập rồi đem vứt đi vậy. Mình không nuôi thêm nó đc nên đành về nhà lấy đồ ăn rồi đem ra cho nó. Chiều ngay hôm đó đi ra xem tình hình chú chó thế nào thì không thấy nó đâu, chỉ thấy thêm 1 túi cơm nữa và mấy cái bánh bên cạnh nên Ngọc nghĩ có người đem nó về rồi. Ai ngờ hôm nay đi qua lại thấy chú chó nằm co rúm bên lề đường, người run rẩy. Ngọc với em họ lại về nhà lấy đồ ăn cho nó, còn không bt nếu tối nay trời mưa thì nó sẽ thế nào.
                <br>
                <img src="https://res.cloudinary.com/dwarrion/image/upload/c_scale,h_450,w_450/v1598614317/PetCasa/NewThumbnails/2_cljiwi.jpg" alt="">
                <img src="https://res.cloudinary.com/dwarrion/image/upload/c_scale,h_450,w_450/v1598614318/PetCasa/NewThumbnails/3_p2gcwj.jpg" alt="">
                <br>
                Ngày ý tưởng ko cứu được nó. Nửa đêm nhờ tnv chạy ô tô lên Phú Thọ bắt chó vì sợ nó lang thang ngoài đường chết lạnh. 1h sáng đến nơi thì em báo tin ngủ quên. Mình ngồi nhà mò google map với gọi đt loạn lên mà ko biết địa điểm cụ thể ở đâu. Bạn tnv thang lang ko tìm được đường đành đi về. Chiều hôm sau 2h nhờ em Như với Nhung hai đứa đèo nhau bằng xe máy lên Phú Thọ bắt chó.. Lên đến nơi thì em chó nhát người, thế là 3 đứa chơi trò đuổi bắt nhau trên đó chắc cả tiếng đồng hồ. Bắt được thì kẹp 3 đi về đến Hn lúc 10h tối...! Cái Nhung ở trọ trong ký túc xá, về muộn quá ktx đóng cửa nên phải trèo tường vào  vừa buồn cười vừa thương....
                <br>
                <img src="https://res.cloudinary.com/dwarrion/image/upload/c_scale,h_450,w_450/v1598614318/PetCasa/NewThumbnails/5_zpnmfg.jpg" alt="">
                <br>
                Nhưng cuối cùng thì Thor nó cũng ko phụ công anh chị! Giờ vừa béo vừa đẹp trai, chỉ hiểu lệnh tiếng Anh chứ ko biết tiếng Việt sắp thành Việt kiều đến nơi rồi... Ước gì đứa nào cũng sướng được như nó..
                <br>
                Cùng xem thành quả của cả một tập thể, những tnv, các bác sĩ và mạnh thường quân nhé!! Chúng ta đã làm được!! Dù không nhiều nhưng sẽ luôn cố gắng!!
                <br>
                <img src="https://res.cloudinary.com/dwarrion/image/upload/c_scale,h_450,w_450/v1598614317/PetCasa/NewThumbnails/6_fjrhdk.jpg" alt="">
                ',
                'Author' => 'PetsCasa',
                'Thumbnails' => 'PetCasa/NewThumbnails/1_aqok2f.jpg,PetCasa/NewThumbnails/2_cljiwi.jpg,PetCasa/NewThumbnails/3_p2gcwj.jpg,PetCasa/NewThumbnails/4_q7gufw.jpg,PetCasa/NewThumbnails/5_zpnmfg,PetCasa/NewThumbnails/6_fjrhdk.jpg',
                'Status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'Slug' => 'Cuu_ho_chu_meo_muop_bi_co_doc_trong_doi_ret',
                'Title' => 'Cứu hộ chú Mèo Mướp Bị Cô Độc Trong Đói Rét',
                'Category_id' => 1,
                'Content' => 'Trái tim bạn có xao động khi nhìn thấy vẻ mặt bi thương của chú mèo mướp Lionel bên trái không? Ngay cả khi đã được an toàn trong tay của những người yêu động vật, chú ta vẫn chưa hết lo sợ, hoảng hốt. Nhưng giờ thì sao nào, chàng đã được nuôi nấng ở trong một gia đình mới tràn đầy hạnh phúc, nơi mà cu cậu có thể thoải mái tận hưởng những giây phút an bình, không lo bị đánh đập, đói rét. Rồi thì bộ dạng ốm yếu ngày nào đã bị che lấp bởi mỡ và bộ lông dài dày mượt, thấy là muốn nựng liền!',
                'Author' => 'PetsCasa',
                'Thumbnails' => 'PetCasa/NewThumbnails/chu_meo_muop_bi_co_doc_trong_doi_ret_1_oyj1ee.png',
                'Status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'Slug' => 'Cuu_ho_be_meo_den_bi_bo_roi',
                'Title' => 'Cứu hộ bé Mèo Đen Bị Bỏ Rơi',
                'Category_id' => 1,
                'Content' => 'Người ta thường bỏ những chú tiểu hổ con vào thùng cạc-tông và lén để ở những nhà kho, bãi đất trống. Thường thì mấy bé sẽ bị chết do thiếu sữa mẹ, thức ăn, do lạnh, cóng, hiếm lắm mới có người nhìn thấy chúng và nhận nuôi. Thế nên việc chú thợ săn chuột tên Utopia trong ảnh trên là một trường hợp đặc biệt giữa rất nhiều đồng loại xấu số.
<br>Ngày nào chú ta còn teo tóp, bé choắt, lông lá bết dính lại vì dầm mưa, mặt mũi thì tèm lem, may sao lại lọt vào tay một người chủ tốt bụng. Người ấy xem chú là một thành viên trong gia đình, tắm táp sạch sẽ, cho ăn uống đầy đủ. Giờ thì nhìn xem, béo tròn mũm mĩm đúng chuẩn hot boy luôn nhé!',
                'Author' => 'PetsCasa',
                'Thumbnails' => 'PetCasa/NewThumbnails/be_meo_den_bi_bo_roi_1_dc21z8.png',
                'Status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'Slug' => 'Gap_go_chu_meo_gay_bao_cong_dong_mang',
                'Title' => 'Gặp gỡ chú mèo gây bão cộng đồng mạng',
                'Category_id' => 2,
                'Content' => 'Thời gian qua nổi lên hình ảnh chú mèo tinh nghịch gây bão cộng đồng mang.
                Chủ của Carrot chia sẻ: “Một người bạn thân của tôi làm việc ở phòng khám thú y.
                Vào một ngày nọ, có người tìm thấy Carrot ở ga tàu và mang nó đến phòng khám.
                Carrot từng sống ở phòng khám thú y đó trong vài tuần, và bạn chúng tôi – người đang làm việc tại phòng khám – đã mang nó về căn hộ vào cuối tuần để có thể chăm sóc nó kĩ càng hơn.”',
                'Author' => 'Minh Chau',
                'Thumbnails' => 'PetCasa/NewThumbnails/B-I9iTbHFY4-png__700_slg2pr.jpg,PetCasa/NewThumbnails/B_c0yQTHYMv-png__700_rotukv,PetCasa/NewThumbnails/B8pPj2dn1VN-png__700_bdbdjb',
                'Status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),

            ),
            array(
                'Slug' => 'nhung_boss_meo_voi_nhung_chiec_dem_cua_chung',
                'Title' => 'Những Boss Mèo Cùng Chiếc Đệm Đáng Yêu Của Chúng',
                'Category_id' => 2,
                'Content' => 'Có rất nhiều trò giải trí thú vị trong thời gian giãn cách xã hội: một số người sẽ dành thời gian xem Netflix, một số người lại dùng thời gian đó để theo đuổi những sở thích của họ hoặc thử sức làm những đồ thủ công mới. Và cũng trong khoảng thời gian này, mọi người nhận ra rằng họ có thể làm được rất nhiều thứ chỉ với vài cuộn len và trí tưởng tượng bay xa. Nếu bạn có niềm đam mê may vá hay bạn là fan hâm mộ của những chú mèo, hãy xem những bức ảnh dưới đây và thử sức may những chiếc đệm xinh xắn cho chúng nhé!
Những tác phẩm mà câu lạc bộ “may vá” chia sẻ đã thu hút sự chú ý của cộng đồng mạng trong thời gian gần đây. Mời các sen cùng ngắm nhìn những chiếc đệm này và lên ý tưởng may chiếc giường mới cho các boss nhà mình nhé!”',
                'Author' => 'Minh Chau',
                'Thumbnails' => 'PetCasa/NewThumbnails/bai2-2_f7xkh4,PetCasa/NewThumbnails/bai2-4_joianb,PetCasa/NewThumbnails/bai2-3_ylxokm,PetCasa/NewThumbnails/bai2-1_qvmhrb',
                'Status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),

            ),
            array(
                'Slug' => 'chuyen_gia_phan_bac_kha_nang_cho_nhiem_nCov',
                'Title' => 'Chuyên gia phản bác khả năng chó nhiễm nCov',
                'Category_id' => 2,
                'Content' => 'Các chuyên gia bác bỏ thông tin thú cưng có thể nhiễm virus corona và truyền sang người, cho rằng hiện chưa có đủ bằng chứng để kết luận điều này.
Các báo cáo tuần trước cho thấy một chú chó cưng ở Hong Kong dương tính yếu với virus corona. Chú chó thuộc giống chó phốc sóc Pomeranian được coi là một bệnh nhân nhiễm Covid-19. Chú chó sau đó xét nghiệm thêm vào ngày 29/2 để xem liệu có thực sự bị nhiễm bệnh hay không.
Tổ chức Y tế Thế giới (WHO) và chính quyền Hong Kong tiến hành hợp tác ngay sau khi cơ quan y tế đặc khu đưa ra cảnh báo vào ngày 28/2, chó mèo hoặc bất cứ động vật có vú nào khác, gọi chung là thú cưng của bệnh nhân nhiễm Covid-19 đều cần được kiểm dịch.
Trước thông tin đó, các chuyên gia ở Anh cho biết, chó cưng không thể nào bị nhiễm Covid-19. Lời giải thích cho vấn đề này là có thể chú chó đã có kết quả \'dương tính giả\' do tiếp xúc gần gũi với người nhiễm Covid-19 hoặc từng chạm vào virus corona.
Giới chức y tế Hong Kong cũng cho biết không có triệu chứng nào cho thấy chú chó đã nhiễm nCoV. Do đó nhận định thú cưng có khả năng nhiễm Covid-19 được coi là chưa đủ căn cứ xác thực. Cục Nông nghiệp, Ngư nghiệp và Bảo tồn đặc khu cũng cho biết hiện không bằng chứng nào cho thấy chó có thể bị nhiễm hoặc truyền virus corona sang người.
Tuy vậy, một phát ngôn viên của Cục Nông nghiệp, Ngư nghiệp và Bảo tồn Hong Kong (AFCD) nhận định: "Để đảm bảo bảo sức khỏe cộng đồng và động vật nói chung, thú cưng của bệnh nhân Covid-19 cần được cách ly, kiểm tra chặt chẽ bởi AFCD".
WHO cũng cho biết, họ đang làm việc với các cơ quan đối tác về sức khỏe con người và động vật, chờ đợi kết quả các cuộc xét nghiệm tiếp theo trên thú cưng từ Hong Kong. Tổng giám đốc WHO, ông Tedros Adhanom Ghebreyesus cho biết vật nuôi ở trong gia đình không thể truyền bệnh cho con người.',
                'Author' => 'PetsCasa',
                'Thumbnails' => 'PetCasa/NewThumbnails/bai5-3_pxarye',
                'Status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'Slug' => 'so-huu-luot-nguoi-theo-doi-khung-tren-mxh--meo-mat-lac-gay-quy-tu-thien-gan-300-trieu-chi-nho-ban-hinh-anh-cua-minh',
                'Title' => 'Sở hữu lượt người theo dõi khủng trên MXH, \'mèo mắt lác\' gây quỹ từ thiện gần 300 triệu chỉ nhờ bán hình ảnh của mình',
                'Category_id' => 2,
                'Content' => 'Chú mèo giống Nebelung tên là Belarus này mắc phải hội chứng strabismus hay lé mắt, điều khiến nó có một đôi mắt đặc biệt hết sức. Và hơn hết, chính nhờ vẻ ngoài này mà Belarus đã "đánh cắp" trái tim của nhiều người yêu mèo trên toàn thế giới. Tài khoản Instagram của chú mèo này lên tới hơn 254.000 người theo dõi.
                Sau khi, bức ảnh của Belarus tại Trung tâm kiểm soát và chăm sóc động vật ở San Francisco (SFACC) trở nên nổi tiếng vào tháng 6 năm 2018. Rachel đã đến nhận nuôi nó. "Khi lần đầu tiên nhìn thấy nó, tôi chắc chắn rằng đây là con mèo hài hước, đáng yêu nhất mà tôi từng thấy. Dù chưa từng là một người yêu mèo, nhưng tôi nghĩ đây là một chú mèo tuyệt vời. Sau đó, tôi đã cho gia đình của mình xem ảnh và phản ứng của họ cũng như vậy. Họ nói tôi nên đến nhận nuôi chú mèo này." - Rachel chia sẻ, cô cho biết Belarus có sở thích chơi với bóng, ngồi chờ đồ ăn và nhìn 2 hướng cùng một lúc.
                Rachel lớn lên trong một ngôi nhà có đủ các loài động vật, bao gồm thỏ, vẹt, chuột hamster. Tuy nhiên, cô đã quyết định đưa chú chó của mình đến sống cùng với gia đình mình sau đó nhận nuôi Belarus. Được biết, chú mèo này đã bị bỏ lại ở SFACC vì chủ cũ của nó gặp vấn đề với chủ cho thuê nhà.
Ngoài việc mắc chứng mắt lé, Belarus có rất ít vấn đề về thị lực, thỉnh thoảng nó có nhúng chân vào bát nước uống. "Nó không khác những con mèo bình thường khác là bao. Luôn tò mò và thích khám phá không gian sống của mình." - Rachel nói. Đồ chơi yêu thích của nó là bóng và nơ, đặc biệt nó có thói quen chôn cà phê và một số thứ "nặng mùi" khác.
Và cũng nhờ chính vẻ ngoài kỳ lạ của Belarus mà nó đã gây quỹ được 12.000 đô la Mỹ (khoảng 277 triệu VNĐ) nhờ việc bán áo in hình ảnh của mình trên mạng. Số tiền này được ủng hộ đến các quỹ từ thiện. "Năm ngoái chúng tôi đã ủng hộ được 6.000 đô la Mỹ cho các nơi chăm sóc, trong đó 4.000 đô la Mỹ được gửi cho SFACC - nơi đã cưu mang Belarus, 1.000 đô la Mỹ cho nhóm phản ứng cộng đồng động vật Sonoma vì những nỗ lực giải cứu động vật của họ. Và 1.000 đô la Mỹ cho thị trấn mèo ở Oakland." - Rachel cho biết, cô cũng nói thêm rằng toàn bộ lợi nhuận từ việc kinh doanh hình ảnh đều được ủng hộ cho các tổ chức cứu trợ.',
                'Author' => 'PetsCasa',
                'Thumbnails' => 'PetCasa/NewThumbnails/bai6-2_z0bt6l,
PetCasa/NewThumbnails/bai6-1_lv8xgo,
PetCasa/NewThumbnails/bai6-3_fq0kzs',
                'Status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'Slug' => 'vi_sao_meo_khong_ngu_ve_dem',
                'Title' => 'Vì Sao Mèo Không Ngủ Về Đêm?',
                'Category_id' => 2,
                'Content' => 'Các chú mèo hay có thói quen kì quặc là rất hay phá phách, thậm chí đánh thức bạn trong đêm. Có một số lí do và cả giải pháp để giải quyết vấn đề có vẻ nan giải này!
                Sử dụng các hình phạt hay la mắng chỉ khiến chú mèo kém nghe lời hơn. Thay vào đó, bạn có thể dành năng lượng để đầu tư vào các hoạt động thường ngày và tình cảm dành cho chúng. Chắc hẳn các em mèo sẽ không còn nỡ quấy rối giấc ngủ của một người chủ dễ thương và tâm lí như bạn!',
                'Author' => 'PetsCasa',
                'Thumbnails' => 'PetCasa/NewThumbnails/bai7-1_nnrcc9.jpg,PetCasa/NewThumbnails/bai7_rcmbrx',
                'Status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),

            ),
            array(
                'Slug' => 'chuyen_gia_phan_bac_kha_nang_cho_nhiem_nCov',
                'Title' => 'Chuyên gia phản bác khả năng chó nhiễm nCov',
                'Category_id' => 2,
                'Content' => 'Các chuyên gia bác bỏ thông tin thú cưng có thể nhiễm virus corona và truyền sang người, cho rằng hiện chưa có đủ bằng chứng để kết luận điều này.
Các báo cáo tuần trước cho thấy một chú chó cưng ở Hong Kong dương tính yếu với virus corona. Chú chó thuộc giống chó phốc sóc Pomeranian được coi là một bệnh nhân nhiễm Covid-19. Chú chó sau đó xét nghiệm thêm vào ngày 29/2 để xem liệu có thực sự bị nhiễm bệnh hay không.
Tổ chức Y tế Thế giới (WHO) và chính quyền Hong Kong tiến hành hợp tác ngay sau khi cơ quan y tế đặc khu đưa ra cảnh báo vào ngày 28/2, chó mèo hoặc bất cứ động vật có vú nào khác, gọi chung là thú cưng của bệnh nhân nhiễm Covid-19 đều cần được kiểm dịch.
Trước thông tin đó, các chuyên gia ở Anh cho biết, chó cưng không thể nào bị nhiễm Covid-19. Lời giải thích cho vấn đề này là có thể chú chó đã có kết quả \'dương tính giả\' do tiếp xúc gần gũi với người nhiễm Covid-19 hoặc từng chạm vào virus corona.
Giới chức y tế Hong Kong cũng cho biết không có triệu chứng nào cho thấy chú chó đã nhiễm nCoV. Do đó nhận định thú cưng có khả năng nhiễm Covid-19 được coi là chưa đủ căn cứ xác thực. Cục Nông nghiệp, Ngư nghiệp và Bảo tồn đặc khu cũng cho biết hiện không bằng chứng nào cho thấy chó có thể bị nhiễm hoặc truyền virus corona sang người.
Tuy vậy, một phát ngôn viên của Cục Nông nghiệp, Ngư nghiệp và Bảo tồn Hong Kong (AFCD) nhận định: "Để đảm bảo bảo sức khỏe cộng đồng và động vật nói chung, thú cưng của bệnh nhân Covid-19 cần được cách ly, kiểm tra chặt chẽ bởi AFCD".
WHO cũng cho biết, họ đang làm việc với các cơ quan đối tác về sức khỏe con người và động vật, chờ đợi kết quả các cuộc xét nghiệm tiếp theo trên thú cưng từ Hong Kong. Tổng giám đốc WHO, ông Tedros Adhanom Ghebreyesus cho biết vật nuôi ở trong gia đình không thể truyền bệnh cho con người.',
                'Author' => 'PetsCasa',
                'Thumbnails' => 'PetCasa/NewThumbnails/bai5-3_pxarye',
                'Status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'Slug' => '10_su_that_it_ai_biet_ve_meo',
                'Title' => '10 sự thật ít ai biết về mèo',
                'Category_id' => 3,
                'Content' => 'Hiện nay có rất nhiều bạn nuôi và yêu quý vật nuôi như thành viên trong gia đình. Bài viết này chúng tôi sẽ cung cấp cho các bạn 10 sự thật thú vị về loài mèo',
                'Author' => 'PetsCasa',
                'Thumbnails' => 'PetCasa/NewThumbnails/bai5-1_etkt2x.jpg,PetCasa/NewThumbnails/bai5_vyywfi',
                'Status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),

            ),
            array(
                'Slug' => 'cham_soc_dinh_duong_cho_cho_husky',
                'Title' => 'Chăm Sóc Dinh Dưỡng Cho Chó Husky',
                'Category_id' => 3,
                'Content' => 'Husky là giống chó lao động nên cần nhiều năng lượng để tiêu thụ mỗi ngày. Vì vậy việc thiết lập cho cún một chế độ dinh dưỡng khoa học là rất cần thiết. Những kinh nghiệm dưới đây sẽ giúp bạn hiểu vấn đề ăn uống của Husky để chăm sóc cún một cách toàn diện.<br>
<h3><strong>Thói quen ăn uống của chó Husky</strong></h3><br>
Husky thường để mắt đến lượng thức ăn trong bát. Nhưng cún sẽ không ăn nếu không đói, ngay cả khi đồ ăn trước mặt có hấp dẫn đến đâu. Tuy nhiên, nếu cường độ tập thể dục nhiều hơn thì cún sẽ có xu hướng ăn nhiều hơn. Cơ thể Husky có sự trao đổi chất cao và biết cách sử dụng chất dinh dưỡng. Cho cún ăn thức ăn chất lượng trong khoảng từ 2 đến 9 tháng tuổi là rất quan trọng. Bạn cần lưu ý đây là giai đoạn tăng trưởng chính của loài chó này. <br>
<h3><strong>Tần suất bữa ăn của Husky</strong></h3><br>
Một chú chó Husky nhỏ thông thường nên được cho ăn ba lần mỗi ngày. Cùng với thời gian tăng trưởng, chế độ này sẽ tự động chuyển sang hai bữa ăn mỗi ngày, cùng với các bữa phụ. Đặc biệt, Husky nên được cho ăn ít nhất hai giờ trước khi tập thể dục vì không nên vận động với cái bụng đầy. Tương tự, đợi ít nhất 30 phút sau khi tập luyện mới cho cún ăn nếu không bị xoắn dạ dày. <br>
<h3><strong>Kiểm tra dinh dưỡng </strong></h3><br>
Chó Husky nên được cho ăn theo một chế độ dinh dưỡng khoa học. Bạn cần cho cún ăn thực phẩm cao cấp dành riêng cho Husky hoặc thức ăn nấu tại nhà. Tất cả đều phải là loại chất lượng cao, được làm từ nguyên liệu tươi ngon, bổ dưỡng. <br>
Tốt nhất, các món ăn nên chứa protein, carbohydrate, vitamin và chất béo, tốt cho sự tăng trưởng tổng thể và khả năng miễn dịch của Husky. Các loại thịt khác nhau như thịt cừu, cá và thịt gà là nguồn protein chất lượng. Bên cạnh đó, bổ sung rau xanh, cà rốt là rất cần thiết. <br>
<h3><strong>Phải làm gì nếu Husky chán thức ăn?</strong></h3><br>
Có nhiều lý do đằng sau vấn đề chán ăn của Husky. Có thể bạn đang cho cún ăn cùng một loại thức ăn trong các bữa ăn hàng ngày, khiến cún thấy nhàm chán. Bạn nên thay đổi đa dạng các món ăn để hấp dẫn vị giác của Husky. Thỉnh thoảng, cung cấp cho cún vài miếng thịt hoặc pho mát. Đồng thời, bổ sung thêm bữa phụ để kích thích tiêu hoá, giúp cún ăn ngon hơn. <br>
',
                'Author' => 'Hoang Tran',
                'Thumbnails' => 'PetCasa/NewThumbnails/dinh-duong-husky-1_hl3sua,PetCasa/NewThumbnails/dinh-duong-husky-2_x7undo,PetCasa/NewThumbnails/dinh-duong-husky-3_q28k30,PetCasa/NewThumbnails/dinh-duong-husky-4_gon9om,PetCasa/NewThumbnails/dinh-duong-husky-5_srphhq',
                'Status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'Slug' => 'vi_sao_meo_khong_ngu_ve_dem',
                'Title' => 'Vì Sao Mèo Không Ngủ Về Đêm?',
                'Category_id' => 3,
                'Content' => 'Các chú mèo hay có thói quen kì quặc là rất hay phá phách, thậm chí đánh thức bạn trong đêm. Có một số lí do và cả giải pháp để giải quyết vấn đề có vẻ nan giải này!
                Sử dụng các hình phạt hay la mắng chỉ khiến chú mèo kém nghe lời hơn. Thay vào đó, bạn có thể dành năng lượng để đầu tư vào các hoạt động thường ngày và tình cảm dành cho chúng. Chắc hẳn các em mèo sẽ không còn nỡ quấy rối giấc ngủ của một người chủ dễ thương và tâm lí như bạn!',
                'Author' => 'PetsCasa',
                'Thumbnails' => 'PetCasa/NewThumbnails/bai7-1_nnrcc9.jpg,PetCasa/NewThumbnails/bai7_rcmbrx',
                'Status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'Slug' => 'vi_sao_meo_khong_ngu_ve_dem',
                'Title' => 'Vì Sao Mèo Không Ngủ Về Đêm?',
                'Category_id' => 3,
                'Content' => 'Các chú mèo hay có thói quen kì quặc là rất hay phá phách, thậm chí đánh thức bạn trong đêm. Có một số lí do và cả giải pháp để giải quyết vấn đề có vẻ nan giải này!
                Sử dụng các hình phạt hay la mắng chỉ khiến chú mèo kém nghe lời hơn. Thay vào đó, bạn có thể dành năng lượng để đầu tư vào các hoạt động thường ngày và tình cảm dành cho chúng. Chắc hẳn các em mèo sẽ không còn nỡ quấy rối giấc ngủ của một người chủ dễ thương và tâm lí như bạn!',
                'Author' => 'PetsCasa',
                'Thumbnails' => 'PetCasa/NewThumbnails/bai7-1_nnrcc9.jpg,PetCasa/NewThumbnails/bai7_rcmbrx',
                'Status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'Slug' => 'chuyen_gia_phan_bac_kha_nang_cho_nhiem_nCov',
                'Title' => 'Chuyên gia phản bác khả năng chó nhiễm nCov',
                'Category_id' => 3,
                'Content' => 'Các chuyên gia bác bỏ thông tin thú cưng có thể nhiễm virus corona và truyền sang người, cho rằng hiện chưa có đủ bằng chứng để kết luận điều này.
Các báo cáo tuần trước cho thấy một chú chó cưng ở Hong Kong dương tính yếu với virus corona. Chú chó thuộc giống chó phốc sóc Pomeranian được coi là một bệnh nhân nhiễm Covid-19. Chú chó sau đó xét nghiệm thêm vào ngày 29/2 để xem liệu có thực sự bị nhiễm bệnh hay không.
Tổ chức Y tế Thế giới (WHO) và chính quyền Hong Kong tiến hành hợp tác ngay sau khi cơ quan y tế đặc khu đưa ra cảnh báo vào ngày 28/2, chó mèo hoặc bất cứ động vật có vú nào khác, gọi chung là thú cưng của bệnh nhân nhiễm Covid-19 đều cần được kiểm dịch.
Trước thông tin đó, các chuyên gia ở Anh cho biết, chó cưng không thể nào bị nhiễm Covid-19. Lời giải thích cho vấn đề này là có thể chú chó đã có kết quả \'dương tính giả\' do tiếp xúc gần gũi với người nhiễm Covid-19 hoặc từng chạm vào virus corona.
Giới chức y tế Hong Kong cũng cho biết không có triệu chứng nào cho thấy chú chó đã nhiễm nCoV. Do đó nhận định thú cưng có khả năng nhiễm Covid-19 được coi là chưa đủ căn cứ xác thực. Cục Nông nghiệp, Ngư nghiệp và Bảo tồn đặc khu cũng cho biết hiện không bằng chứng nào cho thấy chó có thể bị nhiễm hoặc truyền virus corona sang người.
Tuy vậy, một phát ngôn viên của Cục Nông nghiệp, Ngư nghiệp và Bảo tồn Hong Kong (AFCD) nhận định: "Để đảm bảo bảo sức khỏe cộng đồng và động vật nói chung, thú cưng của bệnh nhân Covid-19 cần được cách ly, kiểm tra chặt chẽ bởi AFCD".
WHO cũng cho biết, họ đang làm việc với các cơ quan đối tác về sức khỏe con người và động vật, chờ đợi kết quả các cuộc xét nghiệm tiếp theo trên thú cưng từ Hong Kong. Tổng giám đốc WHO, ông Tedros Adhanom Ghebreyesus cho biết vật nuôi ở trong gia đình không thể truyền bệnh cho con người.',
                'Author' => 'PetsCasa',
                'Thumbnails' => 'PetCasa/NewThumbnails/bai5-3_pxarye',
                'Status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'Slug' => 'co_nen_nuoi_cho_hay_khong_khi_ban_qua_ban_ron',
                'Title' => 'Có Nên Nuôi Chó Hay Không Khi Bạn Quá Bận Rộn?',
                'Category_id' => 3,
                'Content' => 'Chó là một trong những loại động vật có đặc tính xã hội, vì vậy theo quy luật chung, chúng sẽ cảm thấy vui vẻ, hạnh phúc nhất chính là khi được ở cạnh bên những thành viên thân thiết trong gia đình của mình. Rất nhiều chú chó đã hình thành một sợi dây gắn bó tình cảm sâu sắc với người chủ đến nỗi chúng trở nên đặc biệt lo lắng, sợ hãi và cảm thấy không an toàn khi người chủ ra khỏi nhà. Hơn nữa, các cún cưng cũng sẽ cảm thấy rất buồn chán, nhất là khi chúng phải ở một mình trong khoảng thời gian quá dài. Và điều này có thể dẫn đến một số vấn đề khiến bạn phải lo lắng.
<br>Bạn có nên nhận nuôi một chú chó hay không?
<br>Trước khi đưa ra một quyết định khá quan trọng là nhận nuôi một chú chó, bạn cần cân nhắc về mong muốn cũng như điều kiện của bản thân mình và cũng không thể bỏ qua việc xem xét tới nhu cầu thiết yếu của các chú chó. Bạn nên suy nghĩ thật kỹ xem liệu mình có thể chăm sóc tốt cho chú cún của mình và có được những khoảng thời gian vui vẻ, hạnh phúc cho cả bạn lẫn chó cưng hay không.
<br>Hầu hết các chú cún đều có nhu cầu được bầu bạn và như vậy chúng mới cảm thấy vui vẻ, thoải mái. Do đó, việc bạn để chó cưng ở lại một mình trong thời gian dài không phải là một điều tốt cho chúng. Một số giống chó có nhu cầu bầu bạn lớn hoặc ưa thích hoạt động sẽ cảm thấy quãng thời gian một mình đấy vô cùng khó khăn và căng thẳng. Ngoài ra, bạn cũng không thể quên rằng phần lớn các chú chó cứ cách khoảng 4 giờ lại cần đi vệ sinh. Nếu cún cưng của bạn không thể ra ngoài để tới khu vực quy định, chúng sẽ buộc phải “giải quyết” trong nhà hoặc cố gắng nhịn và việc này có thể gây ra những ảnh hưởng về mặt sức khỏe của cún.
<br>Trong trường hợp nhà bạn có một không gian an toàn ngoài trời có thể yên tâm để cún yêu ở đó khi bạn đi làm, vẫn có nhiều chú chó cảm thấy buồn chán, căng thẳng và thậm chí là làm ồn hoặc phá phách lung tung. Thêm nữa, đây không phải một phương án hợp lý trong những ngày thời tiết quá nóng hoặc quá lạnh. Hay một vấn đề khác bạn nên suy nghĩ đến là việc chó yêu của bạn sẽ có thể bị bắt trộm nếu nó ở một mình ngoài sân. Và việc cún gây ra những âm thanh quá ồn ã cũng có thể khiến hàng xóm quanh nhà bạn khó chịu.
<br>Nếu bạn thích nhận nuôi cún con chứ không phải một chú chó già, thì có lẽ sẽ càng có nhiều vấn đề hơn. Chẳng hạn như việc huấn luyện cún con biết đi vệ sinh đúng nơi quy định đòi hỏi phải có sự giám sát liên tục thì quá trình mới thành công được, vì vậy việc để các chú chó con ở nhà một mình trong một thời gian quá dài sẽ dẫn đến một số rắc rối. Ngoài ra, chó con đặc biệt cần có con người thường xuyên ở gần bên bầu bạn với chúng trong khoảng một năm đầu đời, để giúp chúng làm quen và hòa nhập xã hội xung quanh, tránh mắc phải những vấn đề hành vi như hay lo sợ hoặc tỏ ra hung dữ.
<br>Hãy đặt ra những khoảng thời gian để tiến hành một số bài huấn luyện cơ bản, bởi điều này rất quan trọng trong việc đảm bảo rằng cún con của bạn sẽ biết cách cư xử phù hợp. Việc huấn luyện này cũng sẽ giúp bạn không rơi vào tình huống buộc phải chuyển chú chó nhỏ của mình sang nhà khác hoặc vào các trạm cứu hộ vì không thể kiểm soát được hành động của nó.
<br>Nếu hoàn cảnh của bạn không cho phép nhận nuôi một chú chó thì sao?
<br>Rõ ràng là chúng ta sẽ cần phải xem xét thật kỹ liệu cuộc sống của mình có phù hợp với việc nhận nuôi một chú chó hay không. Nếu công việc hay cuộc sống của bạn đòi việc phải thường xuyên ra ngoài cả ngày hay bạn khó lòng có thể chuẩn bị sẵn những vấn đề chăm sóc thiết yếu tối thiểu về cả vật chất lẫn tinh thần cho chó cưng, thì có lẽ bạn không nên cố chấp đón cún về nhà. Đây sẽ là lựa chọn tốt nhất cho cả bạn và chú chó! Tuy nhiên, nếu bạn rất yêu thích và vẫn muốn có những cơ hội gần gũi, bầu bạn với các chú chó dễ mến, thì dưới đây là một vài gợi ý bạn có thể thực hiện tạm thời, cho tới khi nào hoàn cảnh của bạn thay đổi để có thể nhận nuôi một chú chó cho riêng mình:
<br>Nhận tài trợ cho một chú chó. Vì một số lý do liên quan đến các vấn đề như tuổi tác, sức khỏe hay hành vi, có nhiều chú chó sẽ khó có cơ hội được nhận nuôi và phải ở lại các trạm cứu hộ thú cưng. Bạn có thể chọn một chú chó và hỗ trợ về mặt tài chính để các tình nguyện viên nuôi dưỡng nó, sau đó, thỉnh thoảng tới thăm, đưa nó đi dạo. Lòng hảo tâm của bạn sẽ không chỉ giúp được riêng chú chó đó mà hỗ trợ những thú cưng khác có được điều kiện sống và sự chăm sóc tốt hơn.
<br>Nếu thỉnh thoảng có thời gian rảnh, bạn cũng có thể tình nguyện tới giúp đỡ người quen, bạn bè hay những người đang bận rộn đến nỗi không thể đưa các chú cún của họ ra ngoài đi dạo. Đó chắc chắn sẽ là một khoảng thời gian thư giãn vô cùng thú vị với bạn.
<br>Một số gợi ý giúp bạn có thể chăm sóc cún cưng tốt dù rất bận rộn
<br>Sau khi đã suy tính kỹ lưỡng mọi vấn đề, nếu bạn vẫn quyết định đón một chú chó về bầu bạn với mình, bạn cần quan tâm tới việc sẽ sắp xếp ra sao cho cún trong lúc bạn đi làm. Những gợi ý dưới đây sẽ giúp bạn có thể quản lý tốt việc chăm sóc cún cưng cả ngày trong khi bạn vẫn đang phải bận rộn ở công sở.
<br><strong>Về nhà ăn trưa</strong>
<br>Tùy vào khoảng cách giữa công ty và nhà của bạn cũng như thời gian nghỉ trưa, bạn có thể cân nhắc đến việc về nhà ăn trưa. Nếu chỉ mất khoảng 10 phút cho mỗi lần đi về và bạn vẫn có khoảng 1 giờ để ăn trưa, nghỉ ngơi thì đây là một phương án hoàn toàn khả thi. Thời gian đó sẽ đủ để bạn cho cún cưng ra ngoài đi vệ sinh, vận động nhẹ nhàng hoặc thậm chí là thực hiện một chuyến đi bộ ngắn dạo quanh khu vực gần nhà. Nếu bạn đã chuẩn bị đồ ăn từ hôm trước hoặc buổi sáng, bạn có thể vừa ngồi ăn vừa ngắm nhìn chó yêu chạy nhảy, tận hưởng khoảng thời gian thư giãn ngắn ngủi nhưng vô cùng thoải mái giữa ngày làm việc bận rộn.
<br><strong>Nhờ vả hàng xóm xung quanh</strong>
<br>Thử xem liệu rằng quanh khu nhà bạn có người hàng xóm nào yêu chó và ở nhà ban ngày không? Hoặc bạn có sống gần một người đã nghỉ hưu, có thời gian thoải mái và thích ra ngoài đi dạo chứ? Nếu có, hãy thử đặt vấn đề và trao đổi để có được sự giúp đỡ từ những người đó. Nếu có thể, bạn hãy đưa ra thỏa thuận về chi phí phù hợp hoặc nhận chăm sóc cho thú cưng của họ vào cuối tuần hay những dịp họ đi nghỉ xa. Đây có thể là một giải pháp hoàn hảo, đơn giản cho vấn đề của bạn và cũng an toàn cho cún yêu.
<br><strong>Đưa cún cưng tới nơi làm việc</strong>
<br>Ý tưởng về việc đưa chó yêu tới nơi làm việc thoạt nghe có vẻ rất điên rồ và với một số ngành nghề hay doanh nghiệp thì đó là một điều không thể. Tuy nhiên, bạn cũng có thể hỏi lãnh đạo xem liệu mình có thể đưa chú chó tới cơ quan hay không, nhất là khi bạn làm ở một văn phòng nhỏ, ấm cúng với những đồng nghiệp yêu chó. Trong trường hợp bạn làm việc ngoài trời hay có văn phòng riêng, ý tưởng này có vẻ sẽ càng khả thi, tuy nhiên, nếu bạn làm việc cho một công ty lớn hay trong môi trường công sở thì điều đó gần như là không thể.
<br><strong>Làm việc tại nhà</strong>
<br>Tùy thuộc vào đặc thù công việc cũng như vị trí hay vai trò của bạn trong công ty, bạn có thể cân nhắc hình thức làm việc tại nhà để có được thời gian biểu thoải mái hơn. Trước đây, làm việc tại nhà có thể coi là một khái niệm không phổ biến. Tuy nhiên, ngày nay, khi so sánh với việc phải di chuyển những quãng đường xa xôi, trang bị cơ sở hạ tầng tốn kém cho các văn phòng làm việc, cùng với sự bùng nổ của công nghệ, rất nhiều người lao động đã lựa chọn hình thức làm việc này để tăng năng suất công việc và giảm thiểu chi phí. Nếu công việc của bạn phù hợp để có thể làm tại nhà, đây sẽ là một lựa chọn giúp bạn có thời gian chăm sóc cún cưng yêu quý của mình dễ dàng hơn.
<br><strong>Thuê một người chăm sóc cún yêu khi bạn đi làm</strong>
<br>Đây là một lựa chọn khá tốn kém, nhưng nếu bạn có đủ điều kiện chi trả thì cũng nên cân nhắc tới gợi ý này. Bạn có thể thuê một người tới trông chú chó của mình trong khoảng 1 – 2 giờ trong ngày, giúp chúng được đáp ứng những nhu cầu về thực phẩm, vận động hay bài tiết. Hoặc bạn cũng có thể thuê một người tới dắt cún cưng đi dạo một vòng từ nhà bạn tới những khu vực rộng rãi, an toàn và đưa cún trở về nhà khi đã mệt mỏi. Tuy nhiên, nếu bạn lựa chọn phương án này, hãy xem xét thật kỹ về người mà bạn quyết định thuê, đảm bảo chắc chắn họ sẽ đối xử thật tốt với cún cưng khi bạn không có mặt.
<br><strong>Nuôi hai chú chó để chúng có thể bầu bạn với nhau</strong>
<br>Cũng có thể bạn sẽ may mắn gặp được hai chú chó vốn rất thân thiết với nhau và chúng ít khi cảm thấy quá buồn bã với việc người chủ phải rời đi. Dù vậy, trong trường hợp này bạn sẽ vẫn phải chắc chắn rằng hai chú cún không bị buồn chán hay đảm bảo chúng có những khoảng thời gian ra ngoài để đi vệ sinh. Tuy nhiên, lựa chọn này cũng có thể dẫn đến hậu quả tồi tệ bởi có khá nhiều chú chó không cảm thấy được khuây khỏa kể cả khi đã có một chú chó khác ở bên bầu bạn, vì nó chỉ thấy nhớ người chủ của mình. Và nếu như vậy, rất có thể đến cuối cùng bạn lại phải lo lắng cho cả hai chú chó buồn bã, thay vì chỉ có một.
<br><strong>Chuẩn bị những món đồ giúp thú cưng bận rộn cả ngày</strong>
<br>-  Sử dụng những món đồ chơi có nhồi thức ăn ở bên trong. Đây là những món đồ được làm từ các vật liệu như nhựa hay cao su cứng, có chứa đồ ăn ở bên trong nhưng cún cưng không dễ dàng để lấy ra được. Loại đồ chơi này thường có lỗ ở hai đầu và các chú chó sẽ phải khéo léo lắc, cào, lăn, liếm hoặc đập món đồ để làm đồ ăn rơi ra ngoài. Những món đồ chơi như này sẽ đòi hỏi rất nhiều thời gian, sự kiên nhẫn hay cả kỹ năng xử lý vấn đề từ cún cưng của bạn và việc này sẽ giúp nó tận hưởng khoảng thời gian ở một mình hơn. Cần nhớ rằng trong lần đầu tiên bạn đưa món đồ chơi đó cho chó yêu của mình, hãy đảm bảo cún có thể dễ dàng lấy được hết những phần thức ăn ở trong đó. Ngoài ra bạn nên chú ý lựa chọn sao cho những phần lỗ trên đồ chơi đủ rộng và thức ăn thì có kích thước nhỏ, phù hợp để có thể rơi ra dễ dàng. Khi chú chó yêu quý của bạn đã quen với món đồ này, bạn có thể nâng cấp độ khó lên như đồ ăn chia thành những miếng lớn hơn, đồ chơi nhiều thách thức hơn hoặc thậm chí là cho cả món đồ chơi đã nhồi thức ăn vào trong tủ đá. Đồ chơi chứa đồ ăn là một giải pháp rất hữu ích để giúp chú chó của bạn giảm thiểu buồn chán.
<br>-  Chia nhỏ bữa ăn của cún thành nhiều phần và giấu ở những nơi khác nhau trước khi bạn rời đi. Chó cưng chắc chắn sẽ có khoảng thời gian thú vị khi tìm kiếm đồ ăn của mình trong lúc bạn đi làm. Bạn hãy cố gắng làm mới trò chơi này bằng cách mỗi ngày sẽ giấu đồ ăn ở những nơi khác nhau hoặc ở một vài chỗ đặc biệt. Điều này sẽ hấp dẫn hầu hết các chú chó và khiến chúng vui vẻ.
<br>-  Chuẩn bị sẵn đồ chơi gặm nhấm cho cún cưng. Các chú chó ở bất kỳ độ tuổi nào cũng đều thích nhai đồ, dù là những chú chó hoang hay những cún cưng nuôi trong các gia đình. Hành động này giúp bộ hàm của chúng cứng cáp hơn và làm sạch răng. Ngoài ra, việc gặm nhấm cũng khiến chúng cảm thấy vui vẻ và làm giảm những căng thẳng, lo âu. Dù chú chó của bạn còn nhỏ hay đã nhiều tuổi, việc cung cấp cho chúng một số loại đồ chơi gặm nhấm phù hợp luôn là một vấn đề quan trọng mà bạn nên chú ý.
',
                'Author' => 'PetsCasa',
                'Thumbnails' => 'PetCasa/NewThumbnails/bai3_vwgyve',
                'Status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'Slug' => 'co_nen_nuoi_cho_hay_khong_khi_ban_qua_ban_ron',
                'Title' => 'Có Nên Nuôi Chó Hay Không Khi Bạn Quá Bận Rộn?',
                'Category_id' => 3,
                'Content' => 'Chó là một trong những loại động vật có đặc tính xã hội, vì vậy theo quy luật chung, chúng sẽ cảm thấy vui vẻ, hạnh phúc nhất chính là khi được ở cạnh bên những thành viên thân thiết trong gia đình của mình. Rất nhiều chú chó đã hình thành một sợi dây gắn bó tình cảm sâu sắc với người chủ đến nỗi chúng trở nên đặc biệt lo lắng, sợ hãi và cảm thấy không an toàn khi người chủ ra khỏi nhà. Hơn nữa, các cún cưng cũng sẽ cảm thấy rất buồn chán, nhất là khi chúng phải ở một mình trong khoảng thời gian quá dài. Và điều này có thể dẫn đến một số vấn đề khiến bạn phải lo lắng.
<br>Bạn có nên nhận nuôi một chú chó hay không?
<br>Trước khi đưa ra một quyết định khá quan trọng là nhận nuôi một chú chó, bạn cần cân nhắc về mong muốn cũng như điều kiện của bản thân mình và cũng không thể bỏ qua việc xem xét tới nhu cầu thiết yếu của các chú chó. Bạn nên suy nghĩ thật kỹ xem liệu mình có thể chăm sóc tốt cho chú cún của mình và có được những khoảng thời gian vui vẻ, hạnh phúc cho cả bạn lẫn chó cưng hay không.
<br>Hầu hết các chú cún đều có nhu cầu được bầu bạn và như vậy chúng mới cảm thấy vui vẻ, thoải mái. Do đó, việc bạn để chó cưng ở lại một mình trong thời gian dài không phải là một điều tốt cho chúng. Một số giống chó có nhu cầu bầu bạn lớn hoặc ưa thích hoạt động sẽ cảm thấy quãng thời gian một mình đấy vô cùng khó khăn và căng thẳng. Ngoài ra, bạn cũng không thể quên rằng phần lớn các chú chó cứ cách khoảng 4 giờ lại cần đi vệ sinh. Nếu cún cưng của bạn không thể ra ngoài để tới khu vực quy định, chúng sẽ buộc phải “giải quyết” trong nhà hoặc cố gắng nhịn và việc này có thể gây ra những ảnh hưởng về mặt sức khỏe của cún.
<br>Trong trường hợp nhà bạn có một không gian an toàn ngoài trời có thể yên tâm để cún yêu ở đó khi bạn đi làm, vẫn có nhiều chú chó cảm thấy buồn chán, căng thẳng và thậm chí là làm ồn hoặc phá phách lung tung. Thêm nữa, đây không phải một phương án hợp lý trong những ngày thời tiết quá nóng hoặc quá lạnh. Hay một vấn đề khác bạn nên suy nghĩ đến là việc chó yêu của bạn sẽ có thể bị bắt trộm nếu nó ở một mình ngoài sân. Và việc cún gây ra những âm thanh quá ồn ã cũng có thể khiến hàng xóm quanh nhà bạn khó chịu.
<br>Nếu bạn thích nhận nuôi cún con chứ không phải một chú chó già, thì có lẽ sẽ càng có nhiều vấn đề hơn. Chẳng hạn như việc huấn luyện cún con biết đi vệ sinh đúng nơi quy định đòi hỏi phải có sự giám sát liên tục thì quá trình mới thành công được, vì vậy việc để các chú chó con ở nhà một mình trong một thời gian quá dài sẽ dẫn đến một số rắc rối. Ngoài ra, chó con đặc biệt cần có con người thường xuyên ở gần bên bầu bạn với chúng trong khoảng một năm đầu đời, để giúp chúng làm quen và hòa nhập xã hội xung quanh, tránh mắc phải những vấn đề hành vi như hay lo sợ hoặc tỏ ra hung dữ.
<br>Hãy đặt ra những khoảng thời gian để tiến hành một số bài huấn luyện cơ bản, bởi điều này rất quan trọng trong việc đảm bảo rằng cún con của bạn sẽ biết cách cư xử phù hợp. Việc huấn luyện này cũng sẽ giúp bạn không rơi vào tình huống buộc phải chuyển chú chó nhỏ của mình sang nhà khác hoặc vào các trạm cứu hộ vì không thể kiểm soát được hành động của nó.
<br>Nếu hoàn cảnh của bạn không cho phép nhận nuôi một chú chó thì sao?
<br>Rõ ràng là chúng ta sẽ cần phải xem xét thật kỹ liệu cuộc sống của mình có phù hợp với việc nhận nuôi một chú chó hay không. Nếu công việc hay cuộc sống của bạn đòi việc phải thường xuyên ra ngoài cả ngày hay bạn khó lòng có thể chuẩn bị sẵn những vấn đề chăm sóc thiết yếu tối thiểu về cả vật chất lẫn tinh thần cho chó cưng, thì có lẽ bạn không nên cố chấp đón cún về nhà. Đây sẽ là lựa chọn tốt nhất cho cả bạn và chú chó! Tuy nhiên, nếu bạn rất yêu thích và vẫn muốn có những cơ hội gần gũi, bầu bạn với các chú chó dễ mến, thì dưới đây là một vài gợi ý bạn có thể thực hiện tạm thời, cho tới khi nào hoàn cảnh của bạn thay đổi để có thể nhận nuôi một chú chó cho riêng mình:
<br>Nhận tài trợ cho một chú chó. Vì một số lý do liên quan đến các vấn đề như tuổi tác, sức khỏe hay hành vi, có nhiều chú chó sẽ khó có cơ hội được nhận nuôi và phải ở lại các trạm cứu hộ thú cưng. Bạn có thể chọn một chú chó và hỗ trợ về mặt tài chính để các tình nguyện viên nuôi dưỡng nó, sau đó, thỉnh thoảng tới thăm, đưa nó đi dạo. Lòng hảo tâm của bạn sẽ không chỉ giúp được riêng chú chó đó mà hỗ trợ những thú cưng khác có được điều kiện sống và sự chăm sóc tốt hơn.
<br>Nếu thỉnh thoảng có thời gian rảnh, bạn cũng có thể tình nguyện tới giúp đỡ người quen, bạn bè hay những người đang bận rộn đến nỗi không thể đưa các chú cún của họ ra ngoài đi dạo. Đó chắc chắn sẽ là một khoảng thời gian thư giãn vô cùng thú vị với bạn.
<br>Một số gợi ý giúp bạn có thể chăm sóc cún cưng tốt dù rất bận rộn
<br>Sau khi đã suy tính kỹ lưỡng mọi vấn đề, nếu bạn vẫn quyết định đón một chú chó về bầu bạn với mình, bạn cần quan tâm tới việc sẽ sắp xếp ra sao cho cún trong lúc bạn đi làm. Những gợi ý dưới đây sẽ giúp bạn có thể quản lý tốt việc chăm sóc cún cưng cả ngày trong khi bạn vẫn đang phải bận rộn ở công sở.
<br><strong>Về nhà ăn trưa</strong>
<br>Tùy vào khoảng cách giữa công ty và nhà của bạn cũng như thời gian nghỉ trưa, bạn có thể cân nhắc đến việc về nhà ăn trưa. Nếu chỉ mất khoảng 10 phút cho mỗi lần đi về và bạn vẫn có khoảng 1 giờ để ăn trưa, nghỉ ngơi thì đây là một phương án hoàn toàn khả thi. Thời gian đó sẽ đủ để bạn cho cún cưng ra ngoài đi vệ sinh, vận động nhẹ nhàng hoặc thậm chí là thực hiện một chuyến đi bộ ngắn dạo quanh khu vực gần nhà. Nếu bạn đã chuẩn bị đồ ăn từ hôm trước hoặc buổi sáng, bạn có thể vừa ngồi ăn vừa ngắm nhìn chó yêu chạy nhảy, tận hưởng khoảng thời gian thư giãn ngắn ngủi nhưng vô cùng thoải mái giữa ngày làm việc bận rộn.
<br><strong>Nhờ vả hàng xóm xung quanh</strong>
<br>Thử xem liệu rằng quanh khu nhà bạn có người hàng xóm nào yêu chó và ở nhà ban ngày không? Hoặc bạn có sống gần một người đã nghỉ hưu, có thời gian thoải mái và thích ra ngoài đi dạo chứ? Nếu có, hãy thử đặt vấn đề và trao đổi để có được sự giúp đỡ từ những người đó. Nếu có thể, bạn hãy đưa ra thỏa thuận về chi phí phù hợp hoặc nhận chăm sóc cho thú cưng của họ vào cuối tuần hay những dịp họ đi nghỉ xa. Đây có thể là một giải pháp hoàn hảo, đơn giản cho vấn đề của bạn và cũng an toàn cho cún yêu.
<br><strong>Đưa cún cưng tới nơi làm việc</strong>
<br>Ý tưởng về việc đưa chó yêu tới nơi làm việc thoạt nghe có vẻ rất điên rồ và với một số ngành nghề hay doanh nghiệp thì đó là một điều không thể. Tuy nhiên, bạn cũng có thể hỏi lãnh đạo xem liệu mình có thể đưa chú chó tới cơ quan hay không, nhất là khi bạn làm ở một văn phòng nhỏ, ấm cúng với những đồng nghiệp yêu chó. Trong trường hợp bạn làm việc ngoài trời hay có văn phòng riêng, ý tưởng này có vẻ sẽ càng khả thi, tuy nhiên, nếu bạn làm việc cho một công ty lớn hay trong môi trường công sở thì điều đó gần như là không thể.
<br><strong>Làm việc tại nhà</strong>
<br>Tùy thuộc vào đặc thù công việc cũng như vị trí hay vai trò của bạn trong công ty, bạn có thể cân nhắc hình thức làm việc tại nhà để có được thời gian biểu thoải mái hơn. Trước đây, làm việc tại nhà có thể coi là một khái niệm không phổ biến. Tuy nhiên, ngày nay, khi so sánh với việc phải di chuyển những quãng đường xa xôi, trang bị cơ sở hạ tầng tốn kém cho các văn phòng làm việc, cùng với sự bùng nổ của công nghệ, rất nhiều người lao động đã lựa chọn hình thức làm việc này để tăng năng suất công việc và giảm thiểu chi phí. Nếu công việc của bạn phù hợp để có thể làm tại nhà, đây sẽ là một lựa chọn giúp bạn có thời gian chăm sóc cún cưng yêu quý của mình dễ dàng hơn.
<br><strong>Thuê một người chăm sóc cún yêu khi bạn đi làm</strong>
<br>Đây là một lựa chọn khá tốn kém, nhưng nếu bạn có đủ điều kiện chi trả thì cũng nên cân nhắc tới gợi ý này. Bạn có thể thuê một người tới trông chú chó của mình trong khoảng 1 – 2 giờ trong ngày, giúp chúng được đáp ứng những nhu cầu về thực phẩm, vận động hay bài tiết. Hoặc bạn cũng có thể thuê một người tới dắt cún cưng đi dạo một vòng từ nhà bạn tới những khu vực rộng rãi, an toàn và đưa cún trở về nhà khi đã mệt mỏi. Tuy nhiên, nếu bạn lựa chọn phương án này, hãy xem xét thật kỹ về người mà bạn quyết định thuê, đảm bảo chắc chắn họ sẽ đối xử thật tốt với cún cưng khi bạn không có mặt.
<br><strong>Nuôi hai chú chó để chúng có thể bầu bạn với nhau</strong>
<br>Cũng có thể bạn sẽ may mắn gặp được hai chú chó vốn rất thân thiết với nhau và chúng ít khi cảm thấy quá buồn bã với việc người chủ phải rời đi. Dù vậy, trong trường hợp này bạn sẽ vẫn phải chắc chắn rằng hai chú cún không bị buồn chán hay đảm bảo chúng có những khoảng thời gian ra ngoài để đi vệ sinh. Tuy nhiên, lựa chọn này cũng có thể dẫn đến hậu quả tồi tệ bởi có khá nhiều chú chó không cảm thấy được khuây khỏa kể cả khi đã có một chú chó khác ở bên bầu bạn, vì nó chỉ thấy nhớ người chủ của mình. Và nếu như vậy, rất có thể đến cuối cùng bạn lại phải lo lắng cho cả hai chú chó buồn bã, thay vì chỉ có một.
<br><strong>Chuẩn bị những món đồ giúp thú cưng bận rộn cả ngày</strong>
<br>-  Sử dụng những món đồ chơi có nhồi thức ăn ở bên trong. Đây là những món đồ được làm từ các vật liệu như nhựa hay cao su cứng, có chứa đồ ăn ở bên trong nhưng cún cưng không dễ dàng để lấy ra được. Loại đồ chơi này thường có lỗ ở hai đầu và các chú chó sẽ phải khéo léo lắc, cào, lăn, liếm hoặc đập món đồ để làm đồ ăn rơi ra ngoài. Những món đồ chơi như này sẽ đòi hỏi rất nhiều thời gian, sự kiên nhẫn hay cả kỹ năng xử lý vấn đề từ cún cưng của bạn và việc này sẽ giúp nó tận hưởng khoảng thời gian ở một mình hơn. Cần nhớ rằng trong lần đầu tiên bạn đưa món đồ chơi đó cho chó yêu của mình, hãy đảm bảo cún có thể dễ dàng lấy được hết những phần thức ăn ở trong đó. Ngoài ra bạn nên chú ý lựa chọn sao cho những phần lỗ trên đồ chơi đủ rộng và thức ăn thì có kích thước nhỏ, phù hợp để có thể rơi ra dễ dàng. Khi chú chó yêu quý của bạn đã quen với món đồ này, bạn có thể nâng cấp độ khó lên như đồ ăn chia thành những miếng lớn hơn, đồ chơi nhiều thách thức hơn hoặc thậm chí là cho cả món đồ chơi đã nhồi thức ăn vào trong tủ đá. Đồ chơi chứa đồ ăn là một giải pháp rất hữu ích để giúp chú chó của bạn giảm thiểu buồn chán.
<br>-  Chia nhỏ bữa ăn của cún thành nhiều phần và giấu ở những nơi khác nhau trước khi bạn rời đi. Chó cưng chắc chắn sẽ có khoảng thời gian thú vị khi tìm kiếm đồ ăn của mình trong lúc bạn đi làm. Bạn hãy cố gắng làm mới trò chơi này bằng cách mỗi ngày sẽ giấu đồ ăn ở những nơi khác nhau hoặc ở một vài chỗ đặc biệt. Điều này sẽ hấp dẫn hầu hết các chú chó và khiến chúng vui vẻ.
<br>-  Chuẩn bị sẵn đồ chơi gặm nhấm cho cún cưng. Các chú chó ở bất kỳ độ tuổi nào cũng đều thích nhai đồ, dù là những chú chó hoang hay những cún cưng nuôi trong các gia đình. Hành động này giúp bộ hàm của chúng cứng cáp hơn và làm sạch răng. Ngoài ra, việc gặm nhấm cũng khiến chúng cảm thấy vui vẻ và làm giảm những căng thẳng, lo âu. Dù chú chó của bạn còn nhỏ hay đã nhiều tuổi, việc cung cấp cho chúng một số loại đồ chơi gặm nhấm phù hợp luôn là một vấn đề quan trọng mà bạn nên chú ý.
',
                'Author' => 'PetsCasa',
                'Thumbnails' => 'PetCasa/NewThumbnails/bai3_vwgyve',
                'Status' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            array(
                'Slug' => 'co_nen_nuoi_cho_hay_khong_khi_ban_qua_ban_ron',
                'Title' => 'Có Nên Nuôi Chó Hay Không Khi Bạn Quá Bận Rộn?',
                'Category_id' => 3,
                'Content' => 'Chó là một trong những loại động vật có đặc tính xã hội, vì vậy theo quy luật chung, chúng sẽ cảm thấy vui vẻ, hạnh phúc nhất chính là khi được ở cạnh bên những thành viên thân thiết trong gia đình của mình. Rất nhiều chú chó đã hình thành một sợi dây gắn bó tình cảm sâu sắc với người chủ đến nỗi chúng trở nên đặc biệt lo lắng, sợ hãi và cảm thấy không an toàn khi người chủ ra khỏi nhà. Hơn nữa, các cún cưng cũng sẽ cảm thấy rất buồn chán, nhất là khi chúng phải ở một mình trong khoảng thời gian quá dài. Và điều này có thể dẫn đến một số vấn đề khiến bạn phải lo lắng.
<br>Bạn có nên nhận nuôi một chú chó hay không?
<br>Trước khi đưa ra một quyết định khá quan trọng là nhận nuôi một chú chó, bạn cần cân nhắc về mong muốn cũng như điều kiện của bản thân mình và cũng không thể bỏ qua việc xem xét tới nhu cầu thiết yếu của các chú chó. Bạn nên suy nghĩ thật kỹ xem liệu mình có thể chăm sóc tốt cho chú cún của mình và có được những khoảng thời gian vui vẻ, hạnh phúc cho cả bạn lẫn chó cưng hay không.
<br>Hầu hết các chú cún đều có nhu cầu được bầu bạn và như vậy chúng mới cảm thấy vui vẻ, thoải mái. Do đó, việc bạn để chó cưng ở lại một mình trong thời gian dài không phải là một điều tốt cho chúng. Một số giống chó có nhu cầu bầu bạn lớn hoặc ưa thích hoạt động sẽ cảm thấy quãng thời gian một mình đấy vô cùng khó khăn và căng thẳng. Ngoài ra, bạn cũng không thể quên rằng phần lớn các chú chó cứ cách khoảng 4 giờ lại cần đi vệ sinh. Nếu cún cưng của bạn không thể ra ngoài để tới khu vực quy định, chúng sẽ buộc phải “giải quyết” trong nhà hoặc cố gắng nhịn và việc này có thể gây ra những ảnh hưởng về mặt sức khỏe của cún.
<br>Trong trường hợp nhà bạn có một không gian an toàn ngoài trời có thể yên tâm để cún yêu ở đó khi bạn đi làm, vẫn có nhiều chú chó cảm thấy buồn chán, căng thẳng và thậm chí là làm ồn hoặc phá phách lung tung. Thêm nữa, đây không phải một phương án hợp lý trong những ngày thời tiết quá nóng hoặc quá lạnh. Hay một vấn đề khác bạn nên suy nghĩ đến là việc chó yêu của bạn sẽ có thể bị bắt trộm nếu nó ở một mình ngoài sân. Và việc cún gây ra những âm thanh quá ồn ã cũng có thể khiến hàng xóm quanh nhà bạn khó chịu.
<br>Nếu bạn thích nhận nuôi cún con chứ không phải một chú chó già, thì có lẽ sẽ càng có nhiều vấn đề hơn. Chẳng hạn như việc huấn luyện cún con biết đi vệ sinh đúng nơi quy định đòi hỏi phải có sự giám sát liên tục thì quá trình mới thành công được, vì vậy việc để các chú chó con ở nhà một mình trong một thời gian quá dài sẽ dẫn đến một số rắc rối. Ngoài ra, chó con đặc biệt cần có con người thường xuyên ở gần bên bầu bạn với chúng trong khoảng một năm đầu đời, để giúp chúng làm quen và hòa nhập xã hội xung quanh, tránh mắc phải những vấn đề hành vi như hay lo sợ hoặc tỏ ra hung dữ.
<br>Hãy đặt ra những khoảng thời gian để tiến hành một số bài huấn luyện cơ bản, bởi điều này rất quan trọng trong việc đảm bảo rằng cún con của bạn sẽ biết cách cư xử phù hợp. Việc huấn luyện này cũng sẽ giúp bạn không rơi vào tình huống buộc phải chuyển chú chó nhỏ của mình sang nhà khác hoặc vào các trạm cứu hộ vì không thể kiểm soát được hành động của nó.
<br>Nếu hoàn cảnh của bạn không cho phép nhận nuôi một chú chó thì sao?
<br>Rõ ràng là chúng ta sẽ cần phải xem xét thật kỹ liệu cuộc sống của mình có phù hợp với việc nhận nuôi một chú chó hay không. Nếu công việc hay cuộc sống của bạn đòi việc phải thường xuyên ra ngoài cả ngày hay bạn khó lòng có thể chuẩn bị sẵn những vấn đề chăm sóc thiết yếu tối thiểu về cả vật chất lẫn tinh thần cho chó cưng, thì có lẽ bạn không nên cố chấp đón cún về nhà. Đây sẽ là lựa chọn tốt nhất cho cả bạn và chú chó! Tuy nhiên, nếu bạn rất yêu thích và vẫn muốn có những cơ hội gần gũi, bầu bạn với các chú chó dễ mến, thì dưới đây là một vài gợi ý bạn có thể thực hiện tạm thời, cho tới khi nào hoàn cảnh của bạn thay đổi để có thể nhận nuôi một chú chó cho riêng mình:
<br>Nhận tài trợ cho một chú chó. Vì một số lý do liên quan đến các vấn đề như tuổi tác, sức khỏe hay hành vi, có nhiều chú chó sẽ khó có cơ hội được nhận nuôi và phải ở lại các trạm cứu hộ thú cưng. Bạn có thể chọn một chú chó và hỗ trợ về mặt tài chính để các tình nguyện viên nuôi dưỡng nó, sau đó, thỉnh thoảng tới thăm, đưa nó đi dạo. Lòng hảo tâm của bạn sẽ không chỉ giúp được riêng chú chó đó mà hỗ trợ những thú cưng khác có được điều kiện sống và sự chăm sóc tốt hơn.
<br>Nếu thỉnh thoảng có thời gian rảnh, bạn cũng có thể tình nguyện tới giúp đỡ người quen, bạn bè hay những người đang bận rộn đến nỗi không thể đưa các chú cún của họ ra ngoài đi dạo. Đó chắc chắn sẽ là một khoảng thời gian thư giãn vô cùng thú vị với bạn.
<br>Một số gợi ý giúp bạn có thể chăm sóc cún cưng tốt dù rất bận rộn
<br>Sau khi đã suy tính kỹ lưỡng mọi vấn đề, nếu bạn vẫn quyết định đón một chú chó về bầu bạn với mình, bạn cần quan tâm tới việc sẽ sắp xếp ra sao cho cún trong lúc bạn đi làm. Những gợi ý dưới đây sẽ giúp bạn có thể quản lý tốt việc chăm sóc cún cưng cả ngày trong khi bạn vẫn đang phải bận rộn ở công sở.
<br><strong>Về nhà ăn trưa</strong>
<br>Tùy vào khoảng cách giữa công ty và nhà của bạn cũng như thời gian nghỉ trưa, bạn có thể cân nhắc đến việc về nhà ăn trưa. Nếu chỉ mất khoảng 10 phút cho mỗi lần đi về và bạn vẫn có khoảng 1 giờ để ăn trưa, nghỉ ngơi thì đây là một phương án hoàn toàn khả thi. Thời gian đó sẽ đủ để bạn cho cún cưng ra ngoài đi vệ sinh, vận động nhẹ nhàng hoặc thậm chí là thực hiện một chuyến đi bộ ngắn dạo quanh khu vực gần nhà. Nếu bạn đã chuẩn bị đồ ăn từ hôm trước hoặc buổi sáng, bạn có thể vừa ngồi ăn vừa ngắm nhìn chó yêu chạy nhảy, tận hưởng khoảng thời gian thư giãn ngắn ngủi nhưng vô cùng thoải mái giữa ngày làm việc bận rộn.
<br><strong>Nhờ vả hàng xóm xung quanh</strong>
<br>Thử xem liệu rằng quanh khu nhà bạn có người hàng xóm nào yêu chó và ở nhà ban ngày không? Hoặc bạn có sống gần một người đã nghỉ hưu, có thời gian thoải mái và thích ra ngoài đi dạo chứ? Nếu có, hãy thử đặt vấn đề và trao đổi để có được sự giúp đỡ từ những người đó. Nếu có thể, bạn hãy đưa ra thỏa thuận về chi phí phù hợp hoặc nhận chăm sóc cho thú cưng của họ vào cuối tuần hay những dịp họ đi nghỉ xa. Đây có thể là một giải pháp hoàn hảo, đơn giản cho vấn đề của bạn và cũng an toàn cho cún yêu.
<br><strong>Đưa cún cưng tới nơi làm việc</strong>
<br>Ý tưởng về việc đưa chó yêu tới nơi làm việc thoạt nghe có vẻ rất điên rồ và với một số ngành nghề hay doanh nghiệp thì đó là một điều không thể. Tuy nhiên, bạn cũng có thể hỏi lãnh đạo xem liệu mình có thể đưa chú chó tới cơ quan hay không, nhất là khi bạn làm ở một văn phòng nhỏ, ấm cúng với những đồng nghiệp yêu chó. Trong trường hợp bạn làm việc ngoài trời hay có văn phòng riêng, ý tưởng này có vẻ sẽ càng khả thi, tuy nhiên, nếu bạn làm việc cho một công ty lớn hay trong môi trường công sở thì điều đó gần như là không thể.
<br><strong>Làm việc tại nhà</strong>
<br>Tùy thuộc vào đặc thù công việc cũng như vị trí hay vai trò của bạn trong công ty, bạn có thể cân nhắc hình thức làm việc tại nhà để có được thời gian biểu thoải mái hơn. Trước đây, làm việc tại nhà có thể coi là một khái niệm không phổ biến. Tuy nhiên, ngày nay, khi so sánh với việc phải di chuyển những quãng đường xa xôi, trang bị cơ sở hạ tầng tốn kém cho các văn phòng làm việc, cùng với sự bùng nổ của công nghệ, rất nhiều người lao động đã lựa chọn hình thức làm việc này để tăng năng suất công việc và giảm thiểu chi phí. Nếu công việc của bạn phù hợp để có thể làm tại nhà, đây sẽ là một lựa chọn giúp bạn có thời gian chăm sóc cún cưng yêu quý của mình dễ dàng hơn.
<br><strong>Thuê một người chăm sóc cún yêu khi bạn đi làm</strong>
<br>Đây là một lựa chọn khá tốn kém, nhưng nếu bạn có đủ điều kiện chi trả thì cũng nên cân nhắc tới gợi ý này. Bạn có thể thuê một người tới trông chú chó của mình trong khoảng 1 – 2 giờ trong ngày, giúp chúng được đáp ứng những nhu cầu về thực phẩm, vận động hay bài tiết. Hoặc bạn cũng có thể thuê một người tới dắt cún cưng đi dạo một vòng từ nhà bạn tới những khu vực rộng rãi, an toàn và đưa cún trở về nhà khi đã mệt mỏi. Tuy nhiên, nếu bạn lựa chọn phương án này, hãy xem xét thật kỹ về người mà bạn quyết định thuê, đảm bảo chắc chắn họ sẽ đối xử thật tốt với cún cưng khi bạn không có mặt.
<br><strong>Nuôi hai chú chó để chúng có thể bầu bạn với nhau</strong>
<br>Cũng có thể bạn sẽ may mắn gặp được hai chú chó vốn rất thân thiết với nhau và chúng ít khi cảm thấy quá buồn bã với việc người chủ phải rời đi. Dù vậy, trong trường hợp này bạn sẽ vẫn phải chắc chắn rằng hai chú cún không bị buồn chán hay đảm bảo chúng có những khoảng thời gian ra ngoài để đi vệ sinh. Tuy nhiên, lựa chọn này cũng có thể dẫn đến hậu quả tồi tệ bởi có khá nhiều chú chó không cảm thấy được khuây khỏa kể cả khi đã có một chú chó khác ở bên bầu bạn, vì nó chỉ thấy nhớ người chủ của mình. Và nếu như vậy, rất có thể đến cuối cùng bạn lại phải lo lắng cho cả hai chú chó buồn bã, thay vì chỉ có một.
<br><strong>Chuẩn bị những món đồ giúp thú cưng bận rộn cả ngày</strong>
<br>-  Sử dụng những món đồ chơi có nhồi thức ăn ở bên trong. Đây là những món đồ được làm từ các vật liệu như nhựa hay cao su cứng, có chứa đồ ăn ở bên trong nhưng cún cưng không dễ dàng để lấy ra được. Loại đồ chơi này thường có lỗ ở hai đầu và các chú chó sẽ phải khéo léo lắc, cào, lăn, liếm hoặc đập món đồ để làm đồ ăn rơi ra ngoài. Những món đồ chơi như này sẽ đòi hỏi rất nhiều thời gian, sự kiên nhẫn hay cả kỹ năng xử lý vấn đề từ cún cưng của bạn và việc này sẽ giúp nó tận hưởng khoảng thời gian ở một mình hơn. Cần nhớ rằng trong lần đầu tiên bạn đưa món đồ chơi đó cho chó yêu của mình, hãy đảm bảo cún có thể dễ dàng lấy được hết những phần thức ăn ở trong đó. Ngoài ra bạn nên chú ý lựa chọn sao cho những phần lỗ trên đồ chơi đủ rộng và thức ăn thì có kích thước nhỏ, phù hợp để có thể rơi ra dễ dàng. Khi chú chó yêu quý của bạn đã quen với món đồ này, bạn có thể nâng cấp độ khó lên như đồ ăn chia thành những miếng lớn hơn, đồ chơi nhiều thách thức hơn hoặc thậm chí là cho cả món đồ chơi đã nhồi thức ăn vào trong tủ đá. Đồ chơi chứa đồ ăn là một giải pháp rất hữu ích để giúp chú chó của bạn giảm thiểu buồn chán.
<br>-  Chia nhỏ bữa ăn của cún thành nhiều phần và giấu ở những nơi khác nhau trước khi bạn rời đi. Chó cưng chắc chắn sẽ có khoảng thời gian thú vị khi tìm kiếm đồ ăn của mình trong lúc bạn đi làm. Bạn hãy cố gắng làm mới trò chơi này bằng cách mỗi ngày sẽ giấu đồ ăn ở những nơi khác nhau hoặc ở một vài chỗ đặc biệt. Điều này sẽ hấp dẫn hầu hết các chú chó và khiến chúng vui vẻ.
<br>-  Chuẩn bị sẵn đồ chơi gặm nhấm cho cún cưng. Các chú chó ở bất kỳ độ tuổi nào cũng đều thích nhai đồ, dù là những chú chó hoang hay những cún cưng nuôi trong các gia đình. Hành động này giúp bộ hàm của chúng cứng cáp hơn và làm sạch răng. Ngoài ra, việc gặm nhấm cũng khiến chúng cảm thấy vui vẻ và làm giảm những căng thẳng, lo âu. Dù chú chó của bạn còn nhỏ hay đã nhiều tuổi, việc cung cấp cho chúng một số loại đồ chơi gặm nhấm phù hợp luôn là một vấn đề quan trọng mà bạn nên chú ý.
',
                'Author' => 'PetsCasa',
                'Thumbnails' => 'PetCasa/NewThumbnails/bai3_vwgyve',
                'Status' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
        );
        News::insert($news);
    }
}
