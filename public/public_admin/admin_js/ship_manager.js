$(document).ready(function(){
list_order_code(id_order='')
list_ship(shipping_status=1,date_begin='',date_end='')
$('#div_detail_order').hide()
})
function reset_date()
{
	$('#date_begin').val('')
	$('#date_end').val('')
	list_ship($('#stauts_ship').val(),$('#date_begin').val(),$('#date_end').val())
}
function list_ship(shipping_status=1,date_begin='',date_end='' ,filter='')
{
	$('#stauts_ship').val(shipping_status)
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_ship',shipping_status:shipping_status
        ,date_begin:date_begin,date_end:date_end,limit:200,filter:filter
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
        	let output=``;
	        response.data.forEach(function(item) {
	        	output+=`
				<tr ondblclick="edit_ship(${item.id_shipping})" data-id-customer="${item.id_shipping}" type="info_init" class="click_doubble get_modal">
			        <td>${item.shipping_code}</td>
			        <td>${item.customer_code}</td>
			        <td>${item.order_code}</td>
			        <td>
			            <span class="rounder">
			                ${item.product_code}
			            </span>
			            <span class="rounder">
			                +${item.total_product}
			            </span>
			        </td>
			        <td>${item.shipping_time}</td>
			    </tr>
				`;
	        })
	        $('#list_ship').html(output)
	    }
	})
}
function list_order_code(id_order ='')
{
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_order'},
        dataType: 'json',
        headers: headers,
        success: function(response) {
    	let output=``;
        response.data.forEach(function(item) {
	        if(id_order == item.id_order){
				output+=` <option selected value="${item.id_order}">${item.order_code}</option>`;
	        }else {
	        	output+=` <option value="${item.id_order}">${item.order_code}</option>`;
	        }
	    })
	    $('#choose_mdh').html(output)    
		}
	})
}
var order_status1;
function list_product_order()
{
	let id_order= $('#choose_mdh').val()
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_order', order_id:id_order},
        dataType: 'json',
        headers: headers,
        success: function(response) {
    	let output=``;
    	let order_record_shipping = JSON.parse(response.data[0].order_record_delivery)
        response.data[0].order_item_product.forEach(function(item) {
	        output+=`
	        <div class="bg-white py-2 px-3 my-1">
                <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                    <strong>${item.product_name}</strong>
                    <p class="mt-2">${item.product_code}</p>
                    <p class="mt-2">x${item.product_quantity_packet} ${item.product_packet_title}</p>
                </div>
                <div class="d-flex py-2 align-item-center">
                    <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                    <span>${item.product_unit_title}</span>
                </div>
                <div class="d-flex py-2 align-item-center">
                    <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
                    <span>${item.product_packet_title}</span>
                </div>
                <div class="d-flex py-2 align-item-center">
                    <span class="fz-075rem t-lable mr-3">Quy cách đóng:</span>
                    <span>${item.product_unit_packet} ${item.product_unit_title}/${item.product_packet_title}</span>
                </div>
            </div>`;
	    })
	 
        $('#order_date_delivery').text(response.data[0].order_date_delivery)
        $('#customer_code').text(response.data[0].customer_code)
        $('#order_note').text(response.data[0].order_note)
        $('#order_total_cost').text(response.data[0].order_total_cost)
        $('#order_status').text(order_status(response.data[0].order_status))
        $('#company_name').text(order_record_shipping.shipping_reminiscent_name)
        $('#shipping_address').text(order_record_shipping.shipping_address)

        $('#div_detail_order').show()

        order_status1= response.data[0].order_status




	    $('#list_product_order').html(output)    
		}
	})
}
function create_ship()
{
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect:'ship_manager', type_manager:'create_ship'
        ,id_order:$('#choose_mdh').val()
		,shipping_time:$('#shipping_time').val()
		,customer_code:$('#customer_code').text()
		,shipping_note:$('#shipping_note').val()
		,shipping_status:order_status1
    	},
        dataType: 'json',
        headers: headers,
        success: function(response) {
	        if(response.success=='true'){
	        	alert(response.message)
	        	$('#shipping_note').val('')
	        	$('#shipping_time').val('')
	        	$('#add_command').hide()
	        	list_ship()
	        }else{
	        	alert(response.message)
	        }
    	}
    })
}


function edit_ship(id_shipping)
{
	console.log(id_shipping)
	$('#info_init').show()
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_ship', id_shipping:id_shipping},
        dataType: 'json',
        headers: headers,
        success: function(response) {
    	console.log(response)
    	if(response.data[0].order_detail[0]=='')
    	{
    		console.log(123)
    		return;
    	}
    	let output=``;
    	let address_delivery1 = JSON.parse(response.data[0].order_detail[0].order_record_delivery)
    	if(response.data[0].order_detail[0].order_record_shipping != '')
    	{
    		let address_shipping1 = JSON.parse(response.data[0].order_detail[0].order_record_shipping)
    		$('#detail_shipping_address').text(address_shipping1.shipping_address)
    	}
        response.data[0].order_detail[0].order_item_product.forEach(function(item) {
	        output+=`
	        <div class="bg-white py-2 px-3 my-1">
                <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                    <strong>${item.product_name}</strong>
                    <p class="mt-2">${item.product_code}</p>
                    <p class="mt-2">x${item.product_quantity_packet} ${item.product_packet_title}</p>
                </div>
                <div class="d-flex py-2 align-item-center">
                    <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                    <span>${item.product_unit_title}</span>
                </div>
                <div class="d-flex py-2 align-item-center">
                    <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
                    <span>${item.product_packet_title}</span>
                </div>
                <div class="d-flex py-2 align-item-center">
                    <span class="fz-075rem t-lable mr-3">Quy cách đóng:</span>
                    <span>${item.product_unit_packet} ${item.product_unit_title}/${item.product_packet_title}</span>
                </div>
            </div>`;
	    })
	 
    	$('#detail_shipping_code').text(response.data[0].shipping_code)
		$('#detail_shipping_status').text(shipping_status1(response.data[0].shipping_status))
		$('#detail_order_code').text(response.data[0].order_code)
	 
		$('#detail_order_date_delivery').text(response.data[0].order_detail[0].order_date_delivery)
		$('#detail_customer_code').text(response.data[0].customer_code)
		$('#detail_company_name').text(address_delivery1.delivery_company)
		$('#detail_delivery_address').text(address_delivery1.delivery_address)

		$('#detail_order_note').text(response.data[0].order_detail[0].order_note)
		$('#detail_order_total_cost').text(response.data[0].order_detail[0].order_total_cost)
		$('#detail_order_status').text(order_status(response.data[0].order_detail[0].order_status))

        $('#detail_order_date_shipping').text(response.data[0].shipping_time)
        $('#detail_shipping_note').text(response.data[0].shipping_note)
        
        let output_status=``

   		if(response.data[0].shipping_status == 1)
   		{
   			 output_status += 
   			`<div for="title" class="form-info-lable">
                <input type="checkbox" name="cancel_order" id="cancel_order">
                <label for="cancel_order">Hủy lệnh</label>
            </div>
            <div class="form-info-input-content t-left">
                <textarea name="cancel_reason" id="cancel_reason" class="w-100" cols="20" rows="5" placeholder="Lí do hủy lệnh...."></textarea>
            </div>`
            $('#btn_cancel_ship').html(` <button onclick="cancel_ship(${id_shipping})" id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hủy lệnh</button>`)
   		}else if(response.data[0].shipping_status == 3){
   				output_status +=`
                <label class="form-info-lable">Hủy lệnh</label>
                <div class="form-info-input-content t-left">
                    <p>${response.data[0].shipping_record_cancel_note}</p>
                </div>`
            $('#btn_cancel_ship').html('')
   		}
   		$('#stauts_ship_html').html(output_status)
       
	    $('#detail_list_product_order').html(output)    
		}
	})

}
function cancel_ship(id_shipping)
{

	if($("#cancel_order")[0].checked == true)
	{
		$.ajax({
	        url: urlapi,
	        method: 'POST',
	        data: { detect: 'ship_manager',type_manager:'update_ship'
	        ,id_shipping:id_shipping,shipping_status:'3'
	        ,shipping_record_cancel_note:$('#cancel_reason').val()
	    	},
	        dataType: 'json',
	        headers: headers,
	        success: function(response) {
		    	if(response.success =='true'){
		    		alert(response.message)
		    		list_ship(shipping_status=1,date_begin='',date_end='')
		    		$('#info_init').hide()
		    	}else{
		    		alert(response.message)
		    	}
	    	}
    	})
  	
	}else{
		alert('Vui lòng chọn checkbox hủy lệnh')
	}
	
}
