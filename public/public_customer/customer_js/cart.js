$(document).ready(function(){
show_cart();
default_delivery();
});
var current_quantity=1;
function show_cart()
{
	var response = JSON.parse(localStorage.getItem('cart'));
	var output=``;
	response.forEach(function(item){
		current_quantity= item.current_quantity;
		 
	 output +=` 
	 <div class="box-item w-100 p-2 my-1">
        <div class="box-product" style="position: relative;">
            <div class="d-flex product-item">
                <span class="thumb-nail w-20 p-2">
                     <img src="${urlserver + item.product_img}" alt="">
                </span>
                <div class="mg-l-2rem w-100">
                    <p class="fw-600 fz-15rem  my-3">${item.product_name}g</p>
                    <p class="fw-400 fz-15rem my-3">${item.product_code}</p>
                    <div class="amount w-30">
                        <button class="minus" onClick="min_cart(${item.id_product})"><img src="../public_customer/images/minus.png" alt=""></button>
                        <input type="number" min="1" value="${item.current_quantity}" id="unit_title_product${item.id_product}">
                        <button class="plus" onClick="max_cart(${item.id_product})"><img src="../public_customer/images/plus.png" alt=""></button>
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
                <span onclick="remove_cart(${item.id_product})" class="icon" style="position: absolute; top: 0;right: 0;"><img src="../public_customer/images/x-black.png" alt=""></span>
            </div>
        </div>
    </div>
		`;
	});
	$('#list_cart').html(output);

}	

function min_cart(id)
{
	if(current_quantity < 2)
	{

	}else{
		current_quantity -=1;
    	$('#unit_title_product'+id).val(current_quantity);
	}
    
}
function max_cart(id)
{
    current_quantity =Number(current_quantity)+1;
    $('#unit_title_product'+id).val(current_quantity);
}
function remove_cart(id)
{

		var response = JSON.parse(localStorage.getItem('cart'));
		var i = 0;
 		response.forEach(function(item) {
 			if (item.id_product == id) {
       	 		response.splice(i, 1);
       	 	}
        i++;
		});
	 	localStorage.setItem('cart', JSON.stringify(response));
	    show_cart();
	

	
}
function default_delivery()
{
	var response = JSON.parse(localStorage.getItem('account_customer'));
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
					<div class="d-flex justify-content-space-between">
                        <h1 class="fw-600 fz-1rem">Địa chỉ nhận hàng</h1>
                        <span onClick="show_modal_delivery(${item.id_delivery})" data-tag="a" type="choose_address_give_order" class="get_modal fw-400 t-green-main">Sửa</span>

                    </div>
                    <div class="p-4 box-address">
                        <p class="fw-600 fz-125rem">${item.delivery_company}</p>
                        <div class="item-content">
                            <p>
                                <span class="icon"><img src="../public_customer/images/detail_account_black.png" alt=""></span>
                                <span class="fw-600 fz-1rem">${item.delivery_deputy_person}</span>
                            </p>
                            <p>
                                <span class="icon"><img src="../public_customer/images/detail_phone_black.png" alt=""></span>
                                <span class="fw-600 fz-1rem">${item.delivery_deputy_phone}</span>
                            </p>
                            <p>
                                <span class="icon"><img src="../public_customer/images/detail_location_black.png" alt=""></span>
                                <span class="fw-600 fz-1rem">${item.delivery_address}</span>
                            </p>
                        </div>
                    </div>
	    			`;
		        }
			});
			$('#address_receive').html(output);
		}
    });

}

function show_modal_delivery(id)
{
	list_address_delivery_cart();
	$('#choose_address_give_order').show();
}

function list_address_delivery_cart()
{

	var response = JSON.parse(localStorage.getItem('account_customer'));
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
    var customer = JSON.parse(localStorage.getItem('account_customer'));
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
                <p class="fw-600 fz-125rem">${item.delivery_company}</p>
                <div class="item-content">
                    <p>
                        <span class="icon"><img src="../public_customer/images/detail_account_black.png" alt=""></span>
                        <span class="fw-600 fz-1rem">${item.delivery_deputy_person}</span>
                    </p>
                    <p>
                        <span class="icon"><img src="../public_customer/images/detail_phone_black.png" alt=""></span>
                        <span class="fw-600 fz-1rem">${item.delivery_deputy_phone}</span>
                    </p>
                    <p>
                        <span class="icon"><img src="../public_customer/images/detail_location_black.png" alt=""></span>
                        <span class="fw-600 fz-1rem">${item.delivery_address}</span>
                    </p>
                </div>
            </div>
            `;
            $('#address_receive').html(output);
        }
        
    });
}
function show_modal_address_shipping()
{
    $('#choose_address_shipping_order').show();
}