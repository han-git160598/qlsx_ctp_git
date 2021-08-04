$(document).ready(function() {
    show_detail_product();
})
var current_quantity;
function show_detail_product()
{
	var item = JSON.parse(localStorage.getItem('detail_product'));
	$('#product_code').text('Mã sản phẩm: '+item.product_code);
	$('#product_name').text(item.product_name);
	$('#category_title').text(item.category_title);
	$('#product_unit_packet_title').text(item.product_packet_title);
	$('#unit_title').text(item.product_unit_title);
	$('#current_quantity').val(item.current_quantity);
	$('#product_packet_title').text(item.product_packet_title);
	$('#product_material').text(item.product_unit_packet + item.product_unit_title +'/'+item.product_packet_title);
	$('#product_description').text(item.product_description);
 	$("#product_img").attr("src", urlimg_img + item.product_img);	
 	current_quantity = item.current_quantity;
}
function min_cart()
{
	current_quantity -=1;
	$('#unit_title_product').val(current_quantity);
}
function max_cart()
{
	current_quantity =Number(current_quantity)+1;
	$('#unit_title_product').val(current_quantity);
}
function add_cart()
{
	var item_product = JSON.parse(localStorage.getItem('detail_product'));
	var	cart = JSON.parse(localStorage.getItem('cart'));
	if(cart ==null || cart == '')
	{
		cart=[];
		cart.push(item_product);
		localStorage.setItem('cart', JSON.stringify(cart));
		alert('Thêm vào giỏ hàng thành công');
	}else{
		
		cart.push(item_product);
		const key = 'id_product';

    	const unique = [...new Map(cart.map(item => [item[key], item])).values()]

		//cart.push(item_product);
		localStorage.setItem('cart', JSON.stringify(unique));
		alert('Thêm vào giỏ hàng thành công');
	 	
	}
   
}
function buy_now()
{
	var item_product = JSON.parse(localStorage.getItem('detail_product'));
	var	cart = JSON.parse(localStorage.getItem('cart'));
	if(cart ==null || cart == '')
	{
		cart=[];
		cart.push(item_product);
		localStorage.setItem('cart', JSON.stringify(cart));
		window.location.href= urlserver+'cart';
	}else{
		
		cart.push(item_product);
		const key = 'id_product';

    	const unique = [...new Map(cart.map(item => [item[key], item])).values()]

		//cart.push(item_product);
		localStorage.setItem('cart', JSON.stringify(unique));
	 	window.location.href= urlserver+'cart';
	}
}
