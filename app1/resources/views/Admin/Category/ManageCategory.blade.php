@extends('Admin.Layouts.MainLayout')
@section('centercontent')
       <div class="page-header">
      <div>
        <h1 class="page-title">Manage Category</h1>
        <p class="page-subtitle">Edit and Delete Categories.</p>
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
          <h5 class="card-title mb-4">Manage Category</h5>
          @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}</div>              
          @endif
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                {{-- <tr>
                    <td>{{ $categories->id }}</td>
                    <td>{{ $categories->title }}</td>
                    <td>{{ $categories->description }}</td>
                    <td>
                        @if($categories->image)
                            <img src="{{ asset('uploads/category/' . $categories->image) }}" alt="{{$categories->title}}" width="50">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>   
                </tr> --}}

                <!-- Example row - replace with dynamic data -->
                @foreach($categories as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{ $cat->title }}</td>
                        <td>{{ $cat->description }}</td>
                        <td>
                            @if($cat->image)
                                <img src="{{ asset('uploads/category/' . $cat->image) }}" alt="{{$cat->title}}" width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.editCategory',$cat->id)}}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.deleteCategory',$cat->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                
                @endforeach
              </tbody>
            </table>
            {{-- Pagination --}}
            {{-- <div class="d-flex justify-content-center">
                {{ $categories->links() }}
            </div> --}}
        </div>
      </div>

    
    </div>
@endsection