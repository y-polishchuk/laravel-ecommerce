@props(['skill'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('skill.edit', $skill) }}" class="btn btn-info mr-2">Edit</a>
    <form action="{{ route('skill.delete', $skill) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Skill?')">Delete</button>
    </form>
</div>