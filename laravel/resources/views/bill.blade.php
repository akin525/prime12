@include('layouts.sidebar')
<div class="content-body">
    <div class="container-fluid">

@if(isset($mg))
    <script>alert('{{$mg}}');
        window.location='{{ route('dashboard') }}';
    </script>
@endif


@if(!isset($success))
    <script>alert('{{$mg}}');
        window.location='{{ route('dashboard') }}';
    </script>
@else
    <style>
        body {
            text-align: center;
            /*padding: 40px 0;*/
            background: #EBF0F5;
        }
        h1 {
            color: #88B04B;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
        }h2 {
             color: #fa0334;
             font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
             font-weight: 900;
             font-size: 40px;
             /*margin-bottom: 10px;*/
         }
        p {
            color: #404F5E;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-size:20px;
            margin: 0;
        }
        i {
            color: #9ABC66;
            font-size: 100px;
            line-height: 200px;
            margin-left:-15px;
        } f {
              color: #fa0334;
              font-size: 100px;
              line-height: 200px;
              margin-left:-15px;
          }
            </style>
    <body>
    <div class='card'>
        @if($success==1)
            <div style='border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;'>
                <i class='checkmark'>✓</i>
            </div>
            <h1>Success</h1>
        @elseif($success==0)
            <div style='border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;'>
                <f class='checkmark'>x</f>
            </div>
            <h2>Fail</h2>

        @endif

        @if(isset($am) && isset($ph))
            <p>{{$am}} {{$ph}}<br/> Thanks</p>
            <a href='{{route('dashboard')}}'><button type='button' class='btn btn-outline-success'>Continue</button></a>
        @else
            <p>Dupllicate Transaction<br/> Thanks</p>
            <a href='{{route('dashboard')}}'><button type='button' class='btn btn-outline-success'>Continue</button></a>
        @endif
    </div>

    </body>
@endif
