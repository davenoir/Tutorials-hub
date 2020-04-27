@extends('layouts.app')

@section('content')

<div class="container">
<div  data-id="{{$technology->id}}" class="row technologyId" style="margin-bottom:2.5%; margin-top:1%">
        <div class="col-md-12 col-sm-12 col-12">
            <div class="row">
                <div class="col-md-1 col-sm-3 col-3 logoTechnology">
                    <img  height="70" width="75"src='/img/{{$technology->name.'.png'}}'>
                </div>
                <div class="col-md-10 col-sm-9 col-9">
                    <h1 class="courseTechnologyListHeading" style="font-weight:900">{{$technology->name}} Tutorials and Courses</h1>
                    <p style="color:#808080; font-style:italic; font-weight:900">Learn {{$technology->name}} online from the best {{$technology->name}} tutorials submitted & voted by the {{$technology->category->name}} community.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-12 col-12 filtersTablet">
            <div class="row">
                <nav class="navbar navbar-expand-md navbar-light" style="width:100%">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#filters" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span> Filters
                      </button>
                      <div class="collapse navbar-collapse" id="filters">
                <div class="col-md-10 col-sm-12 col-12" style="background-color: rgba(0, 0, 0, 0.01); margin-top:6.5%;box-shadow: 0px 0px 15px -5px rgba(1, 2, 1, 0.3);border: 1px solid #E8E8E8; color:#505050;border-radius:10px; padding-top:10%; padding-bottom:5%">
                    <h5 class="boldFilter"><i class="fas fa-filter"></i> Filter Courses</h5>
                    <hr>
            <div class="filters">
                <h5 class="boldFilter">Version</h5>
            @foreach ($version as $item)
            <div class="form-check">
            <input class="form-check-input switch" type="checkbox" value="{{$item->id}}" id="{{$item->name}}" name="ver[]">
                <label class="form-check-label" for="{{$item->name}}">
                  {{$item->name}}
                </label>
            </div>
            @endforeach
            </div>
            <div class="filters">
                <h5 class="boldFilter">Type</h5>
            @foreach ($type as $t)
            <div class="form-check">
            <input class="form-check-input switch" type="checkbox" value="{{$t->id}}" id="{{$t->name}}" name="type[]">
                <label class="form-check-label" for="{{$t->name}}">
                  {{$t->name}}
                </label>
            </div>
            @endforeach
            </div>
            <div class="filters">
                <h5 class="boldFilter">Format</h5>
            @foreach ($format as $f)
            <div class="form-check ">
            <input class="form-check-input switch" type="checkbox" value="{{$f->id}}" id="{{$f->name}}" name="format[]">
                <label class="form-check-label" for="{{$f->name}}">
                  {{$f->name}}
                </label>
            </div>
            @endforeach
            </div>
            <div class="filters">
                <h5 class="boldFilter">Level</h5>
            @foreach ($levels as $l)
            <div class="form-check">
            <input class="form-check-input switch" type="checkbox" value="{{$l->id}}" id="{{$l->name}}" name="level[]">
                <label class="form-check-label" for="{{$l->name}}">
                  {{$l->name}}
                </label>
            </div>
            @endforeach
            </div>
            <div class="filters">
                <h5 class="boldFilter">Language</h5>
            @foreach ($languages as $l)
            <div class="form-check">
            <input class="form-check-input switch" type="checkbox" value="{{$l->id}}" id="{{$l->name}}" name="language[]">
                <label class="form-check-label" for="{{$l->name}}">
                  {{$l->name}}
                </label>
            </div>
            @endforeach
            </div>
            </div>
                      </div>
                </nav>
            </div>
        </div>

        <div class="col-md-8 col-sm-12 col-12">
            <div class="row text-right" style="margin-bottom:1%">
                <div class="col-md-3 col-sm-4 col-4 offset-4 offset-sm-4 offset-md-6">
                    <div class="form-check">
                        <input class="form-check-input" style="display:none" type="checkbox" value="DESC" id="popular" name="popular">
                            <label class="form-check-label boldFilter sort" for="popular">
                                <i class="far fa-star"></i> Popular
                            </label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-4">
                    <div class="form-check">
                        <input class="form-check-input" style="display:none" type="checkbox" value="DESC" id="latest" name="latest">
                            <label class="form-check-label boldFilter sort" for="latest">
                                <i class="fas fa-history"></i> Recent
                            </label>
                    </div>
                </div>
            </div>
            @if (count($courses) > 0)
                <section class="courses">
                    @include('layouts.load')
                </section>
            @endif
        </div>
    </div>
    <hr>
    <div class="row justify-content-center" style="margin-top:2%">
        <div class="col-md-12 col-sm-12 col-12">
            <div class="row" style="margin-bottom:2%">
                <div class="col-md-12 col-sm-12 col-12 text-center">
                    <h2 class="interestedInHeading" style="font-weight:900">You might also be interested in:</h2>
                </div>
            </div>
            <div class="row justify-content-center" id="listTechnologies">
                @foreach ($technologies as $item)
                <div class="col-md-4 col-sm-12 col-12" style="margin-bottom:2%">
                    <a class="cardLinks" href="/list/{{$item->id}}"><div class="cards" style="display:flex; border: 2px solid #E8E8E8; border-radius: 8px; padding-top:7%; padding-bottom:6%; box-shadow: 0px 0px 31px -20px rgba(0,0,0,0.75);">
                        <img height="50" width="50" style="margin-top:-2%; margin-left:3%" src='/img/{{$item->logo}}'> &nbsp; &nbsp; <h3>{{$item->name}}</h3>
                    </div></a>
                </div>
                @endforeach
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

        //optional if the query is not functional!!!
        // Due to the bug in laravel-follow N+1 relationships, Querying does not work on FollowRelations Model
        //Thus until the bug is fixed this is a temporary solution with jQuery sort();
        //Sort by popularity
        /*$(document).on('click', '#popular', function(){
            var courses = $(".courseCard");
            var temp = courses.sort(function(a,b){
            return parseInt($(b).attr("data-count")) - parseInt($(a).attr("data-count"));
            });
            $(".courses").html(temp);
        });*/
         /***************************************/
         var versions =[];
         var types =[];
         var formats =[];
         var levels =[];
         var languages =[];
         var latest;
         var popular;

         //Version
         $('input[name="ver[]"]').on('change', function (e)
        {
            versions =[];
            e.preventDefault();
            $('input[name="ver[]"]:checked').each(function()
        {
            versions.push($(this).val());
        });
            var id = $('.technologyId').data('id');

            getCoursesFilter(versions, types, formats, levels, languages, latest, popular);
        });

        //Type
        $('input[name="type[]"]').on('change', function (e)
        {
            types =[];
            e.preventDefault();
            $('input[name="type[]"]:checked').each(function()
        {
            types.push($(this).val());
        });
            var id = $('.technologyId').data('id');

            getCoursesFilter(versions, types, formats, levels, languages, latest, popular);
        });
        //Format
        $('input[name="format[]"]').on('change', function (e)
        {
            formats =[];
            e.preventDefault();
            $('input[name="format[]"]:checked').each(function()
        {
            formats.push($(this).val());
        });
            var id = $('.technologyId').data('id');

            getCoursesFilter(versions, types, formats, levels, languages, latest, popular);
        });
        //Levels
        $('input[name="level[]"]').on('change', function (e)
        {
            levels =[];
            e.preventDefault();
            $('input[name="level[]"]:checked').each(function()
        {
            levels.push($(this).val());
        });
            var id = $('.technologyId').data('id');

            getCoursesFilter(versions, types, formats, levels, languages, latest, popular);
        });

        //Language
        $('input[name="language[]"]').on('change', function (e)
        {
            languages =[];
            e.preventDefault();
            $('input[name="language[]"]:checked').each(function()
        {
            languages.push($(this).val());
        });
            var id = $('.technologyId').data('id');

            getCoursesFilter(versions, types, formats, levels, languages, latest, popular);
        });

        //Latest
        $('input[name="latest"]').on('change', function (e)
        {
            latest = $('input[name="latest"]:checked').val();
            var id = $('.technologyId').data('id');

            getCoursesFilter(versions, types, formats, levels, languages, latest, popular);
        });

        $('input[name="popular"]').on('change', function (e)
        {
            popular = $('input[name="popular"]:checked').val();
            var id = $('.technologyId').data('id');

            getCoursesFilter(versions, types, formats, levels, languages, latest, popular);
        });


        //Function to filter Ajax requests and print data with array of selections
        function getCoursesFilter(versions, types, formats, levels, languages, latest, popular) {
            var id = $('.technologyId').data('id');
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
               type:'POST',
               url:'/list/'+id,
               data:{'versions':versions,'types': types , 'formats': formats , 'levels' : levels, 'languages' : languages, 'latest' : latest, 'popular' : popular, '_token': token, "_method": 'POST'},
            }, 'json').done(function(data) {
                $('.courses').html(data);
            });
        }

        /***************************************/

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();

            var url = $(this).attr('href');
            getCourses(url, versions);
            window.history.pushState("", "", url);
        });

        function getCourses(url,versions, types, formats, levels, languages, latest, popular) {
            var id = $('.technologyId').data('id');
            $.ajax({
                url : url,
                data:{'versions':versions,'types': types , 'formats': formats , 'levels' : levels, 'languages' : languages, 'latest' : latest, 'popular' : popular, "_method": 'POST'},
            }).done(function (data) {
                $('.courses').html(data);
            }).fail(function () {
                alert('Articles could not be loaded.');
            });
        }

        //zoom the arrow of vote card
        $(document)
            .on('mouseover' , '.voteCard',function() {
                $(this).find( '.fa-caret-up' ).addClass('zoom');
            })
            .on('mouseout','.voteCard', function() {
                $(this).find( '.fa-caret-up' ).removeClass('zoom');
        });

        $(document).on('click','.voteCard',function(){
            var loggedIn = {{ auth()->check() ? 'true' : 'false' }};
            if (loggedIn) {

            var id = $(this).data('id');
            var c = $('#'+'like'+id+'-bs3').html();
            var cObjId = id;
            var cObj = $(this);

            $.ajax({
               type:'POST',
               url:'/like',
               data:{id:id},
               success:function(data){
                  if(jQuery.isEmptyObject(data.success.attached)){
                    $('#'+'like'+cObjId+'-bs3').html(parseInt(c)-1);
                    $(cObj).removeClass("voted");
                  }else{
                    $('#'+'like'+cObjId+'-bs3').html(parseInt(c)+1);
                    $(cObj).addClass("voted");
                  }
               }
            },'json');
        } else {
            $('#register').modal('toggle');
        }

        });
    });
</script>

@endsection
