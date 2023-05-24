@props(['price'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('price.edit', $price) }}" class="btn btn-info mr-2">Edit</a>
    <form action="{{ route('price.delete', $price) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Price Item?')">Delete</button>
    </form>
</div>