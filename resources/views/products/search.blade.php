@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
    
      <div class="card">
        <div class="card-body">
         

            
          <h5 class="card-title mb-4 d-inline">Products</h5>
          {{-- <a  href="{{route('products.create')}}" class="btn btn-primary mb-4 text-center float-right">Create Products</a> --}}
          @error('keyword')
          <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
          </span>
          @enderror
          <div class="conatiner">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">product</th>
                    <th scope="col">price in $$</th>
                    <th scope="col">brand</th>
                    
                </tr>
                </thead>
                <tbody>

                    @foreach ($searches as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->title}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->brand}}</td>
                        {{-- <td><a href="{{url('admin/edit-products', $product->id)}}" class="btn btn-warning  text-white text-center ">update</a></td>
                        <td><a href="{{url('admin/delete-products', $product->id)}}" class="btn btn-danger  text-center ">delete</a></td> --}}
                    </tr>  
                    @endforeach
                
                
                    
                </tbody>
            </table> 
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection