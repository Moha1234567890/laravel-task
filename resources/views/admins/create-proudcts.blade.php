@extends('layouts.admin')


@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Create Products</h5>
          <form method="POST" action="{{route('products.insert')}}" enctype="multipart/form-data">
            <!-- Email input -->
            @csrf
            <div class="form-outline mb-4 mt-4">
              <label>Title</label>

              <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title" />
            </div>
            @error('title')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-outline mb-4 mt-4">
                <label>Price</label>

                <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
            </div>
            @error('price')
                <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-outline mb-4 mt-4">
                <label>brand</label>

                <input type="text" name="brand" id="form2Example1" class="form-control" placeholder="price" />
            </div>
            @error('brand')
            <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="form-outline mb-4 mt-4">
                <label>Image</label>

                <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
            </div>
            @error('image')
            <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Details</label>
                <textarea name="details" placeholder="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            @error('details')
            <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
            

         

            

           
  
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

      
          </form>

        </div>
      </div>
    </div>
  </div>

@endsection