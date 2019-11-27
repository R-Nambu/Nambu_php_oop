# TODOアプリ作成

＊　下準備
＊　DB連携
＊　タスク追加機能作成
＊　一覧表示

dbconnect にて dbと連携
index.php で form に input された text(name="task") をPOST
create.php で POST された text を取得
Todo.php で作成された Todoクラスをインスタンス化し、createメソッドに text を代入して実行する
（Todoクラスでは、dbに接続し、dbにレコードを作成する）
index.php にリダイレクトする
index.php に一覧表示 Todoクラスに全ての登録データを呼び出すallメソッドを追加
escape処理用の function.php 作成