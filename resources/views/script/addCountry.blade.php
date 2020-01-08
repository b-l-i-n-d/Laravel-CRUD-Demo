<script>
    $(
        function () {
            $("#addCountry").validate({
                rules: {
                    'countryName': 'required'
                }
            })
        }
    )
</script>
