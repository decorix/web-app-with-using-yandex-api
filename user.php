<?php
include 'connect_db.php';
include 'data.php';
session_start();
if ($_SESSION['user'] && $_SESSION['user']['status'] == 'admin') {
    header('Location: /admin.php');
}
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Режим пользователя</title>
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
                <a class="navbar-brand" href="user.php">
                    <img src="img/logo.png" alt="logo" width="60px" height="40px" />
                </a>
                <div class="collapse navbar-collapse border d-flex" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link  text-light" aria-current="page" href="#titleMap">Карта</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-light" aria-current="page" href="#information">Информация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-light" aria-current="page" href="#features">Избранное</a>
                        </li>
                        <!-- <? if ($_SESSION['user']){
                    echo '<li class="nav-item"> <a class="nav-link  text-light border" aria-current="page" href="#">' .$_SESSION['user']['login']. '</a></li>';
                    }
                    ?> -->
                    </ul>
                    <div class="border text-light  justify-content-end" id="log">
                        <? if ($_SESSION['user']){
                            echo '<a class="nav-link  text-light border" aria-current="page" href="#">' .$_SESSION['user']['login']. '</a>';
                            }
                        ?>
                    </div>
                    <div class="border text-light " id="exit">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                            <a href="logOut.php" class="nav-link">Выход</a>
                          </button>
                    </div>
                    <!-- <form class="form-inline position-absolute my-3 top-0 end-0" id="exit">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              <a href="logOut.php" class="nav-link">Выход</a>
            </button>
                    </form> -->
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row my-4">
                <div class="col-12 text-center" id="titleMap">
                    <h1>Поиск управляющих компаний</h1>
                    <p id='pold'></p>
                </div>
            </div>
            <div class="row my-5 border card">
                <div class="k12 col-12">
                    <div class="my-4" id="map"></div>
                </div>
            </div>
            <div class="row my-5 border card">
                <div class="col-5 mx-auto">
                    <!-- <p id="text_title"></p>
                     <form action="" method="post">
                        <input class="w-100" type="text" id="text_title" name="text_title">
                         button type="submit">Показать дополнительную информацию</button> 
                    </form> -->
                    <p class='text-center fs-5' id="text_title"></p>
                    <p id="data_primer"></p>
                    <!-- <p id="data_text"></p> -->
                </div>
                <div class="col-12" id="data_text">

                </div>
                <div class="col-12 table-wrapper" id="information">
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

            <div class="row">
                <div class="col-12 text-center">
                    <h2>Избранное</h2>
                    <p id='title12'></p>
                </div>
            </div>
            <div class="row border my-3 card" id="features">
                <div class="col-12 my-3 table-wrapper">
                    <table id="" class="table table-striped table-earnings">
                        <thead>
                            <tr>
                                <th scope="col" id="nameCompany">Название компании</th>
                                <th scope="col" id="point100">Баллы (../100)</th>
                                <th scope="col" id="ratingComp">Рейтинг</th>
                                <th scope="col" class="d-flex justify-content-center">Доп. функции</th>
                            </tr>
                        </thead>
                        <tbody id="table_content_features">

                        </tbody>
                    </table>
                </div>
                <div class="col-12  d-flex justify-content-end">
                    <button class="btn btn-outline-success my-2 my-sm-0 mx-3" type="submit" onclick="outFeat();">
                        <a href="#" class="nav-link"> Обновить </a>
                      </button>
                </div>
            </div>

            <!-- Модальное окно доп информации -->
            <div class="modal fade" id="dopInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Дополнительная информация</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="#" method="#">
                            <div class="modal-body" id="infoForBody">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Модальное окно доп информации -->

            <footer class="py-3 my-4 border bg-dark">
                <div class="container-fluid">
                    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                        <li class="nav-item">
                            <a href="user.php" class="nav-link px-2 text-light">Главная</a>
                        </li>
                    </ul>
                    <p class="text-center text-light">@ by Evgeny Polyakov, 2023</p>
                </div>
            </footer>

            <script>
                var id = 1212;
                $.post('/outputFeatures.php', {
                    text: id
                }, function(html) {
                    document.getElementById("table_content_features").innerHTML = html;
                });
            </script>

            <!--Вывод информации в модальное окно -->
            <script>
                function getIdTr() {
                    $('#table_content tr').click(function(event) {
                        var id = $(this).attr('id');
                        // var a = document.getElementById("pold");
                        // a.innerHTML = id;
                        $.post('/modal.php', {
                            text: id
                        }, function(html) {
                            // $('#data_text').text('True: ' + data);
                            document.getElementById("infoForBody").innerHTML = html;
                            // $('#table_content > tbody').append(html);
                        });
                    });


                }
            </script>

            <!--Добавление в израбнное-->
            <script>
                function getIdTrFeatures() {
                    $('#table_content tr').click(function(event) {
                        var id = $(this).attr('id');
                        // var d = document.getElementById("title12");
                        // d.innerHTML = id;
                        // var a = document.getElementById("pold");
                        // a.innerHTML = id;
                        $.post('/features.php', {
                            text: id
                        }, function(html) {});

                    });
                }
            </script>

            <script>
                function getIdTrFeat() {
                    $('#table_content_features tr').click(function(event) {
                        var id = $(this).attr('id');
                        // var a = document.getElementById("pold");
                        // a.innerHTML = id;
                        $.post('/modal.php', {
                            text: id
                        }, function(html) {
                            document.getElementById("infoForBody").innerHTML = html;
                            // $('#data_text').text('True: ' + data);
                            // $('#table_content > tbody').append(html);
                        });
                    });


                }
            </script>

            <script>
                function deleteFeatures() {
                    $('#table_content_features tr').click(function(event) {
                        var id = $(this).attr('id');
                        // var d = document.getElementById("title12");
                        // d.innerHTML = id;
                        // var a = document.getElementById("pold");
                        // a.innerHTML = id;
                        $.post('/deleteFeatures.php', {
                            text: id
                        }, function(html) {
                            document.getElementById("title12").innerHTML = html;
                        });

                    });
                }
            </script>

            <script>
                function outFeat() {
                    var id = 1212;
                    $.post('/outputFeatures.php', {
                        text: id
                    }, function(html) {
                        document.getElementById("table_content_features").innerHTML = html;
                    });
                }
            </script>

            <script>
                function data(title) {
                    // var a = document.getElementById("data_primer");
                    // a.innerHTML = title;
                    // let dataDB= {
                    //     "name": title
                    // };
                    // let jsonStr = JSON.stringify(dataDB);
                    // $.ajax({
                    //     url: 'data.php',
                    //     type: 'POST',
                    //     dataType: 'html',
                    //     data: {"dataQuery": jsonStr},
                    //     success: function(data){
                    //         $('#data_text').text('True: ' + JSON.stringify(name));
                    //     }
                    // })  

                    let name = title;
                    $.post('/data.php', {
                        text: name
                    }, function(html) {
                        // $('#data_text').text('True: ' + data);
                        document.getElementById("table_content").innerHTML = html;
                        // $('#table_content > tbody').append(html);
                    });


                    // $.ajax({
                    //     url: 'data.php',
                    //     type: 'POST',
                    //     dataType: 'text',
                    //     data: 'param=' + name,
                    //     success: function(data){
                    //         $('#data_text').text('True: ' + JSON.stringify(name));
                    //     }
                    // })                    
                }
            </script>
    </body>

    </html>