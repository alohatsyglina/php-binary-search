<?php

//создание файла и генерация пар "ключ"->"значение"
function createFile($fileName, $count){
    $file = fopen($fileName, "w");
    for ($i = 0; $i < $count; $i++){
        fwrite($file, "key" . $i . "\t" . "value" . $i . "\x0A");
    }
}

createFile("example.txt", 500);

//бинарный поиск
function binarySearch($fileName, $key){
    $f = file($fileName);
    foreach($f as $a){
        $arr[] = explode("\t", $a);
    }
    $beginning = 0;
    $end = count($arr) - 1;
    while($beginning <= $end){
        $middle = floor(($beginning + $end) / 2);
        $cmp = strnatcmp($arr[$middle][0], $key);
        if($cmp > 0){
            $end = $middle - 1;
        }
        elseif($cmp < 0){
            $beginning = $middle + 1;
        }
        else{
            return $arr[$middle][1];
        }
    }
    return 'undef';
}

?>

<form action="" method="POST">
<input type ="text" name = "key" placeholder="Введите значение ключа">
<input type="submit" value="go" name="go">
</form>

<?php
if(isset($_REQUEST['go'])){
    $key_val = $_REQUEST['key'];
    print_r(binarySearch('example.txt', $key_val));
}

