<div class="container">
    {{ Form::open(['url'=>'auto', 'method'=>'post']) }}
    @csrf()
        {{ Form::label('brand', 'Marke',) }}
        {{ Form::text('brand') }}
        <br>
        {{ Form::label('ps', 'Pferdestärke',) }}
        {{ Form::text('ps') }}
        <br>
        {{ Form::label('type', 'Model',) }}
        {{ Form::text('type') }}
        <br>
        {{ Form::label('color', 'Farbe',) }}
        {{ Form::text('color') }}
        <br>
        {{ Form::label('numberSeats', 'Anzahl der Sitzplätze',) }}
        {{ Form::text('numberSeats') }}
        <br>
        {{ Form::label('pricePerDay', 'Kosten pro Tag',) }}
        {{ Form::text('pricePerDay') }}
        <br>
        <br>
        {{ Form::submit('Speichern',[]) }}
    {{ Form::close() }}
</div>
