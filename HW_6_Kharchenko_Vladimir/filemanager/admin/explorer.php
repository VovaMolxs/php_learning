<?php

if (!empty($_GET)) {
    header('location: ?');
}

//config
$path = $_SERVER['DOCUMENT_ROOT']; //стартовая дирректория
$uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/admin/upload/'; // место загрузки файлов
$pathForm = './explorer.php';
//config

require_once './function/func.php';


//проверка на изменение файла:
if (isset($_POST['editFile'])) {
    saveEditFile($_POST['pathEditFile'], $_POST['newTextContent']);
}


//проверка на отправку файла
if (isset($_POST['upload'])) {
    setFile($_FILES, $uploadPath);
}


//Ниже проверка на переход в идректорию/изменеие/удаление файла/папки
if (!empty($_POST['send'])) {
        switch ($_POST['do']) {
        case 'open':
            if ($_POST['id'] ==  '..') {
                $path = dirname($_POST['path']);
            } else {
                $path = $_POST['path'] . '/' . $_POST['id'];
            }
            break;
        case 'edit':
            editFile($_POST['path'] . '/' . $_POST['id']);
            break;
        case 'deleteDir':
            if (is_dir($_POST['path'] . '/' . $_POST['id'])) {
                rmdir($_POST['path'] . '/' . $_POST['id']);
            }
            break;
        case 'deleteFile':
            if (is_file($_POST['path'] . '/' . $_POST['id'])) {
                unlink($_POST['path'] . '/' . $_POST['id']);
            }
            break;
        case 'rename':
            echo "rename <br>";
            rename($_POST['path'] . '/' . $_POST['id'], $_POST['path'] . '/' . $_POST['newName']);
            break;
        case 'download':
            echo "download";
            $downloadFile = $_POST['path'] . '/' . $_POST['id'];
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $_POST['id'] . '"');
            readfile($downloadFile);
            break;
    }
}

//ниже проверка на создание папки/файла
if (!empty($_GET['newName'])) {
    if ($_GET['selectType'] == 'createFile') {
        echo "createFile";
        if (!is_file($path . '/' . $_GET['nameCreate'])) {
            file_put_contents($path . '/' . $_GET['nameCreate'], '');
        }
    } else if ($_GET['selectType'] == 'createDir') {
        echo $path . '/' . $_GET['nameCreate'];
        if (!mkdir($path . '/' . $_GET['nameCreate'], 0700)) {
            die('Не удалось создать папку!');
        }

    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-2 p-3">
            <button type="button" class=" btn btn-outline-warning"><a href="http://<?=$_SERVER['HTTP_HOST'] ?>/admin">Главный каталог</a></button>
        </div>

    </div>



    <div class="row bg-primary-subtle border border-primary-subtle rounded-3" >
        <div class="col d-flex justify-content-center p-2">
            <form enctype='multipart/form-data' action='<?=$pathForm ?>' method='post'>
                <div class='row'>
                    <div class="col-12">
                        <input class="form-control p-2" type="file" id="formFileMultiple" multiple name="myfile[]" >
                    </div>
                    <div class='col'>
                        <input class='form-control btn-primary' type='submit' name='upload' value='Отправить'>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row bg-secondary-subtle border border-primary-subtle rounded-3 ">
                <div class="col-1">
                    <p>№ п/п</p>
                </div>
                <div class="col-2">
                    <p>Название</p>
                </div>
                <div class="col-1">
                    <p>Тип</p>
                </div>
                <div class="col-1">
                    <p>Размер файла/директории</p>
                </div>
                <div class="col-1">
                    <p>Дата создания</p>
                </div>
                <div class="col">
                    <p>Полный путь</p>
                </div>
                <div class="col">
                    <p>Выбор действия с файлом:</p>
                </div>


            <?php
            if (is_dir($path)) {
                if ($dh = opendir($path)) {
                    $num = 1;
                    while (($file = readdir($dh)) !== false) {
                        //получаем информацию о файле
                        $stat = stat($path . "/" . $file);
                        $typeFile = filetype($path . '/' . $file);
                        //преодбразуем время изменения в нужный формат

                        $timeEdit = date('Y-m-d H:i:s', (int) $stat['mtime']);

                        echo "
                <div class='row bg-success-subtle border border-danger-subtle rounded-3 p-2'>
                    <div class='col-1'>
                        ${num}
                    </div>
                    <div class='col-2'>
                        ${file}
                    </div>
                    <div class='col-1'>
                       ${typeFile}
                    </div>
                    <div class='col-1'>
                        ${stat['size']} байт(а)
                    </div>
                    <div class='col-1'>
                        ${timeEdit} 
                    </div>
                    <div class='col'>"
                            . $path . "/". $file .
                            "</div>
                    <div class='col'>
                    <form action='" . $pathForm . "' method='post'>
                        <div class='row'>
                            <div class='col'>"
                                . createSelect($file, $path) .
                            "
                            <input type='text' name='newName' class='form-control' placeholder='Новое имя'>
                            </div>
                            <div class='col'>
                                <input class='form-control btn-warning' type='submit' name='send' value='Отправить'>
                            </div>
                        </div>
                    </form>
                    
                    
                    </div>
                </div>
                ";
                        $num++;
                    }
                    closedir($dh);
                }
            }
            ?>
    </div>
    <div class="row bg-primary-subtle border border-primary-subtle rounded-3" >
        <div class="col d-flex justify-content-center p-2">
            <form action='<?=$pathForm ?>' method='get'>
                <div class='row'>
                    <div class='col'>
                        <input type='text' name='nameCreate' class='form-control'>
                    </div>
                    <div class='col'>
                        <select class="form-select" name="selectType">
                            <option selected value="createDir">Создать папку</option>
                            <option value="createFile">Создать файл</option>
                        </select>
                    </div>
                    <div class='col'>
                        <input class='form-control btn-primary' type='submit' name='newName' value='Отправить'>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>




</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>



