<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
</head>

<body>
    <h1>Create Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <input type="text" name="name" id="name" placeholder="Category Name" required>
        <input type="text" name="description" id ="description" placeholder="Category Description" required>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
