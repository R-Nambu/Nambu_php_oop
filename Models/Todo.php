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
    }