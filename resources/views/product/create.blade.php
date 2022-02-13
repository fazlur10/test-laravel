@extends('master')

@section('content')

  <div class="" style="text-align:center">
          <br/>
             <h3> ADD Product</h3>

          <br/>
          @if(count($errors) > 0)
           <div class="alert alert-danger">
             <ul>
             @foreach($errors->all() as $error)
               <li>{{$error}}</li>
             @endforeach
             </ul>
           </div>
          @endif
          @if(\Session::has('success'))
          <div class="alert alert-success">
             <p>{{ \Session::get('success') }}</p>
          </div>
          @endif
          <form method="post" action="{{url('product')}}">
          {{csrf_field()}}
                  
                 <div class="row form-group-row">
                      <label for="sku_code" class="col-sm-4 col-form-label">SKU Code</label>
                      <div class="col-sm-8">
                          <input type="text" name="sku_code" class="form-control" id="sku_code" placeholder="Enter sku code" />
                      </div>
                 </div><br/>
                 <div class="row form-group-row">
                      <label for="sku_name" class="col-sm-4 col-form-label">SKU Name</label>
                      <div class="col-sm-8">
                          <input type="text" name="sku_name" class="form-control" id="sku_name" placeholder="Enter sku name" />
                      </div>
                 </div><br/>
                 <div class="row form-group-row">
                      <label for="mrp" class="col-sm-4 col-form-label">MRP</label>
                      <div class="col-sm-8">
                          <input type="number" step="0.01" name="mrp" class="form-control" id="mrp" placeholder="Enter MRP" />
                      </div>
                 </div><br/>
                 <div class="row form-group-row">
                      <label for="dp" class="col-sm-4 col-form-label">Distributor Price</label>
                      <div class="col-sm-8">
                          <input type="number" step="0.01" name="dp" class="form-control" id="dp" placeholder="Enter Distributor Price" />
                      </div>
                 </div><br/>
                 <div class="row form-group-row">
                      <label for="vol" class="col-sm-4 col-form-label">Weight/Volume</label>
                      <div class="col-sm-8">
                          <input type="number" step="0.01" name="vol" class="form-control" id="vol" placeholder="Enter Volume/ Weight" />
                      </div>
                 </div><br/>
                        
                 
                 <div class=" row form-group-row">
                          <input type="submit" class="btn btn-success" />
                 </div>
          </form>
  </div>

@endsection