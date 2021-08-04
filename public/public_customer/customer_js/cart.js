$(document).ready(function(){
show_cart();
default_delivery();
});
var current_quantity=1;
var arr_id_product = [];
var arr_current_quantity = [];

function show_cart()
{
	var response = JSON.parse(localStorage.getItem('cart'));
	var output=``;
	response.forEach(function(item){
		current_quantity= item.current_quantity;
		 arr_id_product.push(item.id_product);
	 output +=`  
	 <div class="box-item w-100 p-2 my-1">
        <div class="box-product" style="position: relative;">
            <div class="d-flex product-item">
                <span class="thumb-nail w-20 p-2">
                     <img src="${urlimg_img + item.product_img}" alt="">
                </span>
                <div class="mg-l-2rem w-100">
                    <p class="fw-600 fz-15rem  my-3">${item.product_name}</p>
                    <p class="fw-400 fz-15rem my-3">${item.product_code}</p>
                    <div class="amount w-30">
                        <button class="minus" onClick="min_cart(${item.id_product})"><img src="${urlserver +'public_customer/images/minus.png'}" alt=""></button>
                        <input type="number" min="1" value="${item.current_quantity}" id="unit_title_product${item.id_product}">
                        <button class="plus" onClick="max_cart(${item.id_product})"><img src="${urlserver +'public_customer/images/plus.png'}" alt=""></button>
                    </div>
                    <div class="my-2" style="border-bottom: 1px dashed #C4C4C4"></div>
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
                </div>
                <span onclick="remove_cart(${item.id_product})" class="icon" style="position: absolute; top: 0;right: 0;"><img src="${urlserver +'public_customer/images/x-black.png'}" alt=""></span>
            </div>
        </div>
    </div>  
		`;
	});
    output +=`  <div id="note_buy" class="mg-t-175rem">
                    <h1 class="fw-600 fz-15rem  mb-3">Ghi chú</h1>
                    <input type="text" id="order_note" placeholder="Lưu ý cho shop..." class="p-3 w-100" style="height: 80px;">
                </div>`;
	$('#list_cart').html(output);
}	

function min_cart(id)
{
    current_quantity = $('#unit_title_product'+id).val();
	if(current_quantity < 2)
	{

	}else{
		current_quantity -=1;
    	$('#unit_title_product'+id).val(current_quantity);
	}
    
}
function max_cart(id)
{
    current_quantity = $('#unit_title_product'+id).val();
    current_quantity1 =Number(current_quantity)+1;
    $('#unit_title_product'+id).val(current_quantity1);
}
function remove_cart(id)
{
    var r= confirm("Bạn có muốn xóa sản phảm này không ?");
    if(r == true)
    {   
        var response = JSON.parse(localStorage.getItem('cart'));
        var i = 0;
        response.forEach(function(item) {
            if (item.id_product == id) {
                response.splice(i, 1);
                arr_id_product.splice(i,1);
            }
        i++;
        });
        localStorage.setItem('cart', JSON.stringify(response));
        show_cart();

    }
	
}
function default_delivery()
{
	var response = JSON.parse(localStorage.getItem('customer_customer'));
  	var output=``;
    let flag = 0;
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'list_customer_address', 
        type_address:'delivery' , id_customer: response.id , 
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
	        response.data.forEach(function(item) {
		        if(item.delivery_default == 'Y')
		        {
                    flag  = 1;
		        
		        	output+=`
					<div class="d-flex justify-content-space-between">
                        <h1 class="fw-600 fz-1rem">Địa chỉ nhận hàng</h1>
                        <span onClick="show_modal_delivery(${item.id_delivery})" data-tag="a" type="choose_address_give_order" class="get_modal fw-400 t-green-main">Sửa</span>

                    </div>
                    <div class="p-4 box-address">
                        <p class="fw-600 fz-125rem" id="company_delivery">${item.delivery_company}</p>
                        <div class="item-content">
                            <p>
                                <span class="icon"><img src="${urlserver +'public_customer/images/detail_account_black.png'}" alt=""></span>
                                <span class="fw-600 fz-1rem" id="customer_delivery">${item.delivery_deputy_person}</span>
                            </p>
                            <p>
                                <span class="icon"><img src="${urlserver +'public_customer/images/detail_phone_black.png'}" alt=""></span>
                                <span class="fw-600 fz-1rem" id="phone_delivery">${item.delivery_deputy_phone}</span>
                            </p>
                            <p>
                                <span class="icon"><img src="${urlserver +'public_customer/images/detail_location_black.png'}" alt=""></span>
                                <span class="fw-600 fz-1rem" id="address_delivery">${item.delivery_address}</span>
                            </p>
                        </div>
                    </div>
	    			`;
		        }
			});
            if(flag ==0 )
            {
                let item = response.data[0];
                output+=`
                    <div class="d-flex justify-content-space-between">
                        <h1 class="fw-600 fz-1rem">Địa chỉ nhận hàng</h1>
                        <span onClick="show_modal_delivery(${item.id_delivery})" data-tag="a" type="choose_address_give_order" class="get_modal fw-400 t-green-main">Sửa</span>

                    </div>
                    <div class="p-4 box-address">
                        <p class="fw-600 fz-125rem" id="company_delivery">${item.delivery_company}</p>
                        <div class="item-content">
                            <p>
                                <span class="icon"><img src="${urlserver +'public_customer/images/detail_account_black.png'}" alt=""></span>
                                <span class="fw-600 fz-1rem" id="customer_delivery">${item.delivery_deputy_person}</span>
                            </p>
                            <p>
                                <span class="icon"><img src="${urlserver +'public_customer/images/detail_phone_black.png'}" alt=""></span>
                                <span class="fw-600 fz-1rem" id="phone_delivery">${item.delivery_deputy_phone}</span>
                            </p>
                            <p>
                                <span class="icon"><img src="${urlserver +'public_customer/images/detail_location_black.png'}" alt=""></span>
                                <span class="fw-600 fz-1rem" id="address_delivery">${item.delivery_address}</span>
                            </p>
                        </div>
                    </div>
                    `;
            }



			$('#address_receive').html(output);
		}
    });

}

function show_modal_delivery(id)
{
	list_address_delivery_cart();
    $('#btn_default_address').html(`<button id="submit_give_order" onclick="add_address_delivery()" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>`);
	$('#choose_address_give_order').show();
}
function add_address_delivery()
{
    let id_customer= item.id;
    let reminiscent_company_name = $('#reminiscent_company_name').val()
    let address_address = $('#address_shipping').val() 
    let contact_person = $('#contact_person').val();
    let address_phone = $('#address_phone').val();
    let address_default ='N';
    if($('#choose_default')[0].checked == true)
    {
        address_default = 'Y';
    }

    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'create_customer_address', 
        type_address:'delivery' , id_customer: id_customer , reminiscent_company_name:reminiscent_company_name,
        contact_person:contact_person, address_phone:address_phone, address_address:address_address,address_default:address_default
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            alert(response.message);
            default_delivery();
            $('#add_address_give_order')[0].reset();
            $('#choose_address_give_order').hide();

        }
    });
}
   

function list_address_delivery_cart()
{

	var response = JSON.parse(localStorage.getItem('customer_customer'));
  	var output=``;
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'list_customer_address', 
        type_address:'delivery' , id_customer: response.id , 
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
    
	        response.data.forEach(function(item) {
	        	
		        if(item.delivery_default == 'Y')
		        {
		        	output+=`
					<div class="py-3" style="position: relative;text-align: left;display: flex;align-items: self-start;padding: 2px 0px;">
                        <input type="radio" onclick="change_address_delivery(${item.id_delivery})" name="choose_address_give_order" id="delivery_default${item.id_delivery}"  class="d-inline-block" style="position: relative;top: 7px;">
                        <div class="lh-15rem mg-l-1rem d-inline-block w-70">
                            <strong>${item.delivery_company}</strong>
                            <p>${item.delivery_deputy_person} | ${item.delivery_deputy_phone} </p>
                            <p>${item.delivery_address} </p>
                        </div>
                    </div>
					`;
		        }else{
		        	output+=`
					 <div class="py-3" style="position: relative;text-align: left;display: flex;align-items: self-start;padding: 2px 0px;">
                        <input type="radio" onclick="change_address_delivery(${item.id_delivery})" name="choose_address_give_order" id="delivery_default${item.id_delivery}"  class="d-inline-block" style="position: relative;top: 7px;">
                        <div class="lh-15rem mg-l-1rem d-inline-block w-70">
                            <strong>${item.delivery_company}</strong>
                            <p>${item.delivery_deputy_person} | ${item.delivery_deputy_phone} </p>
                            <p>${item.delivery_address} </p>
                        </div>
                    </div>
	    			`;

		        }
			});
			$('#add_address_give_order').hide();
			$('#list_address_delivery_cart').html(output);
			
		}
    });
}
var flag = 0;
function show_from_address_delivery()
{
	if(flag ==0)
	{
		$('#add_address_give_order').show();
		flag++;
	}else{
		$('#add_address_give_order').hide();
		flag--;
	}
}
function change_address_delivery(id){
    var customer = JSON.parse(localStorage.getItem('customer_customer'));
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'list_customer_address', 
        type_address:'delivery' , id_address:id , id_customer:customer.id
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            var item =response.data[0];
            var output=``;
            output+=`
            <div class="d-flex justify-content-space-between">
                <h1 class="fw-600 fz-1rem">Địa chỉ nhận hàng</h1>
                <span onClick="show_modal_delivery(${item.id_delivery})" data-tag="a" type="choose_address_give_order" class="get_modal fw-400 t-green-main">Sửa</span>

            </div>
            <div class="p-4 box-address">
                <p class="fw-600 fz-125rem" id="company_delivery">${item.delivery_company}</p>
                <div class="item-content">
                    <p>
                        <span class="icon"><img src="${urlserver +'public_customer/images/detail_account_black.png'}" alt=""></span>
                        <span class="fw-600 fz-1rem" id="customer_delivery">${item.delivery_deputy_person}</span>
                    </p>
                    <p>
                        <span class="icon"><img src="${urlserver +'public_customer/images/detail_phone_black.png'}" alt=""></span>
                        <span class="fw-600 fz-1rem" id="phone_delivery">${item.delivery_deputy_phone}</span>
                    </p>
                    <p>
                        <span class="icon"><img src="${urlserver +'public_customer/images/detail_location_black.png'}" alt=""></span>
                        <span class="fw-600 fz-1rem" id="address_delivery">${item.delivery_address}</span>
                    </p>
                </div>
            </div>
            `;
            $('#choose_address_give_order').hide();
            $('#address_receive').html(output);
        }
        
    });
}
function show_modal_address_shipping()
{
    list_address_shipping_cart();
    $('#choose_address_shipping_order').show();
}

function list_address_shipping_cart()
{

	var response = JSON.parse(localStorage.getItem('customer_customer'));
  	var output=``;
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'list_customer_address', 
        type_address:'shipping' , id_customer: response.id , 
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
	        response.data.forEach(function(item) {
	        	
		        if(item.delivery_default == 'Y')
		        {
		        	output+=`
					<div class="py-3" style="position: relative;text-align: left;display: flex;align-items: self-start;padding: 2px 0px;">
                        <input type="radio" onclick="change_address_shipping(${item.id_shipping})" name="choose_address_give_order" id="delivery_default${item.id_delivery}"  class="d-inline-block" style="position: relative;top: 7px;">
                        <div class="lh-15rem mg-l-1rem d-inline-block w-70">
                            <strong>${item.shipping_reminiscent_name}</strong>
                            <p>${item.shipping_contact_person} | ${item.shipping_contact_phone} </p>
                            <p>${item.shipping_address} </p>
                        </div>
                    </div>
					`;
		        }else{
		        	output+=`
					<div class="py-3" style="position: relative;text-align: left;display: flex;align-items: self-start;padding: 2px 0px;">
                        <input type="radio" onclick="change_address_shipping(${item.id_shipping})" name="choose_address_give_order" id="delivery_default${item.id_delivery}"  class="d-inline-block" style="position: relative;top: 7px;">
                        <div class="lh-15rem mg-l-1rem d-inline-block w-70">
                            <strong>${item.shipping_reminiscent_name}</strong>
                            <p>${item.shipping_contact_person} | ${item.shipping_contact_phone} </p>
                            <p>${item.shipping_address} </p>
                        </div>
                    </div>
	    			`;

		        }
			});
			$('#show_add_address_shipping').hide();
			$('#list_address_shipping_cart').html(output);
			
		}
    });
}
var flag_shipping = 0;
function show_add_address_shipping()
{
	if(flag_shipping ==0)
	{
		$('#show_add_address_shipping').show();
		flag_shipping++;
	}else{
		$('#show_add_address_shipping').hide();
		flag_shipping--;
	}
}
function add_address_shipping()
{
    let id_customer= item.id;

    let reminiscent_company_name = $('#reminiscent_company_name1').val()
    let address_address = $('#address_shipping1').val() 
    let contact_person = $('#contact_person1').val();
    let address_phone = $('#address_phone1').val();
    let address_default ='N';
    if($('#choose_default')[0].checked == true)
    {
        address_default = 'Y';
    }

    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'create_customer_address', 
        type_address:'shipping' , id_customer: id_customer , reminiscent_company_name:reminiscent_company_name,
        contact_person:contact_person, address_phone:address_phone, address_address:address_address,address_default:address_default
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            alert(response.message);
            list_address_shipping_cart();
            $('#show_add_address_shipping')[0].reset();
            //$('#choose_address_shipping_order').hide();

        }
    });
    
    
}
function remove_address_shipping()
{

    $('#address_send').hide();
    $('#btn_show_modal_address_shipping').show();
}
function change_address_shipping(id){
    var customer = JSON.parse(localStorage.getItem('customer_customer'));
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'list_customer_address', 
        type_address:'shipping' , id_address:id , id_customer:customer.id
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            var item =response.data[0];
            var output=``;
            output+=`
            <div class="d-flex justify-content-space-between">
                <h1 class="fw-600 fz-1rem">Địa chỉ gửi hàng</h1>
                <div>
                    <span onClick="remove_address_shipping()" type="delete_address_send" data-tag="a" class="get_modal fw-400 t-green-main px-2">Xóa</span>
                    <span onclick="show_modal_address_shipping()" data-tag="a" class="get_modal fw-400 t-green-main px-2">Sửa</span>
                </div>
            </div>
            <div class="p-4 box-address">
                <p class="fw-600 fz-125rem" id="company_shipping">${item.shipping_reminiscent_name}</p>
                <div class="item-content">
                    <p>
                        <span class="icon"><img src="${urlserver +'public_customer/images/detail_account_black.png'}" alt=""></span>
                        <span class="fw-600 fz-1rem" id="customer_shipping">${item.shipping_contact_person} </span>
                    </p>
                    <p>
                        <span class="icon"><img src="${urlserver +'public_customer/images/detail_phone_black.png'}" alt=""></span>
                        <span class="fw-600 fz-1rem" id="phone_shipping">${item.shipping_contact_phone}</span>
                    </p>
                    <p>
                        <span class="icon"><img src="${urlserver +'public_customer/images/detail_location_black.png'}" alt=""></span>
                        <span class="fw-600 fz-1rem" id="address_shipping">${item.shipping_address}</span>
                    </p>
                </div>
            </div>

            `;

            $('#btn_show_modal_address_shipping').hide();
            $('#choose_address_shipping_order').hide();
            $('#address_send').html(output);

            $('#address_send').show();

        }
        
    });
}
function submit_choose_date_give_order()
{
    var item = JSON.parse(localStorage.getItem('customer_customer'));
    var choose_date = $('#choose_date').val();
    if(choose_date == '')
    {
       alert('Bạn chưa chọn ngày nhận hàng')   //
       //$('#erro_choose_date').html('Bạn chưa chọn ngày nhận hàng');
    }else{
        $('#view_date').html(choose_date);
        let output =`
        <span class="btn btn-green  w-70" onClick="create_order(${item.id})">Đặt hàng</span>
        <i class="d-block fw-400 fz-075rem mt-3 t-black">Xin vui lòng kiểm tra lại đơn hàng trước khi đặt hàng</i>
       `;
       $('#choose_date_give_order').hide();
       $('#btn_create_order').html(output);
    }
}
function create_order(id)
{
    var r = confirm('Vui lòng kiểm tra đơn hàng trước kh đặt');
    if(r==true)
    {
        var item = JSON.parse(localStorage.getItem('customer_customer'));
        arr_current_quantity =[];
        arr_id_product.forEach(function(item){
            arr_current_quantity.push($('#unit_title_product'+item).val());
        })
        var id_customer = item.id;
        var id_product= arr_id_product.toString();
        var quantity_packet= arr_current_quantity.toString();
        var order_date_delivery =  $('#view_date').text(); 
        var order_record_delivery = JSON.stringify({"delivery_company":$('#company_delivery').text(),"delivery_deputy_person":$('#customer_delivery').text(),"delivery_deputy_phone":$('#phone_delivery').text(),"delivery_address":$('#address_delivery').text()});
        var order_record_shipping = JSON.stringify({"shipping_reminiscent_name":$('#company_shipping').text(),"shipping_contact_person":$('#customer_shipping').text(),"shipping_contact_phone":$('#phone_shipping').text(),"shipping_address":$('#address_shipping').text()});
        var order_note = $('#order_note').val();
        var customer_code = item.customer_code;
        if($('#company_shipping').text() == '' && $('#customer_shipping').text()=='' && $('#phone_shipping').text()=='')
        {
            order_record_shipping ='';
        }
        $.ajax({
            url: urlapi,
            method: 'POST',
            data: { detect: 'create_order',
            id_customer:id_customer, id_product:id_product, 
            order_date_delivery:order_date_delivery , order_note:order_note,
            order_record_delivery:order_record_delivery,customer_code:customer_code,
            quantity_packet:quantity_packet 
            },
            dataType: 'json',
            headers: headers,
            success: function(response) {
                if(response.success=='true')
                {
                    localStorage.removeItem('cart');
                    alert(response.message);
                    let output=`
                    <span type="choose_date_give_order" onClick="btn_abc()" data-tag="a" class="get_modal btn btn-green  w-70">Tiến hành đặt hàng</span>            
                    <span type="order_stock" data-tag="a" class="d-none btn btn-green  w-70">Đặt hàng</span>
                    <i class="d-block fw-400 fz-075rem mt-3 t-black">Xin vui lòng kiểm tra lại đơn hàng trước khi đặt hàng</i>
                    `
                    $('#btn_create_order').html(output)
                }else{
                    alert(response.message)
                }
                
            }
        })

    }
} 
function btn_abc()
{
    $('#choose_date_give_order').show()
}