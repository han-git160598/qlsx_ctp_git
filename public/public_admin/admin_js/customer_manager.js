$(document).ready(function(){
cusotmer_pagination(page,search,date_begin,date_end);

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
        	alert(response.message);
        }
    })
}

function customer_detail(id)
{
	
	sessionStorage.setItem('detail_customer', JSON.stringify(id));	
	window.location.href = urlserver + 'customer-detail';

}

