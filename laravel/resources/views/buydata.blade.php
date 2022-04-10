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
                <form action="{{ route('pre') }}" method="post">
                    @csrf
                    <label for="network" class=" requiredField">
                        Choose Network<span class="asteriskField">*</span>
                    </label>
                    <select  name="id" class="text-success form-control" required="">
                        <option value="">---------</option>
                        @foreach($data as $datas)

                                <option value="{{$datas->id}}">{{$datas->network}}{{$datas->plan}}{{$datas->tamount}}
                                </option>
                                @endforeach

                    </select>
                    <button type="submit" class=" btn" style="color: white;background-color: #095b0d"> Next</button>
                </form>
        </center>
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
        <style>
            img {
                max-width: 100%;
                height: auto;
            }
        </style>
        <div class="card-body">
            <div class="center">
                <img    src="{{asset('images/re.jpg')}}" alt="#" />
            </div>
        </div>

        <br>
    </div>
</div>
</div>
</center>
