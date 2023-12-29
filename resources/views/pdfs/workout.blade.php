<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Treino</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2, h3 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1><strong>Academia Time Chamber</strong></h1>
    <h2>Relatório de Treino</h2>
    <p><strong>Nome do Estudante:</strong> {{ $student->name }}</p>

    @php
        $daysOfWeek = ['SEGUNDA', 'TERÇA', 'QUARTA', 'QUINTA', 'SEXTA', 'SÁBADO', 'DOMINGO'];
    @endphp

    @foreach($daysOfWeek as $day)
        @if(isset($workoutsByDay[$day]))
            <h3>{{ $day }}</h3>
            <table>
                <thead>
                    <tr>
                        <th>Exercício</th>
                        <th>Repetições</th>
                        <th>Peso</th>
                        <th>Tempo (minutos)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($workoutsByDay[$day] as $workout)
                        <tr>
                            <td>{{ $workout->exercise->description }}</td>
                            <td>{{ $workout->repetitions }}</td>
                            <td>{{ $workout->weight }}</td>
                            <td>{{ $workout->time }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endforeach
</body>
</html>
