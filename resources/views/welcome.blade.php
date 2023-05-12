<!--<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('index.css')}}">
    <title>CRUD</title>
    
</head>
<body class="d-flex flex-column align-items-center justify-content-center vh-100">
    <h1 class="mb-4">Jogadores do Time</h1>
    <div class="container center-content mt-4">
        <div id class="container-box text-center">
            <form action="cadastrar-candidato" method="POST">
                @csrf
                <label for="">Nome: </label>
                <input type="text" placeholder="Digite o nome do jogador" name="nome_candidato">

                <label for="">Posição: </label>
                <input type="text" placeholder="Digite a posicao do jogador" name="telefone_candidato">

                <button class="btn btn-success">Enviar Cadastro</button>
            </form>
            <br>
            <button onclick="window.location.href='/mostrar-candidatos'" class="btn btn-warning">Mostrar Todos os Jogadores</button>
        </div>
    </div>
</body>
</html>
-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('index.css')}}">
    <title>CRUD</title>
    
    <script>
        function enviarFormulario() {
            var nome = document.getElementById('nome').value;
            var posicao = document.getElementById('posicao').value;
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
            // Requisição AJAX
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Manipular a resposta da requisição
                    var jogador = document.getElementById('posicao').value + ", " + document.getElementById('nome').value;
                    alert("O " + jogador + " foi cadastrado!");
                    document.getElementById('nome').value = '';
                    document.getElementById('posicao').value = '';
                }

            };
            xhttp.open("POST", "/cadastrar-candidato", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.setRequestHeader("X-CSRF-TOKEN", token);
            xhttp.send("nome_candidato=" + nome + "&telefone_candidato=" + posicao);
        }
    </script>
    
</head>
<body class="d-flex flex-column align-items-center justify-content-center vh-100">
    <h1 class="mb-4">Jogadores do Time</h1>
    <div class="container center-content mt-4">
        <div id class="container-box text-center">
            <label for="">Nome: </label>
            <input type="text" placeholder="Digite o nome do jogador" id="nome">

            <label for="">Posição: </label>
            <input type="text" placeholder="Digite a posição do jogador" id="posicao">

            <button class="btn btn-success" onclick="enviarFormulario()">Enviar Cadastro</button>
            <br>
            <button onclick="window.location.href='/mostrar-candidatos'" class="btn btn-warning">Mostrar Todos os Jogadores</button>
        </div>
        
    </div>
</body>
</html>
