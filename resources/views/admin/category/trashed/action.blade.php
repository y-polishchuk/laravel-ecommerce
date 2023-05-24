@props(['category'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('categories.restore', $category->id) }}" class="btn btn-info mr-2">Restore</a>
    <form action="{{ route('categories.permdelete', $category->id) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Category permanently?')">Perm Delete</button>
    </form>
</div>