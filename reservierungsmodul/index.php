<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reservierungsmodul</title>

        <link rel="stylesheet" href="../resources/css/hotel.css"/>
    </head>

        
    <body>
        <div class="wrapper">
            <div class="home-btn">&#x21b5; <a href="../">Home</a></div>
            <h1>Reservierungsmodul</h1>
            
            <div>
                <label for="reservierungen">Reservierungen</label>
                <select id="reservierungen"></select>
            </div>

        </div>

        <script>
            document.addEventListener("DOMContentLoaded", async() => {
                const reservierungenSelect = document.getElementById("reservierungen");
                //load reservations
                let result = await fetch("../api/getReservations.php");
                result = await result.json();

                for (let reservartion of result) {
                    const option = document.createElement("option");
                    option.textContent = JSON.stringify(reservartion);
                    reservierungenSelect.add(option);
                }
                
            });
        </script>

    </body>
</html>
