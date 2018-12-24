<!DOCTYPE html>
<html lang="jp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/edit.css">

    <title>Profile Edit</title>
  </head>
  <body>
    <h1>プロフィール変更画面</h1>

    <div class="kadai">
      <h2>PHP/Laravel 11 – [Windows編]ControllerとViewが連携できるようにしよう</h2>

      <h3>1.Viewは何をするところでしょうか。簡潔に説明してみてください。</h3>

          <p>要求に対しての結果を見える形（ブラウザ上での出力データ）に生成する</p>

      <h3>2.プログラマーがhtmlを書かずにPHPなどのプログラミング言語やフレームワークを使う必要があるのはどういった理由でしょうか。</h3>

          <p>単一のページしか表示できない為。
          デザインは同一だが商品ごとにページを作り対時など
          写真などのデータを自動的に記述して生成する事により
          すべてのページを手作業で作成するよりも効率良く、またメンテナンスしやすくなる。</p>


      <h3>3.【応用】 前々章でAdmin/ProfileControllerのedit Actionに次のように記述しました。
            <code><pre>   public function edit()
          {
            return view('admin.profile.edit');
          }</pre></code>
      この場合、edit Actionを描画するには、どこのディレクトリに何というbladeファイルを設置すれば良いでしょうか。</h3>

          <p>./resources/views/profile/edit.php</p>

      <h3>4.【応用】3 の答えを実際に作成してみましょう。また、作成したbladeファイルにhtmlで記述して装飾してみましょう。</h3>

          <p>URL参照ください。</p>
    </div>

  </body>
</html>
