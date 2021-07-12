$(document).ready(function(){
list_category_machine()
})
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
        data: { detect: 'list_production',id_machine_category:id_category},
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
                <td>${item.product_packet_title}</td>
                <td>${item.product_unit_packet} ${item.product_unit_title}/${item.product_packet_title}</td>
                <td>${item.product_name}</td>
                <td>${item.product_quantity}</td>
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
                <td>${item.product_packet_title}</td>
                <td>${item.product_unit_packet} ${item.product_unit_title}/${item.product_packet_title}</td>
                <td>${item.product_name}</td>
                <td>${item.product_quantity}</td>
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
    console.log(id_production)
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'production_manager',type_manager:'update_production',id_production:id_production
        ,production_status:'Y'
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            console.log(response)
            alert(response.message);
            list_production(temp);
        }
    });
}