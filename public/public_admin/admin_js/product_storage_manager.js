 $(document).ready(function(){
	list_product_inventory(info_type);
    list_production()
    list_ship()
 })
var info_type = 'stock';
////////////////////// LIST_PRODUCT /////////////////////////////////
 function product_stock(item){
       let output =`
     
        <tr  data-id-customer="${item.id_storage}" type="info_order_history" class="click_doubble get_modal">
        <td>${item.product_code}</td>
        <td>${item.first_period_quantity}</td>
        <td>${item.import_quantity}</td>
        <td>${item.export_quantity}</td>
        <td>${item.last_period_quantity}</td>
        <td>${item.unit_title}</td>
       </tr>`; 
              
    return output;
 }
 function product_import(item){

       let output =`
       <tr ondblclick="detail_product_inventory(${item.id},'import')" data-id-customer="${item.id}">
        <td>${item.production_import_code}</td>
        <td>${item.import_date}</td>
        <td>${item.production_code}</td>
        <td>${item.machine_title}</td>
        <td>${item.import_note}</td>
       </tr>`;
    return output;
 }
 function product_export(item){
       let output =`
       <tr ondblclick="detail_product_inventory(${item.id},'export')" data-id-customer="${item.id}"  >
       <td>${item.storage_export_code}</td>
       <td>${item.export_date}</td>
       <td>${item.customer_code}</td>
       <td>${item.shipping_code}</td>
       <td>${item.export_note}</td>
       </tr>`;
    return output;
 }
function list_product_inventory(info_type)
 {
 	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'get_storeage_info',info_type:info_type, item_type: 'product'
        ,detail:'Y'
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
              let output=``;
              switch(info_type)
              {
                     case 'stock':
                     {
                            response.data.forEach(function(item){
                            output +=product_stock(item)
                            })
                            $('#product_stock').html(output);  
                            break;
                     }
                     case 'import':
                     {
                            response.data.forEach(function(item){
                            output +=product_import(item)
                            })
                            $('#product_import').html(output);
                             break;
                     }
                     case 'export':
                     {
                            response.data.forEach(function(item){
                            output +=product_export(item)
                            })
                            $('#product_export').html(output); 
                             break;
                     }
              }
        }
    })
 }
  ///////////////////// DETAIL_PRODUCT //////////////////////////////////////////
 function detail_product_inventory(id,type) {

       $.ajax({
              url: urlapi,
              method: 'POST',
              data: { detect: 'get_storeage_info',info_type:type, item_type: 'product'
              ,detail:'Y', id_storage:id
              },
              dataType: 'json',
              headers: headers,
              success: function(response) {
                
                     let item = response.data[0]
                     let output=``;
                     if(type == 'import')
                     {
                           output+=detail_product_import(item); 
                           $('#info_product_import').show();
                     }else{
                            output+=detail_product_export(item);
                            $('#info_product_export').show();
                     }
              
              }
       })
      
 }
 function detail_product_import(item)
 {
       $('#tr1').text(item.production_import_code)
       $('#tr12').text(item.import_date)
       $('#tr123').text(item.production_code)
       $('#tr1234').text(item.machine_title)
       $('#note').text(item.import_note)
       let output=``;
       item.product_item.forEach(function(data)
       {
              output+=`
              <div class="bg-white py-2 px-3 my-1">
                <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                    <strong>${data.product_name}</strong>
                    <p class="mt-2">${data.product_code}</p>
                    <p class="mt-2">x${data.import_quantity}</p>
                </div>
                <div class="d-flex py-2 align-item-center">
                    <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                    <span>${data.product_unit_title}</span>
                </div>
                <div class="d-flex py-2 align-item-center">
                    <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
                    <span>${data.product_packet_title}</span>
                </div>
                <div class="d-flex py-2 align-item-center">
                    <span class="fz-075rem t-lable mr-3">Quy cách đóng:</span>
                    <span>${data.product_unit_packet} ${data.product_unit_title}/${data.product_packet_title}</span>
                </div>
              </div>`;
       })
       $('#list_product_import').html(output);
 }
 function detail_product_export(item)
 {
       $('#export_tr1').text(item.storage_export_code)
       $('#export_tr12').text(item.export_date)
       $('#export_tr123').text(item.customer_code)
       $('#export_tr1234').text(item.shipping_code)
       $('#export_note').text(item.export_note)
       let output=``;

       item.product_item.forEach(function(data)
       {
              output+=`
              <div class="bg-white py-2 px-3 my-1">
                <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                    <strong>${data.product_name}</strong>
                    <p class="mt-2">${data.product_code}</p>
                    <p class="mt-2">x ${data.export_quantity}</p>
                </div> 
                <div class="d-flex py-2 align-item-center">
                    <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                    <span>${data.product_unit_title}</span>
                </div>
                <div class="d-flex py-2 align-item-center">
                    <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
                    <span>${data.product_packet_title}</span>
                </div>
                <div class="d-flex py-2 align-item-center">
                    <span class="fz-075rem t-lable mr-3">Quy cách đóng:</span>
                    <span>${data.product_unit_packet} ${data.product_unit_title}/${data.product_packet_title}</span>
                </div>
              </div>`;
       })
       $('#list_product_export').html(output);
 }
 


function export_excel_product(type_export){
    var JSONData = [];
    var title;
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'get_storeage_info',info_type:type_export, item_type: 'product'
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            switch(type_export)
              {
                 case 'stock':
                 {
                        title ='THANH PHAM - XUAT NHAP TON'
                        response.data.forEach(function(item)
                        {
                            JSONData.push(product_stock_excel(item))
                        })  
                        break;
                 }
                 case 'import':
                 {      
                        title ='THANH PHAM - NHAP KHO'
                        response.data.forEach(function(item)
                        {
                            JSONData.push(product_import_excel(item))
                        })  
                        break;
                 }
                 case 'export':
                 {
                        title ='THANH PHAM - XUAT KHO'
                        response.data.forEach(function(item)
                        {
                            JSONData.push(product_export_excel(item))
                        })  
                        break;
                 }
              }
              
            JSONToCSVConvertor(JSONData,title,true)
        }
    })
}
function product_stock_excel(item) {
   let data = 
    {'Ma hang' : item.product_code,'Ton dau ky' :item.first_period_quantity
    ,'Nhap' :item.import_quantity, 'Xuat' :item.export_quantity
    ,'Ton cuoi ky' :item.last_period_quantity,'Don vi tinh' :item.unit_title
    }
    return data;
}
function product_import_excel(item) {
   let data = 
    {'Phieu nhap' : item.production_import_code,'Ngay nhap' :item.import_date
    ,'Lenh san xuat' :item.production_code, 'Bo phan' :item.machine_title
    ,'Ghi chu' :'item.last_period_quantity'  
    }
    return data;
}
function product_export_excel(item) {
   let data = 
    {'Phieu xuat' : item.storage_export_code,'Ngay xuat' :item.export_date
    ,'Ma khachh hang' :item.customer_code, 'Ma van chuyen' :item.shipping_code
    ,'Ghi chu' :item.export_note}
    return data;
}

/////////////////// Nhân viên KHooooooooooooo........................
function list_production(id_production ='')
{    
    list_item= [];
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_production',id_production:id_production},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            let output=``;
            let product=``;
            response.data.forEach(function(item){
            if(id_production == '')
            {
                output+=`<option value="${item.id}">${item.production_code}</option>`;
            }
                response.data[0].production_item.forEach(function(item1){
                    product+=`
                    <div class="bg-white py-2 px-3 my-1">
                        <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                            <strong>${item1.product.product_name}</strong>
                            <p class="mt-2">${item1.product.product_code}</p>
                            <p class="mt-2">Số lượng :</p>
                            <span class="fz-075rem t-lable mr-3"><input onchange="list_item1(${item1.product.id_product})" id="${item1.product.id_product}" type="number" value="1" min="1" class="form-input w-20 py-1 px-2"></span>
                            <span>${item1.product.product_packet_title}</span>
                        </div>
                        <div class="d-flex py-2 align-item-center">
                            <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                            <span>${item1.product.product_unit_title}</span>
                        </div>
                         <div class="d-flex py-2 align-item-center">
                            <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
                            <span>${item1.product.product_packet_title}</span>
                        </div>
                         <div class="d-flex py-2 align-item-center">
                            <span class="fz-075rem t-lable mr-3">Quy cách đóng:</span>
                            <span>${item1.product.product_unit_packet} ${item1.product.product_unit_title}/${item1.product. product_packet_title} </span>
                        </div>
                    </div>
                    `;})
            })
            if (id_production=='') {
             $('#list_production').html(output);
            }
            
            $('#list_product_import_detail').html(product);
        }
    })
}
var list_item= [];
function list_item1(id_product) {

    let item = {"id":String(id_product),"quantity":$('#'+id_product).val()}
    list_item.push(item)
    const key = 'id';
    list_item = [...new Map(list_item.map(item => [item[key], item])).values()]
    
}
function create_product_import()
{
    if(list_item=='')
    {
        alert('Vui bạn chưa chọn LSX')
    }else{

    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'storage_manager',type_manager:'create_storage'
        ,info_type:'import' , item_type:'product'
        ,list_item: JSON.stringify(list_item)
        ,note:$('#note_product_import').val()
        ,id_production:$('#list_production').val()
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if(response.success=='true')
            {
                alert(response.message)
                list_product_inventory('import');
                $('#add_product_import').hide()
            }else{
                alert(response.message)
            }
        }
    })
    }

}

var list_item_export=[]
function list_ship(id_shipping='')
{
    
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_ship',id_shipping:id_shipping
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            let output=``;
            let product=``;
            response.data.forEach(function(item) {
            list_item_export=[]
            if(id_shipping == '')
            {
                output+=`<option value="${item.id_shipping}">${item.shipping_code}</option>`;
            }else{
                response.data[0].order_detail[0].order_item_product.forEach(function(item1){
                    list_item_export.push({"id":item1.id_product,'quantity':item1.product_quantity_packet})
                    product+=`
                    <div class="bg-white py-2 px-3 my-1">
                        <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                            <strong>${item1.product_name}</strong>
                            <p class="mt-2">${item1.product_code}</p>
                            <p class="mt-2">x ${item1.product_quantity_packet}</p>
                        </div>
                        <div class="d-flex py-2 align-item-center">
                            <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                            <span>${item1.product_unit_title}</span>
                        </div>
                         <div class="d-flex py-2 align-item-center">
                            <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
                            <span>${item1.product_packet_title}</span>
                        </div>
                         <div class="d-flex py-2 align-item-center">
                            <span class="fz-075rem t-lable mr-3">Quy cách đóng:</span>
                            <span>${item1.product_unit_packet} ${item1.product_unit_title}/${item1. product_packet_title} </span>
                        </div>
                    </div>
                    `;})
            }

            })
            if (id_shipping=='') {
             $('#list_ship').html(output)
            }
            
            $('#list_product_export_detail').html(product)
        }
    })
}
function create_product_export() {

    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'storage_manager',type_manager:'create_storage'
        ,info_type:'export' , item_type:'product'
        ,note:$('#note_product_export').val()
        ,list_item:JSON.stringify(list_item_export)
        ,id_shipping:$('#list_ship').val()
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if(response.success=='true')
            {
                alert(response.message)
                list_product_inventory('export');
                $('#add_product_export').hide()
            }else{
                alert(response.message)
            }
        }
    })
}

 