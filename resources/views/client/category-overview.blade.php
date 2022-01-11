@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="breadcrumb">
      <a href="/" class="breadcrumb-item">Forum Categories</a>
      <span class="breadcrumb-item active">{{$category->title}}</span>
    </nav>

    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <!-- Category one -->
          <div class="col-lg-12">
            <!-- second section  -->
            <h4 class="text-white bg-info mb-0 p-4 rounded-top">
              {{$category->title}}
            </h4>
            <table
              class="table table-striped table-responsive table-bordered mb-xl-0"
            >
              <thead class="thead-light">
                <tr>
                  <th scope="col">Forum</th>
                  <th scope="col">Topics</th>
                  <th scope="col">Posts</th>
                  {{-- <th scope="col">Latest Post</th> --}}
                </tr>
              </thead>
              <tbody>
                  @if (count($category->forums) > 0)
                        @foreach ($category->forums as $forum)
                            <tr>
                                <td>
                                <h3 class="h5">
                                    <a href="{{route('forum.overview', $forum)}}" class="text-uppercase">{{$forum->title}}</a>
                                </h3>
                                <p class="mb-0">
                                    {!!$forum->desc!!}
                                </p>
                                </td>
                                <td><div>{{$forum->discussions->count()}}</div></td>
                                <td><div>{{$forum->posts}}</div></td>
                                {{-- <td>
                                <h4 class="h6 font-weight-bold mb-0">
                                    <a href="#">Post name</a>
                                </h4>
                                <div><a href="#">Author name</a></div>
                                <div>06/07/ 2021 20:04</div>
                                </td> --}}
                            </tr>
                        @endforeach

                    @else
                        <h4>No forums in this category</h4>
                    @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <aside>
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Members Online</h4>
              <ul class="list-unstyled mb-0">
                  @if (count($users_online) > 0)
                      @foreach ($users_online as $user)
                          <li><a href="#">{{$user->name}} <span class="badge badge-pill badge-success">online</span> </a></li>
                      @endforeach
                  @endif
              </ul>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Members Statistics</h4>
              <dl class="row">
                  <dt class="col-8 mb-0">Total categories:</dt>
                  <dd class="col-4 mb-0">{{$totalCategories}}</dd>
              </dl>
              <dl class="row">
                <dt class="col-8 mb-0">Total Forums:</dt>
                <dd class="col-4 mb-0">{{$forumsCount}}</dd>
              </dl>
              <dl class="row">
                <dt class="col-8 mb-0">Total Topics:</dt>
                <dd class="col-4 mb-0">{{$topicsCount}}</dd>
              </dl>
              <dl class="row">
                <dt class="col-8 mb-0">Total members:</dt>
                <dd class="col-4 mb-0">{{$totalMembers}}</dd>
              </dl>
            </div>
            <div class="card-footer">
              <div>Newest Member</div>
              <div><a href="#">{{$newest->name}}</a></div>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
@endsection
