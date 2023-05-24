@extends('admin.admin_master')

@section('admin')

    <div class="breadcrumb-wrapper">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">About Us</li>
          <li class="breadcrumb-item active" aria-current="page">Skills</li>
        </ol>
      </nav>
    </div>
        <div class="row">

          <div class="col-md-9">
            <div class="card card-default">
              <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h2>Skills</h2>
              </div>

              <div class="card-body">
                <div class="responsive-data-table">
                  {{ $dataTable->table(['class' => 'table dt-responsive']) }}
                </div>
              </div>

            </div> 
          </div>  
            <div class="col-md-3">
              <div class="card">
                  <div class="card-header card-header-border-bottom d-flex">
                    Add Skill
                  </div>

                <div class="card-body">
                
                        <form action="{{ route('skill.store') }}" method="POST">
                            @csrf
                        <div class="mb-3">
                            <label for="skillInput" class="form-label">Skill Name</label>
                            <input type="text" name="skill_name" class="form-control" id="skillInput" aria-describedby="nameHelp" required>
                            @error('skill_name')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                            <label for="valueInput" class="form-label">Value</label>
                            <input type="text" name="value" class="form-control" id="valueInput" aria-describedby="valueHelp" required>
                            @error('value')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                          
                          <button type="submit" class="btn btn-primary">Add Skill</button>
                        </form>
                </div>
              </div>
            </div>

           
        </div> 




@endsection