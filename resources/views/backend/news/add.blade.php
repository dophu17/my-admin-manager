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
                      <div style="display: inline-block;"><a href="{{ route('backend.news') }}" class="btn btn-default">Back</a></div>
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
                    {!! Form::open(array('route' => 'backend.news.add', 'enctype'=>'multipart/form-data', 'id' => 'demo-form2', 'data-parsley-validate' => '', 'class' => 'form-horizontal form-label-left', 'novalidate ' => '')) !!}
                      <!-- name -->
                      <?php $str = ($errors->first('name')) ? 'bad' : null; ?>
                      <div class="form-group {{ $str }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="name" value="{{ old('name') }}" placeholder="Name">
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
                          <input type="text" id="name_slug" name="name_slug" value="{{ old('name_slug') }}" class="form-control col-md-7 col-xs-12" placeholder="Name slug">
                          @if ($errors->first('name_slug'))
                          <span class="error-input">{!! $errors->first('name_slug') !!}</span>
                          @endif
                        </div>
                      </div>

                      <!-- description -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Description </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="description" id="description" class="form-control col-md-7 col-xs-12 textarea" cols="30" rows="10">{{ old('description') }}</textarea>
                        </div>
                      </div>

                      <!-- content -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Content </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="content" id="content" class="form-control col-md-7 col-xs-12 textarea" cols="30" rows="10">{{ old('content') }}</textarea>
                        </div>
                      </div>

                      <!-- avatar -->
                      <?php $str = ($errors->first('avatar')) ? 'bad' : null; ?>
                      <div class="form-group {{ $str }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Avatar </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="avatar" class="form-control col-md-7 col-xs-12" type="file" name="avatar">
                          @if ($errors->first('avatar'))
                          <span class="error-input">{!! $errors->first('avatar') !!}</span>
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
  <script src="{{ asset('') }}public/backend/js/ckeditor/ckeditor.js"></script>
  <script>
    $(document).ready(function() {

      CKEDITOR.replace('description', {
        extraPlugins : 'iframe',
        allowedContent: true, //'iframe[*]'
      });
      CKEDITOR.replace('content', {
        extraPlugins : 'iframe',
        allowedContent: true, //'iframe[*]'
      });

      $('.tagsinput').tagsInput({
        width: 'auto'
      });

      $('#name_slug').focus(function(event) {
        var value = to_slug($('#name').val());
        $('#name_slug').attr('value', value);
      });
    });
  </script>
@endsection
