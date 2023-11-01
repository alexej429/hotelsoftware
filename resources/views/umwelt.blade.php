<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Umwelt</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/custom.css"/>


    </head>
    <body class="antialiased">
        <div class="wrapper">
            <h1 >Umweltdatenmodul</h1>

            <div>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore 
                et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. 
                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, 
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea 
                takimata sanctus est Lorem ipsum dolor sit amet.
            </div>
            
            <h1>Wellness Bereich</h1>
            <div>Wassertemperatur: {{$temperature}} °C &#x1F321;&#xFE0F;</div>
            <div>Luftfeuchtigkeit: {{$humidity}} % &#x1F4A7;</div>

    
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
    
            <h1>Umweltdaten 2022</h1>
            <div>&#x2601;&#xFE0F; 70% weniger CO2 pro Gast</div>
            <div><span>&#x1F30A;<span> 55% weniger Wasser pro Gast</div>
            <div>&#x1F6AE; 50% weniger Abfall pro Gast</div>
            <div>&#x26A1; 66% weniger Energie pro Gast</div>
            <div>&#x1F333; 30.101 Bäume in Afrika gepflanzt</div>
            <div>&#x1F41D; 250.000 m<sup>2</sup> Fläche renaturiert</div>
            {{-- {!! Form::open(['url' => 'foo/bar']) !!}
            {!! Form::label('email', 'E-Mail Adresse')!!}
            {!! Form::email('email', 'baslkdsnk', ['placeholder' => 'your mail', 'style' => 'color: red;']) !!}
            {!! Form::close() !!} --}}
            {{-- {!! Form::label('', 'E-Mail Adresse')!!} --}}
        </div>
        
    </body>
</html>
