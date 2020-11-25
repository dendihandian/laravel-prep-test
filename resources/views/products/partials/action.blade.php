<a class="mx-1 text-success" href="{{ route('products.show', ['product' => $product->id ?? 0 ]) }}"><i class="fas fa-eye"></i></a>
<a class="mx-1 text-info" href="{{ route('products.edit', ['product' => $product->id ] ?? 0) }}"><i class="fas fa-edit"></i></a>
<a class="mx-1 text-danger" href="#" onclick="deleteConfirm('delete-product-{{ $product->id }}', 'Do you want to delete {{ $product->title ?? '' }} ?')"><i class="fas fa-trash"></i></a>
<form method="POST" id="delete-product-{{ $product->id ?? 0 }}" action="{{ route('products.delete', ['product' => $product->id ?? 0]) }}">
    @csrf
    @method('DELETE')
</form>