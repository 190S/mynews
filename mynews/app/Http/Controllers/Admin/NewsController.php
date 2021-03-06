<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//以下を追記でNewsModelが扱える
use App\News;
use Carbon\Carbon;
use App\History;

class NewsController extends Controller
{
    // 以下を追加
    public function add()
    {
        return view('admin.news.create');
    }

    //14章追記
    //↓Requestクラス(ユーザー情報オブジェクト)を$requestに代入している
    public function create(Request $request)
    {

          //15章追記
          // 以下を追記
     // Varidationを行う
     $this->validate($request, News::$rules);

     $news = new News;
     $form = $request->all();

     // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
     if (isset($form['image'])) {
       $path = $request->file('image')->store('public/image');
       $news->image_path = basename($path);
     } else {
         $news->image_path = null;
     }

     // フォームから送信されてきた_tokenを削除する
     unset($form['_token']);
     // フォームから送信されてきたimageを削除する
     unset($form['image']);

     // データベースに保存する
     $news->fill($form);
     $news->save();

     return redirect('admin/news/create');
 }

  //16追記index
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != ''){
          //検索されたら検索結果を取得
          $posts = News::where('title', $cond_title)->get();
      } else {
        //それ以外はすべてのニュースを取得
          $posts = News::all();
      }
      return view('admin.news.index',['posts' => $posts,'cond_title' => $cond_title]);
  }

  //17追記edit-Update
  public function edit(Request $request)
  {
    //NewsModelからデータを取得
    $news = News::find($request->id);
    return view('admin.news.edit',['news_form' => $news]);
  }

  public function update(Request $request)
  {
    //validation
    $this->validate($request, News::$rules);

    //NewsModelからデータを取得
    $news=News::find($request->id);

    //送信されてきたフォームデータの格納
    $news_form = $request->all();

    if (isset($news_form['image']))
    {
      $path = $request->file('image')->store('public/image');
      $news->image_path = basename($path);
    }
    elseif ($request->remove == 'true')    {
      $news->image_path = null;
    }

    else {
      $news_form['image_path'] = $news->image_path;
    }


    // \Debugbar::info(isset($news_form['image']));
    unset($news_form['_token']);
    unset($news_form['image']);
    unset($news_form['remove']);

    //該当のデータを上書き保存
    $news->fill($news_form)->save();

    $history = new History;
    $history->news_id = $news->id;
    $history->edited_at = Carbon::now();
    $history->save();

    return redirect('admin/news');
  }

  //削除アクション
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $news = News::find($request->id);
      // 削除する
      $news->delete();
      return redirect('admin/news/');
  }

}
