function printpage(tableid){ 
var table= document.getElementById(tableid);
  var html = table.outerHTML;
  window.open('data:application/vnd.ms-excel;base64,' + base64_encode(html));
}