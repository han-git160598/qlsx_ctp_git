$(document).ready(function(){
customer_detail_mapping();  
});


function customer_detail_mapping()
{
    let id = JSON.parse(sessionStorage.getItem('detail_customer'));
    if(id == null || id == '')
    {
		
    }else{
    	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_manager',type_manager:'list_customer', id_customer: id
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
        	let item = response.data[0];
	    	$('#customer_code').val(item.customer_code);
		    $('#customer_phone').val(item.customer_phone);
		    $('#customer_name').val(item.customer_name);
		    $('#customer_company').val(item.customer_company);
		    $('#customer_email').val(item.customer_email);
		    $('#btn_customer_update').html(`<button  onclick="update_customer(${item.id})" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>`);
    		}
    	});
    }

}
function update_customer(id)
{
	console.log(id)
	var customer_code  = $('#customer_code').val();
	var customer_phone = $('#customer_phone').val();
	var customer_name  = $('#customer_name').val();
	var customer_company= $('#customer_company').val();
	var customer_email = $('#customer_email').val();
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_manager',type_manager:'update_customer', id_customer: id
        ,customer_code:customer_code,customer_phone:customer_phone,customer_name:customer_name
        ,customer_company:customer_company,customer_email:customer_email
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
 		alert(response.message)
       
        }

	});
}

//////////////////////////////////// ADDRESS SHIPPING //////////////////////////////////////////////////

function customer_address_shipping(){
	let id = JSON.parse(sessionStorage.getItem('detail_customer'));
    if(id == null || id == '')
    {
		
    }else{
    	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_manager',type_manager:'list_customer',
         id_customer: id,customer_shipping:'Y'
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
        	let output=``;

	        response.data[0].customer_shipping.forEach(function(item) {
	        	
	        output+=`
	         <tr ondblclick="edit_address(${item.id_shipping},'shipping')" data-id-customer="${item.id_shipping}"  class="click_doubble get_modal">
                <td>${item.shipping_reminiscent_name}</td>
                <td>${item.shipping_contact_person}</td>
                <td>${item.shipping_contact_phone}</td>
                <td>${item.shipping_address}</td>
                <td class="t-center">`;
                if(item.shipping_default == 'Y')
                {
                	output+=`
                    <input type="radio" checked name="radio_shipping" onchange="default_address(${item.id_shipping},${item.id_customer},'shipping')">`;
                }else{
                	output+=`
                 	<input type="radio" name="radio_shipping" onchange="default_address(${item.id_shipping},${item.id_customer},'shipping')">`;
                }
               	output+=`
                </td>
                <td class="t-center">
                    <span onClick="show_modal_delete_address(${item.id_shipping},'shipping')" data-tag="a" type="delete_module" class="get_modal t-green-main my-1">Xoá</span>
                </td>
            </tr>
	        `;
	        });
        	$('#admin_list_address_shipping').html(output);
    		}

    	});
    }
}

function default_address(id_address,id_customer,type_address)
{
	console.log(type_address)
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'update_customer_address',
         id_address: id_address,type_address:type_address,address_default:'Y',id_customer:id_customer
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if(response.success=='true')
            {
                alert(response.message);
            }else{
                alert(response.message);
            }
        	

        }
    });
}

function show_modal_delete_address(id,type_address)
{

	$('#btn_delete_customer').html(`<button id="add_file" onclick="delete_address(${id},${type_address})" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>`);
	$('#delete_module_address').show();
}
function delete_address(id,type_address)
{
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_manager',type_manager:'delete_customer_address', id_address: id
        ,type_address:type_address
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
        	alert(response.message);
        	if(type_address == 'shipping')
        	{
        		customer_address_shipping();
        	}else{
        		customer_address_delivery();
        	}
        	$('#delete_module_adress').hide();
        	

        }
    })
}
function edit_address(id_address,type_address)
{
    console.log(type_address)
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'list_customer_address',
         id_address: id_address,type_address:type_address
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            let output=``;
            if(type_address =='shipping')
            {
                $('#address_name').val(response.data[0].shipping_reminiscent_name)
                $('#contact_name').val(response.data[0].shipping_contact_person)
                $('#contact_number').val(response.data[0].shipping_contact_phone)
                $('#address').val(response.data[0].shipping_address)
                 output+=`<button onClick="update_address(${id_address},'shipping')" class="btn-submit w-30 ">Hoàn thành</button>`
            }else{
                $('#address_name').val(response.data[0].delivery_company)
                $('#contact_name').val(response.data[0].delivery_deputy_person)
                $('#contact_number').val(response.data[0].delivery_deputy_phone)
                $('#address').val(response.data[0].delivery_address)
                 output+=`<button onClick="update_address(${id_address},'delivery')" class="btn-submit w-30 ">Hoàn thành</button>`
            }
            $('#edit_address').show()
            
            $('#btn_update_address').html(output)
            
        }
    })

}
function update_address(id_address,type_address)
{
    var id_customer = JSON.parse(sessionStorage.getItem('detail_customer'))
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'update_customer_address'
        ,id_address: id_address,type_address:type_address,id_customer:id_customer
        ,reminiscent_company_name: $('#address_name').val()
        ,contact_person:$('#contact_name').val()
        ,address_phone: $('#contact_number').val()
        ,address_address:$('#address').val()
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if(response.success=='true')
            {
                alert(response.message)
                $('#edit_address').hide()
                customer_address_shipping()
                customer_address_delivery()
            }else{
                alert(response.message)
            }
        }
    })

}
///////////////////////// DELIVERY //////////////////////////////////////
function customer_address_delivery(){
	let id = JSON.parse(sessionStorage.getItem('detail_customer'));
    if(id == null || id == '')
    {
		
    }else{
    	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_manager',type_manager:'list_customer',
         id_customer: id,customer_delivery:'Y'
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
        	let output=``;

	        response.data[0].customer_delivery.forEach(function(item) {
	        	
	        output+=`
	         <tr ondblclick="edit_address(${item.id_delivery},'delivery')" data-id-customer="${item.id_delivery}"  class="click_doubble get_modal">
                <td>${item.delivery_company}</td>
                <td>${item.delivery_deputy_person}</td>
                <td>${item.delivery_deputy_phone}</td>
                <td>${item.delivery_address}</td>
                <td class="t-center">`;
                if(item.delivery_default == 'Y')
                {
                	output+=`
                    <input type="radio" checked name="radio_delivery" onchange="default_address(${item.id_delivery},${item.id_customer},'delivery')">`;
                }else{
                	output+=`
                 	<input type="radio" name="radio_delivery" onchange="default_address(${item.id_delivery},${item.id_customer},'delivery')">`;
                }
               	output+=`
                </td>
                <td class="t-center">
                    <span onClick="show_modal_delete_address(${item.id_delivery},'delivery')" data-tag="a" type="delete_module" class="get_modal t-green-main my-1">Xoá</span>
                </td>
            </tr>
	        `;
	        });
        	$('#admin_list_address_delivery').html(output);
    		}

    	});
    }
}

//////////////////////////////////////// ORDER //////////////////////////////////////////////

function customer_list_order(){
	let id = JSON.parse(sessionStorage.getItem('detail_customer'));
    if(id == null || id == '')
    {
		
    }else{
		$.ajax({
	        url: urlapi,
	        method: 'POST',
	        data: { detect: 'list_order' , id_customer: id
	        },
	        dataType: 'json',
	        headers: headers,
	        success: function(response) {
	        	let output=``;

	        	response.data.forEach(function(item) {
	        	output+=`
	        	<tr ondblclick="detail_order(${item.id_order})" data-id-customer="${item.id_order}" class="click_doubble get_modal">
                    <td>${item.order_code}</td>
                    <td>${item.order_total_cost} đ</td>
                    <td>${item.order_date_create}</td>
                    <td>${item.order_date_delivery}</td>`;
                    if(item.order_status == '5')
                    {
                    	output+=`
                    	<td class="bg-blue">${order_status(item.order_status)}</td>`;
                    }else{
						output+=`
	                    <td>${order_status(item.order_status)}</td>`;
                    }
                    output+=`
                </tr>
	        	`;
	        	});
	        	$('#admin_list_order').html(output);


	        }
	   });
	}
}
function detail_order(id_order){

    $('#detail_order').show()
    // $.ajax({
    //     url: urlapi,
    //     method: 'POST',
    //     data: { detect: 'list_order', order_id:id_order},
    //     dataType: 'json',
    //     headers: headers,
    //     success: function(response) {
    //         console.log(response)
    //     let output=``;
    //     let address_shipping1 = JSON.parse(response.data[0].order_detail[0].order_record_shipping)
    //     let address_delivery1 = JSON.parse(response.data[0].order_detail[0].order_record_delivery)
    //     response.data[0].order_detail[0].order_item_product.forEach(function(item) {
    //         output+=`
    //         <div class="bg-white py-2 px-3 my-1">
    //             <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
    //                 <strong>${item.product_name}</strong>
    //                 <p class="mt-2">${item.product_code}</p>
    //                 <p class="mt-2">x${item.product_quantity_packet} ${item.product_packet_title}</p>
    //             </div>
    //             <div class="d-flex py-2 align-item-center">
    //                 <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
    //                 <span>${item.product_unit_title}</span>
    //             </div>
    //             <div class="d-flex py-2 align-item-center">
    //                 <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
    //                 <span>${item.product_packet_title}</span>
    //             </div>
    //             <div class="d-flex py-2 align-item-center">
    //                 <span class="fz-075rem t-lable mr-3">Quy cách đóng:</span>
    //                 <span>${item.product_unit_packet} ${item.product_unit_title}/${item.product_packet_title}</span>
    //             </div>
    //         </div>`;
    //     })
     
    //     $('#detail_shipping_code').text(response.data[0].shipping_code)
    //     $('#detail_shipping_status').text(shipping_status1(response.data[0].shipping_status))
    //     $('#detail_order_code').text(response.data[0].order_code)
     
    //     $('#detail_order_date_delivery').text(response.data[0].order_detail[0].order_date_delivery)
    //     $('#detail_customer_code').text(response.data[0].customer_code)
    //     $('#detail_company_name').text(address_delivery1.delivery_company)
    //     $('#detail_delivery_address').text(address_delivery1.delivery_address)
    //     if(address_shipping1 == '' || address_shipping1 == null)
    //     {
            
    //     }else{
    //         $('#detail_shipping_address').text(address_shipping1.shipping_address)
    //     }
        

    //     $('#detail_order_note').text(response.data[0].order_detail[0].order_note)
    //     $('#detail_order_total_cost').text(response.data[0].order_detail[0].order_total_cost)
    //     $('#detail_order_status').text(order_status(response.data[0].order_detail[0].order_status))

    //     $('#detail_order_date_shipping').text(response.data[0].shipping_time)
    //     $('#detail_shipping_note').text(response.data[0].shipping_note)
        
    //     let output_status=``

    //     if(response.data[0].shipping_status == 1)
    //     {
    //          output_status += 
    //         `<div for="title" class="form-info-lable">
    //             <input type="checkbox" name="cancel_order" id="cancel_order">
    //             <label for="cancel_order">Hủy lệnh</label>
    //         </div>
    //         <div class="form-info-input-content t-left">
    //             <textarea name="cancel_reason" id="cancel_reason" class="w-100" cols="20" rows="5" placeholder="Lí do hủy lệnh...."></textarea>
    //         </div>`
    //         $('#btn_cancel_ship').html(` <button onclick="cancel_ship(${id_shipping})" id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hủy lệnh</button>`)
    //     }else if(response.data[0].shipping_status == 3){
    //             output_status +=`
    //             <label class="form-info-lable">Hủy lệnh</label>
    //             <div class="form-info-input-content t-left">
    //                 <p>${response.data[0].shipping_record_cancel_note}</p>
    //             </div>`
    //         $('#btn_cancel_ship').html('')
    //     }
    //     $('#stauts_ship_html').html(output_status)
       
    //     $('#detail_list_product_order').html(output)    
    //     }
    // })

}

///////////////////////////////////// PASSWORK //////////////////////////////////////////////////

function customer_hidden_password(id)
{
    var pwd = document.getElementById(id);
    if(pwd.getAttribute("type")=="password"){
        pwd.setAttribute("type","text");
    } else {
        pwd.setAttribute("type","password");
    }
    
}
$("#pw-old").keyup(function() {
    /*length 5 characters or more*/
    if(this.value.length <= 8 || this.value.indexOf(' ') >= 0) {
        document.getElementById("length").style.color = "red"
    }else{
    	document.getElementById("length").style.color = "green"
    }
    /*contains lowercase characters*/
    if(this.value.match(/[a-z]+/)) {
        document.getElementById("lowercase").style.color = "green"
    }else{
    	document.getElementById("lowercase").style.color = "red"
    }
    /*contains digits*/
    // if(this.value.match(/[0-9]+/)) {
    //     strength++;
    // }
    /*contains uppercase characters*/
    if(this.value.match(/[A-Z]+/)) {
        document.getElementById("uppercase").style.color = "green"
    }else{
    	document.getElementById("uppercase").style.color = "red"
    }

});
$('#pw-new').keyup(function(){
	if($('#pw-new').val() == $('#pw-old').val())
	{
		document.getElementById("pw-new").style.backgroundColor = "White"
	}else{
		document.getElementById("pw-new").style.backgroundColor = "red"
	}
});

function reset_password()
{
	var length = document.getElementById("length").style.color;
	var lowercase = document.getElementById("lowercase").style.color;
	var uppercase = document.getElementById("uppercase").style.color;
	var pw_unique = document.getElementById("pw-new").style.backgroundColor;
	if(length == "red" || lowercase == "red" || uppercase == "red" || $('#pw-new').val() != $('#pw-old').val() )
	{	
		alert('Mật khẩu không đúng định dạng hoặc không trùng khớp')
	}else{
		let id = JSON.parse(sessionStorage.getItem('detail_customer'));
	    if(id == null || id == '')
	    {
			alert('Lỗi dữ liệu, vui lòng trở lại danh sách và thực hiện lại')
	    }else{
			$.ajax({
		        url: urlapi,
		        method: 'POST',
		        data: { detect: 'customer_manager',type_manager:'resset_password_customer',
		         id_customer: id,password_reset:$('#pw-old').val()
		        },
		        dataType: 'json',
		        headers: headers,
		        success: function(response) {
		        	alert(response.message);
		        }
		    });
		}
	}
}