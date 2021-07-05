@extends('main')

@section('content')
  <div class="right_col" role="main">

    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>
            Withdraw Form
          </h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            @if (\Session::has('success'))
              <div class="alert alert-success">
                <ul>
                  <li>{!! \Session::get('success') !!}</li>
                </ul>
              </div>
            @endif
            <div class="x_title">
              <h2>Form Withdraw </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <form class="form-horizontal form-label-left" novalidate enctype="multipart/form-data" method="post" action="/home/withdraw-post">

                {{ csrf_field() }}

                <p>Your Account Balance</a>
                </p>

                <span class="section">Rp. {{ number_format($balance->value, 2) }}</span>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Enter Ammount<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="number" name="value" required="required" class="form-control col-md-7 col-xs-12" value="{{old('value')}}">
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">Cancel</button>
                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- footer content -->
    <footer>
      <div class="copyright-info">
        <p class="pull-right">Laravel Banking System</a>
        </p>
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

  </div>
@endsection