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
                      <!-- button back -->
                      <div style="display: inline-block;"><a href="{{ route('backend.categories') }}" class="btn btn-default">Back</a></div>
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
                  <div class="x_content">
                    <br>
                    {!! Form::open(array('route' => ['backend.categories.edit', $category->id], 'enctype'=>'multipart/form-data', 'id' => 'demo-form2', 'data-parsley-validate' => '', 'class' => 'form-horizontal form-label-left', 'novalidate ' => '')) !!}
                      <!-- name -->
                      <?php $str = ($errors->first('name')) ? 'bad' : null; ?>
                      <div class="form-group {{ $str }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="name" value="{{ $category->name or old('name') }}" placeholder="Name">
                          @if ($errors->first('name'))
                          <span class="error-input">{!! $errors->first('name') !!}</span>
                          @endif
                        </div>
                      </div>

                      <!-- name_slug -->
                      <?php $str = ($errors->first('name_slug')) ? 'bad' : null; ?>
                      <div class="form-group {{ $str }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Name slug</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name_slug" name="name_slug" value="{{ $category->name_slug or old('name_slug') }}" class="form-control col-md-7 col-xs-12" placeholder="Name slug">
                          @if ($errors->first('name_slug'))
                          <span class="error-input">{!! $errors->first('name_slug') !!}</span>
                          @endif
                        </div>
                      </div>

                      <!-- tag -->
                      <?php $str = ($errors->first('tag')) ? 'bad' : null; ?>
                      <div class="form-group {{ $str }}">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tag</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tag" class="form-control col-md-7 col-xs-12" type="text" name="tag" value="{{ $category->tag or old('tag') }}" placeholder="Tag">
                          @if ($errors->first('tag'))
                          <span class="error-input">{!! $errors->first('tag') !!}</span>
                          @endif
                        </div>
                      </div>

                      <!-- orderby -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Order by </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="orderby" class="date-picker form-control col-md-7 col-xs-12" type="text" name="orderby" value="{{ $category->orderby or old('orderby') }}" placeholder="Order by">
                        </div>
                      </div>

                      <!-- icon -->
                      <?php $str = ($errors->first('icon')) ? 'bad' : null; ?>
                      <div class="form-group {{ $str }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Avatar </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="img-content">
                            <div class="radio">
                              <label>
                                <input type="radio" class="" checked name="keep_image" value="1"> Keep old image
                              </label>
                            </div>
                            <!-- end radio -->
                            @if ( !empty($category->icon) )
                            <img src="{{ asset('') }}public/uploads/categories/{{ $category->icon }}" alt="" >
                            @endif
                          </div>
                          <div>
                            <div class="radio">
                              <label>
                                <input type="radio" class="" name="keep_image" value="0"> Update new image
                              </label>
                            </div>
                            <!-- end radio -->
                            <input id="icon" class="date-picker form-control col-md-7 col-xs-12" type="file" name="icon" value="{{ old('icon') }}">
                          </div>
                          @if ($errors->first('icon'))
                          <span class="error-input">{!! $errors->first('icon') !!}</span>
                          @endif
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="">Save</button>
                          <button type="reset" class="btn btn-default" name="">Cancel</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

@stop


@section('script')
  <script>
    $(document).ready(function() {
      $('#name_slug').focus(function(event) {
        var value = to_slug($('#name').val());
        $('#name_slug').attr('value', value);
      });
    });
  </script>
@endsection
