@extends('layouts.dashboard')


@section('titlecard')
Report    
@endsection
@section('content')

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Contact #</th>
                            <th>Load Amount</th>
                            <th>Purchase Amount</th>
                            <th>Keyword</th>
                            <th>Menu</th>
                            <th>Network</th>
                            <th>Status</th>
                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eload as $item)
                            
                        
                        <tr>
                        <td scope="row">{{ $item->id }}</td>
                            <td>{{ $item->contact}}</td>
                            <td>{{ $item->load_amount}}</td>
                            <td>{{ $item->purchase_amount}}</td>
                            <td>{{ $item->keyword}}</td>
                            <td>{{ $item->menu_number}}</td>
                            <td>{{ $item->network}}</td>
                            <td>
                                @if ( $item->status == 0 )
                                <i title="Sucesfully loaded" class="fas fa-circle text-success" aria-hidden="true"></i>
                                @elseif($item->status == 1)
                                <i title="Pending" class="fas fa-circle text-primary" aria-hidden="true"></i>
                                @elseif($item->status == 2)
                                <i title="Invalid" class="fas fa-circle text-danger" aria-hidden="true"></i>
                                @endif
                
                            </td>
                
                        </tr>
                        @endforeach
                    </tbody>
                </table>
      
@endsection