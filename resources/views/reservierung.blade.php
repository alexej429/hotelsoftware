<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reservierungsmodul</title>

        <link rel="stylesheet" href="/custom.css"/>


    </head>

        
    <body>
        <div class="wrapper" style="background-color: black">

            <h1>Reservierungsmodul</h1>
            
            <div>
                <label for="selectRoom">Zimmer auswählen:</label>
                <select id="selectRoom">
                    <option>Zimmer 1</option>
                    <option>Zimmer 2</option>
                </select>
                <div>
                    <form action="/reservieren" method="POST">
                        <label for="guestName">Reservieren für:</label>
                        <input id="guestName"/>
                        <div><button>Reservieren</button></div>
                    </form>
                </div>
            </div>

            <div>
                <div>Folgende Zimmer sind reserviert:</div>
                <div>
                    {{$zimmer}} an {{$reserviertVon}}
                </div>
            </div>


            

        </div>

        <script>

        </script>

    </body>
</html>
