@props(['author'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('author.edit', $author) }}" class="btn btn-info mr-2">Edit</a>
    <form action="{{ route('author.delete', $author) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Author?')">Delete</button>
    </form>
</div>