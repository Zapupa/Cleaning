<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Заявки') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-black overflow-x-auto">
          <table class="w-full text-sm text-left rtl:text-right text-black">
            <thead class="text-xs text-white uppercase bg-blue-700 ">
              <tr>
                <th scope="col" class="px-6 py-3">
                  Дата Заявки
                </th>
                <th scope="col" class="px-6 py-3">
                  Время
                </th>
                <th scope="col" class="px-6 py-3">
                  Адрес
                </th>
                <th scope="col" class="px-6 py-3">
                  Контакты
                </th>
                <th scope="col" class="px-6 py-3">
                  Вид оплаты
                </th>
                <th scope="col" class="px-6 py-3">
                  Услуга
                </th>
                <th scope="col" class="px-6 py-3">
                  Статус
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($reports as $report)<div class="relative overflow-x-aut
        o">
            <tr class="bg-white border-b dark:bg-white dark:border-blue-700">
              <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-black">
              {{\Carbon\Carbon::parse($report->date)->translatedFormat('j F Y')}}
              </th>
              <td class="px-6 py-4">
              {{ $report->time }}
              </td>
              <td class="px-6 py-4">
              {{ $report->address }}
              </td>
              <td class="px-6 py-4">
              {{ $report->contact }}
              </td>
              <td class="px-6 py-4">
              {{ $report->payment }}
              </td>
              <td class="px-6 py-4">
              {{ $report->service->title }}
              </td>
              <td class="px-6 py-4">
              @if($report->status == 'новая')
          <form class=" w-full p-5" id="form-update-{{$report->id}}" action="{{route('reports.update')}}"
          method="POST">
          @csrf
          @method('PATCH')
          <input type="hidden" name="id" value="{{$report->id}}">
          <select class=" w-full" name="status"
          onchange="document.getElementById('form-update-{{$report->id}}').submit()">
          <option value="новая">Новая</option>
          <option value="оказана">Оказана</option>
          <option value="отменена">Отменена</option>
          </select>
          </form>
        @else
        <p class=" w-full p-5">{{ $report->status }}</p>
      @endif

              </td>
            </tr>


            </div>
        @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>