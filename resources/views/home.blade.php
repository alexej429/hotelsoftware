<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <link rel="stylesheet" href="/custom.css"/>


    </head>

        
    <body>
        <div class="wrapper" style="background-image: url(hotel-6862159_1920.jpg)">

        <div class="header">
            <a href="/umwelt">Umweltdaten</a>
            <a href="/">Autobuchung</a>
            <a href="/">Login</a>
        </div>

        
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

        {{-- <img src="/hotel-6862159_1920.jpg"/> --}}

        <div class="room-card">
            <img src="/room-1.jpg"/>
            <div class="room-infos">
                <div>Betten: 2</div>
                <div>Preis: 100€</div>
                <button>Buchen</button>
            </div>
        </div>

        <div class="room-card">
            <img src="/room-2.jpg"/>
            <div class="room-infos">
                <div>Betten: 1</div>
                <div>Preis: 100€</div>
                <button>Buchen</button>
            </div>
        </div>

        </div>
    </body>
</html>
