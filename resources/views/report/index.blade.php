<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Заявки') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <x-nav-link :href="route('report.create')" type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 text-center mb-11">Создать</x-nav-link>
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          @foreach($reports as $report)
        <div class="p-8 flex flex-col gap-8">
        <div class='flex justify-between gap-x-2'>
          <p class="font-bold text-base">
          {{\Carbon\Carbon::parse($report->date)->translatedFormat('j F Y')}}
          </p>
          <p class="w-full max-w-32 font-bold text-base">{{ $report->time }}</p>
          <p class="font-bold text-base">{{ $report->address }}</p>
          <p class="w-full max-w-3xl font-normal text-base">{{ $report->contact }}</p>
          <p class="w-full max-w-32 font-bold text-base">{{ $report->payment }}</p>
          <p class="w-full max-w-32 font-bold text-base">{{ $report->service->title }}</p>
        </div>
        </div>
      @endforeach

        </div>
      </div>
    </div>
  </div>
</x-app-layout>