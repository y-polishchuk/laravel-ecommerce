@extends('admin.admin_master')

  @section('admin')


    <div class="breadcrumb-wrapper">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active" aria-current="page">Photo Gallery</li>
        </ol>
      </nav>
    </div>
<div class="row">

<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Photo Gallery </h2>
        </div>
        <div class="card-body">
            <p class="mb-5">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</p>
            <button type="button" class="btn btn-info btn-pill" data-toggle="modal" data-target="#addImageForm">
                Add Image/s
            </button>
            <div class="card-deck">
            @foreach($images as $item)
            <div class="col-md-4 mt-5 mb-3">
                <div class="card">
                        <container>
                            <img class="img-fluid mx-auto d-block" src="{{ asset($item->image) }}" alt="Card image cap" style="height: 10rem;">
                        </container>
                    <div class="card-body">
                        
                        <p class="card-text pb-1">
                            <form action="{{ route('images.delete', $item) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger float-sm-right" onclick="return confirm('Are you sure, you want to delete this Image?')">Delete</button>
                            </form>
                        </p>
                            
                        <p class="card-text">
                            <small class="text-muted">Last updated {{ $item->updated_at ? $item->updated_at->diffForHumans() : $item->created_at->diffForHumans() }}</small>
                        </p>
                    </div>
                </div>
                </div>
            @endforeach
            </div>
            {{ $images->links() }}
        </div>
    </div>
</div>
</div>




<!-- Form Modal -->
<div class="modal fade" id="addImageForm" tabindex="-1" role="dialog" aria-labelledby="addImageFormTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addImageFormTitle">Add Image/s</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="imgInput" class="form-label">Multi Image</label>
                <input type="file" name="image[]" class="form-control" id="imgInput" aria-describedby="imgHelp" multiple="">
                @error('image')
                <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-pill">Add Image/s</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection