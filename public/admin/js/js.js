function validate() {
var u = document.getElementById("username").value;
var p1 = document.getElementById("password").value;
var p2 = document.getElementById("password-repeat").value;
var p3 = document.getElementById("email").value;
  
if(u== "") {
alert("Vui lòng nhập tên!");
return false;
}
if(p1 == "") {
alert("Vui lòng nhập mật khẩu!");
return false;
}
if(p2 == "") {
alert("Vui lòng xác minh mật khẩu!");
return false;
}
if(p3 == "") {
alert("Vui lòng điền email!");
return false;
}
alert("Xin hãy điền đúng thông tin!")
  
return true;
}