@extends('layouts.dashboard')

@section('content')
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">

              <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i>Forum Categories</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                <li><i class="fa fa-users"></i>Categories</li>
              </ol>
            </div>
          </div>

          <div class="row">

            <div class="col-lg-12 col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2><i class="fa fa-flag-o red"></i><strong>Forum Categories</strong></h2>
                  <div class="panel-actions">
                    <a href="/dashboard/home" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                    <a href="/dashboard/home" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="/dashboard/home" class="btn-close"><i class="fa fa-times"></i></a>
                  </div>
                </div>
                <div class="panel-body">
                 <div class="container">
                     <div class="row">
                        <div class="col-lg-8 offset-2 bg-dark">

                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img
                                src="{{ asset('storage/images/categories/'.$category->image) }}"
                                class="img-fluid" height="200" width="300"
                                />
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->title }}</h5>
                                <p class="card-text">{!! $category->desc !!}</p>
                                {{-- <a href="#!" class="btn btn-primary">Button</a> --}}
                            </div>
                            </div>
                        </div>
                     </div>
                 </div>
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
