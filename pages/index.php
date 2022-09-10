    <?php
    session_start(); // запуск новой или существующей сессии
    require_once('../function.php');
    ?>
    <?php if ($_SESSION['auth'] == true) { ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css">
            <title>Личный кабинет</title>
        </head>

        <body>
            <div class="text-center">
                <h1 style="color: #CE7DA5;">Добро пожаловать в личный кабинет</h1>
                </br>
            </div>
            <div class="d-flex justify-content-evenly">
                <div class="d-flex flex-row mb-3">
                    <div class="d-flex flex-column mb-3">
                        <div class="text-center">
                            <div class="p-2"><img src="../imges/2022-09-10_13-00-27.png" alt="massage"></div>
                            <div class="p-2">
                                <!-- Разместите на главной странице индивидуальную акцию. -->
                                <h4 style="color: #CE7DA5;">Акция "День рождения" в Тайрай!</br>Истекает через: <?= $action = date('H:i:s', strtotime('00:00:00') - time()); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row mb-3">
                    <div class="d-flex flex-column mb-3">
                        <div class="text-center">
                            <div class="p-2"><img src="../imges/birthday256x256.png" class="rounded" alt="spa"></div>
                            <div class="p-2">
                                <h4 style="color: #CE7DA5;">
                                    <?php //Спросите дату рождения пользователя. Отобразите персональную скидку 5% на все услуги салона.
                                    if (date("Y-m-d") != $_SESSION['bithday']) {
                                        echo "Ваш день рождения через " . date("d", strtotime(date("Y-m-d")) - strtotime($_SESSION['bithday'])) . " день.";
                                    } else {
                                        echo "Поздравляем с днём рождения! </br>Мы дарим вам персональную </br> скидку 5% на все услуги салона!";
                                    };
                                    ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row mb-3">
                    <div class="d-flex flex-column mb-3">
                        <div class="text-center">
                            <div class="p-2">
                                <h2 style="color: #CE7DA5;">Добро пожаловать </br><?= $_SESSION['login'] ?></h2>
                            </div>
                            <div class="p-2">
                                <h4 style="color: #CE7DA5;"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="container text-center">
                    <form action="../login.php" method="post">
                        <?php
                        // закрывает доступ пользователю
                        $_SESSION['auth'] = false;
                        ?>
                        <button type="submit" name="input" class="btn bg-warning">Выход</button>
                    </form>
                </div>
        </body>

        </html>
    <?php } else {
        echo "Тебе сюда нельзя ты не авторизован";
    };
    ?>