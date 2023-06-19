@extends ('layouts.app')

@section('content')
<p> Hello world</p>
<table>
    <thead>
        <tr>
            <th>Symbol</th>
            <th>Rate</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($exchangeRates as $exchangeRate)
        <tr>
            <th>{{ $exchangeRate->symbol }}</th>
            <th>{{ $exchangeRate->rate }}</th>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection