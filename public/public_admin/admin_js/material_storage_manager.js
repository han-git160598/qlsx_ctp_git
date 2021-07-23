 $(document).ready(function(){
   list_material_inventory(info_type)
   list_supplier(id='')
   list_material(id='')
   list_production_material(id_production='')
 })
 function material_stock(item)
 {
       $('#filter_date').hide()
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
       <td>${item.export_note}</td>
       </tr>`;
    return output;
 }
function list_material_inventory(info_type,date_begin='',date_end='',filter='')
 {  
        if(date_begin =='' && date_end =='')
        {
            $('#filter_date').show()
            let filter=`
            <div class="form-edit-row m-0 mx-1">
            </div>
            <div class="form-edit-row m-0">
                <input onchange="list_product_inventory('${info_type}',$('#date_begin').val(),$('#date_end').val())" id="date_begin" type="date" class="form-input py-1 px-2">
            </div>
            <div class="form-edit-row m-0 mx-1">
                <p>Đến</p>
            </div>
            <div class="form-edit-row m-0 mx-1">
                <input onchange="list_product_inventory('${info_type}',$('#date_begin').val(),$('#date_end').val())" id="date_end" type="date" class="form-input py-1 px-2">
            </div>`
            $('#filter_date').html(filter)
        }
       $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'get_storeage_info',info_type:info_type, item_type: 'material'
        ,detail:'Y',date_begin:date_begin, date_end:date_end, filter:filter
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
       { console.log(data)
              output+=`
              <div class="bg-white py-2 px-3 my-1">
                <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                   <strong>${data.material_name}</strong>
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
       $('#material_export_note').text(item.export_note)
       let output=``;

       item.material_item.forEach(function(data)
       {
       
              output+=`
              <div class="bg-white py-2 px-3 my-1">
                <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                    <strong>${data.material_name}</strong>
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
//////////////////////////////////// QUẢN LÝ KHO  ///////////////////////////////////////////////
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
    <div class="box bg-F6" style="position: relative;" id="remove${count_div}">
        <i class="fas fa-times-circle" onClick="remove_material_div(${count_div})" style="position:absolute;top:.5rem; right:.5rem; cursor:pointer;"></i>
        <div class="form-edit p-3">
            <div class="form-edit-row-flex">
                <div class="form-box-flex w-100">
                    <select name="unit" id="list_material${count_div}" onchange="list_material($('#list_material${count_div}').val(),${count_div})">`;
                        response.data.forEach(function(item){
                        output+=`<option value="${item.id}">${item.material_code}</option>`;
                        })
                    output+=`
                    </select>
                </div>
            </div>
        </div>

        <div class="t-left px-3">
            <p class="my-2">ĐVT: <strong id="unit_title${count_div}""></strong></p>
            <p class="my-2">Số lượng:<strong><input type="number" min="1" value="1" class="form-input w-40 py-1 px-2" id="current_quantity${count_div}"></strong></p>
        </div>
    </div>
    `
    $('#list_material_div').append(output);
    });


}
function remove_material_div(id)
{
    $('#remove'+id).remove()
}
function checkbox_material_import()
{
    if($('#checkbox_material_import').prop('checked') == true){
        $('#list_supplier').attr("disabled", true);
    }else{
        $('#list_supplier').attr("disabled", false);
        list_supplier()
    }
}
function create_material_import()
{
    var list_item_material_import=[]
    for(var i = 0; i<=count_div;i++)
    {
        list_item_material_import.push({'id':$('#list_material'+i).val() , 'quantity':$('#current_quantity'+i).val() })
    }
    var id_supplier = $('#list_supplier').val()
    if($('#checkbox_material_import').prop('checked') == true){
        id_supplier=''
    }
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'storage_manager',type_manager:'create_storage',
        info_type:'import',item_type:'material'
        ,list_item:JSON.stringify(list_item_material_import)
        ,note:$('#note_material_import').val()
        ,id_supplier:id_supplier
        },
        dataType: 'json',   
        headers: headers,
        success: function(response) {
            if(response.success=='true')
            {   
                for(var i = 1; i<=count_div;i++)
                {
                    $('#remove'+i).remove()
                }
                $('#note_material_import').val('')
                list_item_material_import=[]
                list_material_inventory('import')
                $('#add_material_import').hide()
                alert(response.message)
            }else{
                alert(response.message)
            }
            
            
        }
    })
}

var list_item_material_export=[]
function list_production_material(id_production ='')
{    
    list_item_material_export=[]
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_production',id_production:id_production,limit:200},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            let output=``;
            let material=``;
            response.data.forEach(function(item){
            if(id_production == '')
            {
                output+=`<option value="${item.id}">${item.production_code}</option>`;
            }
                response.data[0].production_item.forEach(function(item1){
            list_item_material_export.push({"id":item1.material.id_material,'quantity':item1.material.material_quantity})
                    material+=`
                    <div class="bg-white py-2 px-3 my-1">
                        <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                            <strong>${item1.material.material_name}</strong>
                            <p class="mt-2">${item1.material.material_code}</p>
                            <p class="mt-2">x ${item1.material.material_quantity}</p>
                        </div>
                        <div class="d-flex py-2 align-item-center">
                            <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                            <span>${item1.material.unit_title}</span>
                        </div>
                    </div>
                    `;})
            })
            if (id_production=='') {
             $('#list_production_material').html(output);
            }
            $('#list_material_export_detail').html(material);
        }
    })
}
function create_material_export() {
console.log({ detect: 'storage_manager',type_manager:'create_storage',
        info_type:'export',item_type:'material'
        ,list_item:JSON.stringify(list_item_material_export)
        ,note:$('#note_material_exprot').val()
        ,id_supplier:$('#list_production_material').val()
        })
   $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'storage_manager',type_manager:'create_storage',
        info_type:'export',item_type:'material'
        ,list_item:JSON.stringify(list_item_material_export)
        ,note:$('#note_material_exprot').val()
        ,id_production:$('#list_production_material').val()
        },
        dataType: 'json',   
        headers: headers,
        success: function(response) {
            if(response.success=='true')
            {   
                $('#note_material_export').val('')
                list_item_material_export=[]
                list_material_inventory('export')
                $('#add_material_export').hide()
                alert(response.message)
            }else{
                alert(response.message)
            }
            
            
        }
    })
}

