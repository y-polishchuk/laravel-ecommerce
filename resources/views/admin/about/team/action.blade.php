@props(['member'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('member.edit', $member) }}" class="btn btn-info mr-2">Edit</a>
    <form action="{{ route('member.delete', $member) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Team Member?')">Delete</button>
    </form>
</div>