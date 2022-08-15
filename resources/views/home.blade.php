@extends('layouts.app')

@section('title-block', 'Поиск врачей, услуг, клиник')
@section('description-block', '')

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="my-3">Поиск врачей, услуг, клиник</h1>
      <form name="search-form" action="{{ route('search') }}" method="post">
        @csrf
        <div class="input-group m-3">
          <input type="text" autocomplete="off" class="border-warning border-right-0 shadow-none form-control" name="search" placeholder="Врачи, клиники, услуги">
          <select multiple size="1" data-placeholder="Город" class="form-control text-truncate chosen-select" name="city[]">
            @foreach ($cities as $city)
              <option class="text-truncate" value="{{ $city }}">{{ $city }}</option>
            @endforeach
          </select>
          <div class="input-group-append">
            <button class="btn btn-warning text-nowrap shadow-none search" type="submit"><i class="fa fa-search"></i><span class="mb-1 spinner-border spinner-border-sm d-none"></span> Найти</button>
          </div>
        </div>
      </form>
      <div id="search-result" class=""></div>
    </div>
  </div>
</div>

@endsection
