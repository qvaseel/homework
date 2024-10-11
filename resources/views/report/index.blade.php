@extends('layouts.main')
@section('content')
<h1 class="text-3xl font-bold py-5">Reports</h1>
<div class="flex flex-col gap-5 flex-wrap justify-between">
    @foreach ($reports as $report)
        <div class="flex flex-col p-4 border-2 mb-5">
            <p>{{ $report['number'] }}</p>
            <p>{{ $report['description'] }}</p>
        </div>
    @endforeach
</div>
@endsection()