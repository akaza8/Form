@extends('layout.admin-layout')
@section('index-content')
<div class="container mt-0">
        <h2>Order List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Name</th>
                    <th>Order Price</th>
                    <!-- <th>Email</th> -->
                    <!-- <th>Timestamp</th> -->
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($query as $user)
                <tr>
                    <td>{{$user->u_name}}</td>   
                    <td>{{$user->total_order}}</td>   
                    <!-- <td>{{$user->mobile_no}}</td>   
                    <td>{{$user->u_email}}</td>   
                     -->
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection