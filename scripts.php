<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script type="text/javascript">
    var selected = "Coimbatore";
    var cities = [
    "Coimbatore","Chennai","Trichy","Madurai","Salem","Erode","Vellore","Thanjavur",
    "Kancheepuram","Kumbakonam","Ambur","Bengaluru","Mangaluru","Shivamogga","Tumakuru",
    "Kalaburagi","Ballari","Udupi","Dharwad","Karwar","Madikeri","Mysore",
    ];
    cities.sort()

    $.each(cities, function(key, value) {   
        $('#fromLocations').append($("<option></option>")
                        .attr("value", value)
                        .text(value));
    });

    $('#fromLocations').on('change',function(){
    $('#toLocations').empty()
        var selected = $('#fromLocations').find(":selected").text();
        var filteredArr = cities.filter( n => n != selected)
        $.each(filteredArr, function(key, value) {   
        $('#toLocations').append($("<option></option>")
                            .attr("value", value)
                            .text(value));
    });
    });
</script>