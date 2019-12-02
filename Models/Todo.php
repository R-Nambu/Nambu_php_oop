<?php

    // 他のファイルを呼び出すための組み込み関数
    // once = 一回のみ実行される
    require_once('config/dbconnect.php');

    class Todo
    {
        private $table = 'tasks';
        private $db_manager;

        // データベースと繋げる
        public function __construct()
        {
            $this->db_manager = new DbManager();
            $this->db_manager->connect();
        }

        public function create($name)
        {
            $stmt = $this->db_manager->dbh->prepare('INSERT INTO '.$this->table.' (name) VALUES (?)');
            $stmt->execute([$name]);
        }

        public function all()
        {
            $stmt = $this->db_manager->dbh->prepare('SELECT * FROM '.$this->table);
            $stmt ->execute();
            $tasks = $stmt->fetchAll();
            return $tasks;
        }

        public function get($id)
        {
            $stmt = $this->db_manager->dbh->prepare('SELECT * FROM '.$this->table.' WHERE id = ?');
            $stmt->execute([$id]);
            // フェッチはレコード一個だけ取り出している
            $task = $stmt->fetch();
            return $task;
        }
        public function update($name, $id)
        {
            $stmt = $this->db_manager->dbh->prepare('UPDATE '.$this->table.' SET name = ?  WHERE id = ?');
            // updated_at の時間も更新する。更新した時間を取得する。
            $stmt->execute([$name,  $id]);
        }
        // Todoクラスの中にメソッドdelete()を作成
        // idをメソッドに渡せる引数をセットして更新できるようにコードを書いてみる
        // prepare & executeを使って処理する
        // DELETE FROM テーブル名 WHERE id = ?
        
        public function delete($id)
        {
            // データを取り出す準備
            $stmt = $this->db_manager->dbh->prepare('DELETE FROM '.$this->table.' WHERE id = ?');
            //実行する
            $stmt->execute([$id]);
        }
    }