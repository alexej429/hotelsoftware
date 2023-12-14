<?php
require_once("./classes/DBHelper.php");
$dbh = new DBHelper();
$dbh->createDatabase();
$dbh->exampleData();
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <link rel="stylesheet" href="./resources/css/hotel.css" />


</head>


<body>
    <div class="wrapper" style="background-image: url(hotel-6862159_1920.jpg)">

        <div class="header">
            <a href="./umweltdatenmodul">Umweltdaten</a>
            <a href="./reservierungsmodul">Reservierungsmodul</a>
            <a href="./rechnungsmodul">Rechnungsmodul</a>
            <a href="./autoreservierung">Autoreservierung</a>
        </div>

        <h1>Home</h1>
        <!-- <img src="./resources/pictures/hotel-6862159_1920.jpg" /> -->
        <div>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
            aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
            no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
            nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum
            dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat
            nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis
            dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet,
        </div>

        <div id="rooms" style="display: flex; flex-wrap: wrap;"></div>



        <script src="./resources/js/easepick.umd.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", async () => {
                //lade Hotelzimmer vom Server
                let res = await fetch("./api/getRooms.php");
                const roomArray = await res.json();

                for (let room of roomArray) {
                    createRoomCard(room);
                }

            });

            function createRoomCard(room) {
                const roomCard = document.createElement("div");
                const img = document.createElement("img");

                if (room["room_id"] % 2 == 0) {
                    img.src = "./resources/pictures/room-1.jpg";
                } else {
                    img.src = "./resources/pictures/room-2.jpg";
                }

                const roomInfos = document.createElement("div");
                const roomId = document.createElement("div");
                roomId.innerHTML = "Zimmer ID: " + room["room_id"];
                const pricePerDay = document.createElement("div");
                pricePerDay.innerHTML = "Preis pro Tag: " + room["price"];

                const dateDiv = document.createElement("div");
                const dateInputLabel = document.createElement("label");
                dateInputLabel.textContent = "Zeitraum: ";
                const dateInput = document.createElement("input");
                dateDiv.append(dateInputLabel, dateInput);

                const numberDays = document.createElement("div");
                const totalPrice = document.createElement("div");

                const firstNameDiv = document.createElement("div");
                const firstNameLabel = document.createElement("label");
                firstNameLabel.textContent = "Vorname: ";
                const firstNameInput = document.createElement("input");
                firstNameDiv.append(firstNameLabel, firstNameInput);


                const lastNameDiv = document.createElement("div");
                const lastNameLabel = document.createElement("label");
                lastNameLabel.textContent = "Nachname: ";
                const lastNameInput = document.createElement("input");
                lastNameDiv.append(lastNameLabel, lastNameInput);


                const btnDiv = document.createElement("div");
                const bookingBtn = document.createElement("button");
                bookingBtn.textContent = "Buchen";
                const reservationBtn = document.createElement("button");
                reservationBtn.textContent = "Reservieren";


                btnDiv.append(bookingBtn, reservationBtn);

                roomInfos.append(roomId, pricePerDay, dateDiv, numberDays, totalPrice,
                    firstNameDiv, lastNameDiv, btnDiv);
                roomCard.append(img, roomInfos);

                roomCard.classList.add("room-card");
                roomInfos.classList.add("room-infos");

                //easepick datepicker https://easepick.com/
                const picker = new easepick.create({
                    element: dateInput,
                    format: 'DD.MM.YYYY',
                    css: [
                        './resources/css/easepick-core.css',
                        './resources/css/easepick-range-plugin.css',
                    ],
                    plugins: ['RangePlugin'],
                    RangePlugin: {
                        tooltip: true,
                    },
                    setup(picker) {
                        picker.on('select', (e) => {
                            // Gesamtpreis und Tage berechnen und anzeigen
                            const p = getTotalPrice(picker.getStartDate(), picker.getEndDate(), room["price"]);
                            const days = getDaysDiff(picker.getStartDate(), picker.getEndDate());
                            totalPrice.innerHTML = "Gesamtpreis: " + p + "€";
                            numberDays.innerHTML = days + " Tag(e)";
                        });
                    },
                });


                //button actions
                bookingBtn.onclick = async (e) => {
                    const formData = new FormData();
                    const checkIn = picker.getStartDate();
                    const checkOut = picker.getEndDate();
                    const tPrice = getTotalPrice(checkIn, checkOut, room["price"]);

                    const data = {
                        firstName: firstNameInput.value,
                        lastName: lastNameInput.value,
                        checkIn: checkIn,
                        checkOut: checkOut,
                        totalPrice: tPrice,
                        roomId: room["room_id"],
                    }
                   
                    formData.append("data", JSON.stringify(data));
                    let res = await fetch("./api/buchen.php", {
                        method: "POST",
                        body: formData,
                    });
                    console.log(await res.text());

                    //clear user input
                    picker.clear();
                    totalPrice.innerHTML = "";
                    numberDays.innerHTML = "";
                    firstNameInput.value = "";
                    lastNameInput.value = "";

                }

                reservationBtn.onclick = async (e) => {
                    const formData = new FormData();
                    const checkIn = picker.getStartDate();
                    const checkOut = picker.getEndDate();
                    const tPrice = getTotalPrice(checkIn, checkOut, room["price"]);

                    const data = {
                        firstName: firstNameInput.value,
                        lastName: lastNameInput.value,
                        checkIn: checkIn,
                        checkOut: checkOut,
                        totalPrice: tPrice,
                        roomId: room["room_id"],
                    }

                    formData.append("data", JSON.stringify(data));
                    let res = await fetch("./api/reservieren.php", {
                        method: "POST",
                        body: formData,
                    });
                    console.log(await res.text());

                    //clear user input
                    picker.clear();
                    totalPrice.innerHTML = "";
                    numberDays.innerHTML = "";
                    firstNameInput.value = "";
                    lastNameInput.value = "";

                }


                document.querySelector("#rooms").appendChild(roomCard);
            }


            // Hilfsfuntkion: Berechnet Gesamtpreis
            function getTotalPrice(startDate, endDate, pricePerDay) {
                const days = getDaysDiff(startDate, endDate);
                return pricePerDay * days;
            }

            //berechnet Tages Differenz
            function getDaysDiff(startDate, endDate) {
                const diffTime = endDate - startDate;
                const diffDays = Math.round(diffTime / (1000 * 3600 * 24));
                const days = diffDays + 1;
                return days;
            }
        </script>

        <!-- <div class="room-card">
            <img src="./resources/room-1.jpg" />
            <div class="room-infos">
      
                <div>Betten: 2</div>
                <div>Preis pro Tag: 100€</div>
                <div><label for="dayInput">Zeitraum: </label></div>
                <input id="datepicker" />
                <div id="days"></div>
       
                <div>Gesamtpreis: <span id="gesamtpreis"></span></div>
                <div>
                    <label for="firstName">Vorname:</label>
                    <input id="firstName" name="firstName" />
                </div>
                <div>
                    <label for="lastName">Nachname:</label>
                    <input id="lastName" name="lastName" />
                </div>
                <div><button>Reservieren</button><button>Buchen</button></div>
             
            </div>
        </div>

        <div class="room-card">
            <img src="./resources/room-2.jpg" />
            <div class="room-infos">
                <div>Betten: 1</div>
                <div>Preis pro Tag: 100€</div>
                <div><label for="">Anzahl Tage: </label></div>
                <div><input id="" /></div>
                <button>Buchen</button>
            </div>
        </div> -->

    </div>
</body>


</html>