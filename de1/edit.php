<?php
			include "config.php";
				$sql = "select * from banhang where id = '$_GET[id]' ";
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_array($result);


			if(isset($_POST["process"]))
			{
				$masv = mysqli_escape_string($con,$_POST["id"]);
				$name = mysqli_escape_string($con,$_POST["name"]);
				$date = mysqli_escape_string($con,$_POST["detail"]);
				$add = mysqli_escape_string($con,$_POST["price"]);
				$anh = $_FILES['c_img']['name'];

				if($img != null)
				{


				$path = "upload/";
				$tmp_name = $_FILES['c_img']['tmp_name'];
				$img = $_FILES['c_img']['name'];

				move_uploaded_file($tmp_name,$path.$anh);
					$sql = "update tbl_sv set img = '$anh' where id ='$_GET[id]'";
					mysqli_query($con,$sql);
					header('location:index.php');
				}

					$sql = "update tbl_sv set masv = '$masv'  , name = '$name', address = '$add' , date = '$date' where id = '$_GET[id]' ";
					mysqli_query($con,$sql);
					header('location:index.php?quanly=category');
			}

?>

<div>
	<div><h2 style="color: red; padding-top: 20px; text-align: center;">Thêm nội dung</h2></div>
	<form action="" method="post"  enctype="multipart/form-data">
		<table width="500"  border="1" style="margin: auto;">
			
			<tr>
				<td>id</td>
				<td><input type="text" name="id" value="<?php echo $row['id']; ?>" ></td>
			</tr>

			<tr>
				<td>name</td>
				<td><input type="text" name="name" value="<?php echo $row['name']; ?>" ></td>
			</tr>
			<tr>
				<td>img</td>
				<td><input type="file" name="c_img"></td>
				<td><img src="upload/<?php echo $row['img']; ?>" style="max-width: 100px;"></td>
			</tr>
			<tr>
				<td>detail</td>
				<td><input type="text" name="text"  value="<?php echo $row['detail']; ?>"></td>
			</tr>
			<tr>
				<td>price</td>
				<td><input type="text" name="add" value="<?php echo $row['price']; ?>" ></td>
			</tr>

				<tr>
				<td></td>
				<td><input type="submit" name="process" value="Update" ></td>
			</tr>
		</table>
	</form> 
</div>