@include('layouts.sidebar')
<div class="content-body">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row page-breadcrumbs">
                            <div class="col-md-12 align-self-center">
                                <h4 class="theme-cl">Update Profile</h4>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="contact-thumb">
                                <img width="100" src="{{asset('images/avater.jpg')}}" class="img-circle img-responsive" alt="">
                            </div>
                        </div>


                        </center>

                        <form class="form-horizontal" action="{{route('update2')}}" method="post" >
                            @csrf
                            @if(isset($mes))
                                <div class='alert alert-success'>
                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                    <i class='fa fa-ban-circle'></i><strong>Success: </br></strong><b>{{$mes}}</b>
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="mb-1"><strong>Full-Name</strong></label>

                                <input type="text" class="form-control"  name="name" value="{{$user->name}}" required>

                            </div>

                            <div class="form-group">
                                <label class="mb-1"><strong>Email</strong></label>
                                <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Phone-Number</strong></label>
                                <input type="text" name="number" class="form-control" value="{{$user->phone}}" required>
                            </div>

                            <div class="form-group help">
                                <label class="mb-1"><strong>Username</strong></label>
                                <input type="text"  class="form-control" name="user"  value="{{$user->username}}" readonly>
                            </div>
                            <div class="form-group">
                                <div class="flex-box align-items-center">
                                    <button type="submit" class="btn btn-rounded btn-outline-success btn-block">Update Profile</button>
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
