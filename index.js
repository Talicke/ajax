function showData(randomNumber)
{
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: {
            action: "showData",
            number: randomNumber
        },
        dataType: "json",
        success: function (response) {
            $('#message').html(response.message + " " +  "Number : " + response.number);
        },
        error: function (response){
            console.log("ERROR")
        },
        complete: function(response){
            console.log('Complete')
        },
    });
}