//Sticky navbar
$(window).bind('scroll', function() {
    var wScroll = $(this).scrollTop();

        if (wScroll > 10) {
            $('nav').addClass('fixed');
        }
        else {
            $('nav').removeClass('fixed');
        }
        if (wScroll <= $('.header').height()) {
  
            $('.newblog').css({
              'transform' : 'translate(0px, '+ wScroll/2 +'%)'
            });
          }      
    });

  
    //contact form
    $("#submit").click(function() {
    var gender =  $("input[name='gender']:checked").val();
    var name = $("#name").val();
    var email = $("#email").val();
    var message = $("#message").val();
    $("#statusmessage").empty(); 
    if (gender == '' || name == '' || email == '' || message == '') {
        alert("Please fill all the fields");
    } else {
        $.post("contact_form.php", {
            gender1: gender,
            name1: name,
            email1: email,
            message1: message,
        }, function(data) {
            $("#statusmessage").append(data);
            if (data == "Anfrage erhalten.") {
                $("#form")[0].reset(); 
            }
        });
    }
});
