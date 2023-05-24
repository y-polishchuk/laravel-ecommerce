@props(['feature'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('feature.edit', $feature) }}" class="btn btn-info mr-2">Edit</a>
    <form action="{{ route('feature.delete', $feature) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Feature?')">Delete</button>
    </form>
</div>