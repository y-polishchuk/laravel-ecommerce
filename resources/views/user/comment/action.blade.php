@props(['comment'])

<div class="d-flex row justify-content-center">
    <form action="{{ route('user.comment.delete', $comment) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Comment?')">Delete</button>
    </form>
</div>