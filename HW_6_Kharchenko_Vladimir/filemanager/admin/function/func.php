<?php

function saveEditFile($path, $newContent) {
    file_put_contents($path, $newContent);
}

function editFile($path) {
    global $pathForm;
    $fileContent = file_get_contents($path);
    echo "
        <form enctype='multipart/form-data' action='$pathForm' method='post'>
                <div class='row justify-content-center'>
                    <div class='col-10'>
                        <input type='hidden' name='pathEditFile' value='$path' >
                        <textarea class='form-control' id='exampleFormControlTextarea1' rows='8' name='newTextContent'>" . htmlspecialchars($fileContent) . "</textarea>
                    </div>
                    <div class='col-3 p-3'>
                        <input class='form-control bg-primary' type='submit' name='editFile' value='изменить'>
                    </div>
                </div>
            </form>
    ";
}

function translit($string) {
    $string = (string) $string; // преобразуем в строковое значение
    $string = trim($string); // убираем пробелы в начале и конце строки
    $string = function_exists('mb_strtolower') ? mb_strtolower($string) : strtolower($string); // переводим строку в нижний регистр
    $string = strtr($string, array(
        'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e',
        'ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k',
        'л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r',
        'с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c',
        'ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e',
        'ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
    return $string; // возвращаем результат
}

$allFiles = scandir($uploadPath);
function setFile($files, $uploadPath) {
    global $allFiles;
    //echo var_dump($files);

    foreach ($files['myfile']['tmp_name'] as $index => $path) {
        //проверяем существование файла или каталога
        if (file_exists($path)) {


            $fileInfo = pathinfo($files['myfile']['name'][$index]);
            //var_dump($fileInfo);
            $findFiles = preg_grep("/^" . $fileInfo['filename'] . "(.+)?\." . $fileInfo['extension'] . "$/", $allFiles);
            //var_dump($findFiles);
            $translit = translit($_FILES['myfile']['name'][$index]);

            $pattern = '/[^A-Za-z0-9.]/';
            $replace = '';
            $newName = preg_replace($pattern, $replace, $translit);

            move_uploaded_file($path, $uploadPath . '/' . $newName);
        }
    }
}

//функциия создания элементов select для папки или файла, т.е. папку можно удалить или перейти в нее/переименовать, а файл скачать/изменить/переименовать

function createSelect($file, $dir) {
    if (filetype($dir . '/' . $file) == 'dir') {

        $html = "
               <input type='hidden' name='path' value='$dir' >
               <input type='hidden' name='id' value='$file' >
               <select class='form-select' name='do'>
                 <option value='deleteDir'>Удалить</option>
                 <option value='rename'>Переименовать</option>
                 <option value='open'>Открыть</option>
               </select>
        ";
    } else {
        $html = "
               <input type='hidden' name='path' value='$dir' >
               <input type='hidden' name='id' value='$file' >
               <select class='form-select' name='do'>
                 <option value='deleteFile'>Удалить</option>
                 <option value='rename'>Переименовать</option>
                 <option value='edit'>Изменить</option>
                 <option value='download'>Скачать</option>
                 
               </select>
        ";

    }
    return $html;
}

function checkAuth($loginForm, $passwordForm) {
    global $login;
    global $password;

    $loginCheck = password_hash($login, PASSWORD_DEFAULT);
    $passwordCheck = password_hash($password, PASSWORD_DEFAULT);

    $loginForm = password_hash(trim(htmlspecialchars($loginForm)), PASSWORD_DEFAULT);
    $passwordForm = password_hash(trim(htmlspecialchars($passwordForm)), PASSWORD_DEFAULT);

    if ($loginCheck == $loginForm && $passwordCheck == $passwordForm) return true;

    return 'Неверный логин или пароль!';

}
?>