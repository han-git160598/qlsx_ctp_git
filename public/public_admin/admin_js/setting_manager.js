$(document).ready(function(){
list_unit(unit_type='U')
list_category()
})
var id_admin = JSON.parse(localStorage.getItem('account_customer'))
function list_unit(unit_type='',id='')
{
	$('#btn_add_unit').attr('onClick', "create_unit('"+unit_type+"')");
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'unit_manager',type_manager:'list_unit'
		,unit_type:unit_type,id_unit:id
		},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			let output=``;
			if(id == ''){
				response.data.forEach(function(item){
				output+=`
				<tr ondblclick="list_unit('${unit_type}',${item.id})" data-id-customer="${item.id}" type="edit_unit" class="click_doubble get_modal">
                    <td>${item.unit_title}</td>
                    <td>${item.unit}</td>
                    <td>
                        <span data-tag="a" onClick="show_delete_unit(${item.id},'${unit_type}')" type="delete_module" class="get_modal t-green-main my-1 ml-4">Xoá</span>
                    </td>
                </tr>
				`;
				})
	
				$('#list_unit').html(output)
				
			}else {
				$('#edit_unit').show()
				let btn =`<button onClick="update_unit('${unit_type}',${id},)" id="btn_update_unit" class="btn-submit w-20 d-inline-block fz-1rem">Cập nhật</button>`
				$('#btn_update_unit').html(btn)
				$('#edit_unit_1').val(response.data[0].unit)
				$('#edit_unit_title').val(response.data[0].unit_title)
			}
		}
	})
}
function show_delete_unit(id,unit_type) {
	$('#btn_delete').html(`<button onclick="delete_unit(${id},'${unit_type}')" id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>`)
	$('#delete_module').show()
}
function delete_unit(id,unit_type)
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'unit_manager',type_manager:'delete_unit',id_unit:id},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			if(response.success=='true')
			{	
				list_unit(unit_type)
				$('#delete_module').hide()
				alert(response.message)
			}else{
				alert(response.message)
			}
		}
	})
}
function create_unit(unit_type) {
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'unit_manager',type_manager:'create_unit'
		,unit_type:unit_type
		,id_admin:id_admin.id
		,unit_title:$('#unit_title').val()
		,unit:$('#unit').val()
		},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			if(response.success=='true')
			{	
				$('#unit_title').val('')
				$('#unit').val('')
				list_unit(unit_type)
				$('#add_unit').hide()
				alert(response.message)
			}else{
				alert(response.message)
			}
		}
	})
}
function update_unit(unit_type,id)
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'unit_manager',type_manager:'update_unit'
		,unit_type:unit_type
		,id_admin:id_admin.id
		,unit_title:$('#edit_unit_title').val()
		,unit:$('#edit_unit_1').val()
		,id_unit:id
		},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			if(response.success=='true')
			{	
				list_unit(unit_type)
				$('#edit_unit').hide()
				alert(response.message)
			}else{
				alert(response.message)
			}
		}
	})
}

/////////////////////////////////// MÁY SẢN XUẤT /////////////////////////
function list_machine(id ='')
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'product_machine_manager',type_manager:'list_machine',id_machine:id
		},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			if(id == '')
			{
				let output=``;
				response.data.forEach(function(item){
				output+=`
	            <tr ondblclick="list_machine(${item.id_machine})" data-id-customer="${item.id_machine}" class="click_doubble get_modal">
	                <td>${item.machine_title}</td>
	                <td>${item.machine_description}</td>
	                <td>
	                    <span data-tag="a" onClick="show_delete_machine(${item.id_machine})" type="delete_module" class="get_modal t-green-main my-1 ml-4">Xoá</span>
	                </td>
	            </tr>`
				})	
				$('#list_machine').html(output)
			}else{
				$('#edit_machine').show()
				list_category(response.data[0].category_title)
				let btn =`<button onClick="update_machine(${id})" class="btn-submit w-20 d-inline-block fz-1rem">Cập nhật</button>`
				$('#btn_update_machine').html(btn)
				$('#edit_machine_name').val(response.data[0].machine_title)
				$('#edit_machine_description').val(response.data[0].machine_description)
			}
		}
	})
}
function show_delete_machine(id) {
	$('#btn_delete').html(`<button onclick="delete_machine(${id})" id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>`)
	$('#delete_module').show()
}
function delete_machine(id)
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'product_machine_manager',type_manager:'delete_machine',id_machine:id},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			if(response.success=='true')
			{	
				list_machine(id ='')
				$('#delete_module').hide()
				alert(response.message)
			}else{
				alert(response.message)
			}
		}
	})
}
function update_machine(id)
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'product_machine_manager',type_manager:'update_machine'
		,machine_title:$('#edit_machine_name').val()
		,machine_description:$('#edit_machine_description').val()
		,id_machine_category:$('#edit_list_category_machine').val()
		,id_admin:id_admin.id
		,id_machine:id
		},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			if(response.success=='true')
			{
				alert(response.message)
				list_machine(id = '')
				$('#edit_machine').hide()
			}else{
				alert(response.message)
			}

		}
	})
}
function list_category(category_title='')
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'machine_category_manager',type_manager:'list_category'
		},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			let output=``;
			response.data.forEach(function(item){
            	if(category_title == item.category_title)
				{
					output+=`<option selected value="${item.id_category}">${item.category_title}</option>`;
				}else{
					output+=`<option value="${item.id_category}">${item.category_title}</option>`;
				}
			})
			if(category_title == '')
			{
				$('#list_category_machine').html(output)
			}else{
				$('#edit_list_category_machine').html(output)
			}
		}
	})
}
function create_machine()
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'product_machine_manager',type_manager:'create_machine'
		,machine_title:$('#machine_name').val()
		,machine_description:$('#machine_description').val()
		,id_machine_category:$('#list_category_machine').val()
		,id_admin:id_admin.id
		},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			if(response.success=='true')
			{
				alert(response.message)
				list_machine(id = '')
				$('#add_machine').hide()
			}else{
				alert(response.message)
			}

		}
	})
}
























///////////////////////// NHÓM SẢN PHẨM/////////////////////////
function list_product_category(id='')
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'product_category_manager',type_manager:'list_product_category',id_category:id
		},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			let output=``;
			if(id == ''){
				response.data.forEach(function(item){
				output+=`
				<tr ondblclick="list_product_category(${item.id})" data-id-customer="${item.id}" class="click_doubble get_modal">
                    <td>${item.category_title}</td>
                    <td>${item.category_description}</td>
                    <td>
                        <span data-tag="a" onClick="show_delete_product_category(${item.id})" class="get_modal t-green-main my-1 ml-4">Xoá</span>
                    </td>
                </tr>
				`;
				})
	
				$('#list_product_category').html(output)
			}else {
				$('#edit_unit').show()
				let btn =`<button onClick="update_product_category(${id})" id="btn_update_unit" class="btn-submit w-20 d-inline-block fz-1rem">Cập nhật</button>`
				$('#btn_update_unit').html(btn)
				$('#edit_unit_1').val(response.data[0].category_title)
				$('#edit_unit_title').val(response.data[0].category_description)
			}

		}
	})
}
function show_delete_product_category(id) {
	$('#btn_delete').html(`<button onclick="delete_product_category(${id})" id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>`)
	$('#delete_module').show()
}
function delete_product_category(id)
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'product_category_manager',type_manager:'delete_product_category',id_category:id},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			if(response.success=='true')
			{	
				list_product_category(id='')
				$('#delete_module').hide()
				alert(response.message)
			}else{
				alert(response.message)
			}
		}
	})
}
function create_product_category() {
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'product_category_manager',type_manager:'create_product_category'
		,id_admin:id_admin.id
		,category_description:$('#category_description').val()
		,category_title:$('#category_name').val()
		},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			if(response.success=='true')
			{	
				$('#category_name').val('')
				$('#category_description').val('')
				list_product_category(id='')
				$('#add_product').hide()
				alert(response.message)
			}else{
				alert(response.message)
			}
		}
	})
}
function update_product_category(id)
{
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'product_category_manager',type_manager:'update_product_category'
		,id_admin:id_admin.id
		,category_description:$('#edit_unit_1').val()
		,category_title:$('#edit_unit_title').val()
		,id_category:id
		},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			if(response.success=='true')
			{	
				list_product_category(id='')
				$('#edit_unit').hide()
				alert(response.message)
			}else{
				alert(response.message)
			}
		}
	})
}
