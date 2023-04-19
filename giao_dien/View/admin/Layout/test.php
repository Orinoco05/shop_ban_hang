<!DOCTYPE html>
<html>

<head>
    <title>Product Table</title>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    img {
        max-width: 100px;
        max-height: 100px;
    }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Category ID</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Size</th>
            <th>Color</th>
        </tr>
        <?php
			//kết nối database
			$servername = "localhost";
			$username = "username";
			$password = "password";
			$dbname = "famms";

			//Tạo kết nối
			$conn = mysqli_connect('localhost','root','','famms');
			//Kiểm tra kết nối
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			//Truy vấn dữ liệu sản phẩm
			$sql = "SELECT * FROM products";
			$result = mysqli_query($conn, $sql);

			//Hiển thị dữ liệu sản phẩm trong bảng
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row["id_product"] . "</td>";
					echo "<td>" . $row["product_name"] . "</td>";
					echo "<td><img src='" . $row["image"] . "'></td>";
					echo "<td>" . $row["price"] . "</td>";
					echo "<td>" . $row["id_category"] . "</td>";
					echo "<td>" . $row["quantity"] . "</td>";
					echo "<td>" . $row["discription"] . "</td>";
					echo "<td>" . $row["size"] . "</td>";
					echo "<td>" . $row["color"] . "</td>";
					echo "</tr>";
				}
			} else {
				echo "0 results";
			}

			//Đóng kết nối
			mysqli_close($conn);
		?>
    </table>
</body>

</html>