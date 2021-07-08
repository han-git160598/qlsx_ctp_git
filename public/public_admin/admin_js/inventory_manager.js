 $(document).ready(function(){
	list_product_inventory(info_type);
       list_material_inventory(info_type)
 })
var info_type = 'stock';
////////////////////// LIST_PRODUCT /////////////////////////////////
 function product_stock(item)
 {
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
 function product_import(item)
 {
       let output =`
       <tr ondblclick="detail_product_inventory(${item.id},'import')" data-id-customer="${item.id}">
        <td>${item.production_import_code}</td>
        <td>${item.import_date}</td>
        <td>${item.production_code}</td>
        <td>${item.machine_title}</td>
        <td>áds</td>
       </tr>`;
    return output;
 }
 function product_export(item)
 {
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
              ,detail:'Y'
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
       $('#note').text('item.machine_title')
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
 

 //////////////////////////////// NGUYÊN VẬT LIỆU ////////////////////////////////////
function list_material_inventory(info_type)
 {
       $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'get_storeage_info',info_type:info_type, item_type: 'material'
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
                            output +=material_stock(item)
                            })
                            $('#material_stock').html(output);  
                            break;
                     }
                     case 'import':
                     {
                            response.data.forEach(function(item){
                            output +=material_import(item)
                            })
                            $('#material_import').html(output);
                             break;
                     }
                     case 'export':
                     {
                            response.data.forEach(function(item){
                            output +=material_export(item)
                            })
                            $('#material_export').html(output); 
                             break;
                     }
              }
        }
    })
 }
 function material_stock(item)
 {
       let output =`
       <tr data-id-customer="${item.id_material}" type="info_order_history" class="click_doubble get_modal">
        <td>${item.material_code}</td>
        <td>${item.first_period_quantity}</td>
        <td>${item.import_quantity}</td>
        <td>${item.export_quantity}</td>
        <td>${item.last_period_quantity}</td>
        <td>${item.unit_title}</td>
       </tr>`; 
              
    return output;
 }
 function material_import(item)
 {
       let output =`
       <tr ondblclick="detail_material_inventory(${item.id},'import')" data-id-customer="${item.id}" type="info_NVL_import" class="click_doubble get_modal">
        <td>${item.storage_import_code}</td>
        <td>${item.import_date}</td>
        <td>${item.supplier_code}</td>
        <td>${item.storage_import_note}</td>
       </tr>`;
    return output;
 }
 function material_export(item)
 {
       let output =`
       <tr ondblclick="detail_material_inventory(${item.id},'export')" data-id-customer="${item.id}" type="info_NVL_export" class="click_doubble get_modal">
       <td>${item.storage_export_code}</td>
       <td>${item.export_date}</td>
       <td>${item.production_code}</td>
       <td>${item.production_code}</td>
       </tr>`;
    return output;
 }
 ////////////////////////////// DETAIL_MARTERIAL //////////////////////////////
function detail_material_inventory(id,type) {

       $.ajax({
              url: urlapi,
              method: 'POST',
              data: { detect: 'get_storeage_info',info_type:type, item_type: 'material'
              ,detail:'Y'
              },
              dataType: 'json',
              headers: headers,
              success: function(response) {
                     let item = response.data[0]
                     let output=``;
                     if(type == 'import')
                     {
                           output+=detail_material_import(item); 
                           $('#info_NVL_import').show();
                     }else{
                            output+=detail_material_export(item);
                            $('#info_NVL_export').show();
                     }
              
              }
       })
      
 }
  function detail_material_import(item)
 {
       $('#material_import_tr1').text(item.storage_import_code)
       $('#material_import_tr12').text(item.import_date)
       $('#material_import_tr123').text(item.supplier_code)
       $('#material_import_note').text(item.storage_import_note)
       let output=``;
       item.material_item.forEach(function(data)
       {
              output+=`
              <div class="bg-white py-2 px-3 my-1">
                <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                    <strong>'data.product_name'</strong>
                    <p class="mt-2">${data.material_code}</p>
                    <p class="mt-2">x${data.import_quantity}</p>
                </div>
                <div class="d-flex py-2 align-item-center">
                    <span class="fz-075rem t-lable mr-3">Đơn vị tính:</span>
                    <span>${data.unit_title}</span>
                </div>
              </div>`;
       })
       $('#list_material_import').html(output);
 }
 function detail_material_export(item)
 {
       $('#material_export_tr1').text(item.storage_export_code)
       $('#material_export_tr12').text(item.export_date)
       $('#material_export_tr123').text(item.production_code)
       $('#material_export_note').text('item')
       let output=``;

       item.material_item.forEach(function(data)
       {
              output+=`
              <div class="bg-white py-2 px-3 my-1">
                <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                    <strong>data.product_name</strong>
                    <p class="mt-2">${data.material_code}</p>
                    <p class="mt-2">x ${data.export_quantity}</p>
                </div> 
                <div class="d-flex py-2 align-item-center">
                    <span class="fz-075rem t-lable mr-3">Đơn vị tính:</span>
                    <span>${data.unit_title}</span>
                </div>
              </div>
              `;
       })
       $('#list_material_export').html(output);
 }