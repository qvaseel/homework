@extends('layouts.main')
@section('content')
<div class="py-5 flex justify-between gap-y-5 flex-wrap">
    @foreach ($array as $card)
        <div class="border-2 w-80 flex flex-col gap-3 items-center p-5">
            <img class="w-64" src="{{ $card['path'] }}" alt="карточка">
            <h2>{{ $card['id'] }}. {{ $card['title'] }}</h2>
            <p>{{ $card['price'] }} р.</p>
        </div>
    @endforeach
</div>
@endsection()