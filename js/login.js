function validate(){
  var name = document.getElementById("name").value;
  var password = document.getElementById("password").value;
  var error_message = document.getElementById("error_message");

  error_message.style.padding = "10px";


  var text;
  if(name.length < 5){
    text = "Please Enter valid Username";
    error_message.innerHTML = text;
    return false;
  }
  if(password.length < 8){
    text = "Please Enter Correct Password";
    error_message.innerHTML = text;
    return false;
  }
  alert("Form Submitted Successfully!");
  return true;
}
