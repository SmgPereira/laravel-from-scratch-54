<!doctype html>

<html>
<head>
    <title></title>
</head>

<body>

<h3>
    <ul>

        @foreach($tasks as $task)
            <li>
                <a href="/tasks/{{ $task->id }}"> {{ $task->body }} </a>
            </li>
        @endforeach

    </ul>
</h3>

</body>

</html>
