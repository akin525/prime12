@include('layouts.sidebar')
<div class="content-body">
    <div class="container-fluid">


    <div style="padding:90px 15px 20px 15px">
        <h4 class="align-content-center text-sm-center">Airtime TopUp</h4>
        <div class="card">
            <div class="card-body">
                    <!-- Session Status -->
                    <x-auth-session-status class="alert-danger text-danger" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="alert-danger text-danger" :errors="$errors" />
                <!--            <div class="box w3-card-4">-->

                <form action="{{ route('buyairtime') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-8">
                            <br>
                            <br>
                            <div id="AirtimeNote" class="alert alert-danger" style="text-transform: uppercase;font-weight: bold;font-size: 23px;display: none;"></div>
                            <div id="AirtimePanel">

                                <div id="div_id_network" class="form-group">
                                    <label for="network" class=" requiredField">
                                        Network<span class="asteriskField">*</span>
                                    </label>
                                    <div class="">
                                        <select name="name" class="text-success form-control" required="">
                                            <option value="MTN">MTN</option>
                                            <option value="GLO">GLO</option>
                                            <option value="AIRTEL">AIRTEL</option>
                                            <option value="9MOBILE">9MOBILE</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="div_id_network" class="form-group">
                                    <label for="network" class=" requiredField">
                                        Phone NUmber<span class="asteriskField">*</span>
                                    </label>
                                    <div class="">
                                        <input type="number" name="number" class="text-success form-control" minlength="11" maxlength="11" required>
                                    </div>
                                </div>
                                <div id="div_id_network" class="form-group">
                                    <label for="network" class=" requiredField">
                                        Enter Amount<span class="asteriskField">*</span>
                                    </label>
                                    <div class="">
                                        <input type="number" name="amount" min="100" max="4000" class="text-success form-control" required>
                                    </div>
                                </div>
                                <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">

                                <button type="submit" class=" btn" style="color: white;background-color: #095b26"> Purchase Now<span class="load loading"></span>
                                </button>
                                <script>
                                    const btns = document.querySelectorAll('button');
                                    btns.forEach((items)=>{
                                        items.addEventListener('click',(evt)=>{
                                            evt.target.classList.add('activeLoading');
                                        })
                                    })
                                </script>
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <br>
                            <center> <h6>Codes for Airtime Balance: </h6></center>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-primary">MTN Airtime VTU    <span id="RightT"> *556#  </span></li>

                                <li class="list-group-item list-group-item-success"> 9mobile Airtime VTU   *232# </li>
                                <li class="list-group-item list-group-item-action"> Airtel Airtime VTU   *123# </li>
                                <li class="list-group-item list-group-item-info"> Glo Airtime VTU #124#. </li>
                            </ul>
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
                    <br>

                </form>


            </div>


        </div>


        <!-- Datatable -->
        <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>
        <script src="{{asset('js/custom.min.js')}}"></script>
        <script src="{{asset('js/deznav-init.js')}}"></script>
        <script src="{{asset('js/demo.j')}}s"></script>
        <script src="{{asset('js/styleSwitcher.js')}}"></script>
