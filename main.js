$(function() {
	console.log("loaded");
	$("#sel-product a").click(function() {	
		selProductType($(this).attr('index'));		
		
	});	
	var typeSelected = false;
	function selProductType(index) {
		typeSelected = true;
		$(".dimensions").css("display", "none");
		$(".dimensions" + index).css("display", "block");
		$("#item-type").val(index);
	}

	function validateFrom() {
		if(typeSelected == false) {
			alert("You must select the product type!");
			return false;
		}

		$('#item_register_frm input').each(function() {
			console.log("validation");
			console.log($(this).val());
            if($(this).val() == "") {
            	alert($(this).prev().html() + " field is Empty. Enter please!");
            }
            return false;
        });
	}

	$("#btnsave").click(function() {		
		if(validateFrom() == false) return;

		var product = {};
		 product.sku = $("input#sku").val();
		  product.name = $("input#name").val();
		   product.price = $("input#price").val();
		    product.type = $("input#item-type").val();
		dimensions = {};
		if(product.type == 0) {
			dimensions.size = $("input#size").val();
		} else if(product.type == 1) {
			dimensions.height = $("input#height").val();
			dimensions.width = $("input#width").val();
			dimensions.length = $("input#length").val();
		} else if(product.type == 2) {
			dimensions.weight = $("input#weight").val();
		}
		product.dimensions = dimensions;
		console.log(product);
		$.post("addproduct.php", {product: JSON.stringify(product)}, function(data, status){
	        alert(data);
	        $("#item_register_frm input").val("");
	    });
	})

	



});