const urlapi = "https://ctp.nongtrangviet.com/api/";


//const urlserver = "https://ctp.nongtrangviet.com/";
const urlserver = "http://127.0.0.1:8000/";
const headers = "";
function order_status(status)
{
    let status_text = '';
    switch(status)
    {
        case '1':
            status_text = 'CHỜ XÁC NHẬN';
            break;
        case '2':
            status_text =  'ĐANG XỬ LÝ';
            break;
        case '3':
            status_text= 'GIAO HÀNG';
            break;
        case '4':
            status_text = 'THANH TOÁN';
            break;
        case '5':
            status_text = 'HOÀN TẤT';
            break;
        case '6':
            status_text = 'HỦY ĐƠN';
            break;
    }
    return status_text;
}
function shipping_status1(status)
{
    let shipping_status = '';
    switch(status)
    {
        case '1':
            shipping_status = 'KHỞI TẠO';
            break;
        case '2':
            shipping_status = 'HOÀN TẤT';
            break;
        case '3':
            status_text = 'HỦY ĐƠN';
            break;
    }
    return shipping_status;
}


var current_quantity=0;
function decrease(key)
{
    current_quantity = $('#nums_'+key).val();
    if(current_quantity < 2)
    {

    }else{
        current_quantity -=1;
        $('#nums_'+key).val(current_quantity);
    }
}
function increase(key)
{
    current_quantity = $('#nums_'+key).val();
    current_quantity1 =Number(current_quantity)+1;
    $('#nums_'+key).val(current_quantity1);
}
var item = JSON.parse(localStorage.getItem('account_customer'));