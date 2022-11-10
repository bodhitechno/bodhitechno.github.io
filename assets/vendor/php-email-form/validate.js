/**
* PHP Email Form Validation - v3.2
* URL: https://bootstrapmade.com/php-email-form/
* Author: BootstrapMade.com
*/


$(document).ready(function() {

  var form = $('#sendMessageForm'),
      email = $('#email'),
      subject = $('#subject'),
      message = $('#message'),
      info = $('#info'),
      loader = $('#loader'),
      submit = $("#submitSendMsg");
  
 
  submit.click(function(e) {
    e.preventDefault();
    if(validate()) {

      info.html('Loading...').css('color', 'red').slideDown();

      $.ajax({
        type: "POST",
        url: "mailer.php",
        data: form.serialize(),
        success:function(data) {
         response=jQuery.parseJSON(data);
        if(response.success) {
          form[0].reset();
          info.html('Message sent!').css('color', 'green').slideDown();
        } else {
          info.html('Could not send mail! Sorry!').css('color', 'red').slideDown();
        }
      }

      });
    }
  });
  
  function validate() {
    var valid = true;
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    if(!regex.test(email.val())) {
      email.css('border-color', 'red');
      valid = false;
    }
    if($.trim(subject.val()) === "") {
      subject.css('border-color', 'red');
      valid = false;
    }
    if($.trim(message.val()) === "") {
      message.css('border-color', 'red');
      valid = false;
    }
    
    return valid;
  }

});