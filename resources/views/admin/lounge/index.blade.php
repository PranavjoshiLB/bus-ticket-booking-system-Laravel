@extends('admin.layout.master')

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1>All Lounges Management</h1>
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">
          @if (count($lounges) == 0)
          <div class="tile">
            <h3 class="tile-title pull-left">Lounges List</h3>
            <div class="pull-right icon-btn">
               <form method="GET" class="form-inline" action="{{route('admin.lounge.index')}}">
                  <input type="text" name="term" class="form-control" placeholder="Search by lounge name">
                  <button class="btn btn-outline btn-circle  green" type="submit"><i
                     class="fa fa-search"></i></button>
               </form>
            </div>
            <p style="clear:both;margin:0px;"></p>
            <h2 class="text-center">NO LOUNGE FOUND</h2>
          </div>
          @else
          <div class="tile">
             <h3 class="tile-title pull-left">Lounges List</h3>
             <div class="pull-right icon-btn">
                <form method="GET" class="form-inline" action="{{route('admin.lounge.index')}}">
                   <input type="text" name="term" class="form-control" placeholder="Search by lounge name">
                   <button class="btn btn-outline btn-circle  green" type="submit"><i
                      class="fa fa-search"></i></button>
                </form>
             </div>
             <div class="table-responsive">
                <table class="table">
                   <thead>
                      <tr>
                         <th scope="col">Serial</th>
                         <th scope="col">Name</th>
                         <th scope="col">Price ({{$gs->base_curr_text}})</th>
                         <th scope="col">Action</th>
                      </tr>
                   </thead>
                   <tbody>
                     @foreach ($lounges as $lounge)
                       <tr>
                         <td>{{$loop->iteration}}</td>
                         <td><a href="{{route('user.lounge.show', $lounge->id)}}" target="_blank">{{$lounge->name}}</a></td>
                         <td>{{$lounge->price}}</td>
                         <td>
                           <a href="{{route('admin.lounge.edit', $lounge->id)}}" class="btn btn-warning"><i class="fa fa-pencil-square"></i> Edit</a>
                           @if ($lounge->a_hidden == 0)
                           <button id="hideShowBtn{{$lounge->id}}" class="btn btn-danger" onclick="showHidePackage(event, {{$lounge->id}})">Hide</button>
                           @else
                           <button id="hideShowBtn{{$lounge->id}}" class="btn btn-success" onclick="showHidePackage(event, {{$lounge->id}})">Show</button>
                           @endif
                         </td>
                       </tr>
                     @endforeach
                   </tbody>
                </table>
             </div>
             <div class="text-center">
               {{$lounges->appends(['term' => $term])->links()}}
             </div>
          </div>
          @endif
        </div>
     </div>
  </main>
  @includeif('admin.lounge.ajaxFunctions')
@endsection
