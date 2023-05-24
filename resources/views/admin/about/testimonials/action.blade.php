@props(['testimonial'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('tes.edit', $testimonial) }}" class="btn btn-info mr-2">Edit</a>
    <form action="{{ route('tes.delete', $testimonial) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Testimonial?')">Delete</button>
    </form>
</div>