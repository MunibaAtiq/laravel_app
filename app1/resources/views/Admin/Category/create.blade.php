@extends('Admin.Layouts.MainLayout')
@section('centercontent')
       <div class="page-header">
      <div>
        <h1 class="page-title">Add New Category</h1>
        <p class="page-subtitle">Premium layout elements, toggle switches, and input decorators.</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="index.html" class="text-decoration-none text-muted-green">Home</a></li>
          <li class="breadcrumb-item text-muted-green">Components</li>
          <li class="breadcrumb-item active text-main" aria-current="page">Forms & Input</li>
        </ol>
      </nav>
    </div>
     <!-- START: Form Component Row Grid Layout -->
    <div class="row g-4 mb-4">

      <!-- Column 1: Basic controls -->
      <div class="col-12 col-lg-12">
        <div class="card border-light shadow-sm p-4 h-100">
          <h5 class="card-title mb-4">Add Category</h5>
          <form action="{{ route('admin.storeCategory') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Text input -->
            <div class="mb-3">
              <label for="basicText" class="form-label-custom">Category Title</label>
              <input type="text" class="form-control-custom" name="title" placeholder="Enter username" >
            </div>

            <!-- Email input -->
            <div class="mb-3">
              <label for="basicEmail" class="form-label-custom">Category Image</label>
              <input type="file" class="form-control-custom" name="image" id="basicEmail" placeholder="name@example.com">
            </div>

            <!-- Disabled State -->
            <div class="mb-3">
              <label for="basicDisabled" class="form-label-custom">Category Description</label>
              <textarea class="form-control-custom" name="description" id="basicDisabled" placeholder="Enter category description"
                ></textarea>
            </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle me-2"></i>Add Category</button>
          </form>  
        </div>
      </div>

    
    </div>
@endsection