$(document).ready(function(){
list_category_machine()
list_machine()
list_product()
list_material()
})
current_quantity=0;
var id_category = 1;
var temp= id_category;
function list_category_machine()
{
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'machine_category_manager', type_manager:'list_category'},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            var output=``;
            var count=0;
            response.data.forEach(function(item){
                count++;
                if(item.id_category==id_category)
                {
                    output+=`
                    <li class="sub-item active">
                        <a onclick="list_production(${item.id_category})" data-toggle="tab" href="#tab-1" aria-expanded="true">${item.category_title}</a>
                    </li>
                `;
                }else{
                    output+=`
                    <li class="sub-item">
                        <a onclick="list_production(${item.id_category})" data-toggle="tab" href="#tab-1" aria-expanded="true">${item.category_title}</a>
                    </li>
                `;
                }
                
            })
            $('#tab_title_machine').html(output);
            list_production(id_category)

        }
    })
}

function list_production(id_category)
{    
    temp = id_category;
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_production',id_machine_category:id_category,limit:200},
        dataType: 'json',
        headers: headers,
        success: function(response) {
        	let output=``;
        	response.data.forEach(function(item){
        		output+=`
        		<tr data-id-customer="${item.id}" type="edit_production" class="click_doubble get_modal">
                    <td>${item.production_code}</td>
                    <td>${item.machine_title}</td>
                    <td>${item.week_title}</td>
                    <td>${item.production_begin_date}</td>
                    <td>${item.production_end_date}</td>
                    <td class="t-center py-1">
                        <button onclick="production_detail_href(${item.id})" class="btn btn-green btn-outline py-1 px-4">Chi tiết</button>
                    </td>
                    <td class="t-center py-1">
                        <button onclick="update_stauts_production(${item.id})" class="btn btn-green btn-outline py-1 px-4">Hoàn tất</button>
                    </td>
                </tr>`;
        	})
        	$('#list_may_mang').html(output);
        }
    })
}
function production_detail_href(id_production)
{
    sessionStorage.setItem('id_production', JSON.stringify(id_production));
    window.location = urlserver + 'list-production-detail';
}

function production_detail()
{
    var id_production = JSON.parse(sessionStorage.getItem('id_production'));
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_production',id_production:id_production},
        dataType: 'json',
        headers: headers,
        success: function(response) {
        $('#week_title').text(response.data[0].week_title)
        $('#production_code').text(response.data[0].production_code)
        $('#machine_title').text(response.data[0].machine_title)
        $('week_title').text(response.data[0].week_title)
        $('#datetodate').text('Từ ngày '+response.data[0].production_begin_date+' đến ngày '+response.data[0].production_end_date)
        let output=``;
        let count = 0;
        response.data[0].production_item.forEach(function(item){
        count++;
        if(count == 1)
        {
             output+=`
            <tr data-id-customer="1" type="info_order_history" class="click_doubble get_modal">
                <td>${item.production_date}</td>
                <td>${item.shift_time}</td>
                <td>api chưa có</td>
                <td>${item.product.product_packet_title}</td>
                <td>${item.product.product_unit_packet} ${item.product.product_unit_title}/${item.product.product_packet_title}</td>
                <td>${item.product.product_name}</td>
                <td>${item.product.product_quantity}</td>
                <td rowspan="7" class="align-middle">
                    CHẠY MẪU THỬ R460
                </td>
            </tr>
            `;

        }else{
             output+=`
            <tr data-id-customer="1" type="info_order_history" class="click_doubble get_modal">
                <td>${item.production_date}</td>
                <td>${item.shift_time}</td>
                <td>api chưa có</td>
                <td>${item.product.product_packet_title}</td>
                <td>${item.product.product_unit_packet} ${item.product.product_unit_title}/${item.product.product_packet_title}</td>
                <td>${item.product.product_name}</td>
                <td>${item.product.product_quantity}</td>
            </tr>
            `;
        } 
       
        })
        $('#production_detail').html(output);   
        }
    })
}
function update_stauts_production(id_production)
{
    var r = confirm('Bạn có muốn hoàn tất lệnh sản xuấy này')
    if(r==true)
    {
        $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'production_manager',type_manager:'update_production',id_production:id_production
        ,production_status:'Y'
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if(response.success=='true')
            {
                alert(response.message);
                list_production(temp); 
            }else{
                 alert(response.message);
            }
            
        }
        });
    }
    
}



//////////////////////////////TẠO LỆNH SẢN XUẤT ///////////////////////////////////////

function list_machine()
{
     $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'get_machine_list'},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            let output=``;
            response.data.forEach(function(item){
            output+=`
                <option value="${item.id_machine}">${item.machine_title}</option>
            `;
            })
            $('#machine_name').html(output);
        }
    })

}
function formatDay(timestamp) {
    var date = new Date(timestamp);
    var month = date.getMonth()+1;
    var year = date.getFullYear();
    var day = date.getDate();
    return year+'-'+month+'-'+day;
}
function daysof_theweek(current_day)
{
    var date = new Date(current_day);
 
    // Lấy số thứ tự của ngày hiện tại
    var current_day = date.getDay();
    switch (current_day) {
    case 0:
        day_name = "Chủ nhật";
        break;
    case 1:
        day_name = "Thứ hai";
        break;
    case 2:
        day_name = "Thứ ba";
        break;
    case 3:
        day_name = "Thứ tư";
        break;
    case 4:
        day_name = "Thứ năm";
        break;
    case 5:
        day_name = "Thứ sau";
        break;
    case 6:
        day_name = "Thứ bảy";
    }
    return day_name;
}
function list_date()
{
    let from_date= moment($('#from_date').val())
    let to_date = moment($('#to_date').val())
    let datetodate = $('#datetodate').val()

    if(from_date > to_date)
    {
        alert('Ngày bắt đầu phải nhỏ hơn ngày kết thúc')
    }else{  
        let output=``;
        let from_date_timestamp  = new Date($('#from_date').val()).getTime();
        let temp = from_date_timestamp;
        let numDays = to_date.diff(from_date, 'days');
        for (var i = 0; i <= numDays; i++) {
            if(i==0)
            {
                output+=`<option value="${formatDay(temp)}">${daysof_theweek(formatDay(temp))} ${formatDay(temp)}</option>`
            }else{
                temp += 86400000
                output+=`<option value="${formatDay(temp)}">${daysof_theweek(formatDay(temp))} ${formatDay(temp)}</option>`
            }
           
            
        }
        $('#datetodate').html(output)    
    }
}
function list_product()
{
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'product_manager', type_manager:'list_product'},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            let output=``;
            response.data.forEach(function(item){
            output +=`<option value="${item.id_product}">${item.product_code}</option>`
            })
            $('#choose_prd').html(output)
        }
    })

}
$('#choose_prd').change(function(){
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'product_manager', type_manager:'list_product'
        ,id_product:$('#choose_prd').val()
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            $('#dvt_product').text(response.data[0].product_packet_title)
            let a = response.data[0].product_unit_packet + response.data[0].product_unit_title +'/'+  response.data[0].product_packet_title
            $('#qc_product').text(a)

        }
    })
});
function list_material()
{
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'material_manager', type_manager:'list_material'},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            let output=``;
            response.data.forEach(function(item){
            output +=`<option value="${item.id}">${item.material_code}</option>`
            })
            $('#choose_nvl').html(output)
            
        }
    })
}
$('#choose_nvl').change(function(){
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'material_manager', type_manager:'list_material'
        ,id_material:$('#id_material').val()
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            $('#unit_material').html(response.data[0].unit)
        }
    })
});


var list_product_material=[];
$('#save_product_material').click(function(){

    var production_date = $('#datetodate').val();
    var shift_time = $('#ca_name').val()
    var id_product =$('#choose_prd').val()
    var product_quantity = $('#nums_product').val()
    var id_material= $('#choose_nvl').val()
    var material_quantity = $('#nums_material').val()
    if(production_date == 1 || production_date == null)
    {
        return;
    }
    let i = 0
    if(list_product_material == '')
    {
        list_product_material.push({'production_date':production_date,'shift_time':shift_time
        ,'id_product':id_product,'product_quantity':product_quantity
        ,'id_material':id_material, 'material_quantity':material_quantity })
    }
    let flag = 0;
    let k;
    list_product_material.forEach(function(item)
    {   
        if(item.production_date == production_date)
        {  
            flag = 1 ;
            k=i
        }
        i++
    })
    if(flag == 1)
    {
       
        list_product_material[k] =  {'production_date':production_date,'shift_time':shift_time
        ,'id_product':id_product,'product_quantity':product_quantity
        ,'id_material':id_material, 'material_quantity':material_quantity }
        alert('Cập nhật cho ngày '+ production_date + ' thành công')
    }else{
        list_product_material.push({'production_date':production_date,'shift_time':shift_time
        ,'id_product':id_product,'product_quantity':product_quantity
        ,'id_material':id_material, 'material_quantity':material_quantity })
        alert('Đặt lịch cho ngày '+production_date+ ' thành công')
    }
    console.log(list_product_material)
}) 


function create_production()
{
 
    let id_machine = $('#machine_name').val()
    console.log(id_machine)
    let week_title = $('#week_title').val()
    let production_begin_date = $('#from_date').val()
    let production_end_date = $('#to_date').val()
    let production_note = $('#production_note').val()
    let id_admin = 1
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'production_manager', type_manager:'create_production'
        ,list_product_material:JSON.stringify(list_product_material)
        ,week_title:week_title,production_note:production_note
        ,production_begin_date:production_begin_date,production_end_date:production_end_date
        ,id_admin:id_admin,id_machine:id_machine
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if(response.message=='true')
            {
                list_production(id_machine)
                $('#add_module').hide()
                list_product_material=[]
                // $('#add_module').clear()
                alert(response.message)
            }else{
                alert(response.message)
            }
            
        }
    })
}