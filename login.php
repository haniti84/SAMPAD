<?php
 //print_r($_SESSION);
if (isLoggedIn()) {
  redirect("student/panel");
  die();
}
else{
 
require_once APPROOT . '/views/inc/header.php';

require_once APPROOT . '/libraries/Captcha.php';
 
//echo 'kk'.c.'<br>';
?>

<script>
  /*function refreshCaptcha($builder) {
    var captchaImg = document.getElementById("captcha-img");
    captchaImg.src =  
  }*/

</script>
<div class="container">
  <section id="content">
    <img class="sampad-logo" src="<?php echo URLROOT ?>img/Login/sampad_logo.png">
    <form name="loginform" id="loginform" method="POST" action="<?php echo URLROOT; ?>Users/login">
      <h1>برای شرکت در نظرسنجی وارد شوید</h1>
      <div>
        <input type="text" placeholder="کد ملی" id="UserName" name="UserName"
          oninput="valid(this.id, 'UserName-error');" />
        <div id="UserName-error" class="error">
          <?php echo (!empty($data['UserName-error'])) ? $data['UserName-error'] : ''; ?>
        </div>

      </div>

      <div>
        <input type="password" placeholder="رمز عبور" id="password" name="password"
          oninput="valid(this.id, 'password-error');" />
        <div id="password-error" class="error" <?php echo (!empty($data['password-error'])) ? $data['password-error'] : ''; ?>></div>

      </div>
      <div id="General-error" class="error"></div>
      <div class="user_type" id="user_type" name="user_type">
        <label>نوع ورود خود را مشخص کنید :</label>
        <div class="tooc_select">
          <select name="user_type" id="userType">
            <option name="student">دانش آموز</option>
            <option name="HeadMaster">مدیر مدرسه</option>
            <option name="office">اداره</option>
          </select>
          <div class="tooc_arrow"></div>
        </div>


      </div>
      <div class="captcha">
     
        <?php echo $img;?>
        
        <input type="text" placeholder="کد امنیتی" id="captcha" name="captcha"
          oninput="valid(this.id, 'captcha-error');" />
        <input name="Phrase" hidden value="<?php echo $phrase; ?> "></input>
      </div>
      <div id="captcha-error" class="error">
        <?php echo (!empty($data['captcha-error'])) ? $data['captcha-error'] : ''; ?>
      </div>

      <div class="forget_password">
        <a href="#">فراموشی رمز عبور</a>

      </div>
      <div>
        <button onlick="OnSubmitAct()">
          <a >ورود</a>

        </button>
      </div>
    </form>


  </section>



</div>

<script>


 

  function OnSubmitAct() {
    
   
    const idInput1 = ["UserName", "password", "captcha"];
    const HandleError1 = ["UserName-error", "password-error", "captcha-error"];
    let message = "";
    for (let idInput of idInput1) {
      const HandleError = HandleError1[idInput1.indexOf(idInput)];

      const val = document.getElementById(idInput).value;

      if (idInput === "UserName" && isNaN(val)) {
        message = "فقط عدد استفاده نمایید!";
      } else if (val.length === 0 && idInput === "UserName") {
        message = "کدملی نمی تواند خالی باشد!";
      } else if (val.length !== 10 && idInput === "UserName") {
        message = "کد ملی 10 رقم است !!";
      } else if (val.length === 10 && idInput === "UserName") {
        message = "";
      }
      else if (val.length === 0 && idInput === "password")
        message = "رمز عبور نمی تواند خالی باشد!";

      else if (val.length === 0 && idInput === "captcha")
        message = "کد امنیتی را وارد نمایید!";

      if (message !== "") {
        document.getElementById(HandleError).innerHTML = message;
        document.getElementById(HandleError).style.color = "red";
        document.getElementById(HandleError).style.fontSize = "13px";
        document.getElementById(HandleError).style.textAlign = "right";
        document.getElementById(HandleError).style.paddingRight = "55px";
        document.getElementById(idInput).style.border = "1px solid rgb(255, 0, 13)";
        document.getElementById("UserName").focus();
        event.preventDefault();
        return false;
      } else {
        document.getElementById(HandleError).innerHTML = message;
        if (val === "") {
          document.getElementById(idInput).style.border = "1px solid rgb(140, 141, 157)";
        } else {
          document.getElementById(idInput).style.border = "1px solid #11cb30";
        }
      }

      /////------------------------------------------------------------------------------------


    }


  }


</script>


<?php
require_once APPROOT . '/views/inc/footer.php';
}
?>