@props(['article'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('article.restore', $article->id) }}" class="btn btn-info mr-2">Restore</a>
    <form action="{{ route('article.permdelete', $article->id) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Article permanently?')">Perm Delete</button>
    </form>
</div>