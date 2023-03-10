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
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="admin.php">
                        <img src="img/logo.png" alt="logo" width="60px" height="40px" />
                    </a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link  text-light" aria-current="page" href="#titleMap">Карта</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-light" aria-current="page" href="#tableInfoUser">Информация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-light" aria-current="page" href="#features">Избранное</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-light" aria-current="page" href="#moderation">Модерация</a>
                        </li>
                    </ul>
                    <!-- <div class="text-light border" id="headingText">
                        <p class="fs-3">Поиск управляющих компаний по г. Москва</p>
                    </div> -->
                    <form class="d-flex text-light">
                        <div class="py-2">
                            <? if ($_SESSION['user']){
                                echo '<a class="nav-link text-light" aria-current="page" href="#">' .$_SESSION['user']['login']. '</a>';
                                }
                            ?>
                        </div>
                        <button class="btn btn-outline-success my-2 mx-3 my-sm-0" type="submit">
                            <a href="logOut.php" class="nav-link">Выход</a>
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
                <div class="col-12 table-wrapper">
                    <table id="" class="table table-striped table-earnings">
                        <thead>
                            <tr>
                                <th scope="col" id="nameCompany">Название компании</th>
                                <th scope="col" id="point100">Баллы (Макс. 100)</th>
                                <th scope="col" id="ratingComp">Рейтинг</th>
                                <th scope="col" class=""></th>
                            </tr>
                        </thead>
                        <tbody id="table_content">


                        </tbody>

                    </table>
                </div>
            </div>
            
            <div class="row border my-3 card" id="features">
                <div class="col-12 text-center" id="data_text">
                    <p class="fs-3">Избранное</p>
                </div>
                <div class="col-12 my-3 table-wrapper" id="features">
                    <table id="" class="table table-striped table-earnings">
                        <thead>
                            <tr>
                                <th scope="col" id="nameCompany">Название компании</th>
                                <th scope="col" id="point100">Баллы (Макс. 100)</th>
                                <th scope="col" id="ratingComp">Рейтинг</th>
                                <th scope="col" class=""></th>
                            </tr>
                        </thead>
                        <tbody id="table_content_features">

                        </tbody>
                    </table>
                </div>
                <div class="col-12  d-flex justify-content-center" id="divButton">
                    <button class="btn btn-outline-success my-2 my-sm-0 mx-3 w-100" id="updateFeatures" type="submit" onclick="outFeat();">
                        <a class="nav-link"> Обновить </a>
                      </button>
                </div>
            </div>
            
            <div class="row border my-5 card" id="moderation">
                <div class="col-12 text-center" id="data_text">
                    <p class="fs-3">Модерация отзывов</p>
                </div>
                <div class="col-12 my-3 table-wrapper">
                    <table id="" class="table table-striped table-earnings">
                        <thead>
                            <tr>
                                <th scope="col" id="nameUser">Имя пользователя</th>
                                <th scope="col" id="textFeedback">Текст отзыва</th>
                                <th scope="col" id="nameOrganization">Название компании</th>
                                <th scope="col" class=""></th>
                            </tr>
                        </thead>
                        <tbody id="table_content_feedback">

                        </tbody>
                    </table>
                </div>
                <div class="col-12  d-flex justify-content-center" id="divButton">
                    <button class="btn btn-outline-success my-2 my-sm-0 mx-3 w-100" id="updateFeedback" type="submit" onclick="updateTable();">
                        <a class="nav-link"> Обновить </a>
                      </button>
                </div>
            </div>



        </div>
            <footer class="py-3 my-4 border bg-dark">
                <div class="container-fluid">
                    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                        <li class="nav-item">
                            <a href="#titleMap" class="nav-link px-2 text-light">Карта</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tableInfoUser" class="nav-link px-2 text-light">Информация</a>
                        </li>
                        <li class="nav-item">
                            <a href="#features" class="nav-link px-2 text-light">Избранное</a>
                        </li>
                        <li class="nav-item">
                            <a href="#moderation" class="nav-link px-2 text-light">Модерация</a>
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

            <!-- Модальное окно отзыва -->
            <div class="modal fade" id="feedbackModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Оставить отзыв</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="feedback.php" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <!-- <p id="idRegOrg" name="idRegOrg"></p> -->
                                    <label for="idRegOrg">Заявление №</label>
                                    <input type="number" class="my-3" id="idRegOrg" name="idRegOrg" required/>
                                    <textarea name="feedback" id="feedback" cols="50" rows="10" placeholder="Введите текст"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Модальное окно отзыва -->


            <script>
                var id = 1212;
                $.post('/outputFeatures.php', {
                    text: id
                }, function(html) {
                    document.getElementById("table_content_features").innerHTML = html;
                });
            </script>

            <script>
                var id = 1212;
                $.post('/checkFeedback.php', {
                    text: id
                }, function(html) {
                    document.getElementById("table_content_feedback").innerHTML = html;
                });
            </script>

            <script>
                function getIdRegOrg() {
                    $('#table_content tr').click(function(event) {
                        var id = $(this).attr('id');
                        document.querySelector('#idRegOrg').value = id;
                    });
                }

                function getIdRegOrgFeat() {
                    $('#table_content_features tr').click(function(event) {
                        var id = $(this).attr('id');
                        document.querySelector('#idRegOrg').value = id;
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
                function updateTable() {
                    var id = 1212;
                    $.post('/checkFeedback.php', {
                        text: id
                    }, function(html) {
                        document.getElementById("table_content_feedback").innerHTML = html;
                    });
                }
            </script>

            <!-- Успешная проверка отзыва -->
            <script>
                function trueCheckMessage(){
                    $('#table_content_feedback tr').click(function(event) {
                        var id = $(this).attr('id');
                        $.post('/trueFeedback.php', {
                            text: id
                        }, setTimeout(function() {
                            $('#updateFeedback').trigger('click');
                        }, 1000));

                    });
                }
            </script>


            <!-- Провальная проверка отзыва -->
            <script>
                function falseCheckMessage(){
                    $('#table_content_feedback tr').click(function(event) {
                        var id = $(this).attr('id');
                        $.post('/fallsFeedback.php', {
                            text: id
                        }, setTimeout(function() {
                            $('#updateFeedback').trigger('click');
                        }, 1000));

                    });
                }
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
            
            <!-- Для модального окна отзывов -->
            <script>
                function getIdRegOrg() {
                    $('#table_content tr').click(function(event) {
                        var id = $(this).attr('id');
                        
                        document.querySelector('#idRegOrg').value=id;
                        
                    });
                }
            </script>

            <!--Добавление в израбнное-->
            <script>
                function getIdTrFeatures() {
                    $('#table_content tr').click(function(event) {
                        var id = $(this).attr('id');
                        
                        $.post('/features.php', {
                            text: id
                        }, setTimeout(function() {
                            $('#updateFeatures').trigger('click');
                        }, 1000));

                    });
                }
            </script>

            <script>
                function getIdTrFeat() {
                    $('#table_content_features tr').click(function(event) {
                        var id = $(this).attr('id');
                        
                        $.post('/modal.php', {
                            text: id
                        }, function(html) {
                            document.getElementById("infoForBody").innerHTML = html;
                          
                        });
                    });


                }
            </script>

            <script>
                function deleteFeatures() {
                    $('#table_content_features tr').click(function(event) {
                        var id = $(this).attr('id');
                        $.post('/deleteFeatures.php', {
                            text: id
                        }, setTimeout(function() {
                            $('#updateFeatures').trigger('click');
                        }, 1000));

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