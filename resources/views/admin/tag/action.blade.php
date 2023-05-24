@props(['tag'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('tags.edit', $tag) }}" class="btn btn-info mr-2">Edit</a>
    <form action="{{ route('tags.softdelete', $tag) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Tag to the trash?')">Delete</button>
    </form>
</div>