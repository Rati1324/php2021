<?php
	include("db.php");
	$db = new Database;
	if (isset($_POST['submit'])){
		$db->insert_product($_POST);
	}
	$messages = ['sku_message' => "", 'name_message' => "", 'price_message' => "", 'weight_message' => "",
	'size_message' => "", 'height_message' => ""];
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
			<button id="save" name="submit" type="submit">Save</button>
			<form action="index.php" method="get"><button>Cancel</button></form>
		</div>
	</header>
	<hr>
	<form class="col-8" id="product-form" autocomplete="off">
		<div>
			<label>SKU</label> 
			<input type="text" name="SKU" id="SKU" style="text-transform:uppercase" >
			<label class="message" name="message" id="sku_message"></label>
		</div>
		<div>
			<label>Name</label>
			<input type="text" name="name" id="name" >
			<label class="message" name="message" id="name_message"></label>
		</div>
		<div>
			<label>Price ($)</label>
			<input type="text" name="price2" step="0.01" id="price">
			<label class="message" name="message" id="price_message"></label>
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
			<input type="text" name="size" id="size" step="0.01">
			<label class="message" name="message" id="size_message"></label>
		</div>
		<div class="type_2" name="type_form">
			<span>Please provide dimensions in HxWxL format</span>
			<div>
				<label>Height (CM)</label>
				<input type="text" name="height" id="height" step="0.01" >
				<label class="message" name="message" id="height_message"></label>
			</div>
			<div>
				<label>Width (CM)</label>
				<input type="text" name="width" id="width" step="0.01" >
				<label class="message" name="message" id="width_message"></label>
			</div>
			<div>
				<label>Length (CM)</label>
				<input type="text" name="length" id="length" step="0.01">
				<label class="message" name="message" id="length_message"></label>
			</div>
		</div>
		<div class="type_3" name="type_form">
			<span>Please provide the weight</span>
			<div>
				<label>Weight (KG)</label>
				<input type="text" name="weight" id="weight" step="0.01" > 
				<label class="text" id="weight_message"></label>
			</div>
		</div>
	</form>
	<script src="validations.js"></script>
	<script>
		$("#type").on('change', (e) => {
			console.log(e.target.value);
		});
		$("#SKU").keyup((e) => {
			setTimeout(() => sku_message.innerHTML = valid_sku($(e.target).val()), 1000);
		})
		$("#price").on('keyup', () => {
			setTimeout(() => $("#price_message").html(valid_number($("#price").val())), 1000);
		})
		$("#size").on('keyup', () => {
			setTimeout(() => $("#size_message").html(valid_number($("#size").val())), 1000);
		})
		$("#weight").on('keyup', () => {
			setTimeout(() => $("#weight_message").html(valid_number($("#weight").val())), 1000);
		})
		$("#height").on('keyup', () => {
			setTimeout(() => $("#height_message").html(valid_number($("#height").val())), 1000);
		})
		$("#length").on('keyup', () => {
			setTimeout(() => $("#height_message").html(valid_number($("#length").val())), 1000);
		})
		$("#width").on('keyup', () => {
			setTimeout(() => $("#width_message").html(valid_number($("#width").val())), 1000);
		})
		document.querySelector("#save").addEventListener('click', (e) => {
			// if (valid_sku($("#SKU").val()) != "" || valid_name($("#name").val() != "" || valid_number($("#price").val()) != "" || 
			// 	valid_number($("#weight").val()) != "" || valid_number($("#size").val()) != "" ||
			// 	valid_number($("#height").val()) != "" || valid_number($("#width").val()) != "" || valid_input($("length").val()) != "")) {
			// 	e.preventDefault();
			// }
			var data = {};
			var form = document.querySelector("#product-form");
			for (let i = 0; i < form.elements.length; i++)
				data[form.elements[i].getAttribute("name")] = form.elements[i].value;
			data = JSON.stringify(data);
			$.ajax({
				type: "post",
				url: "validation.php",
				data: { data: data} ,
				success: (data) => {
					$("#sku_message").html = valid_sku($("#price").val());
					$("#name_message").html = valid_name($("#name").val());
					$("#price_message").html = valid_number($("#price").val());
					// $("#weigth_message").html = valid_name($("#name").val());
				}
			}
		)})

		var type_chosen = document.querySelector("#type")
		type_chosen.addEventListener('change', () => {type_switch(type_chosen)})

		function type_switch(type_chosen){
			var types = document.getElementsByName('type_form')
			var btn = document.getElementsByName('submit')[0] 
			types.forEach(element => {element.style.display = "none"});
			btn.style.display = "none"

			var type_form = document.querySelector('.type_' + type_chosen.value)
			type_form.style.display = "block";
			btn.style.display = "block";
		}
	</script>
</body>
</html>