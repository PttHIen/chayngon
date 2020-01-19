<div id="flip">
 <p>menu</p>
</div>


<ul class="login_leftsidebar" id="dropdownmenu"> 

	<?php if( $_SESSION['user_type'] == "hotel" ) { //hotel ?>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "hotel_order" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=hotel_order&page=liveOrders">Đơn Hàng</a></li>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "hotel_edit_profile" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=hotel_edit_profile&page=accountSetting">Thiết lập</a></li>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "couponcodes" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=couponcodes">Mã giảm giá</a></li>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "deals" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=deals">Ưu đãi</a></li>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "bankinfo" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=bankinfo"> Thông tin & chuyển khoản ngân hàng </a></li>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "changepassword" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=changepassword">Thay đổi mật khẩu</a></li>

	<?php } //hotel = end

	else { } ?>

</ul>


<ul class="login_leftsidebar"> 

	<?php if( $_SESSION['user_type'] == "hotel" ) { //hotel ?>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "hotel_order" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=hotel_order&page=liveOrders">Đơn Hàng</a></li>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "earning" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=earning">Thanh toán</a></li>
        
		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "hotel_edit_profile" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=hotel_edit_profile&page=profileSetting">Thiết lập</a></li>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "couponcodes" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=couponcodes">Mã giảm giá</a></li>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "bankinfo" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=bankinfo">Thông tin & chuyển khoản ngân hàng</a></li>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "changepassword" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=changepassword">Thay đổi mật khẩu</a></li>

	<?php } //hotel = end

	else { } ?>

</ul>