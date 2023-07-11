<?php
namespace App\Controllers;

class HomeController extends Controller
{
public function index() {

    $test = [
        'home' => 'index.php',
        'about' => 'about.php',
    ];

    $this->display('index.html', [
        'title' => 'главная страница',
        'test' => $test
    ]);
}

}