<?php
function delTree($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
}
if ($_FILES['userfile']['size'] == 0 or $_FILES['userfile']['type'] !== 'text/csv')
{
    echo "Выберите файл формата CSV<br>";
    echo "<a href='http://intervolga-test/task2/index.html'>Назад</a>";
}
else {
    $path = __DIR__;
    $blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".html");
    //проверяем наличие директории, при наличии очищаем ее и удаляем для создания новых файлов
    if (file_exists("$path\\upload")) {
        delTree("$path\\upload");
    }
    $create = mkdir("$path\\upload", 0777);
    echo"Директория upload успешно создана<br>";
    $filename = $_FILES['userfile']['tmp_name'];
    $file = new SplFileObject("$filename");
    $file->setFlags(SplFileObject::READ_CSV);
    $i=0;
    foreach ($file as $row) {
        $check = 0;
        list($new_name, $text) = $row;
        $rf = explode('.', $new_name);//отделяем расширение от имени исходного файла для создания нового
        $count = count($rf) - 1;
        foreach ($blacklist as $item)
        {
            if(preg_match("/$item\$/i", $new_name)) //проверяем расширение файла
            {
                echo "Извините, загрузка файлов формата .php, .html, .js запрещена в целях безопасности";
                $check = 1;
                break;
            }
        }
        if ($check == 0 and $count!==0){
            $i=$i+1;
            // Открываем файл
            $fp = fopen("$path\\upload\\$i.$rf[$count]", "w+");
            // записываем данные в открытый файл
            fwrite($fp, $text);
            //закрыть файл
            fclose($fp);
        }

    }
}
?>