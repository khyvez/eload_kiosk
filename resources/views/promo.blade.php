@extends('layouts.dashboard')


@section('titlecard')
Promo  
@endsection
@section('content')

<div class="row">
    <div class="col-md-4">
        <h4 style="border-bottom: 2px solid #53a3f9;">Add Promo</h4>
        <form action="{{ route('promo.store') }}" method="POST">
            @csrf
        <div class="form-group mt-4">
            <div class="form-group">
              <label for="">Network</label>
              <select class="form-control" name="network" id="network">
                <option value="smart">Smart</option>
                <option value="tnt">TNT</option>
                <option value="globe">Globe</option>
                <option value="cignal">Cignal</option>
                <option value="satlite">Satlite</option>
              </select>
            </div>
        </div>
        <div class="form-group">
          <label for="">Promo Name</label>
          <input type="text" name="promo" id="promo" class="form-control" placeholder="" aria-describedby="helpId">
     
        </div>
        <div class="form-group">
            <label for="">Keyword</label>
            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="" aria-describedby="helpId">

          </div>
          <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">Add New</button>
          </div>

        </form>
    </div>




<div class="col-md-8">
  
<table class="table mt-3 table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Network</th>
            <th>Name</th>
            <th>Keyword</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item => $promo)

        <tr>
            <td scope="row">{{ $item}}</td>
            <td>{{ $promo->network}}</td>
            <td>{{ $promo->promo}}</td>
            <td>{{ $promo->keyword}}</td>
        <td>
            <form action="{{ route('promo.destroy', $promo->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-link btn-lg"><i class="fas fa-2x text-danger fa-trash    "></i></button>
            </form>
             
            </td>
        
        </tr>
                   
        @endforeach
    </tbody>
</table>
  
</div>
  
</div>

@endsection