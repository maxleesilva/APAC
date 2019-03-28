<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pesquisa APAC</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/login.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">	
            <div class="box">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <form method="post" action="ope.php" id="formlogin" name="formlogin">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Usuário</label>
                                <input type="text" class="form-control" name="login" id="login" placeholder="Usuário">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Senha</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Entre com a senha">
                            </div>
                            <div class="form-check">
                                <button class="btn btn-info" type="button" name="showpassword" id="showpassword" value="Show Password">Mostrar senha</button>
                                <button type="submit" class="btn btn-primary" value="LOGAR">Entrar</button>
                            </div> 
                    </form>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function(){
            // Show password Button
            $("#showpassword").on('click', function(){
                
                var pass = $("#password");
                var fieldtype = pass.attr('type');
                if (fieldtype == 'password') {
                    pass.attr('type', 'text');
                    $(this).text("Esconder senha");
                }else{
                    pass.attr('type', 'password');
                    $(this).text("Mostrar senha");
                }
            });
            });
        </script>
    </body>
</html>