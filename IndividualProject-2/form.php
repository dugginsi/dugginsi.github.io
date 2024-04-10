<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>dugginsi login page</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Login Form
            </div>
            <div class="title signup">
               Signup Form
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="index.php" method="POST" class="login">
                  <div class="field">
                     <input type="text" placeholder="Email or Username" required name="username">
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Password" required name="password">
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Login">
                  </div>
                  <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
               </form>
               <form action="addnewuser.php" class="signup">
                  <div class="field">
                     <input type="text" name="username" placeholder="Enter Your Username" required pattern="\w+"
                    title="Please enter a valid username"
                    onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" />
                  </div>
                  <div class="field">
                     <input type="text" name="email" required pattern="[\w.-]+@[\w-]+(\.[\w-]+)*$"
                     title="Please enter a valid email" placeholder="Your email address"
                     onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" />
                  </div>
                  <div class="field">
                     <input type="password" name="password" required
                     pattern="^(?=.[a-z])(?=.[A-Z])(?=.[0-9])(?=.[!@#$%^&])[\w!@#$%^&]{8,}$"
                     placeholder="Your password"
                     title="Password must have at least 8 characters with 1 special symbol !@#$%^& 1 number, 1 lowercase, and 1 UPPERCASE"
                     onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : ''); this.form.repassword.pattern = this.value;" />
                  </div>
                  <div class="field">
                     <input type="password" name="repassword" class="text_field" placeholder="Retype your password" required
                     title="Password does not match"
                     onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" />
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Signup">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>