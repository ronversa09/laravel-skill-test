<p>A new product has been created: {{ $product->title }}</p>
<p><a href="{{ route('products.edit', $product->id) }}">View Product</a></p>