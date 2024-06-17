<?php

include("./common/header.php");


if(isset($_SESSION['logged_in'])){
    header("Location:./dashboard.php");
}
?>
<div class="form-body">
<?php
        if(isset($_GET['error_message'])){ ?>
              <div class="alert-message">
                <?php echo $_GET['error_message'] ?>
              </div>
              
        <?php } ?>
    <form class="form-div" id="form" method="post" action="process/login_process.php">
        <h1>Login Form</h1>
        <div class="inner-div">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" />
        </div>
        <div class="inner-div">
            <label for="password">Password</label>
            <input type="text" name="password" id="password" />
        </div>
        <button type="submit" name="form_submit">Submit</button>
        <div>
            <h4 id="message" style="color: red;"></h4>
        </div>
        <div>
        Don't Have an Account ? <a href="./signup.php">Sign Up</a>
    </div>
    </form>
  
</div>


<script>
    var message = document.getElementById("message")
    var username = document.getElementById("username")
    var email = document.getElementById("email")
    var password = document.getElementById("password")


    email.addEventListener("change", (e) => {

        var value = e.target.value
        if (
            !value.match(
                /^[a-zA-Z]+[a-zA-Z0-9]*(?:\W[a-zA-Z0-9])*[\w\W]*\@[a-zA-Z]{2,8}\.[a-zA-Z]{2,3}$/
            )
        ) {
            message.textContent = "Not a valid Email"
        } else {
            message.textContent = ""
        }
    })

    password.addEventListener('change', (e) => {
        var value = e.target.value
        if (!value.match(/([a-zA-Z0-9](?=\W)*){5,}/)) {
            message.textContent = "Password must be at least 5 character"
        } else {
            message.textContent = ""
        }
    })
</script>
</body>

</html>