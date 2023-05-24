@props(['tag'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('tags.restore', $tag->id) }}" class="btn btn-info mr-2">Restore</a>
    <form action="{{ route('tags.permdelete', $tag->id) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Tag permanently?')">Perm Delete</button>
    </form>
</div>