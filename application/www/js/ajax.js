function isAvailableQuery() {
    const MAX_BOOKING_TABLE = 2;

console.log($("#bookingDate").val() == '');
if ($("#bookingDate").val() != "" &&  $("#bookingHour").val() != "") {

        $.ajax({
            url: "http://localhost/cletusResto/resto_3wa/www/index.php/booking/availableHours" ,
            method: "POST",
            data: {
                    bookingDate: $("#bookingDate").val(),
                    bookingHour: $("#bookingHour").val()
                  },
            dataType: "json"
        }).done(function (data){
            // data = JSON.parse(data);
            console.log("success");
            console.log(data.bookingCount);
            if (data.bookingCount >= MAX_BOOKING_TABLE) {
                $("#alertMessage").text("Non disponible");
            }

        }).fail(function(error){
            console.log("error");
            console.log(error);
        });

    }
}
