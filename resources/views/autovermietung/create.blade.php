<div>
    {{ Form::model($auto, ['route'=>['autovermietung.update', $auto->id], 'method'=>'patch']) }}
    @csrf
    {{ Form::label('brand', 'Marke',) }}
    {{ Form::text('brand',$auto->brand, ['disabled'=>'true']) }}
    <br>
    {{ Form::label('ps', 'Pferdestärke',) }}
    {{ Form::text('ps',$auto->ps, ['disabled'=>'true']) }}
    <br>
    {{ Form::label('type', 'Model',) }}
    {{ Form::text('type',$auto->type, ['disabled'=>'true']) }}
    <br>
    {{ Form::label('color', 'Farbe',) }}
    {{ Form::text('color',$auto->color, ['disabled'=>'true']) }}
    <br>
    {{ Form::label('numberSeats', 'Anzahl der Sitzplätze',) }}
    {{ Form::text('numberSeats',$auto->numberSeats, ['disabled'=>'true']) }}
    <br>
    {{ Form::label('pricePerDay', 'Kosten pro Tag',) }}
    {{ Form::text('pricePerDay',$auto->pricePerDay, ['disabled'=>'true']) }}
    <br>
    <br>
    {{ Form::submit('mieten',[]) }}
    {{ Form::close() }}
</div>
