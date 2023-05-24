@props(['comment'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('comment.restore', $comment->id) }}" class="btn btn-info mr-2">Restore</a>
    <form action="{{ route('admin.permdelete.comment', $comment->id) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Comment permanently?')">Delete</button>
    </form>
</div>