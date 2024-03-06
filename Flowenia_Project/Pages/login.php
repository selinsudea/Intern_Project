


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <header class="main-header">
      <a href="#" id="main-header__logo">Flowenia</a>
      <nav class="main-nav">
        <ul class="main-nav__items">
          <li class="main-nav__item">
            <a href="nav_page.html">Home</a>
          </li>
          
          <li class="main-nav__item">
            <a href="sign_in.php">Sign in</a>
          </li>
        </ul>
      </nav>
    </header>
    <main>
      <div id="login_div">
        <form action="home.php" method="POST">
          <h2 id="h2_login">Login</h2>
          <ul id="login_ul">
            <li>
              <label for="username_lc">Username:</label>
              <input type="text" name="username_l" id="username_lc" />
            </li>
            <li>
              <label for="password_lc">Password:</label>
              <input type="password" name="password_l" id="password_lc" />
            </li>
            <li>
              <input type="checkbox" name="" id="show_password"  />
              <label for="show_password" id="password_l" onclick="showPassword()">Show Password</label>
              <!-- <a href="#" id="forget_password">Forget Password</a> -->
            </li>
            <button type="submit" id="b_login"  class="btn btn-info" >Login</button>
            <!-- <input type="button" id="button_login" value="Login" /> -->
            <li>
              <label for="new_account" id="new_accountl"
                >Don't have an account?</label
              >
              <a href="sign_in.php" id="create_account"
                >Create an account</a
              >
            </li>
          </ul>
        </form>
      </div>
    </main>
    <script>
    function showPassword() {
    var passwordField = document.getElementById("password_lc");
    if (passwordField.type === "password") {
      passwordField.type = "text";
    } else {
      passwordField.type = "password";
    }
  }
  </script>
  </body>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
