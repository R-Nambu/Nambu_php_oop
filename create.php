<?php

    // 他のファイルを呼び出すための組み込み関数
    // once = 一回のみ実行される
    require_once('Models/Todo.php');

    $task = $_POST['task'];

    // Todoクラスのインスタンス化
    $todo = new Todo();
    // createメソッドに、$taskを代入して利用
    $todo->create($task);

    // リダイレクトさせるための組み込み関数
    // htmlより先に書く
    header('Location: index.php');