@props(['comment'])

<div class="d-flex row justify-content-center">
    <form action="{{ route('admin.softdelete.comment', $comment) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Comment to the trash?')">Delete</button>
    </form>
</div>