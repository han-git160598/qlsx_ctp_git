 $(document).ready(function(){
   list_material_inventory(info_type)
   list_supplier(id='')
   list_material(id='')
 })
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
              ,detail:'Y', id_storage:id
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
function detail_material_import(item){
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
///////////////////// Quản lý kho /////////////////////////////
var count_div = 0;
function list_material(id = '',count_div = 0)
{
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'get_material_list',id_material:id},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            let output=``;
            response.data.forEach(function(item){
                if(id=='')
                {
                    output+=`<option value="${item.id}">${item.material_code}</option>`
                }else{
                    $('#unit_title'+count_div).text(item.unit_title);
                }
            })
             if (id=='') {
              $('#list_material0').html(output)
            }  
        }
    })
}
function list_material_result(handleData)
{   
    var output=`123`;
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'get_material_list'},
        dataType: 'json',
        headers: headers,
        success: function(response) { 
            handleData(response); 
        }
    })

    
}
function list_supplier()
{

    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'get_supplier_list'},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            let output=`<option value="">Chọn mã cung ứng</option>`;
            response.data.forEach(function(item){
                output+=`<option value="${item.id}">${item.supplier_code}</option>`
            })
            $('#list_supplier').html(output)
        }
    })
}

function add_div_NVL()
{
    list_material_result(function(response){
    count_div++;
    let output =`
    <div class="bg-F6 py-2 px-3">
        <select name="unit" id="list_material${count_div}" onchange="list_material($('#list_material${count_div}').val(),${count_div})">`;
        response.data.forEach(function(item){
        output+=`<option value="${item.id}">${item.material_code}</option>`;
        })
        output+=`
        </select>
        <div class="bg-white py-2 px-3 my-1">
            <div class="d-flex py-2 align-item-center">
                <span class="fz-100rem t-lable mr-3">DVT :</span>
                <span id="unit_title${count_div}"></span>
            </div>
             <div class="d-flex py-2 align-item-center">
                <span class="fz-100rem t-lable mr-3">Số lượng:</span>
                <span><input type="number" min="1" value="1" class="form-input w-40 py-1 px-2" id="current_quantity${count_div}"></span>
            </div>
        </div>
    </div>`
    $('#list_material_div').append(output);
     });
}

function create_material_import()
{
    var list_item=[]
    for(var i = 0; i<=count_div;i++)
    {
        list_item.push({'id':$('#list_material'+i).val() , 'quantity':$('#current_quantity'+i).val() })
    }
    console.log({ detect: 'storage_manager',info_type:'import',item_type:'material'
        ,list_item:JSON.stringify(list_item)
        ,note:$('#note_material_import').val()
        ,id_supplier:$('#list_supplier').val()
        })
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'storage_manager',type_manager:'create_storage',
        info_type:'import',item_type:'material'
        ,list_item:JSON.stringify(list_item)
        ,note:$('#note_material_import').val()
        ,id_supplier:$('#list_supplier').val()
        },
        dataType: 'json',   
        headers: headers,
        success: function(response) {
            if(response.success=='true')
            {   
                list_material_inventory('import')
                $('#add_material_import').hide()
                alert(response.message)
            }else{
                alert(response.message)
            }
            
            
        }
    })
}