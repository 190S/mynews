<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\PrHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{

  public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Profile::where('name', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }



    //課題09-5
    //【応用】 Admin/ProfileControllerに
    //以下のedit Actionとupdate Actionを追加してみましょう。
    public function edit()
    {

      return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
      // Varidationを行う
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);

      // データベースに保存する
      $profile->fill($form);
      $profile->save();

      return redirect('admin/profile');
    }


    //18
    public function reup(Request $request)
{
    $profile = Profile::find($request->id);
    return view('admin.profile.reup', ['up_form' => $profile]);
}

      public function upgrade(Request $request)
      {
        // Varidationを行う
        $this->validate($request, Profile::$rules);

        $profile=Profile::find($request->id);
        $up_form = $request->all();

        // フォームから送信されてきた_tokenを削除する
      unset($up_form['_token']);

        // データベースに保存する
        $profile->fill($up_form)->save();

        $history = new PrHistory;
        $history->prof_id = $profile->id;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('admin/profile');
      }


      //18削除
      public function delete(Request $request)
  {
      // 該当するModel取得
      $profile = Profile::find($request->id);
      // 削除する
      $profile->delete();
      return redirect('admin/profile');
  }

}
