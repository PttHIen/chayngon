<?php require_once("header.php"); ?>

    <div class="landingimage courier bgimage" style="background-image: url(img/bg-small.jpg);">
        <div class="inner">
            <div class="wdth">
                <div class="topvh">
                    <div class="col40 left">
                        <h1>Ngon 365</h1>
                        <h3>Là tất cả những gì bạn mong muốn</h3>
<!--                        <p style="display:none;"><a href="#" class="button">Tìm hiểu thêm</a></p>-->
                        <p><a href="../index.php" class="button">Tìm hiểu thêm</a></p>
                    </div>
                    <?php if( !isset($_SESSION['id']) ){ ?>
                        <div class="col40 right">
                            <div class="frm">
                                <form action="index.php?reset=ok" method="post" id="forform" style="display: none;">
                                    <h2 class="title">Quên mật khẩu?</h2>
                                    <p>
                                        <input type="text" name="emailaddr" required=''>
                                        <label alt="Email" placeholder="Email">
                                    </p>
                                    <p>
                                        <input type="submit" class="button" value="Khôi phục mật khẩu">
                                    </p>
                                    <p class="byproceeding">Bạn có sẵn sàng đề tạo tài khoản? <a href="javascript:;" id="login">Đăng nhập</a> </p>
                                </form>
                                <form action="?log=in" method="post" id="logform" style="display: none;">
                                    <h2 class="title">Đăng nhập</h2>
                                    <p>
                                        <input type="text" name="eml" required="">
                                        <label alt="Email" placeholder="Email">
                                    </p>
                                    <p>
                                        <input type="password" name="pswd" required="">
                                        <label alt="Mật khẩu" placeholder="Mật khẩu">
                                    </p>
                                    <p>
                                        <input type="submit" class="button" value="Đăng nhập">
                                    </p>
                                    <p class="byproceeding"> Bạn chưa có tài khoản? <a href="javascript:;" id="register">Đăng ký</a> </p>
                                    <p class="byproceeding" style="margin-top: 5px;"> Quên mật khẩu? <a href="javascript:;" id="forgot">Khôi phục</a> </p>
                                </form>
                                <script>
                                    $(document).ready(function(){
                                        $("input#phne").inputmask();
                                    });
                                </script>
                                <form action="?reg=ok" method="post" id="regform">
                                    <h2 class="title">Đăng Ký Đối Tác</h2>
                                    <p>
              <span class="left col50" style="position: relative;">
              <input  type="text" name="restoname" required="">
              <label alt="Tên nhà hàng" placeholder="Tên nhà hàng">
              </span> <span class="right col50">
              <input required="" type="text" name="contname">
              <label alt="Tên Liên lạc" placeholder="Tên Liên lạc">
              </span> <span class="clear" style="display: block;"></span>
                                    </p>
                                    <p>
              <span class="left col50" style="position: relative;">
              <input required="" type="text" name="phne" id="phne" data-inputmask="'alias': 'phone'">
              <label alt="Điện thoại liên hệ" placeholder="Điện thoại liên hệ">
              </span> <span class="right col50">
              <input type="email" name="emailaddr" required="">
              <label alt="Email" placeholder="Email">
              </span> <span class="clear" style="display: block;"></span>
                                    </p>
                                    <p>
                                        <input required="" type="text" name="restaddr">
                                        <label alt="Địa chỉ nhà hàng" placeholder="Địa chỉ nhà hàng">
                                    </p>
                                    <p>
                                        <textarea placeholder="Còn điều gì khác chúng tôi nên biết không?" name="anythingelse"></textarea>
                                    </p>
                                    <p>
                                        <input type="submit" class="button" value="Bắt đầu">
                                    </p>
                                    <p class="byproceeding">Bạn có sẵn sàng đề tạo tài khoản?<a href="javascript:;" id="login">Đăng nhập</a> </p>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery("a#forgot").on("click", function(){
                jQuery('form#logform').hide();
                jQuery('form#regform').hide();
                jQuery('form#forform').show();
            });
            jQuery("a#login").on("click", function(){
                jQuery('form#regform').hide();
                jQuery('form#logform').show();
                jQuery('form#forform').hide();
            });
            jQuery("a#register").on("click", function(){
                jQuery('form#logform').hide();
                jQuery('form#regform').show();
                jQuery('form#forform').hide();
            });
        });
    </script>
    <div class="threecol section home1 secprimery">
        <div class="wdth">
            <div class="section-title">
                <h2 class="title">Dễ dàng bắt đầu</h2>
            </div>
            <ul>
                <li>
                    <div class="work-fonts">
                        <div class="iconfont"><img src="img/ico1.png" alt="Icon" /></div>
                        <!--<i class="fa fa-first-order"></i>-->
                    </div>
                    <h4 class="title">Đăng ký và thiết lập</h4>
                    <p>Gọi cho chúng tôi hoặc thêm số liên lạc của bạn để chúng tôi có thể liên lạc</p>
                </li>
                <li>
                    <div class="work-fonts">
                        <div class="iconfont"><img src="img/ico2.png" alt="Icon" /></div>
                    </div>
                    <h4 class="title">Chúng tôi sẽ hướng dẫn bạn</h4>
                    <p>Nhóm của chúng tôi có mặt để hướng dẫn bạn xuyên suốt và cung cấp cho bạn tất cả các thông tin cơ bản để bạn bắt đầu</p>
                </li>
                <li>
                    <div class="work-fonts">
                        <div class="iconfont"><img src="img/ico3.png" alt="Icon" /></div>
                    </div>
                    <h4 class="title">Chúng tôi sẽ nhận nhà hàng của bạn trực tuyến</h4>
                    <p>Chúng tôi sẽ đặt hàng trực tuyến và cung cấp cho cộng đồng của chúng tôi</p>
                </li>
                <li>
                    <div class="work-fonts">
                        <div class="iconfont"><img src="img/ico4.png" alt="Icon" /></div>
                        </i></div>
                    <h4 class="title">Bắt đầu nhận đơn đặt hàng</h4>
                    <p>Chúng tôi sẽ cài đặt một thiết bị đầu cuối đặt hàng sắp tới tại nhà hàng của bạn để giúp bạn nhận và quản lý đơn hàng mới</p>
                </li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <div class="teamup bgimage" style="background: url(https://image.delfoo.com/data/background/vendor/restaurant-home.jpg); background-position: 0;">
        <div style="background: #0009;">
            <div class="wdth">
                <div class="col100 left section" align="center">
                    <h2 class="title">Lập nhóm<span> với sự tự tin</span></h2>
                    <p>Hàng ngàn nhà hàng tin tưởng Ngon365 sẽ cung cấp thực phẩm tươi, nhanh chóng. Với công nghệ giao thực phẩm tiên tiến nhất của Việt Nam, khách hàng của bạn sẽ rất vui mừng được đặt hàng qua Ngon365.</p>
                    <p><a id="button" class="button" style=" text-decoration:none;">Tham gia ngay</a></p>
                </div>
                <div class="col50 right sec" style="display:none;"> <img src="http://www.ilovealabamafood.com/wp-content/uploads/2011/12/dish-detail-seafood-platter.png" alt="" /> </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="threecol section home1 white">
        <div class="wdth">
            <div class="section-title">
                <h2 class="title">Tính năng, đặc điểm</h2>
            </div>
            <ul>
                <li>
                    <div class="work-fonts">
                        <div class="iconfontsec feature"></div>
                    </div>
                    <h4 class="title">Theo dõi trực tiếp</h4>
                    <p>Biết nơi đặt hàng của bạn mọi lúc, từ nhà hàng đến trước cửa nhà bạn. Hơn bao giờ hết!</p>
                </li>
                <li>
                    <div class="work-fonts">
                        <div class="iconfontsec1 feature"></div>
                    </div>
                    <h4 class="title">Không giới hạn khu vực giao hàng</h4>
                    <p>Giao hàng siêu nhanh của chúng tôi cho thực phẩm được giao tươi & đúng giờ, mọi lúc mọi nơi</p>
                </li>
                <li>
                    <div class="work-fonts">
                        <div class="iconfontsec2 feature"></div>
                    </div>
                    <h4 class="title">Tăng doanh thu của bạn</h4>
                    <p>Khi nguồn gốc của bạn được cung cấp trong ứng dụng, các khách hàng mới sẽ xác định vị trí của nó Những khách hàng trung thành hơn có thể đánh giá cao nó thường xuyên hơn.</p>
                </li>
            </ul>
            <ul class="clearb">
                <li>
                    <div class="work-fonts">
                        <div class="iconfontsec3 feature"></div>
                    </div>
                    <h4 class="title">Đăng ký miễn phí</h4>
                    <p>Xem doanh thu của bạn tăng nhanh. Tối đa hóa hiệu quả nhà bếp của bạn và có được doanh nghiệp bạn đang bỏ lỡ.</p>
                </li>
                <li>
                    <div class="work-fonts">
                        <div class="iconfontsec4 feature"></div>
                    </div>
                    <h4 class="title">Chọn địa điểm</h4>
                    <p>Chúng tôi sẽ gửi đơn đặt hàng đến nhà bếp của bạn. Bạn tập trung vào nấu những món ăn tuyệt vời. Chúng tôi lo phần còn lại.</p>
                </li>
                <li>
                    <div class="work-fonts">
                        <div class="iconfontsec5 feature"></div>
                    </div>
                    <h4 class="title">Nhận báo cáo hàng tuần</h4>
                    <p>Bạn chọn thời gian chuẩn bị, kiểm soát tốc độ của nhà bếp và quản lý các chi tiết cho mỗi đơn hàng.</p>
                </li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <div class="section quote" style="display:none;">
        <div class="wdth">
            <div class="col50 marginauto">
                <ul>
                    <li> <i class="fa fa-quote-left"></i>
                        <p class="q">Vị trí chuyển phát nhanh thực phẩm cho phép tôi thiết lập sự sẵn có của mình xung quanh các lớp học và kỳ thi. Chọn ca làm việc mở giúp kiếm tiền thật dễ dàng khi tôi có thời gian rảnh để lái xe.</p>
                        <p class="a">Andrew 26, Calgary</p>
                    </li>
                    <li> <i class="fa fa-quote-left"></i>
                        <p class="q">Vị trí chuyển phát nhanh thực phẩm cho phép tôi thiết lập sự sẵn có của mình xung quanh các lớp học và kỳ thi. Chọn ca làm việc mở giúp kiếm tiền thật dễ dàng khi tôi có thời gian rảnh để lái xe.</p>
                        <p class="a">Andrew 26, Calgary</p>
                    </li>
                    <li> <i class="fa fa-quote-left"></i>
                        <p class="q">Vị trí chuyển phát nhanh thực phẩm cho phép tôi thiết lập sự sẵn có của mình xung quanh các lớp học và kỳ thi. Chọn ca làm việc mở giúp kiếm tiền thật dễ dàng khi tôi có thời gian rảnh để lái xe.</p>
                        <p class="a">Andrew 26, Calgary</p>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="mobrow bgimage" style="background:url(img/bgpatren.png);">
        <div class="wdth">
            <div class="left col40 textcenter" style="padding-top: 60px;"> <img src="img/appscreen-sss.png" style="height: 255px;" alt=""> </div>
            <div class="right col60 section" style="padding-bottom: 0; padding-top: 140px;">
                <h2 class="title" style="margin: 0px 0 10px 0;">Ứng dụng dễ dàng</h2>
                <p style="margin: 0px 0 10px 0;">Ứng dụng của chúng tôi rất dễ truy cập, nhà hàng yêu thích của bạn chỉ là một cú nhấn chuột.</p>
                <p style="margin: 0px 0 10px 0;">Tải xuống ứng dụng:</p>
                <p class="logos"> <a href="https://play.google.com/store/apps/details?id=com.vantinviet.foodies.android" target="_blank"><img src="img/gplaystore.svg" alt="play store"></a> <a href="https://itunes.apple.com/us/app/foodomia/id1357094450?mt=8" target="_blank"><img src="img/appstore.svg" alt="apple store"></a> </p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="section newsletter mobrow" style="background: #282c35;">
        <div class="wdth">
            <div class="col40 marginauto">
                <h3 class="widgettitle">Bạn muốn Mã giảm giá, ghi chú yêu thích và kết nối với chúng tôi?</h3>
                <p>Đăng ký nhận bản tin của chúng tôi</p>
                <form name="newsletter" action="" id="subsctiption">
                    <div class="email-f">
                        <input type="email" placeholder="Vui lòng nhập email.." />

                        <select name="city" class="cityies_selection">
                            <option value="">Thành phố</option>
                            <?php

                            $url = $baseurl."/showCountries";
                            $params = "";
                            $ch = curl_init($url);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $result = curl_exec($ch);
                            $json_data = json_decode($result, true);
                            //var_dump($json_data);
                            foreach($json_data['cities'] as $cntry) {
                                ?>
                                <option value="<?php echo $cntry['Tax']['city']; ?>"><?php echo $cntry['Tax']['city']; ?></option>
                                <?php
                            }
                            curl_close($ch);
                            ?>
                        </select>
                    </div>
                    <div class="buttf">
                        <input type="submit" value="Theo dõi" class="subscribe_button" />
                    </div>
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php //reset password
if(isset($_GET['reset']) && !empty($_POST['emailaddr'])) {

    $email = htmlspecialchars($_POST['emailaddr'], ENT_QUOTES);

    $headers = array(
        "Accept: application/json",
        "Content-Type: application/json"
    );

    $data = array(
        "email" => $email,
        "role" => "hotel"
    );

    $ch = curl_init( $baseurl.'/forgotPassword' );

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $return = curl_exec($ch);

    $json_data = json_decode($return, true);
    var_dump($json_data);

    $curl_error = curl_error($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    //echo $json_data['code'];
    //die;

    if($json_data['code'] !== 200){
        //echo "<div class='alert alert-danger'>Error in adding coupon code, try again later..</div>";
        @header("Location: index.php?action=error");
        echo "<script>window.location='index.php?action=error'</script>";

    } else {
        //echo "<div class='alert alert-success'>Successfully coupon code added..</div>";
        @header("Location: index.php?p=action=success");
        echo "<script>window.location='index.php?action=success'</script>";
    }

    curl_close($ch);
}
//remove resetpass = end ?>
<?php require_once("footer.php"); ?>