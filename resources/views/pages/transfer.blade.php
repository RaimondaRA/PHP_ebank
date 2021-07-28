@extends('main')
@section('content')

    @if(session()->has('message'))
    <div class="main-navbar sticky-top bg-white">
        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-check mx-2"></i>
            <strong>{{ session()->get('message') }}</strong></div></div>
    @endif


    <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <h3 class="page-title">Money Transfer</h3>
    </div>
</div>
<div class="row">

    <div class="col-lg-12">
        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h6 class="m-0">Transfer Data</h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                    <div class="row">
                        <div class="col">

                            <form action="/store" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="">@include('_partials/errors')</div>
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="faccountfrom">Select account you wish to send the payment from</label>
                                        <select id="faccountfrom" name="faccountfrom"  class="form-control">
                                            <option selected>Select</option>
                                            @foreach(DB::Table('accounts')->select('account_no')->where('user_id', auth()->user()->id)->get() as $rez)
                                                <option>{{$rez->account_no}}</option>
                                            @endforeach
                                        </select >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="faccountto">Enter account you wish to send the payment to</label>
                                        <input type="text" class="form-control" id="faccountto" name="faccountto" value="{{old('faccountto')}}"> </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Amount</label>
                                        <input type="text" class="form-control" id="amount" name="amount" placeholder="" value="{{old('amount')}}"> </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Receiver's name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{old('name')}}"> </div>
                                    <div class="form-group col-md-6">
                                        <label for="surname">Receiver's surname</label>
                                        <input type="text" class="form-control" id="surnname" name="surname" placeholder="" value="{{old('surname')}}"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="purpose">Payment purpose</label>
                                    <input type="text" class="form-control" id="purpose" name="purpose" placeholder="" value="{{old('purpose')}}"> </div>
                                <button type="submit" class="btn btn-accent">Send money</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection