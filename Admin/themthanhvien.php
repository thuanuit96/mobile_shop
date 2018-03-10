       <?php 
    if($_SESSION['user'] && $_SESSION['pass']){
            

 ?>

 <style type="text/css" media="screen">
     .form-conp{
        width:500px;
        padding: 9px 5px;
        border-radius: 5px;
        border:1px solid #777;
        margin-top: 5px;
     }
 </style>

          <?php 

                     include ('MYSQL/connectmysql.php');
                     if(isset($_POST['submit_them'])){
                        $ten=$_POST['ten'];
                        $mk=md5($_POST['mk']);
                        $email=$_POST['email'];
                        $sdt=$_POST['sdt'];
                        //check tài khoản tồn tại
                        $checktk="select * from thanhvienishop where tentaikhoan='$ten'";
                        $querycheck=mysqli_query($connection,$checktk);
                        $rowcheck=mysqli_num_rows($querycheck);
                        if($rowcheck>0){
                            echo "<script> alert('Tên Tài Khoản Bạn Thêm Đã Tồn Tại Rồi..Bạn Vui Lòng Chọn Tên Khác'); </script>";
                        }
                        //check tồn tại email
                        $checkmail="select * from thanhvienishop where email='$email'";
                        $query_mail=mysqli_query($connection,$checkmail);
                        $row_mail=mysqli_num_rows($query_mail);
                        if($row_mail>0){
                            echo "<script> alert('Email Bạn Thêm Đã Tồn Tại Rồi..Bạn Vui Lòng Chọn Email Khác'); </script>";
                        }
                        else{
                        $sql_them="insert into thanhvienishop (tentaikhoan,matkhau,email,sodienthoai) values ('$ten','$mk','$email','$sdt')";
                        $sql_query_them=mysqli_query($connection,$sql_them);
                        header('location:adminstrator.php?page=quanlithanhvien');
                     }
                 }


           ?>



          <link rel="stylesheet" type="text/css" href="css/themthanhvien.css">

           <!-- Main Content -->
            <form method="post" enctype="multipart/form-data">
            <table width="990px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
                <tr id="main-navbar" height="36px">
                    <td colspan="6" style='background: #4471c2;'>thêm một thành viên mới</td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Tên Thành Viên</label><br><input type="text" name="ten" class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Mật Khẩu</label><br><input type="text" name="mk" class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Email</label><br><input type="text" name="email" class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><label>Số Điện Thoại</label><br><input type="text" name='sdt' class='form-conp' /></td>
                </tr>
                <tr height="50">
                    <td class="form"><input type="submit" name="submit_them" value="Thêm Thành Viên" /> <input type="reset" name="reset_name" value="Làm mới" /></td>
                </tr>
            </table>
            </form>
            <!-- End Main Content -->
                    <?php
}
else{
   header('location:index.php');
}
?>