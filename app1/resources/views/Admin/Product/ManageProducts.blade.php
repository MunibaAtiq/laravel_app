@extends('Admin.Layouts.MainLayout')
@section('centercontent')
       <div class="page-header">
      <div>
        <h1 class="page-title">Manage prodegory</h1>
        <p class="page-subtitle">Edit and Delete prodegories.</p>
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
          <h5 class="card-title mb-4">Manage prodegory</h5>
          @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}</div>              
          @endif
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                {{-- <tr>
                    <td>{{ $prodegories->id }}</td>
                    <td>{{ $prodegories->title }}</td>
                    <td>{{ $prodegories->description }}</td>
                    <td>
                        @if($prodegories->image)
                            <img src="{{ asset('uploads/prodegory/' . $prodegories->image) }}" alt="{{$prodegories->title}}" width="50">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>   
                </tr> --}}

                <!-- Example row - replace with dynamic data -->
                @foreach($products as $prod)
                    <tr>
                        <td>{{$prod->id}}</td>
                        <td>{{ $prod->title }}</td>
                        <td>{{ $prod->price }}</td>
                        <td>{{ $prod->description }}</td>
                        <td>
                            @if($prod->image)
                                <img src="{{ asset('uploads/product/' . $prod->image) }}" alt="{{$prod->title}}" width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $prod->category->title }}</td>

                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.deleteProduct',$prod->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                
                @endforeach
              </tbody>
            </table>
            {{-- Pagination --}}
            {{-- <div class="d-flex justify-content-center">
                {{ $prodegories->links() }}
            </div> --}}
        </div>
      </div>

    
    </div>
@endsection