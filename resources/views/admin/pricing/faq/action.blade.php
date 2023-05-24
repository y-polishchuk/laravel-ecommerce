@props(['faq'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('faq.edit', $faq) }}" class="btn btn-info mr-2">Edit</a>
    <form action="{{ route('faq.delete', $faq) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this FAQ?')">Delete</button>
    </form>
</div>