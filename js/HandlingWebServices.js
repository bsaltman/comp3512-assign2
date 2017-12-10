$(function(){
    $.get("service-topCountries.php", function(data, status){
        for(var i = 0; i < data.length; i++)
        $("#analyticsCountrySelect").append("<option value="+data[i].code +">" + data[i].name+ "</option>");
    })
    
    $.get("service-totals.php", function(data, status){
        $("#ToDos").append("<span class='analyticNumber'>"+data['numToDos']+"</span>");
        $("#Messages").append("<span class='analyticNumber'>"+data['numMessages']+"</span>");
        $("#Countries").append("<span class='analyticNumber'>"+data['uniqueCountries']+"</span>");
        $("#totalVisits").append("<span class='analyticNumber'>"+data['totalVisits']+"</span>");
    })
    
    $.get("service-topAdoptedBooks.php", function(data, status){
        for(var i = 0; i < data.length; i++){

        var tablerow = "<tr><td><a href=/single-book.php?ISBN10="+data[i].ISBN10+"><img src='/book-images/thumb/"+data[i].ISBN10+".jpg'></a></td><td><a href=/single-book.php?ISBN10="+data[i].ISBN10+">"+data[i].Title+"</a></td><td>"+data[i].Quantity+"</td></tr>";
         $("#adoptionTable").append(tablerow);
        }
    })
    
    $("#analyticsCountrySelect").change(function(e){
        
        $.get("service-CountryVists.php?CountryCode=" + $("#analyticsCountrySelect").val(), function(data, status){

            $("#selectedCountryName").html("<h2>"+data.name+" </h2>");
            $("#selectedVisits").html("<h2>"+data.quantity +" Vistors</h2>");
    })
    })

})
