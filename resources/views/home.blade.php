@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-12">
            <div class="row text-center" style="margin-top:5%">
                <div class="col-md-12 col-sm-12 col-12">
                    <h1 class="headingListingsPage" style="font-weight:900">Find the Best Programming Courses & Tutorials</h1>
                </div>
            </div>
            <div class="row" style="margin-top:3.5%">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input id="searchProgramming" type="text" class="form-control rounded-pill" placeholder="Search for the language you want to learn: PHP, JavaScript...">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:2%">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="row" id="listTechnologies">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

  $(function() {

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.get('/technologies').then(function(data) {
        create(data);
    });
    function create(data) {
        $('#listTechnologies').html('');
      var container = $('#listTechnologies');
        var content = "";
        data.forEach(element => {
            content += `
            <div class="col-md-4 col-sm-12 col-12" style="margin-bottom:2%">
                <a class="cardLinks" href="/list/${element.id}"><div class="cards" style="display:flex; border: 2px solid #E8E8E8; border-radius: 8px; padding-top:7%; padding-bottom:6%; box-shadow: 0px 0px 31px -20px rgba(0,0,0,0.75);">
                    <img height="50" width="50" style="margin-top:-2%; margin-left:3%" src='/img/${element.logo}'> &nbsp; &nbsp; <h3>${element.name}</h3>
                </div></a>
            </div>`
    });
    $(content).hide().appendTo(container).fadeIn(1000);
    };
    $('#searchProgramming').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
        type : 'get',
        url : '{{URL::to('searchProgramming')}}',
        data:{'search':$value},
        success:function(data){
        create(data);
        }
        });
    });

});

</script>
@endsection

