@extends('layouts.dashboard')

@section('content')
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">

              <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i>Forums</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                <li><i class="fa fa-users"></i>Forums</li>
              </ol>
            </div>
          </div>

          <div class="row">

            <div class="col-lg-12 col-md-12">
                @if(\Session::has('message'))

                <p class="alert
                {{ Session::get('alert-class', 'alert-danger') }}">{{Session::get('message') }}</p>

                @endif
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2><i class="fa fa-flag-o red"></i><strong>All Forums</strong></h2>
                  <div class="panel-actions">
                    <a href="/dashboard/home" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                    <a href="/dashboard/home" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="/dashboard/home" class="btn-close"><i class="fa fa-times"></i></a>
                  </div>
                </div>
                <div class="panel-body">
                  <table class="table bootstrap-datatable countries">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>

                      </tr>
                    </thead>
                    <tbody>
                        @if (count($forums)> 0)
                            @foreach ($forums as $forum)
                            <tr>
                                <td>{{$forum->title}}</td>
                                <td>{{$forum->category->title}}</td>
                                <td>{!!$forum->desc!!}</td>
                                <td><a href="{{route('forum.show', $forum)}}"><i class="fa fa-eye text-success"></i></a></td>
                                <td><a href="{{route('forum.update', $forum)}}"><i class="fa fa-edit text-info"></i></a></td>
                                <td><a href="{{route('forum.destroy', $forum)}}" class="text-danger"><i class="fa fa-trash"></i>Delete</a></td>

                              </tr>
                            @endforeach
                        @endif
                    </tbody>
                  </table>

                  {{ $forums->links() }}
                </div>

              </div>

            </div>

            </div>
            <!--/col-->

          </div>



        </section>


      </section>
      <!--main content end-->
@endsection
