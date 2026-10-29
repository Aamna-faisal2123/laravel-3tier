<!DOCTYPE html>
<html>
<head><title>Laravel 3-Tier App</title></head>
<body style="font-family:sans-serif;max-width:600px;margin:40px auto;">
  <h1>Laravel 3-Tier DevOps App</h1>
  <form method="POST" action="/tasks">
    @csrf
    <input type="text" name="title" placeholder="New task" required>
    <button type="submit">Add</button>
  </form>
  <h3>Tasks (read from MySQL)</h3>
  <ul>
    @foreach($tasks as $task)
      <li>{{ $task->title }}</li>
    @endforeach
  </ul>
</body>
</html>
