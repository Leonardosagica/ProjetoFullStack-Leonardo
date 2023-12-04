<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1>Hello Turma Flag</h1>
    <ul>
        <li><a href="{{ route('welcome') }}">Vai para a Blade Welcome</a></li>
    </ul>


    @php
        $hello = 'Estamos On e vamos ser os melhores programadores de Laravel';
    @endphp

    <h1>Olá, {{ $hello }} sdsds</h1>

</body>

</html>
