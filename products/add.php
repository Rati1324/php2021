<?php
	include("db.php");
	$db = new Database;
	$old_input = ['sku' => "", 'name' => "", 'price' => "", 
				'weight' => "", 'size' => "", 'height' => "", 
				'width' => "", 'length' => ""];
	foreach($_POST as $k => $v){
		$old_input[$k] = $v;
	}
	$messages = ['sku' => "", 'name' => "", 'price' => "", 
				'size' => "", 'weight' => "",  'height' => "",
				'width' => "", 'length' => ""];
	if (isset($_POST['submit'])){
		include("validation.php");
		// $db->insert_product($_POST);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/add.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<title>Add</title>
</head>
<body>
	<header class="col-8">
		<h1>Product Add</h1>
		<div class="buttons">
			<button id="save" name="submit" type="submit" form="product-form">Save</button>
			<form action="index.php" method="get"><button>Cancel</button></form>
		</div>
	</header>
	<hr>
	<form method="post" class="col-8" id="product-form" autocomplete="off">
		<div>
			<label>SKU</label> 
			<input type="text" name="SKU" id="SKU" style="text-transform:uppercase" value=<?=$old_input['sku']?>>
			<label class="message" name="message" id="sku_message"><?=$messages['sku']?></label>
		</div>
		<div>
			<label>Name</label>
			<input type="text" name="name" id="name" value=<?=$old_input['name']?>>
			<label class="message" name="message" id="name_message"><?=$messages['name']?></label>
		</div>
		<div>
			<label>Price ($)</label>
			<input type="text" name="price" step="0.01" id="price" value=<?=$old_input['price']?>>
			<label class="message" name="message" id="price_message"><?=$messages['price']?></label>
		</div>
		<div>
			<label>Type</label>
			<select name="type" id="type">
				<option name="type" selected disabled>Type</option>
				<option value="1" name="type" id="DVD">DVD</option>
				<option value="2" name="type" id="Furniture">Furniture</option>
				<option value="3" name="type" id="Book">Book</option>
			</select>		
		</div>

		<div class="type_1" name="type_form">
			<span>Please provide capacity of the disk
			</span><br><br>
			<label>Size(MB)</label>
			<input type="text" name="size" id="size" step="0.01" value=<?=$old_input['size']?>>
			<label class="message" name="message" id="size_message"></label>
		</div>
		<div class="type_2" name="type_form">
			<span>Please provide dimensions in HxWxL format</span>
			<div>
				<label>Height (CM)</label>
				<input type="text" name="height" id="height" step="0.01" value=<?=$old_input['height']?>>
				<label class="message" name="message" id="height_message"></label>
			</div>
			<div>
				<label>Width (CM)</label>
				<input type="text" name="width" id="width" step="0.01" value=<?=$old_input['width']?>>
				<label class="message" name="message" id="width_message"></label>
			</div>
			<div>
				<label>Length (CM)</label>
				<input type="text" name="length" id="length" step="0.01" value=<?=$old_input['length']?>>
				<label class="message" name="message" id="length_message"></label>
			</div>
		</div>
		<div class="type_3" name="type_form">
			<span>Please provide the weight</span>
			<div>
				<label>Weight (KG)</label>
				<input type="text" name="weight" id="weight" step="0.01" value=<?=$old_input['weight']?>> 
				<label class="message" id="weight_message"></label>
			</div>
		</div>
	</form>
	<script src="validations.js"></script>
	<script>
		var data = {};
		var form = document.querySelector("#product-form");
		for (let i = 0; i < form.elements.length; i++)
			data[form.elements[i].getAttribute("name")] = form.elements[i].value;

		var type_chosen = document.querySelector("#type")
		type_chosen.addEventListener('change', () => {type_switch(type_chosen)})

		function type_switch(type_chosen){
			var types = document.getElementsByName('type_form')
			var btn = document.getElementsByName('submit')[0] 
			types.forEach(element => {element.style.display = "none"});

			var type_form = document.querySelector('.type_' + type_chosen.value)
			type_form.style.display = "block";
			btn.style.display = "block";
			
		}
		var valid = 1;
		$("#type").on('change', (e) => {
			console.log(e.target.value);
		});
		$("#SKU").keyup((e) => {
			setTimeout(() => {	
				if (valid_sku($(e.target).val(), 'sku')) {
					e.preventDefault();
					valid = 0;
				}
				else valid = 1;
			}, 1000);
		})
		$("#price").keyup((e) => {
			setTimeout(() => {
				if (valid_number($(e.target).val(), 'price')) {
					e.preventDefault();
					valid = 0;
				}
				else valid = 1;
			}, 1000);
		})
		$("#size").keyup((e) => {
			setTimeout(() => {
				if (valid_number($(e.target).val(), 'size') {
					e.preventDefault(); 
					valid = 0;
				}
				else valid = 1;
			}, 1000);
		})
		$("#weight").keyup((e) => {
			setTimeout(() => {
				if (valid_number($(e.target).val(), 'weight')) {e.preventDefault(); valid = 0};
				else valid = 1;
			}, 1000);
		})
		$("#height").keyup((e) => {
			setTimeout(() => {
				if (valid_number($(e.target).val(), 'height') {e.preventDefault(); valid = 0});
				else valid = 1;
			}, 1000);
		})
		$("#length").keyup((e) => {
			setTimeout(() => {
				if (valid_number($(e.target).val(), 'length') {e.preventDefault(); valid = 0});
				else valid = 1;
			}, 1000);
		})
		$("#width").keyup((e) => {
			setTimeout(() => {
				if (valid_number($(e.target).val(), 'width') {e.preventDefault(); valid = 0});
				else valid = 1;
			}, 1000);
		})
		$("#save").click((e) => {
			if (!valid) e.preventDefault();
		})
	</script>
</body>
</html>