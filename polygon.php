<?php
include 'connect_db.php';
include 'data.php';
$result = mysqli_query($mysql, 'SELECT * FROM `dataset`');
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Редактор многоугольника</title>
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
        <div class="container">
            <div class="row my-5 border">
                <div class="k12 col-12">
                    <div id="map"></div>
                </div>
            </div>
            <div class="row my-5 border">
                <div class="col-12">
                    <!-- <p id="text_title"></p> -->
                    <form action="" method="post">
                        <input type="text" id="text_title" name="text_title">
                        <!-- <button type="submit">Показать дополнительную информацию</button> -->
                    </form>
                    <hr />
                    <p id="data_primer"></p>
                    <!-- <p id="data_text"></p> -->
                </div>
                <div class="col-12" id="data_text">

                </div>
                <div class="row card">
                    <table id="t_extension" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Название компании</th>
                                <th scope="col">Количество домов в управлении</th>
                                <th scope="col">Финальный рейтинг</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>

                    </table>
                </div>

            </div>
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
                    }, function(data) {
                        $('#data_text').text('True: ' + data);
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