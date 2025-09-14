<!DOCTYPE html>
<html>
<head>
    <title>New Product Notification</title>
</head>
<body>
    <h1>A new product has been added to the store!</h1>
    <p><strong>Product Name:</strong> {{ $product->title }}</p>
    <p><strong>Price:</strong> {{ money($product->price) }}</p>
    <p>
        You can view the product here:
        <a href="{{ route('products.show', $product) }}">View Product</a>
    </p>
</body>
</html>
