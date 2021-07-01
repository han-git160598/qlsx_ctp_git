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

var item = JSON.parse(localStorage.getItem('account_customer'));