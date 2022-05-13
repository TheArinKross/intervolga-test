<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Алгоритм</title>
</head>
<body>
<form method="post">
    <p>Укажите какой символ вставить в массив: <input type="text" name="symbol"></p>
    <p>Укажите длину массива: <input type="text" name="len"></p>
    <input type="submit" value="Отправить">
</form>

<a href="http://intervolga-test/">Назад</a><br>
</body>
</html>
<?php
//получение необходимых переменных
if ($_POST["symbol"] != null)//проверка ввода символа
{
    $a = $_POST["symbol"];
    if (isset($_POST["len"]) and is_numeric($_POST["len"]) and $_POST["len"]>0) //проверяем задана ли длина массива и положительна ли она
    {
        $len=$_POST["len"];
        for ($i=0; $i<$len; $i++)
        {
            $array[]=rand(0,100);
        }
        echo "Исходный массив: ";
        for ($i=0; $i<$len; $i++)
        {
            echo "$array[$i] ";
        }
        for ($i = 0; $i < $len; $i++){
            if (strrpos($array[$i], "2") !== false) //проверяем наличие 2 в числе
            {
                $len++;
                for ($j = $len - 1; $j > $i; $j--){
                    $array[$j] = $array[$j-1];
                }
                $i++;
                $array[$i] = $a;
            }
        }
        echo "<br>Преобразованный массив: ";
        for ($i=0; $i<$len; $i++)
        {
            echo "$array[$i] ";
        }
    }
    else{
        echo "Введите длину массива корректно<br>";
    }
}
else
{
    echo "Введите символ <br>";
}


?>