<?php
		include "config.php";
	 	$sql = "select * from banhang ";
	 	$result = mysqli_query($con,$sql);

?>

<div class="infor">

				<table  width="900" border="1px solid #f3f3f3;" align="center" style="margin-top: 10px; text-align: center;" >
					<tr>
						<th width="50px;">id</th>
						<th width="50px;">name</th>
						<th width="200px;">img</th>
						<th width="200px;">detail</th>
						<th width="100px;">price</th>
						<th width="100px;"><a href="index.php?quanly=add">Thêm</a></th>
					</tr>
			<?php while ($row = mysqli_fetch_array($result)) {
				# code...
			 ?>
					<tr>
						<td><?php echo $row['id']; ?> </td>
						<td><?php echo $row['name']; ?></td>
						<td><img src="upload/<?php echo $row['img'];?>" style="max-width: 100px;"</td>
						<td><?php echo $row['detail']; ?></td>
						<td><?php echo $row['price']; ?></td>
						<td><a href="index.php?quanly=edit&id=<?php echo $row['id']; ?>">Sửa</a>
							<a onclick="return window.confirm('Bạn muốn xóa không');" href="index.php?quanly=delete&id=<?php echo $row['id']; ?>">Xóa</a>
						</td>
					</tr>
			 <?php } ?>
					
				</table>
			</div>