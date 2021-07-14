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
var item = JSON.parse(localStorage.getItem('account_customer'));