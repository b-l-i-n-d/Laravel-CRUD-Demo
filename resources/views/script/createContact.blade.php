<script>
    $(function () {
        var email_error = true;
        $("#createContact").validate({
            rules: {
                'firstName': 'required',
                'lastName': 'required',
                'email': {
                    required: true,
                    email: true,
                },
                'country_id': 'required'
            }
        });

        $('#email').keyup( function (event) {
            // event.preventDefault();
            var email = $('#email').val();
            var _token= $("input[name='_token']").val();
            console.log(email_error);
            $.ajax({
                url: "{{ route('validate-email') }}",
                data: {
                    email: email,
                    _token : _token
                },
                type: 'POST',
                success: function(data) {
                    console.log(data);
                    if (!email) {
                        console.log('if');
                        $("#create-email-error").html(
                            '<small class="text-danger" style="display: block">Please enter a email</small>'
                        );
                        email_error =  true;
                    } else if (!($.isEmptyObject(data.error))) {
                        console.log('else if');

                        $("#create-email-error").html(
                            '<small class="text-danger">This email already exist</small>'
                        );
                        $("#create-email-error").css('display', 'block');
                        console.log("after else if");
                        email_error =  true;
                    } else if (data.success === true) {
                        console.log("else hide");
                        $("#create-email-error").css("display", "none");
                        email_error = false;
                    }
                    else {
                        email_error =  false;
                    }
                },
            });
        });

        $("#create-contact-button").on('click', function (event) {
            event.preventDefault();
            var firstName = $('#firstName').val();
            var lastName = $('#lastName').val();
            var email = $('#email').val();
            var country_id = $('#country_id').val();
            var _token= $("input[name='_token']").val();

            if ($("#createContact").valid() && email_error === false) {
                console.log("valid");
                // console.log(valid_email);
                $.ajax({
                    url: "{{route('save-contact')}}",
                    data: {
                        firstName: firstName,
                        lastName: lastName,
                        email: email,
                        country_id: country_id,
                        _token: _token
                    },
                    type: 'POST',
                    // cache: false,
                    success: function (dataStatus) {
                        console.log(dataStatus);
                        // var dataResult = JSON.parse(dataStatus);
                        if (dataStatus.statusCode == 200) {
                            console.log("200");
                            alert("Contact saved");
                        } else if (dataStatus.statusCode == 201){
                            console.log("Error");
                            alert("Error encountered");
                        }
                    }


                })
            }
        })
        // console.log()
    });
</script>
