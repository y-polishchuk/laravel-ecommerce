@props(['brand'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('brands.edit', $brand) }}" class="btn btn-info mr-2">Edit</a>
    <form action="{{ route('brands.delete', $brand) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Brand?')">Delete</button>
    </form>
</div>