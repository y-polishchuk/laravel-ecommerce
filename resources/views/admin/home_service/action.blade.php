@props(['service'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('services.edit', $service) }}" class="btn btn-info mr-2">Edit</a>
    <form action="{{ route('services.delete', $service) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Service?')">Delete</button>
    </form>
</div>