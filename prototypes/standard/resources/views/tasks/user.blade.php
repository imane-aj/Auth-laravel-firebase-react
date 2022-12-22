@extends('welcome')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <a href="{{ route('register') }}">Add Task</a>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $item)
                        <tr>
                            <th scope="row">-</th>
                            <td>{{$item->task}}</td>
                        </tr>
                    @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>
   </div>
@endsection

