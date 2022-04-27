
$(function() {
  $("form[name='register']").validate({
    
    rules: {
      name: "required",
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 6
      }
    },
    messages: {
      name: "Please enter your name",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters long"
      },
      email: "Please enter email address"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });

  $("form[name='login']").validate({
    
    rules: {
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 6
      }
    },
    messages: {
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters long"
      },
      email: "Please enter email address"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});