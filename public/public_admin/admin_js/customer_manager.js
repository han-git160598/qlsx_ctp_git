$(document).ready(function(){
cusotmer_pagination(page,search,date_begin,date_end);
customer_detail_mapping();	
});
var page = 1;
var search = '';
var date_begin ='';
var date_end ='';
function cusotmer_pagination(page, search , date_begin , date_end)
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
	        response.data.forEach(function(item) {
	        output +=`   
            <tr data-id-customer="${item.id}">
                <td>${item.customer_code}</td>
                <td>${item.customer_name}</td>
                <td>${item.customer_company}</td>
                <td>${item.customer_phone}</td>`;
                if(item.customer_status == 'Y')
                {
                	output +=`   
	                <td>
	                    <label class="switch">
	                    <input type="checkbox" checked onchange="customer_status(${item.id},'N')">
	                    <span class="slider round"></span>
	                  </label>
	                </td>`;
                }else{
                	output +=`   
	                <td>
	                    <label class="switch">
	                    <input type="checkbox" onchange="customer_status(${item.id},'Y')">
	                    <span class="slider round"></span>
	                  </label>
	                </td>`;
                }
			
            output +=`   
                <td class="t-center">
                    <a onclick="customer_detail(${item.id})" class="t-green-main my-1">Sửa</a>
                    <span onClick="show_modal_delete_customer(${item.id})"  data-tag="a" type="delete_module" class="get_modal t-green-main my-1 ml-4">Xoá</span>
                </td>
            </tr>

	        `;
	        })
	        $('#list_customer').html(output);

 			let pagination=`
 			<li class="item prev" onClick="cusotmer_pagination(${page-1})"><i class="fas fa-chevron-left"></i></li>
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
	        		pagination+=`<li class="item" onClick="cusotmer_pagination(${i+1})">${i+1}</li>`;
	        	}
	        }
	        pagination+=`
            <li class="item next" onClick="cusotmer_pagination(${page+1})"><i class="fas fa-chevron-right"></i></li>
	        `;
	        $('#cusotmer_pagination').html(pagination);
	    }
		})
	}
	
}
function show_modal_create_customer()
{
	$('#create_customer_form')[0].reset()
	$('#add_module').show();
}
function create_customer()
{
	var customer_code=$('#customer_code').val();
	var customer_name=$('#customer_name').val();
	var customer_company=$('#customer_company').val();
	var customer_phone=$('#customer_phone').val();
	var customer_email=$('#customer_email').val();
	var customer_address=$('#customer_address').val();
	var customer_enterprise='N'
	var password = $('#customer_password').val();
	console.log('ád'+password)
	if($('#is_business')[0].checked == true)
    {
        customer_enterprise = 'Y';
    }
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_manager',type_manager:'create_customer'
        ,customer_code:customer_code,customer_name:customer_name,customer_company:customer_company
        ,customer_phone:customer_phone,email:customer_email, customer_password:password
        ,customer_enterprise:customer_enterprise,customer_address:customer_address
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
        	if(response.success =='true')
        	{
        		$('#create_customer_form')[0].reset();
	        	$('#add_module').hide();
	        	cusotmer_pagination(page,search);
	        	alert('Tạo tài khoản khách hàng thành công');
        	}else{
        		alert('Tạo tài khoản khách hàng không thành công');
        	}
        	
        	
        }
    })
}

function show_modal_delete_customer(id)
{
	$('#btn_delete_customer').html(`<button id="add_file" onclick="delete_customer(${id})" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>`);
	$('#delete_module').show();
}
function delete_customer(id)
{
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_manager',type_manager:'delete_customer', id_customer: id
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
        	cusotmer_pagination(page,search);
        	$('#delete_module').hide();
        	alert(response.message);

        }
    })
}
function customer_status(id,status)
{
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_manager',type_manager:'update_customer', id_customer: id,
        customer_status:status
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
        	cusotmer_pagination(page,search);
        
        	alert(response.message);

        }
    })
}

function customer_detail(id)
{
	
	sessionStorage.setItem('detail_customer', JSON.stringify(id));	
	window.location.href = urlserver + 'customer-detail';

}

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

//////////////////////////////////// ADDRESS //////////////////////////////////////////////////


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
	         <tr data-id-customer="1" type="edit_address_send" class="click_doubble get_modal">
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

        	alert(response.message);

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
	         <tr data-id-customer="1" type="edit_address_send" class="click_doubble get_modal">
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
                    <span onClick="show_modal_delete_address(${item.id_shipping},'delivery')" data-tag="a" type="delete_module" class="get_modal t-green-main my-1">Xoá</span>
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
	        	<tr data-id-customer="2" type="info_order_history" class="click_doubble get_modal">
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