<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Liên Hệ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<link rel="stylesheet" href="css/lienhe.css">
	<script src='js/lienhe.js'></script>
</head>
<body>
<?php
$to = "thuan7181996@gmail.com";
$subject = "Đây là subject";

$message = "<b>Đây là HTML Message.</b>";
$message .= "<h1>Đây là headline.</h1>";

$header = "From:abc@somedomain.com \r\n";
$header = "Cc:afgh@somedomain.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$retval = mail ($to,$subject,$message,$header);

if( $retval == true )
{
    echo "Gửi email thành công ...";
}
else
{
    echo "Không thể gửi email ...";
}
?>
<div class="main">
	<div class="lienhe">
		<div class="container-fluid">
			<div class="lhct">
				<div class="container">
					<h3 class="lh">LIÊN HỆ CHÚNG TÔI</h3>
					<p class="tbn">Mọi ý kiến đóng góp của Quý khách hàng là RẤT QUAN TRỌNG với chúng tôi</p>


					<?php
					include ('MYSQL/connectmysql.php');
						if(isset($_POST['gui'])){
							$hoten=$_POST['hoten'];
							$sdt=$_POST['sdt'];
							$email=$_POST['email'];
							$danhmuc=$_POST['danhmuc'];
							$noidung=$_POST['noidung'];
							$sql="insert into lienhe(hoten,sdt,email,danhmuc_hotro,noi_dung) VALUES ('$hoten','$sdt','$email','$danhmuc','$noidung')";
							$query=mysqli_query($connection,$sql);
							echo "<script> alert('Cảm ơn bạn đã phản hồi'); </script>";
						}


					?>



					<div class="form">
					<p id='result'></p>
						<form action="" method='post'>
							<div class="row">
								<div class="form-group col-sm-6">
									<input type="text" name='hoten' class='form-control' id='hoten' placeholder="Họ tên *" maxlength="30">
									
								</div>
								<div class="form-group col-sm-6">
									<input type="text" name='sdt' class='form-control' id='sdt' placeholder="Số điện thoại *" maxlength="11">
								</div>
								<div class="form-group col-sm-6">
									<input type="email" name='email' class='form-control' id='email' placeholder="Email *" maxlength="30">
								</div>
								<div class="form-group col-sm-6"  id='poi'>
									<select name="danhmuc" id="fuk">
										<option value="1" selected="selected">Thắc mắc-Tư vấn</option>
										<option value="2">Phản ánh-Khiếu nại</option>
										<option value="3">Yêu cầu xử lí</option>
										<option value="4">Khác</option>
									</select>
								</div>
								<div class="form-group col-sm-12">
									<textarea name="noidung" id="noidung" cols="30" rows="7" class='form-control'></textarea>
								</div>
								<div class="gui-tt">
									<input type="submit" id='sub' name='gui' value="Gửi Đi" onclick='return check_lienhe();'>
								</div>
							</div>
						</form>
					</div>







				</div>
			</div>
		</div>
	</div>
	</div>
</body>
</html>