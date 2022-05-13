@include('layouts.sidebar')
<div class="content-body">
    <div class="container-fluid">

        <div class="span9">
            <div class="content">
                <div class="module">
                    <div class="module-head">
                        <h3>
                            Preview Data</h3>
                    </div>
                    <center>
                        <div class="card">
                            <div class="card-body">
                                <div class="row page-breadcrumbs">
                                    <div class="col-md-12 align-self-center">

                                        <h4 class="theme-cl">Product Detail</h4>
                                    </div>
                                </div>
                            </div>
                            @if(isset($mg))
                                <div class='alert alert-success'>
                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                    <i class='fa fa-ban-circle'></i><strong>Notification: </br></strong><b class='align-content-center'>{{$mg}}</b>
                                </div>
                            @endif

                            {{--                    <?php--}}
                            {{--                    //                    $network=$cat_id=$amount="";--}}


                            {{--                    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']))--}}
                            {{--                    {--}}

                            {{--                        $id=mysqli_real_escape_string($con,$_POST['id']);--}}

                            {{--                        $query="SELECT * FROM  data where  id = '$id'";--}}
                            {{--                        $result = mysqli_query($con,$query);--}}

                            {{--                        while($row = mysqli_fetch_array($result))--}}
                            {{--                        {--}}
                            {{--                            $name="$row[network]";--}}
                            {{--                            $details="$row[plan]";--}}
                            {{--                            $amount="$row[tamount]";--}}
                            {{--                            $tamount="$row[amount]";--}}
                            {{--                            $product_type="$row[plan_id]";--}}
                            {{--                            $networkcode=$row["cat_id"];--}}
                            {{--                            $code=$row["status"];--}}
                            {{--                        }--}}
                            {{--                    }--}}

                            {{--                    ?>--}}

                            {{--                    <script>--}}
                            {{--                        function showUser() {--}}
                            {{--                            var str= document.getElementById("tvphone").value;--}}

                            {{--                            if (str == "") {--}}
                            {{--                                document.getElementById("vtv").innerHTML = "IUC cannot be empty";--}}
                            {{--                                document.getElementById("btnd").removeAttribute("disabled");--}}
                            {{--                                return;--}}
                            {{--                            } else if (str.length<9) {--}}
                            {{--                                document.getElementById("vtv").innerHTML = "IUC is too short";--}}
                            {{--                                document.getElementById("btnd").removeAttribute("disabled");--}}
                            {{--                                return;--}}
                            {{--                            } else {--}}
                            {{--                                document.getElementById("btnv").innerText="Verify....";--}}
                            {{--                                var xmlhttp = new XMLHttpRequest();--}}
                            {{--                                xmlhttp.onreadystatechange = function() {--}}
                            {{--                                    if (this.readyState == 4 && this.status == 200) {--}}
                            {{--                                        document.getElementById("btnv").innerText="Verify";--}}
                            {{--                                        if(this.responseText=="fail"){--}}
                            {{--                                            document.getElementById("vtv").innerHTML = "Error validating IUC Number";--}}
                            {{--                                            document.getElementById("btnd").setAttribute("disabled", "true");--}}
                            {{--                                        }else{--}}
                            {{--                                            document.getElementById("vtv").innerHTML = this.responseText;--}}
                            {{--                                            document.getElementById("btnd").removeAttribute("disabled");--}}
                            {{--                                        }--}}
                            {{--                                    }--}}
                            {{--                                };--}}
                            {{--                                xmlhttp.open("GET","verify.php?number="+str+"&provider=<?php echo $name; ?>"+"&networkcode=<?php echo $networkcode; ?>",true);--}}
                            {{--                                xmlhttp.send();--}}
                            {{--                            }--}}
                            {{--                        }--}}
                            {{--                    </script>--}}

                            {{--                    <script>--}}
                            {{--                        function shoUser() {--}}
                            {{--                            var str= document.getElementById("tvphone1").value;--}}

                            {{--                            if (str == "") {--}}
                            {{--                                document.getElementById("vtv1").innerHTML = "IUC cannot be empty";--}}
                            {{--                                document.getElementById("btnd1").removeAttribute("disabled");--}}
                            {{--                                return;--}}
                            {{--                            } else if (str.length<9) {--}}
                            {{--                                document.getElementById("vtv1").innerHTML = "IUC is too short";--}}
                            {{--                                document.getElementById("btnd1").removeAttribute("disabled");--}}
                            {{--                                return;--}}
                            {{--                            } else {--}}
                            {{--                                document.getElementById("btnv1").innerText="Verify....";--}}
                            {{--                                var xmlhttp = new XMLHttpRequest();--}}
                            {{--                                xmlhttp.onreadystatechange = function() {--}}
                            {{--                                    if (this.readyState == 4 && this.status == 200) {--}}
                            {{--                                        document.getElementById("btnv1").innerText="Verify";--}}
                            {{--                                        if(this.responseText=="fail"){--}}
                            {{--                                            document.getElementById("vtv1").innerHTML = "Error validating IUC Number";--}}
                            {{--                                            document.getElementById("btnd1").setAttribute("disabled", "true");--}}
                            {{--                                        }else{--}}
                            {{--                                            document.getElementById("vtv1").innerHTML = this.responseText;--}}
                            {{--                                            document.getElementById("btnd1").removeAttribute("disabled");--}}
                            {{--                                        }--}}
                            {{--                                    }--}}
                            {{--                                };--}}
                            {{--                                xmlhttp.open("GET","verifybill1.php?number="+str+"&provider=<?php echo $name; ?>"+"&networkcode=<?php echo $gk; ?>",true);--}}
                            {{--                                xmlhttp.send();--}}
                            {{--                            }--}}
                            {{--                        }--}}
                            {{--                    </script>--}}

                            {{--                    <?php--}}

                            {{--                    ?>--}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="card-body">
                                                <label for="network" class=" requiredField">
                                                    Product<span class="asteriskField">*</span>
                                                </label>
                                                @foreach($data as $data1)
                                                    <input type="text" class="form-control text-success" value="{{$data1->network}}..{{$data1->plan}}" readonly/>


                                                    <input type="hidden" class="form-control text-success" value="" readonly/>


                                                    @if(!($data1->plan_id=="airtime"))
                                                        <label for="network" class="text-primary requiredField">
                                                            Amount<span class="asteriskField">*</span>
                                                        </label>
                                                        <input type="text" class="form-control text-primary" value="NGN{{$data1->tamount}}" readonly/>
                                                    @endif

                                                    <form action="{{ route('bill') }}" method="post">
                                                        @csrf
                                                        @if($user->apikey="")
                                                            <input type="hidden" name="amount" value="{{$data1->tamount}}">
                                                        @else
                                                            <input type="hidden" name="amount" value="{{$data1['ramount']}}">
                                                        @endif
                                                        <input type="hidden" name="name" value="{{$data1->network}}..{{$data1->plan}}">
                                                        <input type="hidden" name="productid" value="{{$data1->id}}">
                                                        <input type="hidden" name="id" value="<?php echo rand(10000000, 999999999); ?>">

                                                        @if($data1->plan_id=="airtime")
                                                            <div class="form-group">
                                                                <label for="network" class="text-success requiredField">
                                                                    Enter Amount<span class="asteriskField">*</span>
                                                                </label>
                                                                <input class="form-control text-primary" type="number" placeholder="Enter Amount" maxlength="4" minlength="3" id="amount" name="amount" value="" autocomplete="on" size="20" min="100" max="4000" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="network" class="text-success requiredField">
                                                                    Enter Phone No<span class="asteriskField">*</span>
                                                                </label>
                                                                <input class="form-control text-success" type="tel" placeholder="Enter recipient number" maxlength="11" minlength="11" id="phone" name="number" value="" autocomplete="on" size="20" required="">
                                                            </div>
                                                            <button type="submit" class="btn btn-rounded btn-outline-info"> Continue </button>

                                                        @else
                                                            <input type="hidden" name="amount" value="{{$data1->tamount}}">
                                                        @endif

                                                    <!--                                            --><?php //if ($product_type=="tv") { ?>
                                                        {{--                                            <b class="text-success fa-bold" id="vtv"></b>--}}
                                                        {{--                                            <div class="form-group">--}}
                                                        {{--                                                <input class="form-control text-success" type="tel" placeholder="Enter IUC number" maxlength="11" minlength="9" id="tvphone" name="number" value="" autocomplete="on" size="20" required="">--}}
                                                        {{--                                            </div>--}}

                                                        {{--                                            <button id="btnv" type="button" onclick="showUser()" class="btn btn-rounded btn-info"> Verify </button>--}}
                                                        {{--                                            <button id="btnd" type="submit" disabled class="btn btn-rounded btn-outline-info"> Continue </button>--}}
                                                        {{--                                            --}}
                                                        @if($data1->status==1)
                                                            <div class="form-group">
                                                                <label for="network" class="text-successrequiredField">
                                                                    Enter Phone No<span class="asteriskField">*</span>
                                                                </label>
                                                                <input class="form-control text-primary" type="tel" placeholder="Enter recipient number" maxlength="11" minlength="11" id="phone" name="number" value="" autocomplete="on" size="20" required="">
                                                            </div>

                                                            <button type="submit" class="btn btn-rounded btn-outline-info"> Continue </button>
                                                        @endif

                                                        {{--                                            <?php if ($product_type=="nepa") { ?>--}}

                                                        {{--                                            <div class="form-group">--}}
                                                        {{--                                                <input class="form-control" type="number" placeholder="Enter Amount" maxlength="8" minlength="1" id="amount" name="amount" value="" autocomplete="on" size="20" min="50" max="50000" required="">--}}
                                                        {{--                                            </div>--}}
                                                        {{--                                            <b class="text-success fa-bold" id="vtv1"></b>--}}
                                                        {{--                                            <div class="form-group">--}}
                                                        {{--                                                <input class="form-control" type="tel" placeholder="Enter Meter number" maxlength="11" minlength="9" id="tvphone1" name="number" value="" autocomplete="on" size="20" required="">--}}
                                                        {{--                                            </div>--}}

                                                        {{--                                            <button id="btnv1" type="button" onclick="shoUser()" class="btn btn-rounded btn-info"> Verify </button>--}}
                                                        {{--                                            <button id="btnd1" type="submit" disabled class="btn btn-rounded btn-outline-info"> Continue </button>--}}

                                                        {{--                                            <?php } ?>--}}
                                                    </form>
                                                @endforeach
                                                <br>

                                                <h3 class="box-title mrg-top-30">Key Highlights</h3>

                                                <ul class="list-icons">
                                                    <li><i class="fa fa-check text-success"></i> Secure Payment Gateways</li>
                                                    <li><i class="fa fa-check text-success"></i> Instant Activation</li>
                                                    <li><i class="fa fa-check text-success"></i> Efficient Performance</li>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
            </div>
        </div>
        <!--        <div class="col-sm-4 ">-->
        <!--            <br>-->
        <!--            <center> <h4>Codes for Data Balance: </h4></center>-->
        <!--            <ul class="list-group">-->
        <!--                <li class="list-group-item list-group-item-secondary">MTN [SME]     *461*4#  </li>-->
        <!--                <li class="list-group-item list-group-item-primary">MTN [Gifting]     *131*4# or *460*260#  </li>-->
        <!--                <li class="list-group-item list-group-item-dark"> 9mobile [Gifting]   *228# </li>-->
        <!--                <li class="list-group-item list-group-item-action"> Airtel   *140# </li>-->
        <!--                <li class="list-group-item list-group-item-success"> Glo  *127*0#. </li>-->
        <!--            </ul>-->
        <!--            <br>-->
        <!--            <center> <h6>Codes for Airtime Balance: </h6></center>-->
        <!--            <ul class="list-group">-->
        <!--                <li class="list-group-item list-group-item-primary">MTN Airtime VTU    <span id="RightT"> *556#  </span></li>-->
        <!---->
        <!--                <li class="list-group-item list-group-item-success"> 9mobile Airtime VTU   *232# </li>-->
        <!--                <li class="list-group-item list-group-item-info"> Airtel Airtime VTU   *123# </li>-->
        <!--                <li class="list-group-item list-group-item-dark"> Glo Airtime VTU #124#. </li>-->
        <!--            </ul>-->
        <!--        </div>-->
        <!--    </div>-->
