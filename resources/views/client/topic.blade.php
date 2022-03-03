@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="breadcrumb">
      <a href="/" class="breadcrumb-item">Forum Categories</a>
      <a href="{{route('category.overview', $topic->forum->category)}}" class="breadcrumb-item">{{$topic->forum->category->title}}</a>
      <a href="{{route('forum.overview', $topic->forum)}}" class="breadcrumb-item">{{$topic->forum->title}}</a>
      <span class="breadcrumb-item active"
        >{{$topic->title}}</span
      >
    </nav>

    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <!-- Category one -->
          <div class="col-lg-12">
            <!-- second section  -->
            <h4 class="text-white bg-info mb-0 p-4 rounded-top">
                {{$topic->title}}
            </h4>
            <table
              class="table table-striped table-responsivelg table-bordered"
            >
              <thead class="thead-light">
                <tr>
                  <th scope="col">Author</th>
                  <th scope="col">Message</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="author-col">
                    <div>by<a href="#"> {{$topic->user->name}}</a></div>
                  </td>
                  <td class="post-col d-lg-flex justify-content-lg-between">
                    <div>
                      <span class="font-weight-bold">Discussion subject:</span>
                      {{$topic->title}}
                    </div>
                    <div>
                      <span class="font-weight-bold">Posted:</span> {{$topic->created_at->diffForHumans()}}
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div>
                      <span class="font-weight-bold">Joined:</span>{{$topic->user->created_at->diffForHumans()}}
                    </div>
                    <div>
                      <span class="font-weight-bold">Discussions:</span>{{count(array($topic->user->topics))}}
                    </div>
                  </td>
                  <td>
                    <p>
                     {{$topic->desc}}
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>

            @if (count($topic->replies) > 0)
                @foreach ($topic->replies as $reply)
                    <table
                    class="table table-striped table-responsivelg table-bordered"
                        >
                        <tbody>
                        <tr>
                            <td class="author-col">
                            <div>by<a href="#"> {{$reply->user->name}}</a></div>
                            </td>
                            <td class="post-col d-lg-flex justify-content-lg-between">
                                <div>
                                    <span class="font-weight-bold">Post subject:</span>
                                    {{$topic->title}}
                                </div>
                                <div>
                                    <span class="font-weight-bold">Relied:</span> {{$reply->created_at->diffForHumans()}}
                                </div>
                                @if(auth()->id() == $reply->user_id)
                                    <div>
                                        <a href="{{route('reply.delete', $reply)}}"><i class="fa fa-trash text-danger"></i></a>
                                    </div>
                                @else
                                    <div>
                                        <a href="{{route('reply.like', $reply)}}" class="mr-3"><i class="fa fa-thumbs-up text-success">{{$reply->$reply_like}}</i></a>
                                        <a href="{{route('reply.dislike', $reply)}}"><i class="fa fa-thumbs-down text-danger">5</i></a>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <span class="font-weight-bold">Joined:</span>{{$reply->user->created_at->diffForHumans()}}
                                </div>
                            </td>
                            <td>
                                <p>
                                    {{$reply->desc}}
                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                @endforeach
            @else
                <h3>No replies to this discussion yet!</h3>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="mb-3 clearfix">
      <nav aria-label="Navigate post pages" class="float-lg-right">
        <ul class="pagination pagination-sm mb-lg-0">
          <li class="page-item active">
            <a href="#" class="page-link">1</a>
          </li>
          <li class="page-item"><a href="#" class="page-link">2</a></li>
          <li class="page-item"><a href="#" class="page-link">3</a></li>
          <li class="page-item"><a href="#" class="page-link">4</a></li>
          <li class="page-item"><a href="#" class="page-link">5</a></li>
          <li class="page-item">
            <a href="#" class="page-link">&hellip;</a>
          </li>
          <li class="page-item"><a href="#" class="page-link">9</a></li>
          <li class="page-item"><a href="#" class="page-link">10</a></li>
        </ul>
      </nav>
    </div>
    <form action="{{route('topic.reply', $topic)}}" class="mb-3" method="POST">
        @csrf
      <div class="form-group">
            <label for="desc">Reply to this post</label>
            <textarea
            class="form-control"
            name="desc"
            rows="10"
            required
            ></textarea>
            <button type="submit" class="btn btn-primary mt-2 mb-lg-5">
            Submit reply
            </button>
            <button type="reset" class="btn btn-danger mt-2 mb-lg-5">
            Reset
            </button>
      </div>
    </form>
    @if (!auth()->user())
        <div>
            <div class="d-lg-flex align-items-center mb-3">
                <form
                    action=""
                    class="form-inline d-block d-sm-flex mr-2 mb-3 mb-lg-0"
                >
                    <div class="form-group mr-2 mb-3 mb-md-0">
                    <label for="email" class="mr-2">Email:</label>
                    <input
                        type="email"
                        class="form-control"
                        placeholder="example@gmail.com"
                        required
                    />
                    </div>

                    <div class="form-group mr-2 mb-3 mb-md-0">
                    <label for="password" class="mr-2">Password:</label>
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        required
                    />
                    </div>

                    <button class="btn btn-primary">Login</button>
                </form>
                <span class="mr-2">or...</span>
                <button class="btn btn-success">Create Account</button>
            </div>
        </div>
      <p class="small">
        <a href="#">Have you forgotten your account details?</a>
      </p>
    @endif
    </div>
@endsection
