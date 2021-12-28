@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="breadcrumb">
      <a href="#" class="breadcrumb-item"> Forum Name</a>
      <a href="#" class="breadcrumb-item">Forum Category</a>
      <a href="#" class="breadcrumb-item">Forum Name</a>
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
                    <img
                      src="https://placehold.it/600x400"
                      alt=""
                      class="img-fluid"
                    />
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Nisi illum laborum est nemo, deserunt quasi esse debitis
                      porro unde natus, magnam ducimus vel enim quia nam? Odio
                      corrupti ratione accusamus molestias iusto quae, alias
                      reiciendis dignissimos, voluptatum magnam perferendis
                      aperiam.
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>

            <table
              class="table table-striped table-responsivelg table-bordered"
            >
              <tbody>
                <tr>
                  <td class="author-col">
                    <div>by<a href="#"> author name</a></div>
                  </td>
                  <td class="post-col d-lg-flex justify-content-lg-between">
                    <div>
                      <span class="font-weight-bold">Post subject:</span>
                      Lorem ipsum dolor sit, amet consectetur adipisicing
                    </div>
                    <div>
                      <span class="font-weight-bold">Posted:</span> 08.10.2021
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div>
                      <span class="font-weight-bold">Joined:</span>08.10.2021
                    </div>
                    <div>
                      <span class="font-weight-bold">Posts:</span> 200
                    </div>
                  </td>
                  <td>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Soluta possimus, iusto, dolorem quo commodi, quisquam
                      porro id est fugiat culpa voluptas saepe libero!
                      Veritatis, laudantium. Ut distinctio error maxime
                      cupiditate?
                    </p>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Nisi illum laborum est nemo, deserunt quasi esse debitis
                      porro unde natus, magnam ducimus vel enim quia nam? Odio
                      corrupti ratione accusamus molestias iusto quae, alias
                      reiciendis dignissimos, voluptatum magnam perferendis
                      aperiam.
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
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
    <form action="" class="mb-3">
      <div class="form-group">
        <label for="comment">Reply to this post</label>
        <textarea
          class="form-control"
          name="comment"
          id=""
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
