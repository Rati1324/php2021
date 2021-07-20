<?php 
	include("product.php");
	include("db.php");
	$db = new Database;
	
	if (isset($_POST['delete'])){
		print_r($_POST);
		$objs = [];
		foreach ($_POST as $id){
			// $objs[] = new Product()
		}
	}
	$products = Product::get_all($db);
	$db->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/index.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<title>Home</title>
</head>
<body>
	<header class="col-8">
		<h1>Product List</h1>
		<div class="buttons">
			<form action="add.php" method="get"> <button>Add</button> </form>
			<form id="del" method="post">
				<button name="delete" id="delete_btn" style="height:57%">Mass Delete</button>
			</form>
		</div>
	</header>
	<hr>
	<div class="products-container-inner">
		<div class="products-container col-8">
			<?php
				foreach ($products as $p){ ?>
					<div>
						<div class="checkbox">
							<input name=<?=$p->get_id()?> value=<?=$p->get_id()?> form="del" type="checkbox" class="delete-checkbox" ?>
						</div>
						<div class="product-info">
							<?php 
								print_r(get_class_methods($p));
								$fields = (array) $p;
								foreach($fields as $k => $v){
									if ($k === array_key_last($fields))					
										echo "<span>" . htmlspecialchars($k) . ":" . htmlspecialchars($v) . "</span>";
									else echo "<span>" . htmlspecialchars($v) . "</span>";
								}
						echo "
						</div> 
						</div>";
				}
			?>
		</div>
	</div>
	<hr>
	<div style="text-align: center">ScandiWeb test assignment</div>
</body>
</html>