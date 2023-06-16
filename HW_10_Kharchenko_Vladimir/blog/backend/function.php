<?php

//функция проверки формы при регистрации аккаунта
function checkForm($login, $first_name, $last_name, $password) {
$result = false;

if (empty($login) || empty($password) || empty($first_name) || empty($last_name)) {
return $result = "Все поля должны быть заполненны!";
}

if (!preg_match("/(^([A-Za-z0-9\-]+)[_A-Za-z0-9]+){1,12}/", $login)) {
return $result = "Неправильный логин";
}

if (!preg_match('/(^([A-Za-zА-Яа-я0-9\-]+)[_A-Za-zА-Яа-я0-9]+){1,12}/', $first_name)) {
return $result = "Неверное имя!";
}

if (!preg_match('/(^([A-Za-zА-Яа-я0-9\-]+)[_A-Za-zА-Яа-я0-9]+){1,12}/', $last_name)) {
return $result = "Неверная фамилия!";
}

if (!preg_match('/[A-Za-z0-9_!*,.^#\-]{5,12}/', $password)) {
return $result = "Неверный пароль!";
}

return $result = true;

}

//функции создания и добавления нового пользователся в БД
function setNewUser($login, $first_name, $last_name, $password, $mysqli) {
    $result = false;

    $loginDB = $mysqli->query("SELECT login FROM authors WHERE login='" . $login . "';");
    $row = mysqli_fetch_assoc($loginDB);


    if (!empty($row['login'])) {
        return $result = "Пользователь с таким логином уже существует!";
    }

    $password = password_hash($password, PASSWORD_DEFAULT);


    $mysqli->query("INSERT INTO `authors` (`id`, `login`, `password`, `first_name`, `last_name`) VALUES 
    (NULL, '${login}', '${password}', '${first_name}', '${last_name}');");
    return true;
}

//функция которая проверяет авторизацию пользователя
function checkAuth($login, $password, $mysqli){
    $result = false;

    $loginDB = $mysqli->query("SELECT login FROM authors WHERE login='" . $login . "'");
    $rowLoginDb = mysqli_fetch_assoc($loginDB);


    if (empty($rowLoginDb['login'])) {
        return $result = "Пользователя с таким логином не существует!";
    }

    $dataDB = $mysqli->query("SELECT * FROM authors WHERE login='" . $login . "'");
    $rowDataDb = mysqli_fetch_assoc($dataDB);

    if (password_verify($password, $rowDataDb['password'])) {
        $_SESSION['login'] = $rowDataDb['login'];
        $_SESSION['first_name'] = $rowDataDb['first_name'];
        $_SESSION['last_name'] = $rowDataDb['last_name'];
        $_SESSION['id_author'] = $rowDataDb['id'];
        return true;
    } else {
        return $result = "Неверный пароль!";
    }
};

function resultCategories($mysqli) {
    $sqlResultCategories = $mysqli->query('SELECT id, name FROM categories');
    if ($sqlResultCategories->num_rows) {
        return mysqli_fetch_assoc($sqlResultCategories);
    } else {
        return false;
    }


}

// функция на проверку формы перед отправкой в базу данных
function checkFormAddArticles($post) {
    $data['active'] = $post['active'];
    $data['name_articles'] = $post['name_articles'];
    $data['description_articles'] = $post['description_articles'];
    $data['content_articles'] = $post['content_articles'];
    $data['image_articles'] = $post['image_articles'];
    $data['categories_id'] = $post['categories_id'];

    //проверяет все ли поля были отправлены
    $response = array_filter($data, function ($el) {
        if (empty($el)) {
            return false;
        } return true;
    });

    if (count($_POST) !== count($response)) {
        echo "<h1 style='color: red; text-align: center'>Заполните все поля!</h1>";
        return false;

    }

    return $data;

}

//добавление статьи в базу данных
function insertToDb($mysqli, array $data)
{
    $query = "INSERT INTO `post` (`id`, `active`, `title`, `content`, `category_id`, `author_id`, `date`, `description`, `link_image`) 
VALUES 
    (NULL, '${data['active']}', '${data['name_articles']}', '${data['content_articles']}', '${data['categories_id']}', '${_SESSION['id_author']}',
     CURRENT_TIMESTAMP, '${data['description_articles']}', '${data['image_articles']}');";

    $mysqli->query($query);
    //header('Location:/');
}

//пагинация страниц
function paginationArticles($mysqli, $sort = 0) {
    if ($sort == 0) {
        $countArticles = $mysqli->query("SELECT COUNT(*) FROM post;");
        if ($countArticles->num_rows) {
            $count = 1;
            while ($pagination = mysqli_fetch_assoc($countArticles)) {
                $allArticles = $pagination['COUNT(*)'];
            }
            $pages = ceil($allArticles / 5);
            $html = '';
            while ($count <= $pages) {
                $html .= "
        <a href='../articles/index.php?pg=${count}' > ${count} </a>
        ";
                $count++;
            }
            return $html;
        }
    } else {
        $countArticles = $mysqli->query("SELECT COUNT(*) FROM post WHERE category_id = ${sort};");
        if ($countArticles->num_rows) {
            $count = 1;
            while ($pagination = mysqli_fetch_assoc($countArticles)) {
                $allArticles = $pagination['COUNT(*)'];
            }
            $pages = ceil($allArticles / 5);
            $html = '';
            while ($count <= $pages) {
                $html .= "
        <a href='../articles/index.php?pg=${count}&categories_id=${sort}' > ${count} </a>
        ";
                $count++;
            }
            return $html;
        }
    }


}