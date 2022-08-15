@empty(count($items))
  <p class="mt-3">Ничего не найдено</p>
@else
  <h6 class="mt-3">Результаты поиска:</h6>
  <div class="d-flex flex-wrap">
    @foreach ($items as $item)
      {{ $item }}
    @endforeach
  </div>
  {{ $users->onEachSide(2)->links() }}
@endempty
