@props(['article'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('article.edit', $article) }}" class="btn btn-info mr-2">Edit</a>
    <form action="{{ route('softdelete.article', $article) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Article to the trash?')">Delete</button>
    </form>
</div>