@extends('admin_panel.layout')

@section('title', 'Dashboard')

@push('styles')
  {{-- Buraya özel stil eklemek istersen --}}
@endpush

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        {{-- <h1>Dashboard İçeriği</h1> --}}
        {{-- index.html içindeki ana içerikleri buraya taşıyabilirsin --}}
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  {{-- Grafikler, chartlar vs. buraya script olarak eklenebilir --}}
@endpush
