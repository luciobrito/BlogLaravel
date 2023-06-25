<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    @auth
    <p>Parabéns, você está logado!</p>
    <form action="/logout" method="POST">
    @csrf
    <button>Sair</button>
    </form>
    @else
    <h1>Registrar</h1>
    <form action="/registrar" method="POST">
        @csrf <!--Importante para o funcionamento do formulário!-->
        <input name ="name" type="text" name="Nome" id="">
        <input name = "email" type="text" name="Email" id="">
        <input name = "password" type="password" placeholder="Senha" name="" id="">
        <button>Registrar</button>
    </form>
    <h1>Login</h1>
    <form action="/login" method="POST">
        @csrf <!--Importante para o funcionamento do formulário!-->
        
        <input name = "loginemail" type="text" name="Email" id="">
        <input name = "loginpassword" type="password" placeholder="Senha" name="" id="">
        <button>Entrar</button>
    </form>

    @endauth

</body>
</html>