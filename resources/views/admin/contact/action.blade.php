@props(['message'])

<div class="d-flex row justify-content-center">
    <form action="{{ route('messages.delete', $message) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Message?')">Delete</button>
    </form>
</div>