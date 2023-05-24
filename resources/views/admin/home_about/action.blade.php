@props(['about'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('about.edit', $about) }}" class="btn btn-info mr-2">Edit</a>
    <form action="{{ route('about.delete', $about) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete About Section?')">Delete</button>
    </form>
</div>