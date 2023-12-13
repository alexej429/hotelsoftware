<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Umwelt</title>
        
        <link rel="stylesheet" href="../resources/css/hotel.css"/>


    </head>
    <body>
        <div class="wrapper" style="background-image: url(hotel-6862159_1920.jpg)">
            <div class="home-btn">&#x21b5; <a href="../">Home</a></div>
            <h1 >Umweltdatenmodul</h1>

            <div>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore 
                et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. 
                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, 
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea 
                takimata sanctus est Lorem ipsum dolor sit amet.
            </div>
            
            <div>
                <h1>Wellness Bereich</h1>
                <div>Wassertemperatur: <span id="temperature"></span>°C &#x1F321;&#xFE0F;</div>
                <div>Luftfeuchtigkeit: <span id="humidity"></span>% &#x1F4A7;</div>

                <br>

                <div>
                    <label for="change-temperature">Wassertemperatur ändern</label>
                    <input id="change-temperature"/>
                    <button id="change-temp">OK</button>
                </div>

                <div>
                    <label for="change-humidity">Luftfeuchtigkeit ändern</label>
                    <input id="change-humidity"/>
                    <button id="change-hum">OK</button>
                </div>
            </div>

            <div>
                <h1>Umweltdaten 2022</h1>
                <div>&#x2601;&#xFE0F; 70% weniger CO2 pro Gast</div>
                <div><span>&#x1F30A;<span> 55% weniger Wasser pro Gast</div>
                <div>&#x1F6AE; 50% weniger Abfall pro Gast</div>
                <div>&#x26A1; 66% weniger Energie pro Gast</div>
                <div>&#x1F333; 30.101 Bäume in Afrika gepflanzt</div>
                <div>&#x1F41D; 250.000 m<sup>2</sup> Fläche renaturiert</div>
            </div>
        </div>
        
        <script>
            document.addEventListener("DOMContentLoaded", async() => {
                //gui elements
                const tempInput = document.getElementById("change-temperature");
                const humidityInput = document.getElementById("change-humidity");
                const changeTempBtn = document.getElementById("change-temp");
                const changeHumidityBtn = document.getElementById("change-hum");

                
                //load spa data from server
                loadSPAdataFromServer();

                changeTempBtn.onclick = async () => {
                    const formData = new FormData();
                    const data = {
                        temperature: tempInput.value,
                    }
                    formData.append("data", JSON.stringify(data));
                    await fetch("../api/changeWaterTemp.php", {
                        method: "POST",
                        body: formData
                    });
                    tempInput.value = "";
                    //reload data from server
                    await loadSPAdataFromServer();
                }
                changeHumidityBtn.onclick = async () => {
                    const formData = new FormData();
                    const data = {
                        humidity: humidityInput.value,
                    }
                    formData.append("data", JSON.stringify(data));
                    await fetch("../api/changeHumidity.php", {
                        method: "POST",
                        body: formData
                    });
                    //clear input
                    humidityInput.value = "";
                    //reload data from server
                    await loadSPAdataFromServer();
                }

            });
            
            async function loadSPAdataFromServer() {
                let spaData = await fetch("../api/getSPA.php");
                spaData = await spaData.json();
                document.getElementById("temperature").textContent = spaData["water_temperature"];
                document.getElementById("humidity").textContent = spaData["humidity"];
            }
        </script>

    </body>
</html>
