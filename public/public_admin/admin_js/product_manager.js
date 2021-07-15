$(document).ready(function(){
	list_product(page, search , date_begin , date_end)
	list_product_category()
	list_unit()
	list_unit_packet()
	list_material()
	list_supplier()
})
current_quantity=0;
var page = 1;
var search = '';
var date_begin ='';
var date_end ='';
function list_product(page, search , date_begin , date_end)
{
	if(page > 0)
	{
		$.ajax({
			url: urlapi,
			method: 'POST',
			data: { detect: 'customer_manager',type_manager:'list_customer', page: page
	        ,filter:search,date_begin:date_begin, date_end:date_end
	        },
			dataType: 'json',
			headers: headers,
			success: function(response) {
				let output=``;
				response.data.forEach(function(item){
				output+=`
				<tr data-id-customer="${item.id}" type="" class="click_doubble get_modal">
	                <td>${item.customer_code}</td>
	                <td>${item.customer_name}</td>
	                <td>${item.customer_company}</td>
	                <td>${item.customer_phone}</td>
	                <td>
	                    <span class="rounder">
	                       ${item.product_code}
	                    </span>
	                    <span class="rounder">+${Number(item.total_product)}</span>
	                </td>
	                <td>
	                    <a onclick="detail_product(${item.id})" class="t-green-main">Chi tiết</a>
	                </td>
	            </tr>`;
				})
				$('#list_product').html(output)

				let pagination=`
	 			<li class="item prev" onClick="list_product(${page-1})"><i class="fas fa-chevron-left"></i></li>
	 			`;
	 			var page1 = page
	 			if(page < 3)
	 			{
	 				page1 = 3;
	 			}
		        for (var i = page1 -3; i < page1 + 2; i++) {
		        	if(i+1==page)
		        	{
		        		pagination+=`<li class="item active">${i+1}</li>`;
		        	}else{
		        		pagination+=`<li class="item" onClick="list_product(${i+1})">${i+1}</li>`;
		        	}
		        }
		        pagination+=`
	            <li class="item next" onClick="list_product(${page+1})"><i class="fas fa-chevron-right"></i></li>
		        `;
		        $('#cusotmer_pagination').html(pagination);
			}
		})
	}
}
function detail_product(id)
{
	sessionStorage.setItem('detail_product',JSON.stringify(id))
	window.location = urlserver +'product-detail'
}
function product_detail(id_customer)
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'get_customer_product',id_customer:id_customer},
		dataType: 'json',
		headers: headers,
		success: function(response) {
		let output =``;
		response.data.forEach(function(item){
			output+=`
			<tr data-id-customer="${item.id_product}" type="edit_product" class="click_doubble get_modal">
                <td>${item.product_code}</td>
                <td>${item.safety_stock}</td>
                <td>${item.product_unit_title}</td>
                <td>${item.product_unit_packet} ${item.product_unit_title}/${item.product_packet_title}</td>
                <td>${item.product_description}</td>
                <td>
                    <span onClick="show_modal_delete_product(${item.id_product})" data-tag="a" type="delete_module" class="get_modal t-green-main my-1 ml-4">Xoá</span>
                </td>
            </tr>`;
		})
		$('#list_product_detail').html(output)
		}
	})
}
function show_modal_delete_product(id)
{	
	let output =`<button id="add_file" onclick="delete_product(${id})" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>`;
	$('#btn_delete_product').html(output)
	$('#delete_module').show()
}
function delete_product(id)
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'product_manager',type_manager:'delete_product', id_product:id},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			if (response.success=='true') {
				var id_customer = JSON.parse(sessionStorage.getItem('detail_product'))
    			product_detail(id_customer)
				$('#delete_module').hide()
			}else{
				alert(response.message)
			}
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
var id_material1= '';
function list_unit(id_material1)
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'product_unit_manager',type_manager:'list_unit'
		,unit_type:'U'
		},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			let output=``;
			response.data.forEach(function(item){
			output+=`<option value="${item.id}">${item.unit_title}</option>`;
			})
			$('#list_unit').html(output)
			$('#list_unit_material').html(output)

		}
	})
}
function list_unit_packet()
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'unit_manager',type_manager:'list_unit',unit_type:'P'},
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

	var fileToUpload = $('#attach').prop('files')[0];
    var formData = new FormData();
    formData.append("detect", "product_manager");
    formData.append("type_manager", "create_product");
    formData.append("customer_code",  $('#product_customer_code').val());
    formData.append("id_unit", $('#list_unit').val());
    formData.append("product_img", fileToUpload);
    formData.append("product_code", $('#product_code').val());
    formData.append("product_name", $('#product_name').val());
    formData.append("product_description", $('#product_description').val());
    formData.append("id_packet", $('#list_unit_packet').val());
    formData.append("product_unit_packet", $('#nums_quantity_packet').val());
    formData.append("safety_stock", $('#nums_safe_warehouse').val());
    formData.append("id_category", $('#product_category').val());
    formData.append("id_admin",1);
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: formData,
        dataType: 'JSON',
        contentType: false,
        processData: false,
        //headers: headers,
        success: function(response) {
            if (response.success == 'true') {
                alert(response.message);
               	$('#add_product').hide();
            } else {
                alert(response.message);
            }
        }
    });


}
////////////////////////////////// NGUYÊN VẬT LIỆU //////////////////////////////
function list_material()
{
	console.log(123);
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'get_material_list'},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			let output=``;
			response.data.forEach(function(item){
			output+=`
			<tr ondblclick="modal_edit_material(${item.id})" data-id-customer="${item.id}" class="get_modal">
                <td>${item.material_code}</td>
                <td>${item.supplier_code}</td>
                <td>${item.material_name}</td>
                <td>${item.safety_stock}</td>
                <td>${item.unit_title}</td>
                <td>
                    <span onClick="show_modal_delete_material(${item.id})" data-tag="a" type="delete_module" class="get_modal t-green-main my-1 ml-4">Xoá</span>
                </td>
            </tr>`;
			})
			$('#list_material').html(output)
		}
	})
}
function show_modal_delete_material(id)
{
	let output = `<button onclick="delete_material(${id})" id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>`;
	$('#btn_delete_material').html(output)
	$('#delete_module').show();
	
}
function delete_material(id)
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect:'material_manager',type_manager: 'delete_material',id_material:id},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			if (response.message =='true') {
				alert(response.message)
				$('#delete_module').hide()
				list_material()
			}else{
				alert(response.message)
				$('#delete_module').hide()
			}
		}
	})

}
function modal_edit_material(id)
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'get_material_list', id_material:id},
		dataType: 'json',
		headers: headers,
		success: function(response) {
		let item = response.data[0]
		console.log(item.safety_stock)
		$('#edit_material').show()
		$('#edit_material_code').val(item.material_code)
		$('#edit_material_name').val(item.material_name)
		$('#nums_edit_safe_warehouse_material').val(item.safety_stock)
		$('#edit_material_spec').val(item.material_spec)


		}
	})	
}
////////// TẠO NGUYÊN VẬT LIỆU
function list_supplier()
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'supplier_manager',type_manager:'list_supplier'},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			let output=``;
			response.data.forEach(function(item){
			output+=`<option value="${item.id}">${item.supplier_code}</option>`;
			})
			$('#list_supplier').html(output)
		}
	})
}
function create_material()
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'material_manager',type_manager:'create_material'
		,material_name:$('#material_name').val(), id_supplier:$('#list_supplier').val()
		,id_unit:$('#list_unit_material').val(),material_code:$('#material_code').val()
		,material_spec:$('#material_spec').val(),safety_stock:$('#nums_safe_warehouse_material').val()
		,id_admin:1
		},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			if(response.success=='true')
			{	
				alert(response.message)
				$('#add_material').hide()
				list_material()
				
			}else{
				alert(response.message)
			}

		}
	})

}