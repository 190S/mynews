{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- admin.blade.phpの@yiedl('title')に'ニュース新規作成'を埋め込む --}}
@section('title', 'プロフィール')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>Myプロフィール</h2>
      </div>

    </div>

  </div>
@endsection
