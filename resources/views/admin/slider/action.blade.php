@props(['slider'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('sliders.edit', $slider) }}" class="btn btn-info mr-2">Edit</a>
    <form action="{{ route('sliders.delete', $slider) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Slider?')">Delete</button>
    </form>
</div>
