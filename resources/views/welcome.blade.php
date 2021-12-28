@extends('layouts.app')

@section('content')




<div class="row">
    <div class="col-lg-8">
        <div class="row">

            @if (count($categories) > 0)
                @foreach ($categories as $category)
                    <!-- Category one -->
                    <div class="col-lg-12">
                    <!-- second section  -->
                    <a href="{{ route('category.overview', $category)}}" style="text-decoration: none">
                        <h4 class="text-white bg-info mb-0 p-4 rounded-top">
                        {{$category->title}}
                        </h4>
                    </a>
                    <table
                        class="table table-striped table-responsive table-bordered"
                    >
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Forum</th>
                            <th scope="col">Topics</th>
                            {{-- <th scope="col">Posts</th> --}}
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
                                        {{-- <td><div>{{$forum->posts}}</div></td> --}}
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
                                <p>0 Forums found in this Category</p>
                            @endif
                        </tbody>
                    </table>
                    </div>
                @endforeach
            @else
                <h1>No Forum Categories found</h1>
            @endif
        </div>
    </div>
    <div class="col-lg-4">
      <aside>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Members Online</h4>
            <ul class="list-unstyled mb-0">
              <li><a href="#">Member name</a></li>
              <li><a href="#">Member name</a></li>
              <li><a href="#">Member name</a></li>
              <li><a href="#">Member name</a></li>
              <li><a href="#">Member name</a></li>
            </ul>
          </div>
          <div class="card-footer">
            <dl class="row">
              <dt class="col-8 mb-0">Total:</dt>
              <dd class="col-4 mb-0">10</dd>
            </dl>
            <dl class="row">
              <dt class="col-8 mb-0">Members:</dt>
              <dd class="col-4 mb-0">10</dd>
            </dl>
            <dl class="row">
              <dt class="col-8 mb-0">Guests:</dt>
              <dd class="col-4 mb-0">3</dd>
            </dl>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Members Statistics</h4>
            <dl class="row">
              <dt class="col-8 mb-0">Total Forums:</dt>
              <dd class="col-4 mb-0">15</dd>
            </dl>
            <dl class="row">
              <dt class="col-8 mb-0">Total Topics:</dt>
              <dd class="col-4 mb-0">500</dd>
            </dl>
            <dl class="row">
              <dt class="col-8 mb-0">Total members:</dt>
              <dd class="col-4 mb-0">200</dd>
            </dl>
          </div>
          <div class="card-footer">
            <div>Newest Member</div>
            <div><a href="#">Member Name</a></div>
          </div>
        </div>
      </aside>
    </div>
  </div>
</div>
@endsection















{{-- @if (Route::has('login'))
<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    @auth
        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
    @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endif
    @endauth
</div>
@endif --}}
