<div>
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
                    <a href="{{ route('auto.edit', $auto->id) }}"><button>Bearbeiten</button></a>
                </td>
                <td>
                    <form action="{{ route('auto.destroy', $auto) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Löschen</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('auto.create') }}">
        Neues Auto hinzufügen
    </a>
</div>
