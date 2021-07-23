$(document).ready(function(){
list_unit(unit_type='U')
})

function list_unit(unit_type='')
{
	$('#btn_add_unit').attr('onClick', "create_unit('"+unit_type+"')");
	$.ajax({
		url: urlapi,
		method: 'POST',
		data: { detect: 'unit_manager',type_manager:'list_unit',unit_type:unit_type},
		dataType: 'json',
		headers: headers,
		success: function(response) {
			let output=``;
			response.data.forEach(function(item){
				output+=`
				<tr data-id-customer="1" type="edit_unit" class="click_doubble get_modal">
                    <td>${item.unit_title}</td>
                    <td>${item.unit}</td>
                    <td>
                        <span data-tag="a" onClick="show_delete_unit(${item.id})" type="delete_module" class="get_modal t-green-main my-1 ml-4">Xoá</span>
                    </td>
                </tr>
				`;
				})
	
				$('#list_unit').html(output)
			}
		})
}
function show_delete_unit(id) {
	$('#btn_delete').html(`<button onclick="delete_unit(${id})" id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>`)
	$('#delete_module').show()
}
function delete_unit(id)
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
				list_unit()
				$('#delete_module').hide()
				alert(response.message)
			}else{
				alert(response.message)
			}
		}
	})
}
function create_unit(unit_type) {

}