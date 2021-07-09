 $(document).ready(function(){
	list_product_inventory(info_type);
       list_material_inventory(info_type)
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
        <td>áds</td>
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
////////////////////////////////// EXCEL //////////////////////////////////////////////////////
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

 function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) {
  //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
  var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;

  var CSV = '';
  //Set Report title in first row or line

  CSV += ReportTitle + '\r\n\n';

  //This condition will generate the Label/Header
  if (ShowLabel) {
    var row = "";

    //This loop will extract the label from 1st index of on array
    for (var index in arrData[0]) {

      //Now convert each value to string and comma-seprated
      row += index + ',';
    }

    row = row.slice(0, -1);

    //append Label row with line break
    CSV += row + '\r\n';
  }

  //1st loop is to extract each row
  for (var i = 0; i < arrData.length; i++) {
    var row = "";

    //2nd loop will extract each column and convert it in string comma-seprated
    for (var index in arrData[i]) {
      row += '"' + arrData[i][index] + '",';
    }

    row.slice(0, row.length - 1);

    //add a line break after each row
    CSV += row + '\r\n';
  }

  if (CSV == '') {
    alert("Invalid data");
    return;
  }

  //Generate a file name
  var fileName = "";
  //this will remove the blank-spaces from the title and replace it with an underscore
  fileName += ReportTitle.replace(/ /g, "_");

  //Initialize file format you want csv or xls
  var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);

  // Now the little tricky part.
  // you can use either>> window.open(uri);
  // but this will not work in some browsers
  // or you will not get the correct file extension    

  //this trick will generate a temp <a /> tag
  var link = document.createElement("a");
  link.href = uri;

  //set the visibility hidden so it will not effect on your web-layout
  link.style = "visibility:hidden";
  link.download = fileName + ".csv";

  //this part will append the anchor tag and remove it after automatic click
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}
////////////////////////////// NGUYEN VAT LIEU /////////////////////////////////////////

function export_excel_material(type_export){
    var JSONData = [];
    var title;
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'get_storeage_info',info_type:type_export, item_type: 'material'
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            switch(type_export)
              {
                 case 'stock':
                 {
                        title ='NGUYEN VAT LIEU - XUAT NHAP TON'
                        response.data.forEach(function(item)
                        {
                            JSONData.push(material_stock_excel(item))
                        })  
                        break;
                 }
                 case 'import':
                 {      
                        title ='NGUYEN VAT LIEU - NHAP NVL'
                        response.data.forEach(function(item)
                        {
                            JSONData.push(material_import_excel(item))
                        })  
                        break;
                 }
                 case 'export':
                 {
                        title ='NGUYEN VAT LIEU - XUAT NVL'
                        response.data.forEach(function(item)
                        {
                            JSONData.push(material_export_excel(item))
                        })  
                        break;
                 }
              }
              
            JSONToCSVConvertor(JSONData,title,true)
        }
    })
}
function material_stock_excel(item) {
   let data = 
    {'Ma NVL' : item.material_code,'Ton dau ky' :item.first_period_quantity
    ,'Nhap NVL' :item.import_quantity, 'Xuat NVL' :item.export_quantity
    ,'Ton cuoi ky' :item.last_period_quantity,'Don vi tinh' :item.unit_title
    }
    return data;
}
function material_import_excel(item) {
   let data = 
    {'Phieu nhap' : item.storage_import_code,'Ngay nhap' :item.import_date
    ,'Ma cung ung' :item.supplier_code,'Ghi chu' :item.storage_import_note 
    }
    return data;
}
function material_export_excel(item) {
   let data = 
    {'Phieu xuat' : item.storage_export_code,'Ngay xuat' :item.export_date
    ,'Ma san xuat' :item.production_code, 'Ghi chu' :item.production_code}
    return data;
}