{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- admin.blade.phpの@yiedl('title')に'ニュース新規作成'を埋め込む --}}
@section('title', 'プロフィール')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>プロフィール編集</h2>

        @if (count($errors) > 0)
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif

          <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">

              <div class="form-group row">
                  <label class="col-md-2" for="name">氏名</label>
                  <div class="col-md-10">
                      <input type="text" class="form-control" name="name">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-md-2" for="gender">性別</label>
                  <div class="col-md-10">
                      <input type="radio" class="form-control" name="gender" value="male">男性
                      <input type="radio" class="form-control" name="gender" value="female">女性
          			<input type="radio" class="form-control" name="gender" value="other">その他
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-md-2" for="hobby">趣味</label>
                  <div class="col-md-10">
                      <input type="text" class="form-control" name="hobby">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-md-2" for="introduction">自己紹介</label>
                  <div class="col-md-10">
                        <textarea class="form-control" name="introduction" rows="20"></textarea>
                  </div>
              </div>
              {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="更新">

        </form>

      </div>

    </div>

  </div>
@endsection
