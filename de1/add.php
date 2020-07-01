<?php
			include "config.php";
			
			if(isset($_POST["process"]))
			{
				$id = mysqli_escape_string($con,$_POST["id"]);
				$name = mysqli_escape_string($con,$_POST["name"]);
				$detail = mysqli_escape_string($con,$_POST["detail"]);
				$price = mysqli_escape_string($con,$_POST["price"]);
				$img = $_FILES['c_img']['name'];

				if($img != null)
				{


				$path = "upload/";


				$tmp_name = $_FILES['c_img']['tmp_name'];
				$img = $_FILES['c_img']['name'];

				move_uploaded_file($tmp_name,$path.$img);
					$sql = "insert into banhang(id,name,img,detail,price) values('$id','$name,'$img'','$detail','$price')";
					mysqli_query($con,$sql);
					header('location:index.php?quanly=category');
				}
			}

?>

<div>
	<div><h2 style="color: red; padding-top: 20px; text-align: center;">Thêm nội dung</h2></div>
	<form action="" method="post"  enctype="multipart/form-data">
		<table width="500"  border="1" style="margin: auto;">
			
			<tr>
				<td>id</td>
				<td><input type="text" name="id" ></td>
			</tr>
			<tr>
				<td>name</td>
				<td><input type="text" name="name" ></td>
			</tr>
			<tr>
				<td>img</td>
				<td><input type="file" name="c_img" ></td>
			</tr>
			
			<tr>
				<td>detail</td>
				<td><input type="text" name="detail" ></td>
			</tr>
			<tr>
				<td>price</td>
				<td><input type="text" name="price" ></td>
			</tr>

				<tr>
				<td></td>
				<td><input type="submit" name="process" value="Update" ></td>
			</tr>
		</table>
	</form> 
</div>