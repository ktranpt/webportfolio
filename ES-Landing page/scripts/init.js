


jQuery(function () {


$(function() {
    $("#form_q").submit(function(e){
        e.stopPropagation();
        e.preventDefault();
        
        console.log('in');
        var s_name = $('#s_name').val();
        var s_email =  $('#s_email').val();
        var s_phone =  $('#s_phone').val();
        var selection = $('#selection').val();
        var s_note =  $('#s_note').val();
        var filter = /^[0-9-+]+$/;
        var s_prefer = "";
        //oninvalid="this.setCustomValidity('Invalid phone number')"  oninvalid="this.setCustomValidity('Invalid email')"
        document.getElementById("msg").innerHTML = "";
        var email_val = validate.single(s_email, {presence: true, email: true});

        errors = 0;
        var ss_email = document.getElementById("s_email");
        var ss_phone = document.getElementById("s_phone");

        ss_email.setCustomValidity("");
        ss_phone.setCustomValidity("");
        document.getElementById("msg1").innerHTML = "";

        if(ss_email.value == '' || email_val !== undefined){
            console.log('filter wrong')
            ss_email.setCustomValidity('Invalid email');
            errors++;
        }


        // if(email_val !== undefined ){
        //     document.getElementById("msg").innerHTML = email_val;
        //     document.getElementById("msg").style.color = '#FF0000';
        //     errors++;
        // } 
        
        if ($('input:radio', this).is(':checked') == false){
            document.getElementById("msg1").innerHTML = "Method required";
            document.getElementById("msg1").style.color = '#FF0000';
            errors++;
        }else{
            s_prefer = $("input[type=radio]:checked").val();
        }
        if (filter.test(s_phone) == false)
        {
            ss_phone.setCustomValidity('Invalid phone number');
            errors++;
        }
        if(errors === 0){
            $(".submit_button").val('')            
            $(".wait").show();
            $.ajax({
                url: "http://www.mwiseapps.com/esur/welcome/esur", // The URL of Codeigniter function
                type: 'POST',
                datatype: 'json',
                data : {"action": "esur_data_captute", "s_name":s_name, "s_email":s_email, "s_phone":s_phone, "selection" :selection, "s_note":s_note, "s_prefer" : s_prefer},
                success: function(data) {
                    document.getElementById("msg").style.color = '#FFF';
                    document.getElementById("msg").innerHTML = "Sent! Jim will contact you shortly."
                    $(".submit_button").val('SUBMIT')            
                    $(".wait").hide();
                    $("#form_q")[0].reset();

                }
            });

            
        }


    })  

})

});
