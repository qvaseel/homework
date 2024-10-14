@extends('layouts.main')
@section('content')
<div class="w-full flex justify-between items-center">
    <h1 class="text-3xl font-bold py-5">Reports</h1>
    <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 h-12 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Создать
    </button>
</div>
<div class="flex flex-col gap-5 flex-wrap justify-between">
    @foreach ($reports as $report)
    <div class="flex flex-col p-4 border-2 mb-5 gap-3">
        <p>Номер обращения: {{ $report['number'] }}</p>
        <p>Описание: {{ $report['description'] }}</p>
        <form method="POST" action="{{route('reports.destroy', $report->id)}}">
            @method('delete')
            @csrf
            <input class="cursor-pointer w-20 bg-red-200 border-red-900 border-2 text-red-900" type="submit" value="Удалить">
        </form>
    </div>
    @endforeach
</div>
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Создание отчета
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5 space-y-4" method="POST" action="{{route('reports.store')}}">
                @csrf
                <div class="flex flex-col">
                    <!-- <div>
                        <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Номер отчета</label>
                        <input name="number" type="text" id="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Номер" required />
                    </div> -->
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Описание</label>
                        <textarea name="description" type="text" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Описание" required></textarea>
                    </div>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Создать</button>
            </form>
        </div>
    </div>
</div>
@endsection()