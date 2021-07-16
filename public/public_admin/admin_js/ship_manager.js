$(document).ready(function(){

})
function list_ship()
{
	$.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_ship', page: page
        ,filter:search,date_begin:date_begin, date_end:date_end
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
        	let output=``;
	        response.data.forEach(function(item) {
	        	output+=`
				<tr data-id-customer="1" type="info_init" class="click_doubble get_modal">
			        <td>VC7161638</td>
			        <td>KH1234567</td>
			        <td>MDH879879</td>
			        <td>
			            <span class="rounder">
			                QTR365
			            </span>
			            <span class="rounder">
			                +2
			            </span>
			        </td>
			        <td>2021-05-21</td>
			    </tr>
				`;
	        }
	        $('#list_ship').html(output)
	    })

	
}