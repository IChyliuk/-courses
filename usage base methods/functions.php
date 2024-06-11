<?php
function Create(): void
{
    $json1 = [
        'uid' => '1',
        'name' => 'Yasha',
        'age' => '27',
        'workplace' => "VK",
        'email' => 'yashayash97@gmail.com',
        'created' => date('Y-m-d H:i:s')
    ];
    $json2 = [
        'uid' => '2',
        'name' => 'Ivan',
        'age' => '18',
        'workplace' => "none",
        'email' => 'cilukivan@gmail.com',
        'created' => date('Y-m-d H:i:s')
    ];
    file_put_contents('firstacc.txt', json_encode($json1) . PHP_EOL . json_encode($json2));
    sleep(5);
}

function Read($filename): void
{
    if(file_exists($filename)){
        $content = file_get_contents($filename);
        $line = explode(PHP_EOL, $content);
        foreach ($line as $lineItem) {
            $decode = json_decode($lineItem, true);
            Write($decode);
        }
        unlink($filename);
    }
    else {
        echo 'Файл не найден';
    }
}

function Write($decode): void
{
    $decode['modified'] = date('Y-m-d H:i:s');
    $article = "$decode[name]$decode[uid]";
    $decode['article'] = $article;
    if (isset($decode['name']) && isset($decode['uid'])) {
        $file = $decode['uid'] . $decode['name'];
        file_put_contents("users/$file.txt", json_encode($decode));
    };
}

function Get(): void
{
    $decode = [
        'uid' => $_GET['uid'],
        'name' => $_GET['name'],
        'workplace' => $_GET['workplace'],
        'email' => $_GET['email'],
        'created' => date('Y-m-d H:i:s')
    ];
    sleep(5);
    Write($decode);
}

function WriteBrowse($dir): void
{
    if (is_dir($dir)) {
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                $filepath = "users" . DIRECTORY_SEPARATOR . $file;
                if (is_file($filepath)) {
                    $dec = json_decode(file_get_contents($filepath), true);

                    echo "<pre>" . "ID: " . $dec['uid'] . "<br>" .
                        "Name: " . $dec['name'] . "<br>" .
                        "Workplace: " . $dec['workplace'] . "<br>" .
                        "Email: " . $dec['email'] . "<br>" .
                        "Created: " . $dec['created'] . "<br>" .
                        "Modified: " . $dec['modified'] . "<br>" .
                        "article: " . $dec['article'] . "<br> <br> </pre>";
                }
            }
        }
    }
}