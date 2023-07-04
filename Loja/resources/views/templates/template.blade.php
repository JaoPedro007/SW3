<html>
<title>Sistema</title>
<link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
          crossorigin="anonymous">

</head>
<body>

<style>
    .modal {
        width: 300px;
    }

    .modal-content {
        width: 300px;
    }

    .list-group-item:hover {
        background-color: rgba(59, 57, 57, 0.164) !important;
    }

    ul {
        list-style: none;
    }
    span{
        color:white;
    }
    body {
            background-image: url("public/assets/img/background.png");
            background-repeat: no-repeat;
            background-size: cover;
    }

</style>

<nav class="navbar navbar-dark bg-dark">

    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <span class="navbar-toggler-icon"></span>
        </button>

        <button type="button" class="btn btn-secondary position-relative">
            Notificações
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                5+
                <span class="visually-hidden">unread messages</span>
             </span>    
        </button>
    </div>
</nav>

@yield('content')

<div class="modal true" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sistema</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul class="list-group list-group-flush">
                    <li><a href="home" class="list-group-item">Home</a></li>
                    <li><a href="produtos" class="list-group-item">Produtos</a></li>
                    <li><a href="clientes" class="list-group-item">Clientes</a></li>
                    <li><a href="departamentos" class="list-group-item">Departamentos</a></li>
                    <li><a href="marcas" class="list-group-item">Marcas</a></li>
                    <li><a href="usuarios" class="list-group-item">Usuarios</a></li>
                    <li><a href="vendas" class="list-group-item">Venda</a></li>
                </ul>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>
</html>



<script src="{{url("assets/js/javascript.js")}}"></script>

</html>
