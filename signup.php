<?php

include("./common/header.php")


?>
<div class="form-body">
  <?php
  if (isset($_GET['error_message'])) { ?>
    <div class="alert-message">
      <?php echo $_GET['error_message'] ?>
    </div>

  <?php } ?>

  <form class="form-div" id="form" method="POST" action="process/signup_process.php" >
    <h1>SignUp User</h1>
    <div class="inner-div">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" onkeypress=" checkUserName(event)" />
      <p id="userError" class="errormessage" style="color: red;"></p>
    </div>
    <div class="inner-div">
      <label for="email">Email</label>
      <input type="text" name="email" id="email" onkeypress=" checkEmail(event)" />
      <p id="emailError" class="errormessage" style="color: red;"></p>
    </div>
    <div class="inner-div">
      <label for="email">Contact No</label>
      <input type="text" name="number" id="number" onkeypress=" checkContactNumber(event)" />
      <p id="contactError" class="errormessage" style="color: red;"></p>
    </div>
    <div class="inner-div">
      <label for="address">Address</label>
      <input type="text" name="address" id="address" onkeypress=" checkAddress(event)" />
      <p id="addressError" class="errormessage" style="color: red;"></p>
    </div>
    <div class="inner-div">
      <label for="password">Password</label>
      <input type="text" name="password" id="password" onkeypress=" checkPassword(event)" />
      <p id="passwordError" class="errormessage" style="color: red;"></p>
    </div>
    <div class="inner-div">
      <label for="password">Confirm Password</label>
      <input type="text" name="cpassword" id="cpassword" onkeypress=" checkConfirmPassword(event)" />
      <p id="cpasswordError" class="errormessage" style="color: red;"></p>
    </div>

    <button type="submit" name="form_submit">Submit</button>

    <div>
      Already Have an Account ? <a href="./login.php">Login</a>
    </div>
  </form>

</div>


<script>
  var error = document.getElementsByClassName("errormessage")
  var username = document.getElementById("username");
  var email = document.getElementById("email")
  var password = document.getElementById("password")
  var cpassword = document.getElementById("cpassword")
  var contactno = document.getElementById("number")


  const checkUserName = (e) => {

    var value = e.target.value;
    if (value.length < 5) {
      error['userError'].innerText = "Length must be at least 5 characters"
    } else {
      error['userError'].innerText = ""
    }
  }

  const checkEmail = (e) => {
    var value = e.target.value
    if (
      !value.match(
        /^[a-zA-Z]+[a-zA-Z0-9]*(?:\W[a-zA-Z0-9])*[\w\W]*\@[a-zA-Z]{2,8}\.[a-zA-Z]{2,3}$/
      )
    ) {
      error['emailError'].textContent = "Not a valid Email"
    } else {
      error['emailError'].textContent = ""
      var xml = new XMLHttpRequest();
      
      xml.onreadystatechange = () => {

        if (this.readyState == 4 && this.status == 200) {
          
          error['emailError'].textContent = `${this.responseText}`;
        }
      }
      xml.open("GET", "./process/checkUniqueUser.php?email=" + value, true);
      xml.send();
    }

  }
  const checkPassword = (e) => {
    var value = e.target.value
    if (!value.match(/([a-zA-Z0-9](?=\W)*){5,}/)) {
      error['passwordError'].textContent = "Password must be at least 5 character"
    } else {
      error['passwordError'].textContent = ""
    }
  }
  const checkConfirmPassword = (e) => {
    var value = e.target.value
    if (value !== password.value) {
      error['cpasswordError'].textContent = "Password did not matched"
    } else {
      error['cpasswordError'].textContent = ""
    }
  }

  const checkContactNumber = (e) => {

    var value = e.target.value;
    if (!value.match(/(?=98|97[\d]).{10}/)) {
      error['contactError'].textContent = "Not a valid Number";
    } else {
      error['contactError'].textContent = ""
    }

  }

  const checkAddress = (e) => {
    var value = e.target.value;
    if (value.length < 5) {
      error['addressError'].innerText = "Address must be at least 5 characters"
    } else {
      error['addressError'].innerText = ""
    }
  }
</script>
</body>

</html>