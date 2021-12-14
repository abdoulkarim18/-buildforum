@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="breadcrumb">
      <a href="#" class="breadcrumb-item"> Forum Name</a>
      <a href="#" class="breadcrumb-item">Forum Category</a>
      <a href="#" class="breadcrumb-item">Forum Name</a>
      <span class="breadcrumb-item active">new post</span>
    </nav>

    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <!-- Category one -->
          <div class="col-lg-12">
            <!-- second section  -->
            <h4 class="text-white bg-info mb-0 p-4 rounded">New Post</h4>
          </div>
        </div>
      </div>
    </div>

    <form action="" class="mb-3">
      <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" />
      </div>
      <div class="form-group">
        <label for="title">Post Image</label>
        <input type="file" class="form-control" name="post-image" />
      </div>
      <div class="form-group">
        <textarea
          class="form-control"
          name="comment"
          id=""
          rows="10"
          required
        ></textarea>
      </div>
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" value="notify" />
          Notify me upon reply
        </label>
      </div>

      <button type="submit" class="btn btn-primary mt-2 mb-lg-5">
        Create post
      </button>
      <button type="reset" class="btn btn-danger mt-2 mb-lg-5">Reset</button>
    </form>
    <div></div>
    <p class="small">
      <a href="#">Have you forgotten your account details?</a>
    </p>
  </div>
@endsection
