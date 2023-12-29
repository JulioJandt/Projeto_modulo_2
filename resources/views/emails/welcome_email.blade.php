<!DOCTYPE html>
<html>
<head>
    <title>Bem-vindo(a) a academia Time Chamber!</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1f1f1f;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #212121;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        h2 {
            color: #ff9800;
        }

        p {
            margin-bottom: 20px;
        }

        .dragon-ball-img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">

        <h2>Bem-vindo(a) a academia Time Chamber, {{ $user->name }}!</h2>
        <p>Obrigado por se cadastrar no nosso sistema. Você escolheu o plano "{{ $plan->description }}".</p>
        @if ($plan->id == 3)
            <p>Seu plano não tem limites. Aproveite ao máximo os recursos oferecidos!</p>
        @else
            <p>Seu plano suporta até {{ $plan->limit }} alunos.</p>
        @endif
        <p>Esperamos que você aproveite ao máximo os recursos oferecidos. Se tiver alguma dúvida, estamos à disposição!</p>
        <img src="{{ asset('Time-Chamber.png') }}" class="time-chamber-img" style="max-width: 100%; height: auto;">
    </div>
</body>
</html>
