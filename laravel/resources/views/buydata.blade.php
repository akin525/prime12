@include('layouts.sidebar')
<div class="content-body">
    <div class="container-fluid">

<div class="row">
    <!--    <div class="card">-->
    <div class="card-body">
        <div class="module-head">
            <h3>
                Buy Data</h3>
        </div>
        <center>
            <div class="btn-controls">
                <form action="{{ route('bill') }}" method="post">
                    @csrf
                    <script>
                        function myNewFunction(sel) {
                            // alert(sel.options[sel.selectedIndex].id);
                            document.getElementById("po").value = (sel.options[sel.selectedIndex].id);
                            document.getElementById("pk").value = (sel.options[sel.selectedIndex].text);
                        }
                    </script>
                    <label for="network" class=" requiredField">
                        Choose Network<span class="asteriskField">*</span>
                    </label>
                    <select  name="name" class="text-success form-control" onChange="myNewFunction(this);" required="">
                        <option value="">---------</option>
                        @foreach($data as $datas)

                                <option value="{{$datas->plan_id}}" id="{{$datas->tamount}}" >{{$datas->network}}{{$datas->plan}}
                                </option>
                                @endforeach

                    </select>

                    <br>
                    <label for="network" class=" requiredField">
                        Amount<span class="asteriskField">*</span>
                    </label>
                    <input name="amount" class="text-success form-control" value="" placeholder="Amount" id="po" readonly>
                    <br>
                    <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">

                    <label for="network" class=" requiredField">
                        Enter Phone no<span class="asteriskField">*</span>
                    </label>
                    <input type="number" name="number" class="form-control" required>
                    <br>

                    <button type="submit" class=" btn" style="color: white;background-color: #095b0d"> Click Next<span class="load loading"></span>
                    </button>
                    <script>
                        const btns = document.querySelectorAll('button');
                        btns.forEach((items)=>{
                            items.addEventListener('click',(evt)=>{
                                evt.target.classList.add('activeLoading');
                            })
                        })
                    </script>
                </form>
                <br>
        </center>
        <p>You can use the codes below to check your data balance  </p>

        <h4 class="btn-info">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">MTN [SME]     *461*4#  </li>
                <li class="list-group-item list-group-item-primary">MTN [Gifting]     *131*4# or *460*260#  </li>
                <li class="list-group-item list-group-item-dark"> 9mobile [Gifting]   *228# </li>
                <li class="list-group-item list-group-item-danger"> Airtel   *140# </li>
                <li class="list-group-item list-group-item-success"> Glo  *127*0#. </li>
            </ul>

        </h4>
        <br>


        <br>
    </div>
</div>
</div>
</center>
    <!-- Datatable -->
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/deznav-init.js')}}"></script>
    <script src="{{asset('js/demo.j')}}s"></script>
    <script src="{{asset('js/styleSwitcher.js')}}"></script>
