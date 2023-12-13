<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rechnungsmodul</title>

        <link rel="stylesheet" href="../resources/css/hotel.css"/>
    </head>

        
    <body>
        <div class="wrapper">
            <div class="home-btn">&#x21b5; <a href="../">Home</a></div>
            <h1>Rechnungsmodul</h1>

            <div>
                <label for="rechnungen">Rechnungen</label>
                <select id="rechnungen"></select>
            </div>
            TODO
        <div>

        <script>
            document.addEventListener("DOMContentLoaded", async() => {
                const reservierungenSelect = document.getElementById("rechnungen");
                //load invoices
                let result = await fetch("../api/getRechnungen.php");
                result = await result.json();

                for (let rechnung of result) {
                    const option = document.createElement("option");
                    option.textContent = JSON.stringify(rechnung);
                    reservierungenSelect.add(option);
                }
                
            });
        </script>
    </body>
</html>
