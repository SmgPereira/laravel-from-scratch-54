<!doctype html>

<html>
<head>
    <title></title>
</head>

<body>

    <h3>

        <ul>
            @foreach($tasks as $task)
                <li>{{ $task->body }}</li>
            @endforeach
        </ul>
    </h3>

</body>

</html>
