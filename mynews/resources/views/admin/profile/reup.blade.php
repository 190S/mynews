@extends('layouts.admin')
@section('title', 'プロフィールの編集')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>プロフィール編集</h2>

                  <form action="{{ action('Admin\ProfileController@upgrade') }}" method="post" enctype="multipart/form-data">
        @if (count($errors) > 0)
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif
              <div class="form-group row">
                  <label class="col-md-2" for="name">氏名</label>
                  <div class="col-md-10">
                      <input type="text" class="form-control" name="name" value="{{ $up_form->name }}">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-md-2" for="gender">性別</label>
                  <div class="col-md-10">
                    <ul>
                      <li><input type="radio" name="gender" id="Male" value="M" @if(old('gender')=="M") checked @endif><label for="Male">男性</label></li>
                      <li><input type="radio" name="gender" id="Female" value="F" @if(old('gender')=="F") checked @endif><label for="Female">女性</label></li>
                      <li><input type="radio" name="gender" id="Other" value="O" @if(old('gender')=="O") checked @endif><label for="Other">その他</label></li>
                    </ul>
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-md-2" for="hobby">趣味</label>
                  <div class="col-md-10">
                      <input type="text" class="form-control" name="hobby" value="{{ $up_form->hobby }}">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-md-2" for="introduction">自己紹介</label>
                  <div class="col-md-10">
                        <textarea class="form-control" name="introduction" rows="20">{{ $up_form->introduction }}</textarea>
                  </div>
              </div>

              <div class="form-group row">
                  <div class="col-md-10">
                      <input type="hidden" name="id" value="{{ $up_form->id }}">
                      {{ csrf_field() }}
                      <input type="submit" class="btn btn-primary" value="更新">

        </form>

        <div class="row mt-5">
                            <div class="col-md-4 mx-auto">
                                <h2>編集履歴</h2>
                                <ul class="list-group">
                                    @if ($up_form->prhistories != NULL)
                                        @foreach ($up_form->prhistories as $history)
                                            <li class="list-group-item">{{ $history->edited_at }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>



      </div>

    </div>

  </div>
@endsection
