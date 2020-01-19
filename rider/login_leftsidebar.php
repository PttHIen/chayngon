<ul class="login_leftsidebar"> 

	<?php if( $_SESSION['user_type'] == "rider" ) { //rider ?>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "summary" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=summary">Tổng quan</a></li>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "account" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=account">Tài khoản của tôi</a></li>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "bankinfo" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=bankinfo">Thông tin khác và ngân hàng</a></li>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "changepassword" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=changepassword">Đổi mật khẩu</a></li>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "doc" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=doc">Tài liệu</a></li>

		<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "info" ) {
			echo 'class="active"';
		} } ?> ><a href="dashboard.php?p=info">Hồ sơ</a></li>

	<?php } //rider = end

	else { } ?>

</ul>