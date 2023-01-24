<?php
include 'connect_db.php';
include 'data.php';
session_start();
if ($_SESSION['user'] && $_SESSION['user']['status'] == 'user') {
    header('Location: /user.php');
}
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Режим Администратора</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css" />
        <!--
        Укажите свой API-ключ. Тестовый ключ НЕ БУДЕТ работать на других сайтах.
        Получить ключ можно в Кабинете разработчика: https://developer.tech.yandex.ru/keys/
    -->
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<1a63e196-ed06-4a2e-9d77-07ce452e7be4>" type="text/javascript"></script>
        <script src="polygonEditor.js" type="text/javascript"></script>
        <script src="https://yastatic.net/jquery/2.2.3/jquery.min.js"></script>
        <script src="/assets/js/jquery-3.5.1.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="header">
            <div class="container-fluid">
                <a class="navbar-brand" href="admin.php">
                    <img src="img/logo.png" alt="logo" width="60px" height="40px" />
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="polygon.html">Главная</a>
                        </li>
                        <? if ($_SESSION['user']){
                    echo '<li class="nav-item"> <a class="nav-link active text-light" aria-current="page" href="#">' .$_SESSION['user']['status']. '</a></li>';
                    }
                    ?>
                    </ul>
                    <form class="form-inline position-absolute my-3 top-0 end-0">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              <a href="logOut.php" class="nav-link">Выход</a>
            </button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row my-4">
                <div class="col-12 text-center">
                    <h1>Поиск управляющих компаний</h1>
                </div>
            </div>
            <div class="row my-5 border card">
                <div class="k12 col-12">
                    <div class="my-4" id="map"></div>
                </div>
            </div>
            <div class="row my-5 border card">
                <div class="col-5 mx-auto">
                    <p class='text-center fs-5' id="text_title"></p>
                    <p id="data_primer"></p>
                </div>
                <div class="col-12" id="data_text">

                </div>
                <div class="col-12 table-wrapper">
                    <table id="" class="table table-striped table-earnings">
                        <thead>
                            <tr>
                                <th scope="col" id="nameCompany">Название компании</th>
                                <th scope="col" id="point100">Баллы (../100)</th>
                                <th scope="col" id="ratingComp">Рейтинг</th>
                                <th scope="col" class="d-flex justify-content-center">Доп. функции</th>
                            </tr>
                        </thead>
                        <tbody id="table_content">


                        </tbody>

                    </table>
                </div>

            </div>
            <footer class="py-3 my-4 border bg-dark">
                <div class="container-fluid">
                    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                        <li class="nav-item">
                            <a href="admin.php" class="nav-link px-2 text-light">Главная</a>
                        </li>
                    </ul>
                    <p class="text-center text-light">@ by Evgeny Polyakov, 2023</p>
                </div>
            </footer>

            <script>
                function data(title) {
                    let name = title;
                    $.post('/data.php', {
                        text: name
                    }, function(html) {
                        document.getElementById("table_content").innerHTML = html;
                    });                 
                }
            </script>
    </body>

    </html>