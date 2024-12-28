<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1> This is product index page </h1>
    <a href = "products/create" class="btn btn-primary" role="buttom">Add new product</a>

    @foreach ($products as $product)
        <li class ="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold"><a href="/products/{{ $product->id }}">
                        {{ $product->title }}
                    </a>
                </div>
            </div>
            </div>
            <span class = "badge bg-primary rounded-pill">
                {{ $product->price }}
            </span>
            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'default-image.jpg' }}"
                alt="Product Image">

            <a href="products/{{ $product->id }}/edit"> Edit </a>

            <form action="/products/{{ $product->id }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">
                    Delete
                </button>
            </form>
        </li>
    @endforeach
</body>

</html>
