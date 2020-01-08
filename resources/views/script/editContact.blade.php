<script>
    $(function () {
        $("#editContact").validate({
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

        $('#update-email').keyup( function (event) {
            var email = $('#update-email').val();
            var _token= $("input[name='_token']").val();
            // alert('dddddddd')
            $.ajax({
                url: "{{ route('validate-email') }}",
                data: {
                    email: email,
                    _token : _token
                },
                type: 'POST',
                success: function(data) {
                    console.log(data);
                    // alert();
                    if (!email) {
                        console.log("if")
                        $("#update-email-error").html(
                            '<small class="text-danger" style="display: block">Please enter a email</small>'
                        )
                    }
                    else if (!$.isEmptyObject(data.error)){
                        console.log("else if");
                        $("#update-email-error").html(
                            '<small class="text-danger" style="display: block">This email already exist</small>'
                        );
                        $("#update-email-error").css("display", 'block');
                        console.log("after else if");
                    }
                    else if (data.success === true) {
                        console.log("else hide");
                        $("#update-email-error").css("display", "none");
                    }
                },
            });
        });
    });
</script>
