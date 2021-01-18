@extends('user.layouts.master')
@section('title')
    Donation
@endsection
@section('specific_css')
    <style>
        .page {
            padding-bottom: 50px;
        }

        .custom-1 {
            padding-top: 80px;
            align-content: center;
        }

        .custom-2 {
            padding-bottom: 50px;
        }

        h2 {
            color: #48A06A;
            text-align: center;
        }

        .donate_img {
            max-width: 100%;
            width: 350px;
            display: block;
            margin: auto;
        }

        #paypal-button-container {
            margin-top: 20px;
            text-align: center;
        }
    </style>
@endsection
@section('specific_js')
    <script>
        $("#paypal-button-container").click(function () {
            $("#target").submit();
        });
    </script>
    <!-- Include the PayPal JavaScript SDK -->
    <script
            src="https://www.paypal.com/sdk/js?client-id=Aa7uffDMG6QFVbl4k074yVwic421SWLCfeOTt1poGLK8suW3bKj3r9EVWoH72QP5nakrbJz0_dA70uqr&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
            style: {
                layout: 'horizontal',
                color: 'black',
                shape: 'rect',
                label: 'paypal'
            },

            // Set up the transaction
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [
                        {
                            amount: {
                                value: '20.00'
                            }
                        }]
                });
            },

            // Finalize the transaction
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }
        }).render('#paypal-button-container');
    </script>
@endsection
@section('content')

    <!-- ==== Page Content ==== -->
    <div class="page">
        <div class="container custom-1">
            <h2>Donation Form</h2>
            <div class="container bg-light-custom border-irregular1 block-padding">
                <form class="form-group" method="POST" action="{{route('donation')}}" id="target">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Họ và tên<span class="require"></span></label>
                            <input type="text" name="name" class="form-control input-field">
                        </div>
                        <div class="col-md-6">
                            <label>SĐT<span class="required"></span></label>
                            <input type="text" name="phonenumber" class="form-control input-field">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Số tiền (USD)<span class="require"></span></label>
                            <input type="text" name="amount" class="form-control input-field">
                        </div>
                        <div class="col-md-12">
                            <label>Tin nhắn<span class="required"></span></label>
                            <textarea name="note" id="message" class="textarea-field form-control"
                                      rows="5"
                                      required=""></textarea>
                        </div>
                    </div>
                    <div id="paypal-button-container"></div>
                </form>
                <!-- /form-group-->
            </div>
        </div>
    </div>
    <!-- /container -->
    <!-- /page -->
    <div class="container custom-2">
        <div class="row block-padding col-md-12" style="border-top: 1px solid #f5f5f5">
            <div class="col-md-4">
                <img
                        src="https://res.cloudinary.com/dwarrion/image/upload/v1598263958/PetCasa/Donation%20Page/dog_iqkinh.jpg"
                    class="donate_img"
                    alt="">
            </div>
            <div class="col-md-8">
                <h5 style="color: #48A06A; font-weight: 600">Khoản đóng góp của bạn hướng tới điều gì?</h5>
                <p>Mỗi đồng tiền bạn cho đi sẽ trực tiếp dùng để cứu sống động vật thông qua chăm sóc, điều trị y tế và
                    giáo dục phúc lợi. Các khoản đóng góp đảm bảo rằng chúng tôi có thể chăm sóc nhiều loài động vật
                    nhất có thể và
                    tài trợ cho các chương trình tiếp cận cộng đồng của chúng tôi. Chúng tôi gây quỹ để trả tiền thuê
                    nhà và các tiện ích cho việc cứu hộ động vật của mình, cung cấp dịch vụ chăm sóc thú y tốt nhất có
                    thể, tạo điều kiện cho chó đẻ, nuôi nấng miễn phí và tiêm phòng cho động vật trong cộng đồng.
                    <br><br>Động vật được cứu hộ cũng thích được ăn và sống một cách thoải mái! Chúng tôi sử dụng số
                    tiền quyên góp được để đảm bảo động vật của chúng tôi chỉ nhận được nguồn dinh dưỡng tốt nhất và có
                    mọi thứ chúng cần để tạo nơi trú ẩn tạm thời thoải mái nhất có thể: từ dụng cụ cào mèo đến giường êm
                    ái cho chó.</p>
            </div>
        </div>
        <div class="bg-light">
            <div class="row block-padding col-md-12">
                <div class="col-md-8">
                    <h5 style="color: #48A06A; font-weight: 600">Hãy đồng hành cùng chúng tôi trong nhiệm vụ lớn
                        này.</h5>
                    <p>Chúng tôi được tài trợ 100% bởi các tình nguyện viên, nhà tài trợ và đối tác đáng trân trọng của
                        chúng tôi. Chúng tôi không nhận được tài trợ của chính phủ, vì vậy tất cả công việc chúng tôi
                        làm đều dựa vào những người như bạn quyết định giúp đỡ những động vật quý đang rất cần được chăm
                        sóc. Các nhà tài trợ, tình nguyện viên và đối tác của chúng tôi đã giúp chúng tôi giải cứu và
                        tái sinh hàng trăm con vật, cũng như cung cấp hàng nghìn loại vắc xin cần thiết cũng như điều
                        trị y tế cho những động vật có nhu cầu.
                        <br><br>
                        Nếu bạn không thể quyên góp tiền ngay bây giờ, hãy chia sẻ mục tiêu của chúng tôi bằng cách chia
                        sẻ hình ảnh động vật yêu thích của bạn hoặc khoảnh khắc PetsCasa trên mạng xã hội, với bạn bè
                        hoặc bất cứ nơi nào bạn thấy phù hợp! Tất cả giúp tạo nên sự khác biệt.
                        <br><br>
                        Cảm ơn rất nhiều vì sự hỗ trợ của bạn, từ tất cả các tình nguyện viên, đối tác và bạn bè của
                        chúng tôi!</p>
                </div>
                <div class="col-md-4">
                    <img  src="https://res.cloudinary.com/dwarrion/image/upload/v1598263957/PetCasa/Donation%20Page/cat_zzwepf.jpg"
                        class="donate_img"
                        alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- ==== End Page Content ==== -->
@endsection
