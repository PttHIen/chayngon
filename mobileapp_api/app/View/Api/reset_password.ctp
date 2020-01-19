
                    <div id="password-success" class="alert alert-success vd_hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Your reset password has been changed </div>
          
                  

                    <form class="form-horizontal" role="form" name='myForm'  id="forget-password-form" action="" novalidate="novalidate">
                        <div class="alert tw alert-danger vd_hidden">
                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                            <strong>Oh Snap!</strong> Please enter your password twice. 
                        </div>
                        <div class="alert least alert-danger vd_hidden">
                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                            <strong>Oh Snap!</strong> Your password must be at least 6 characters long. Try again.
                        </div>
                        <div class="alert re-enter alert-danger vd_hidden">
                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                            <strong>Oh Snap!</strong> You did not enter the same new password twice. Please re-enter your password.
                        </div>
                        <div class="alert sorry alert-danger vd_hidden">
                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>
                            <strong>Oh Snap!</strong> Sorry, spaces are not allowed.
                        </div>
                        <div class="alert success alert-success vd_hidden">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                            <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span> 
                            Your password has been updated
                        </div>
                        <div class="form-group mgbt-xs-20">
                            <div class="col-md-12">
                                <p class="text-center"><strong>Enter your secure password.</strong> </p>
                                <div class="vd_input-wrapper" id="email-input-wrapper">
                                    <span class="menu-icon">
                                    <i class="fa fa-lock" style="color: #4097D4;"></i>
                                    </span>
                                    <input type="password" placeholder="Password" id="pass" name="pass" class="required">
                                      <?php if(isset($_GET["email"])){?>

                          

                        <input type="hidden" id="email" name="email" value="<?php  echo $_GET["email"]; ?>">
                    <?php } ?>
                                </div>
                                <div class="vd_input-wrapper" id="email-input-wrapper">
                                    <span class="menu-icon">
                                    <i class="fa fa-lock" style="color: #4097D4;"></i>
                                    </span>
                                    <input type="password" placeholder="Confirm Password" id="cpass" name="cpass" class="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="submit-password-wrapper">
                            <div class="col-md-12 text-center mgbt-xs-5">
                                <button class="btn vd_bg-green vd_white width-100" type="submit" id="submit-password" name="submit-password">Submit</button>   
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

         <script type="text/javascript" src="<?php echo BASE_URL ?>app/webroot/css/jquery.js"></script> 
        <script type="text/javascript">
            //function validatePwd() {
         $( "#submit-password" ).click(function( event ) {

               event.preventDefault();
                var invalid = " "; // Invalid character is a space
                var minLength = 6; // Minimum length
                var pw1 = document.myForm.pass.value;
                var pw2 = document.myForm.cpass.value;
                var email = document.myForm.email.value;
                // check for a value in both fields.
                if (pw1 == '' || pw2 == '') {
                    //alert('Please enter your password twice.');
                    $('.tw').fadeIn('slow');
                    $('.tw').fadeOut(4000);
                    return false;
                }
                // check for minimum length
                if (document.myForm.pass.value.length < minLength) {
                    //alert('Your password must be at least ' + minLength + ' characters long. Try again.');
                    $('.least').fadeIn('slow');
                    $('.least').fadeOut(4000);
                    return false;
                }
                // check for spaces
                if (document.myForm.pass.value.indexOf(invalid) > -1) {
                    //alert("Sorry, spaces are not allowed.");
                    $('.space').fadeIn('slow');
                    $('.space').fadeOut(4000);
                    return false;
                }
                else {
                    if (pw1 != pw2) {
                        //alert ("You did not enter the same new password twice. Please re-enter your password.");
                        $('.re-enter').fadeIn('slow');
                        $('.re-enter').fadeOut(4000);
                        return false;
                    }
                    else {

                   var form_data = {
             
             pw1: pw1,
             pw2:pw2,
             email:email,
                
            
        };


                       $.ajax({
            type:"POST",
            data:form_data,
            
            url:"http://54.174.109.228/preplyst/api/save_new_password",
            
            success : function(data) {
       
          if(data=="success"){
             $('.success').fadeIn('slow');
             $('.success').fadeOut(4000);
           
     return false;
    }else{

return false;
        
    }                 

  
           
           },
            error : function() {
               $("#internet").fadeIn(500).delay(2000).fadeOut(1000); 
               return false;
            }
        });

                        //alert('Your password has been matched and successfully saved.');
                       
                    }
                }
            });
        </script>
    </body>
</html>
       