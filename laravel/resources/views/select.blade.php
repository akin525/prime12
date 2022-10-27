@include('layouts.sidebar')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
    <!--    <div class="card">-->
    <div class="card-body">
        <div class="module-head">
            <center><h3>
                    Select Network</h3></center>
        </div>
        <center>
            <div class="btn-controls">
                <form action="{{ route('buydata') }}" method="POST">
                    @csrf
                    <label for="network" class=" requiredField">
                        Network<span class="asteriskField">*</span>
                    </label>
                    <select  name="work" class="text-success form-control" required="">
                        <option value="MTN">MTN</option>
                        <option value="MTN_CG">MTN_CG</option>
                        <option value="MTN_DG">MTN_DG</option>
                        <option value="GLO">GLO</option>
                        <option value="9MOBILE">9MOBILE</option>
                        <option value="AIRTEL_DG">AIRTEL_DG</option>
                        <option value="AIRTEL_CG">AIRTEL_CG</option>

                    </select>

                    <br>
                    <button type="submit" class=" btn btn-primary" >Click Next <span class="load loading"></span>
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
        </center>
        <br>



        <p>You can use the codes below to check your Data Balance!  </p>

        <h6>
            <ul>
                <li> MTN [SME] *461*4# or *556#</li>
                <li>MTN [CG] *131*4# or *460*260#</li>
                <li>9mobile [Gifting] *228#</li>
                <li>Airtel *140#</li>
                <li>Glo *127*0#</li>
            </ul>
        </h6>



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
