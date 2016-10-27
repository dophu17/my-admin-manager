@extends('backend.layout')

@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>{{ $titleContent }}</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <!-- <h2> -->
                      <!-- button add -->
                      <div style="display: inline-block;"><a href="{{ route('backend.news.add') }}" class="btn btn-default btn-primary">Add</a></div>
                    <!-- </h2> -->
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <!-- notice -->
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    {{ $message }}
                  </div>
                  @elseif($message = Session::get('faild'))
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    {{ $message }}
                  </div>
                  @endif


                  
                  <!-- x_content -->
                  <div class="x_content">
                    <div class="table-responsive">

                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 200px; text-align: center;">Avatar</th>
                            <th>Name</th>
                            <th style="width: 200px; text-align: center;">Slug</th>
                            <th style="width: 200px; text-align: center;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ( $lists as $item )
                          <tr>
                            <td>
                              @if ( empty($item->avatar) )
                              <img src="{{ asset('') }}public/img/no-image.png" alt="" style="max-width: 100%;">
                              @else
                              <img src="{{ asset('') }}public/uploads/news/{{ $item->avatar }}" alt="" style="max-width: 100%;">
                              @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td align="center">
                              {{ $item->name_slug }}
                            </td>
                            <td style="width: 200px; text-align: center;">
                              <a href="{{ route('backend.news.edit', [ $item->id ]) }}" class="btn btn-dark btn-xs">Edit</a>
                              <a href="{{ route('backend.news.delete', [ $item->id ]) }}" class="btn btn-danger btn-xs">Delete</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                      <!-- pagination -->
                      <div align="center">
                        {{ $lists->links() }}
                      </div>
                    </div>
                  </div>
                  <!-- end x_content -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

@endsection
