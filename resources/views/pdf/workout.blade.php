<h1>{{ $student->name }} - Treino</h1>

<table border="1">
    <thead>
        <tr>
            <th>Exercício</th>
            <th>Repetições</th>
            <th>Peso</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($workouts as $workout)
            <tr>
                <td>{{ $workout->exercise->name }}</td>
                <td>{{ $workout->repetitions }}</td>
                <td>{{ $workout->weight }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
