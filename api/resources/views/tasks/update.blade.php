<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>

    @if(session('status'))
        <div>{{ session('status') }}</div>
    @endif

    <form action="{{ route('product.update', ['id' => $product['id']]) }}" method="post">
        @method('PUT')
        @csrf

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $product['title'] }}" required>

        <button type="submit">Update Product</button>
    </form>

</body>
</html>
