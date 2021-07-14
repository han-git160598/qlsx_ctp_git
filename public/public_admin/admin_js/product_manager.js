$(document).ready(function(){
	list_product()
	list_product_category()
	list_unit()
	list_unit_packet()
})
function list_product()
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'get_customer_product'},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			let output=``;
			response.data.forEach(function(item){
			output+=`
			<tr data-id-customer="1" type="" class="click_doubble get_modal">
                <td>${item.customer_code}</td>
                <td>${item.customer_name}</td>
                <td>${item.customer_company}</td>
                <td>${item.customer_phone}</td>
                <td>
                    <span class="rounder">
                       ${item.product_code}
                    </span>
                    <span class="rounder">+${item.current_quantity}</span>
                </td>
                <td>
                    <a class="t-green-main">Chi tiết</a>
                </td>
            </tr>`;
			})
			$('#list_product').html(output)
		}
	})
}

//////////////////////////// TẠO SẢN PHẨM////////////////////////////////////////////
function list_product_category()
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'product_category_manager',type_manager:'list_product_category'},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			let output=``;
			response.data.forEach(function(item){
			output+=`<option value="${item.id}">${item.category_title}</option>`;
			})
			$('#product_category').html(output);
		}
	})
}
function list_unit()
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'product_unit_manager',type_manager:'list_unit'},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			let output=``;
			response.data.forEach(function(item){
			output+=`<option value="${item.id}">${item.unit_title}</option>`;
			})
			$('#list_unit').html(output)
		}
	})
}
function list_unit_packet()
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'unit_manager',type_manager:'list_unit'},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			let output=``;
			response.data.forEach(function(item){
			output+=`<option value="${item.id_unit}">${item.unit_title}</option>`;
			})
			$('#list_unit_packet').html(output)
		}
	})	
}


function create_product()
{
	var address_name = $('#address_name').val()

}