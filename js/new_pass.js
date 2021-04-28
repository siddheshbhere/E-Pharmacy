function validate(){
  var password = document.getElementById("password").value;
  var cpassword = document.getElementById("cpassword").value;
  var error_message = document.getElementById("error_message");

  error_message.style.padding = "10px";

  var text;

  if(password.length < 8){
    text = "Please Enter Correct Password";
    error_message.innerHTML = text;
    return false;
  }
  if(cpassword.length <  8){
    text = "Please Enter Correct Password";
    error_message.innerHTML = text;
    return false;
  }
  if(cpassword != password)
  {
    text = "Confirm password is not equal to password";
    error_message.innerHTML = text;
    return false;
  }
  alert("Form Submitted Successfully!");
  return true;
}
