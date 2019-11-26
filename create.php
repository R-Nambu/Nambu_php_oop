<?php

    // 他のファイルを呼び出すための組み込み関数
    // once = 一回のみ実行される
    require_once('Models/Todo.php');

    $task = $_POST['task'];

    $todo = new Todo();
    $todo->create($task);