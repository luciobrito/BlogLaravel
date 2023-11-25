<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Azure</title>
</head>
<body>
    @auth
    <p>Parabéns, você está logado!</p>
    <form action="/logout" method="POST">
    @csrf
    <button>Sair</button>
    </form>
    <h2>Criar um novo post!</h2>
    <form action="/create-post" method="post">
        @csrf
        <input type="text" name="title">
        <textarea name="body" placeholder="Conteúdo"></textarea>
        <button>Enviar Post</button>
    </form>
    <div>
        <h2>Todos os Posts!</h2>
        @foreach($posts as $post)
        <h3> {{$post['title']}} por {{$post->user->name}} <!--Duas tabelas relacionadas, a user e a post--></h3>
        <p> {{$post['body']}} </p>
        <p><a href="/edit-post/{{$post->id}}">Editar</a></p>
        <form action="/delete-post/{{$post->id}}" method="post">
            @csrf
            @method('DELETE')
            <button>Apagar</button>
        </form>
        @endforeach
    </div>
    @else
    <h2>Site para testar Laravel na Azure</h2>
    <h1>Registrar</h1>
    <form action="/registrar" method="POST">
        @csrf <!--Importante para o funcionamento do formulário!-->
        <input name ="name" type="text" name="Nome" placeholder="Nome" id="">
        <input name = "email" type="text" name="Email" placeholder="Email" id="">
        <input name = "password" type="password" placeholder="Senha" name="" id="">
        <button>Registrar</button>
    </form>
    <h1>Login</h1>
    <form action="/login" method="POST">
        @csrf <!--Importante para o funcionamento do formulário!-->
        
        <input name = "loginemail" type="text" placeholder="Email" name="Email" id="">
        <input name = "loginpassword" type="password" placeholder="Senha" name="" id="">
        <button>Entrar</button>
    </form>

    @endauth

</body>
</html>