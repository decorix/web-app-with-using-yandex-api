<?php
// session_start();
// include 'connect_db.php';
// include 'data.php';

// $result = mysqli_query($mysql, 'SELECT * FROM `dataset`');
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Главная</title>
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
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="polygon.php">
                        <img src="img/logo.png" alt="logo" width="60px" height="40px" />
                    </a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link  text-light" aria-current="page" href="#titleMap">Карта</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-light" aria-current="page" href="#tableInfoUser">Информация</a>
                        </li>
                    </ul>
                    <!-- <div class="text-light border" id="headingText">
                        <p class="fs-3">Поиск управляющих компаний по г. Москва</p>
                    </div> -->
                    <form class="d-flex">
                        <button class="btn btn-outline-success my-2 my-sm-0 mx-2" type="submit">
                            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#auth">Авторизация</a>
                        </button>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#registr"> Регистрация </a>
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row my-4">
                <div class="col-12 text-center" id="titleMap">
                    <h1>Поиск управляющих компаний</h1>
                </div>
            </div>
            <div class="row my-5 border card">
                <div class="k12 col-12">
                    <div class="my-4" id="map"></div>
                </div>
            </div>
            <div class="row my-5 border card" id="tableInfoUser">
                <div class="col-12 text-center" id="data_text">
                    <p class="fs-3">Информация о управляющих компаниях по г. Москва</p>
                </div>
                <div class="col-5 mx-auto">
                    <p class='text-center fs-5' id="text_title"></p>
                    <p id="data_primer"></p>
                </div>
                <div class="col-12" id="data_text">

                </div>
                <div class="col-12 table-wrapper" id="information">
                    <table id="" class="table table-striped table-earnings">
                        <thead>
                            <tr>
                                <th scope="col" id="nameCompany">Название компании</th>
                                <th scope="col" id="point100">Баллы (Макс. 100)</th>
                                <th scope="col" id="ratingComp">Рейтинг</th>
                                <th scope="col"></th>
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
                            <a class="nav-link px-2 text-light" aria-current="page" href="#titleMap">Карта</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 text-light" aria-current="page" href="#information">Информация</a>
                        </li>
                    </ul>
                    <p class="text-center text-light">@ by Evgeny Polyakov, 2023</p>
                </div>
            </footer>

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

            <!-- Модальное окно авторизации -->
            <div class="modal fade" id="auth" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Авторизация</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="checkAuth.php" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="authLogin" class="form-label">Логин</label>
                                    <input type="text" class="form-control mx-3" id="authLogin" name="authLogin" />
                                </div>
                                <div class="form-group">
                                    <label for="authPassword" class="form-label">Пароль</label>
                                    <input type="password" class="form-control mx-3" id="authPassword" name="authPassword" />
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Войти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Модальное окно авторизации -->

            <!-- Модальное окно регистрации -->
            <div class="modal fade" id="registr" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Регистрация</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="checkReg.php" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="regLogin" class="form-label">Логин</label>
                                    <input type="email" class="form-control mx-3" id="regLogin" name="regLogin" required/>
                                </div>
                                <div class="form-group">
                                    <label for="regPassword" class="form-label">Пароль</label>
                                    <input type="password" class="form-control mx-3" id="regPassword" name="regPassword" required/>
                                </div>
                                <div class="form-group">
                                    <label for="regConfirmPassword" class="form-label">Подтверждение пароля</label>
                                    <input type="password" class="form-control mx-3" id="regConfirmPassword" name="regConfirmPassword" required/>
                                    <? if ($_SESSION['message']){
                                        echo '<p>' .$_SESSION['message']. '</p>';
                                    }
                                    unset($_SESSION['message']);
                                    ?>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                                <!-- $sql='INSERT INTO `company` (`name`, `type`, `address`) VALUES ('.$_POST['titleOrg'].', '.$_POST['typeObject'].', '.$_POST['address'].');';
                            mysqli_query($mysql, $sql); -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Модальное окно регистрации -->

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