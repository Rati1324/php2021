function valid_sku(sku){
	var msg = "";
	console.log(typeof sku);
	if (sku.length == 0 || sku.length > 8)
	msg = "Enter a 8 character SKU";
	else if (!sku.match("^[A-Za-z0-9_-]*$")){
		return "You can only use numbers and letters";
	}
	return msg;
}

function valid_name(name){
	if (name.length == 0) return "This field can't be empty";
	return "";
}

function valid_number(num){
	var msg = "";
	if (isNaN(num)) msg = "Enter a valid number";
	else if (parseInt(num) <= 0) msg = "Enter a positive number";
	return msg;
}
