@empty(count($items))
  <p class="mt-3">Ничего не найдено</p>
@else
  <h6 class="mt-3">Результаты поиска:</h6>
  <div class="table-responsive">
    <table class="d-table table table-striped table-bordered table-hover table-sm table-responsive group-table">
        <thead class="thead-dark">
          <tr class="text-center">
            <th>№</th>
            <th>Врач</th>
            <th>Клиника</th>
            <th>Услуга</th>
            <th>Город</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($items as $item)
                  <tr class="lh-md text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->doctor }}</td>
                    <td>{{ $item->clinic }}</td>
                    <td>{{ $item->service }}</td>
                    <td>{{ $item->city }}</td>
                  </tr>
          @endforeach
        </tbody>
    </table>

  </div>
@endempty
