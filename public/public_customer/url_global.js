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