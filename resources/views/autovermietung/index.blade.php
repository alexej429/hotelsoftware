<div>
    Zu vermietende Autos
    <table>
        <tr>
            <th>
                Marke
            </th>
            <th>
                PS
            </th>
            <th>
                Model
            </th>
            <th>
                Farbe
            </th>
            <th>
                Anzahl Sitzplätze
            </th>
            <th>
                Kosten pro Tag
            </th>
        </tr>
        @foreach($viewData['autos'] as $auto)
            <tr>
                <td>
                    {{ $auto->brand }}
                </td>
                <td>
                    {{ $auto->ps }}
                </td>
                <td>
                    {{ $auto->type }}
                </td>
                <td>
                    {{ $auto->color }}
                </td>
                <td>
                    {{ $auto->numberSeats }}
                </td>
                <td>
                    {{ $auto->pricePerDay }}
                </td>
                <td>

                    <a href="{{ route('autovermietung.create', ['id'=>$auto->id])}}"><button>Mieten</button></a>
                </td>
            </tr>
        @endforeach
    </table>
    <hr>
    Vermietete Autos
    <table>
        <tr>
            <th>
                Marke
            </th>
            <th>
                PS
            </th>
            <th>
                Model
            </th>
            <th>
                Farbe
            </th>
            <th>
                Anzahl Sitzplätze
            </th>
            <th>
                Kosten pro Tag
            </th>
        </tr>
        @foreach($viewData['autosVermieted'] as $auto)
            <tr>
                <td>
                    {{ $auto->brand }}
                </td>
                <td>
                    {{ $auto->ps }}
                </td>
                <td>
                    {{ $auto->type }}
                </td>
                <td>
                    {{ $auto->color }}
                </td>
                <td>
                    {{ $auto->numberSeats }}
                </td>
                <td>
                    {{ $auto->pricePerDay }}
                </td>
                <td>
                    <form action="{{ route('autovermietung.destroy', $auto) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">zurücknehmen</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
