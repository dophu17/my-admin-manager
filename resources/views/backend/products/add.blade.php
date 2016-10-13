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
                      <div style="display: inline-block;"><a href="{{ route('backend.products') }}" class="btn btn-default">Back</a></div>
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
                    {!! Form::open(array('route' => 'backend.products.add', 'enctype'=>'multipart/form-data', 'id' => 'demo-form2', 'data-parsley-validate' => '', 'class' => 'form-horizontal form-label-left', 'novalidate ' => '')) !!}
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

                      <!-- price/price_promotion -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Price/Price promotion </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="price" class="form-control col-md-7 col-xs-12 both-left" type="text" name="price" placeholder="Price">
                          <input id="price_promotion" class="form-control col-md-7 col-xs-12 both-right" type="text" name="price_promotion" value="{{ old('price_promotion') }}" placeholder="Price promotion">
                        </div>
                      </div>

                      <!-- weight, height -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Weight/Height </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="weight" class="form-control col-md-6 col-xs-6 both-left" type="text" name="weight" value="{{ old('weight') }}" placeholder="Weight">
                          <input id="height" class="form-control col-md-6 col-xs-6 both-right" type="text" name="height" value="{{ old('height') }}" placeholder="Weight">
                        </div>
                      </div>

                      <!-- made_in, version_year -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Made in/Version year </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="made_in" class="form-control col-md-7 col-xs-12 both-left" type="text" name="made_in" value="{{ old('made_in') }}" placeholder="Made in">
                          <input id="version_year" class="form-control col-md-7 col-xs-12 both-right" type="text" name="version_year" value="{{ old('version_year') }}" placeholder="Version year" >
                        </div>
                      </div>

                      <!-- model -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Model/Color </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="model" class="form-control col-md-7 col-xs-12 both-left" type="text" name="model" value="{{ old('model') }}" placeholder="Model">
                          <input id="color" class="form-control col-md-7 col-xs-12 both-right" type="text" name="color" value="{{ old('color') }}" placeholder="Color">
                        </div>
                      </div>

                      <!-- tag -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tag </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tag" class="form-control col-md-7 col-xs-12 tagsinput" type="text" name="tag" value="{{ old('tag') }}" placeholder="Tag">
                        </div>
                      </div>

                      <!-- status -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="status" value="1" data-parsley-multiple="gender"> &nbsp; Stock &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="status" value="0" data-parsley-multiple="gender"> No stock
                            </label>
                          </div>
                        </div>
                      </div>

                      <!-- orderby -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Order </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="orderby" class="form-control col-md-7 col-xs-12" type="text" name="orderby" value="{{ old('orderby') }}" placeholder="Order">
                        </div>
                      </div>

                      <!-- is_feature -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Feature </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" class="" name="is_feature" value="1" @if(old('is_feature') == 1) checked="" @endif> Check is feature
                            </label>
                          </div>
                        </div>
                      </div>

                      <!-- is_new -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">New </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" class="" name="is_new" value="1" @if(old('is_new') == 1) checked="" @endif> Check is new
                            </label>
                          </div>
                        </div>
                      </div>

                      <!-- description -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Description </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="description" id="description" class="form-control col-md-7 col-xs-12 textarea" cols="30" rows="10">{{ old('description') }}</textarea>
                        </div>
                      </div>

                      <!-- avatar -->
                      <?php $str = ($errors->first('avatar')) ? 'bad' : null; ?>
                      <div class="form-group {{ $str }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Avatar </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="avatar" class="date-picker form-control col-md-7 col-xs-12" type="file" name="avatar" value="{{ old('avatar') }}">
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
  <script>
    $(document).ready(function() {
      $("#birthday").inputmask();

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
