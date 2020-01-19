

<?php require_once("header.php"); ?>



<div class="landingimage courier bgimage" style="background-image: url(img/bg.jpg);"><div class="inner"><div class="wdth">

	<div class="topvh">

		<div class="col40 left">

			<h1>Ngon365</h1>

			<h3>Là tất cả những gì bạn mong muốn</h3>

			<p><a href="../index.php" class="button">Tìm hiểu thêm</a></p>

		</div>

		<?php if( !isset($_SESSION['id']) ){ ?>

		<div class="col40 right">

			<div class="frm">

				<form action="index.php?reset=ok" method="post" id="forform" style="display: none;">

					<h2 class="title">Quên mật khẩu?</h2>

					<p>

						<input placeholder="Email" type="text" name="emailaddr">

					</p>

					<p>

						<input type="submit" class="button" value="Recover Password">

					</p>

					<p class="byproceeding">

						Bạn đã có tài khoản <a href="javascript:;" id="login">Đăng nhập</a>

					</p>

				</form>

				<form action="?log=in" method="post" id="logform" style="display: none;">

					<h2 class="title">Earn More</h2>

					<p>

						<input placeholder="Email" type="text" name="eml">

					</p>

					<p>

						<input placeholder="Password" type="password" name="pswd">

					</p>

					<p>

						<input type="submit" class="button" value="Log In">

					</p>

					<p class="byproceeding">

						Bạn chưa có tài khoản? <a href="javascript:;" id="register">Đăng ký ngay</a>

					</p>

					<p class="byproceeding" style="margin-top: 5px;">

						Quên mật khẩu? <a href="javascript:;" id="forgot">Lấy lại mật khẩu</a>

					</p>

				</form>

				<script>

				$(document).ready(function(){

					$("input#phne").inputmask();

				});

				</script>

				<form action="?reg=ok" method="post" id="regform">

					<h2 class="title">Đăng ký ngay</h2>

					<p>

						<span class="left col50" style="position: relative;"><input placeholder="Tên" type="text" name="firstname"></span>

						<span class="right col50"><input placeholder="Họ" type="text" name="lastname"></span>

						<span class="clear" style="display: block;"></span>

					</p>

					<p>

						<span class="left col50" style="position: relative;"><input placeholder="Email" type="email" name="emailaddr"></span>

						<span class="right col50"><input placeholder="Số điện thoại" type="text" name="phne" id="phne" data-inputmask="'alias': 'phone'"></span>

						<span class="clear" style="display: block;"></span>

					</p>

					<p>

						<span class="left col60">

							<span class="left col50" style="position: relative;"><select name="city">

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

			                        ?><option value="<?php echo $cntry['Tax']['city']; ?>"><?php echo $cntry['Tax']['city']; ?></option><?php

			                    }

			                    curl_close($ch);

			                    ?>

			                </select></span>

							<span class="right col50" style="position: relative;"><select name="state">

			                    <option value="">State</option> 

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

			                    foreach($json_data['states'] as $cntry) {

			                        ?><option value="<?php echo $cntry['Tax']['state']; ?>"><?php echo $cntry['Tax']['state']; ?></option><?php

			                    }

			                    curl_close($ch);

			                    ?>

			                </select></span>

							<span class="clear" style="display: block;"></span>

						</span>

						<span class="right col40"><select name="country">

							<option value="">Country</option>

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

		                    foreach($json_data['countries'] as $cntry) {

		                        ?><option value="<?php echo $cntry['Tax']['country']; ?>"><?php echo $cntry['Tax']['country']; ?></option><?php

		                    }

		                    curl_close($ch);

		                    ?>

						</select></span>

						<span class="clear" style="display: block;"></span>

					</p>

					<p>

						<input placeholder="Bạn thường bắt đầu ca làm việc ở đâu?" type="text" name="addrtostart">

					</p>

					<p>

						<textarea name="howuhear" placeholder="Làm thế nào bạn biết đến vị trí chuyển phát nhanh thực phẩm?
"></textarea>

					</p>

					<p>

						<input type="submit" class="button" value="Get Started">

					</p>

					<p class="byproceeding">

						Bạn đã có tài khoản? <a href="javascript:;" id="login">Đăng nhập</a>

					</p>

				</form>

			</div>

		</div>

		<?php } ?>

		<div class="clear"></div>

	</div>

</div></div></div>



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





<div class="howto section"><div class="wdth">

	<h2 class="title textcenter">Bắt đầu như thế nào</h2>

	<ul style="text-align:center;">

		<li>

			<div class="col80">

				<span class="fa fa-info-circle"></span>

			</div>

			<div class="col80 ">

				<h3>Đăng ký
                </h3>

				<p>Tham gia và giúp bạn tự kết hợp vào nhóm hỗ trợ của chúng tôi.
                </p>

			</div>

			<div class="clear"></div>

		</li>

		<li>

			<div class="col80">

				<span class="fa fa-comment"></span>

			</div>

			<div class="col80 ">

				<h3>Tải ứng dụng</h3>

				<p>Tải xuống ứng dụng và bạn chuẩn bị giao đồ ăn ngay khi nhóm chúng tôi phê duyệt tài khoản của bạn
                </p>

			</div>

			<div class="clear"></div>

		</li>

		<li>

			<div class="col80">

				<span class="fa fa-usd"></span>

			</div>

			<div class="col80">

				<h3>Bắt đầu kiếm tiền
                </h3>

				<p>Bắt đầu đạt được với những tiến bộ đơn giản
                </p>

			</div>

			<div class="clear"></div>

		</li>

	</ul>

	<div class="clear"></div>

</div></div>





<div class="section whythis"><div class="wdth">

	<div class="col50 left">

		<h2 class="title">Tại sao là Ngon365?</h2>

		<p>Chúng tôi cung cấp công việc bán thời gian được thiết kế để phù hợp với lối sống của bạn. Chọn từ bán thời gian, toàn thời gian hoặc giờ bình thường. Lên kế hoạch trước và lái xe nhiều hay ít như bạn muốn.
        </p>

	</div>

	<div class="col50 right quote">

		<ul>

			<li>

				<i class="fa fa-quote-left"></i>

				<p class="q">Vị trí chuyển phát nhanh thực phẩm cho phép tôi thiết lập sự sẵn có của mình xung quanh các lớp học và kỳ thi. Chọn ca làm việc mở giúp kiếm tiền thật dễ dàng khi tôi có thời gian rảnh để lái xe.
                </p>

				<p class="a">Tanzil 26, Lahore</p>

			</li>

			<li>

				<i class="fa fa-quote-left"></i>

				<p class="q">Vị trí chuyển phát nhanh thực phẩm cho phép tôi thiết lập sự sẵn có của mình xung quanh các lớp học và kỳ thi. Chọn ca làm việc mở giúp kiếm tiền thật dễ dàng khi tôi có thời gian rảnh để lái xe.
                </p>

				<p class="a">Junaid 26, Lahore</p>

			</li>

			<li>

				<i class="fa fa-quote-left"></i>

				<p class="q">Vị trí chuyển phát nhanh thực phẩm cho phép tôi thiết lập sự sẵn có của mình xung quanh các lớp học và kỳ thi. Chọn ca làm việc mở giúp kiếm tiền thật dễ dàng khi tôi có thời gian rảnh để lái xe.
                </p>

				<p class="a">Iqra 26, Lahore</p>

			</li>

		</ul>

	</div>

	<div class="clear"></div>

</div></div>





<div class="howto wyn section"><div class="wdth">

	<h2 class="title textcenter">Bạn cần gì?</h2>

	<ul>

		<li>

			<div class="col20 left"><span class="digit">1</span></div>

			<div class="col80 left">

				<h3>Giấy phép hợp lệ
                </h3>

			</div>

			<div class="clear"></div>

		</li>

		<li>

			<div class="col20 left"><span class="digit">2</span></div>

			<div class="col80 left">

				<h3>Một chiếc điện thoại thông minh</h3>

			</div>

			<div class="clear"></div>

		</li>

		<li>

			<div class="col20 left"><span class="digit">3</span></div>

			<div class="col80 left">

				<h3>Một phương tiện làm việc
                </h3>

			</div>

			<div class="clear"></div>

		</li>

		<li>

			<div class="col20 left"><span class="digit">3</span></div>

			<div class="col80 left">

				<h3>Bằng chứng công việc
                </h3>

			</div>

			<div class="clear"></div>

		</li>

	</ul>

	<div class="clear"></div>

</div></div>





<div class="threecol textcenter section" style="background:white;"><div class="wdth">

	<ul>

		<li>

			<i class="fa fa-calendar-o"></i>

			<h3>Kế hoạch linh hoạt
            </h3>

			<p>Chúng tôi cung cấp lịch trình linh hoạt và giờ làm việc thoải mái, có một quá trình làm việc dễ dàng.
            </p>

		</li>

		<li>

			<i class="fa fa-dollar"></i>

			<h3>Kiếm cơ hội
            </h3>

			<p>Đoán xem, một khi bạn đã hợp tác với chúng tôi, bạn sẽ có cơ hội tuyệt vời để kiếm tiền với chúng tôi.
            </p>

		</li>

		<li>

			<i class="fa fa-calendar-o"></i>

			<h3>Thanh toán hàng tuần
            </h3>

			<p>Những gì khác bạn có thể đã yêu cầu, một khi bạn nhận được các khoản thanh toán hàng tuần ngoài việc chờ đợi cả tháng.
            </p>

		</li>

	</ul>

	<div class="clear"></div>

</div></div>



<?php //reset password

if(isset($_GET['reset']) && !empty($_POST['emailaddr'])) {

		

		$email = htmlspecialchars($_POST['emailaddr'], ENT_QUOTES);

		

		$headers = array(

			"Accept: application/json",

			"Content-Type: application/json"

		);



		$data = array(

			"email" => $email,

			"role" => "rider"

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