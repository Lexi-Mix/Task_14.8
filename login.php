<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Spa</title>
</head>

<body>

    <?php
    require_once('function.php'); //подключает все функции
    ?>

    <?php if (!isset($_REQUEST['input'])) { ?>
        <div class="d-flex justify-content-evenly">
            <div class="d-flex flex-row mb-3">
                <div class="d-flex flex-column mb-3">
                    <div class="text-center">
                        <div class="p-2"><img src="imges/massage64x64.png" alt="massage"></div>
                        <div class="p-2">
                            <h3 style="color: #CE7DA5;">Массаж</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row mb-3">
                <div class="d-flex flex-column mb-3">
                    <div class="text-center">
                        <div class="p-2"><img src="imges/soak64x64.png" class="rounded" alt="spa"></div>
                        <div class="p-2">
                            <h3 style="color: #CE7DA5;">Спа</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row mb-3">
                <div class="d-flex flex-column mb-3">
                    <div class="text-center">
                        <div class="p-2">
                            <img src="imges/legs64x64.png" class="rounded" alt="unic">
                        </div>
                        <div class="p-2">
                            <h3 style="color: #CE7DA5;">Уникальные услуги</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row mb-3">
                <div class="d-flex flex-column mb-3">
                    <div class="text-center">
                        <div class="p-2"><img src="imges/spa64x64.png" class="rounded" alt="for twice"></div>
                        <div class="p-2">
                            <h3 style="color: #CE7DA5;">Программы для двоих</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Логин</label>
                    <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="text1" class="form-label">День рождения</label>
                    <input type="date" name="bithday" class="form-control" id="bithday">
                </div>
                <button type="submit" name="input" class="btn btn-success">Вход</button>
            </form>
        </div>
        </br>
        <div class="d-flex justify-content-evenly">
            <div class="d-flex flex-row mb-3">
                <div class="d-flex flex-column mb-3">
                    <div class="text-center">
                        <div class="p-2"><img src="imges/2022-09-10_12-31-21.png" alt="massage"></div>
                        <div class="p-2">
                            <h4 style="color: #CE7DA5;">Спа-салон в г. Химки выходит<span></br></span> с карантина 4 июня 2020</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row mb-3">
                <div class="d-flex flex-column mb-3">
                    <div class="text-center">
                        <div class="p-2"><img src="imges/2022-09-10_12-31-39.png" class="rounded" alt="spa"></div>
                        <div class="p-2">
                            <h4 style="color: #CE7DA5;">Открытие м. Молодежная 2020!</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row mb-3">
                <div class="d-flex flex-column mb-3">
                    <div class="text-center">
                        <div class="p-2">
                            <img src="imges/2022-09-10_12-32-34.png" class="rounded" alt="unic">
                        </div>
                        <div class="p-2">
                            <h4 style="color: #CE7DA5;">Новый год в новом месте! <span></br></span> м.Новые Черемушки переехал 2020</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else {
        // функция getUsersList() возвращает массив всех пользователей и хэшей их паролей
        $usersmass = getUsersList();
        //Сделайте возможность аутентификации пользователя
        foreach ($usersmass as $key => $value) {
            if ($key === $_REQUEST['login'] && $usersmass[$key]['password'] === sha1($_REQUEST['password'])) {
                session_start();
                // Пишем в сессию информацию о том, что мы авторизовались
                $_SESSION['auth'] = true;
                // Пишем в сессию все данные пользователя
                $_SESSION['id'] = $usersmass[$key]['id'];
                $_SESSION['login'] = $_REQUEST['login'];
                $_SESSION['password'] = sha1($_REQUEST['password']);
                $_SESSION['bithday'] = $_REQUEST['bithday'];
                // Редирект на index.php
                header('Location: pages/index.php');
                break;
            } else {
                //Возврат на логин"
                header('Location: login.php');
                break;
            };
        };
    };
    ?>

</body>

</html>