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
                      <div style="display: inline-block;"><a href="{{ route('backend.users') }}" class="btn btn-default">Back</a></div>
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
                    {!! Form::open(array('route' => ['backend.users.edit', $user->id], 'enctype'=>'multipart/form-data', 'id' => 'demo-form2', 'data-parsley-validate' => '', 'class' => 'form-horizontal form-label-left', 'novalidate ' => '')) !!}
                      <!-- name -->
                      <?php $str = ($errors->first('name')) ? 'bad' : null; ?>
                      <div class="form-group {{ $str }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="name" value="{{ $user->name or old('name') }}" placeholder="Name">
                          @if ($errors->first('name'))
                          <span class="error-input">{!! $errors->first('name') !!}</span>
                          @endif
                        </div>
                      </div>

                      <!-- email -->
                      <?php $str = ($errors->first('email')) ? 'bad' : null; ?>
                      <div class="form-group {{ $str }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="email" value="{{ $user->email or old('email') }}" class="form-control col-md-7 col-xs-12" placeholder="Email">
                          @if ($errors->first('email'))
                          <span class="error-input">{!! $errors->first('email') !!}</span>
                          @endif
                        </div>
                      </div>

                      <!-- password -->
                      <?php $str = ($errors->first('password')) ? 'bad' : null; ?>
                      <div class="form-group {{ $str }}">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="password" placeholder="Password">
                          @if ($errors->first('password'))
                          <span class="error-input">{!! $errors->first('password') !!}</span>
                          @endif
                        </div>
                      </div>

                      <!-- sex -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sex</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default @if($user->sex == 1) active @endif" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="sex" value="1" data-parsley-multiple="gender"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary @if($user->sex == 0) active @endif" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="sex" value="0" data-parsley-multiple="gender"> Female
                            </label>
                          </div>
                        </div>
                      </div>

                      <!-- address -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Address </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="address" class="date-picker form-control col-md-7 col-xs-12" type="text" name="address" value="{{ $user->address or old('address') }}" placeholder="Address">
                        </div>
                      </div>

                      <!-- birthday -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" type="text" name="birthday" value="{{ $user->birthday or old('birthday') }}" data-inputmask="'mask': '99-99-9999'" placeholder="Date Of Birth">
                        </div>
                      </div>

                      <!-- phone -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="phone" class="date-picker form-control col-md-7 col-xs-12" type="text" name="phone" value="{{ $user->phone or old('phone') }}" maxlength="11" placeholder="Phone">
                        </div>
                      </div>

                      <!-- fax -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fax </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fax" class="date-picker form-control col-md-7 col-xs-12" type="text" name="fax" value="{{ $user->fax or old('fax') }}" placeholder="Fax">
                        </div>
                      </div>

                      <!-- avatar -->
                      <?php $str = ($errors->first('avatar')) ? 'bad' : null; ?>
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
                            @if ( !empty($user->avatar) )
                            <img src="{{ asset('') }}public/uploads/users/{{ $user->avatar }}" alt="" >
                            @endif
                          </div>
                          <div>
                            <div class="radio">
                              <label>
                                <input type="radio" class="" name="keep_image" value="0"> Update new image
                              </label>
                            </div>
                            <!-- end radio -->
                            <input id="avatar" class="form-control col-md-7 col-xs-12" type="file" name="avatar" value="{{ old('avatar') }}">
                          </div>
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
    });
  </script>
@endsection
