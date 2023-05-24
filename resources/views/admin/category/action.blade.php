@props(['category'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('categories.edit', $category) }}" class="btn btn-info mr-2">Edit</a>
    <form action="{{ route('categories.softdelete', $category) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Category to the trash?')">Delete</button>
    </form>
</div>