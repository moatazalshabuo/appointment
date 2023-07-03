@extends('layouts.app')

@section('style')
    <style>
        body {
            margin-top: 20px;
        }

        .mail-seccess {
            text-align: center;
            background: #fff;
            border-top: 1px solid #eee;
        }

        .mail-seccess .success-inner {
            display: inline-block;
        }

        .mail-seccess .success-inner h1 {
            font-size: 100px;
            text-shadow: 3px 5px 2px #3333;
            color: #006DFE;
            font-weight: 700;
        }

        .mail-seccess .success-inner h1 span {
            display: block;
            font-size: 25px;
            color: #333;
            font-weight: 600;
            text-shadow: none;
            margin-top: 20px;
        }

        .mail-seccess .success-inner p {
            padding: 20px 15px;
        }

        .mail-seccess .success-inner .btn {
            color: #fff;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <section class="mail-seccess section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-12">
                        <!-- Error Inner -->
                        <div class="success-inner p-5">
                            <h1><i class="fe fe-clock"></i><span>{{$datalist['title']}}!</span></h1>
                            <p>{{ $datalist['note'] }}</p>
                            <p>{{ $datalist['date'] }}</p>
                        </div>
                        <!--/ End Error Inner -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
