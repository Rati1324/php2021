<?php 
	include("db.php");
	$db = new Database;
	$products = $db->get_all();
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
			<button name="delete" id="delete_btn" style="height:57%">Mass Delete</button>
		</div>
	</header>
	<hr>
	<div class="products-container col-8">
		<?php
			foreach ($products as $type){
				foreach($type as $p) { ?>
				<div>
					<div class="checkbox">
						<form >
							<input type="checkbox" class="delete-checkbox" id=<?php echo $p['SKU'] ?>>
						</form>
					</div>
					<div class="product-info">
						<?php foreach ($p as $k => $v){ 
							if ($k === array_key_last($p))					
								echo "<span>$k: $v</span>";
							else echo "<span>$v</span>";
						}
					echo "
					</div> 
					</div>";
				};
			}
		?>
		
	</div>
	<script>
		var btn = document.querySelector("#delete_btn");
		var checkboxes = document.querySelectorAll(".delete-checkbox");
		btn.addEventListener('click', () => {
			
			var SKUs = []
			checkboxes.forEach(s => {
				if (s.checked) SKUs.push(s.id)
			})
			var SKUs = JSON.stringify(SKUs);
			console.log(SKUs);
			$.ajax({
				type: "post",
				url: "delete.php",
				data: {skus: SKUs},
				success: (data) => {
					location.reload();
				},
			})
		})
	</script>
</body>
</html>