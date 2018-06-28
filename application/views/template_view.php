<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tasks</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <?php
        echo '<link href="'.CONST_host.'css/mystyle/style.css" rel="stylesheet" type="text/css"/>';
        echo '<link href="'.CONST_host.'css/mystyle/equal-height-columns.css" rel="stylesheet" type="text/css" />';
        echo '<link href="'.CONST_host.'css/mystyle/auto-colums.css" rel="stylesheet" type="text/css"/>';
        echo '<link href="'.CONST_host.'css/mystyle/navbar-style.css" rel="stylesheet" type="text/css"/>';
    ?>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
       
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <a class="navbar-brand" href="/">Tasks</a>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                    <span class="sr-only">Открыть навигацию</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>  
            </div>

            <div class="collapse navbar-collapse" id="responsive-menu">
                <ul class="nav navbar-nav">
                    <?php
                    echo '<li><a href="'.CONST_host.'add_task">Добавить задачу</a></li>';
                    echo '<li><a href="'.CONST_host.'tasks">Список задач</a></li>';
                    ?>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <?php
                        if (!isset($_SESSION['user_name'])){
                    ?>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Войти</b> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                 <div class="row">
                                        <div class="col-md-12">
                                            <form class="form" role="form" method="POST" action="" accept-charset="UTF-8" id="login-nav">
                                                <div class="form-group">
                                                    <label class="sr-only" for="inputLogin">Login</label>
                                                        <input type="text" class="form-control" id="inputLogin" placeholder="Логин" name="user_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="inputPass">Password</label>
                                                        <input type="password" class="form-control" id="inputPass" placeholder="Пароль" name="user_password" required>
                                                </div>
                                                <div class="form-group btn-submit">
                                                    <button type="submit" class="btn btn-primary btn-block" name="login_post">Войти</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                 </div>
                            </li>
                        </ul>
                    </li>
                    <?php
                        }
                        else{
                    ?>
                    <li>
                        <p class="navbar-text">Добро пожаловать, <?php echo $_SESSION['user_name']; ?>!</p>
                    </li>
                    <li>
                        <form class="navbar-form" role="form" method="POST" id="login-exit-nav">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger" name="login_exit">Выйти</button>
                            </div>
                        </form>
                    </li>
                    <?php
                        }
                    ?>
                </ul>

            </div>

        </div>
    </div>
       
    <?php include 'application/views/'.$content_view; ?>


    <?php
        if ($GLOBALS['error'] != "empty_error" && !empty($GLOBALS['error'])){
            echo '<script> alert("'.$GLOBALS['error'].'"); </script>';
        }    
    ?>
       
    
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php
    echo '<script src="'.CONST_host.'js/bootstrap.js"></script>';
    ?>
  </body>
</html>


