<script>

    function getLgaByStateId() {
        var url = '/Lga/get/' + $('#state').val();
        console.log(url);
        $.ajax({
            url: url,
            success: function (response) {
                var query = response;
                $('#lga')
                        .find('option')
                        .remove()
                        .end()
                            .append('<option value="">Select Area.</option>')
                        .val('');
                $.each(JSON.parse(query), function(key, value) {
                    $('#lga')
                            .append($("<option></option>")
                                    .attr("value",value['sub_state_name'])
                                    .text(value['sub_state_name']));
                });
            },
            error: function (xhr) {
                console.log('error');
            }
        });


    }

    $( "#state" ).change(function() {
       getLgaByStateId();
    });


</script>
