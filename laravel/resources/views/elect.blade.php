@include('layouts.sidebar')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-wrapper">
            <div style="padding:90px 15px 20px 15px">
                <h5 class="text-center">Select Electricity Product</h2>
                    <div class="card">

                        <div class="card-body">
                            <!--                    <div class="box w3-card-4">-->
                            <div class="row">

                                <div class="col-sm-8">
                                    <br>
                                    <br>
                                    <div class="alert alert-danger" id="ElectNote" style="text-transform: uppercase;font-weight: bold;font-size: 18px;display: none;">
                                    </div>
                                    <div id="electPanel">
                                        <div class="alert alert-danger">0.1% discount apply.</div>
                                        <form action="{{route('verifye')}}" method="post">
                                            @csrf
                                            <div id="discotypeID" class="form-group">
                                                <label for="discotypeID" class=" requiredField">
                                                    Select Your Electricity
                                                </label>
                                                <div class="">
                                                    <select name="network" class="text-success  form-control" required >
                                                        @foreach($tv as $elect)
                                                        <option value="{{$elect->id}}" selected>{{$elect->network}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <label for="metertypeID" class=" requiredField">
                                                Enter Meter Number
                                                <span class="asteriskField">*</span>
                                            </label>
                                            <div class="">
                                                <input class="form-control text-success" type="tel" placeholder="Enter Meter number" maxlength="11" minlength="9" id="tvphone" name="phone" value="" autocomplete="on" size="20" required="">
                                            </div>
                                    </div>
                                    {{--                                        <button id="btnv" type="button" onclick="showUser()" class="btn btn-rounded btn-success"> Verify </button>--}}
                                    <button type="submit" class="btn mt-3"
                                            style="color: white;background-color: #048047"> Continue </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-4 ">
                            </div>

                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>

                    <br>
                    <br>
                    <br>
                    <br>
            </div>


            <!-- Datatable -->
            <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>
            <script src="{{asset('js/custom.min.js')}}"></script>
            <script src="{{asset('js/deznav-init.js')}}"></script>
            <script src="{{asset('js/demo.j')}}s"></script>
            <script src="{{asset('js/styleSwitcher.js')}}"></script>
