@include('layouts.sidebar')
<div class="content-body">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row page-breadcrumbs">
                            <div class="col-md-12 align-self-center">
                                <h4 class="theme-cl">Update Password</h4>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="contact-thumb">
                                <img width="100" src="{{asset('images/avater.jpg')}}" class="img-circle img-responsive" alt="">
                            </div>
                        </div>


                        </center>

                        <form class="form-horizontal" action="{{route('pass')}}" method="post" >
                            @csrf
                            @if(isset($mes))
                                <div class='alert alert-danger'>
                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                    <i class='fa fa-ban-circle'></i><strong>Fix error: </br></strong><b>{{$mes}}</b>
                                </div>
                            @endif
                            @if(isset($mes1))
                                <div class='alert alert-success'>
                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                    <i class='fa fa-ban-circle'></i><strong>Success: </br></strong><b>{{$mes1}}</b>
                                </div>
                            @endif
                            <div class="form-group">

                                <input type="password" class="form-control"  name="password" placeholder="Old Password">

                            </div>

                            <div class="form-group">
                                <input type="password" required name="cpassword" class="form-control" placeholder="New Password">
                            </div>

                            <div class="form-group help">
                                <input type="password" required  class="form-control" name="fpassword"  placeholder="Confirmed-password">
                            </div>
                            <div class="form-group">
                                <div class="flex-box align-items-center">
                                    <button type="submit" class="btn btn-rounded btn-outline-success btn-block">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Datatable -->
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>
<script src="{{asset('js/custom.min.js')}}"></script>
<script src="{{asset('js/deznav-init.js')}}"></script>
<script src="{{asset('js/demo.j')}}s"></script>
<script src="{{asset('js/styleSwitcher.js')}}"></script>
