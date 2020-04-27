@extends('layouts.app')

@section('content')
<div class="row justify-content-center" style="margin: 1%">
    <div class="col-md-6 col-sm-12 col-12 text-center">
       <h2 style="font-weight:900">Manage Courses</h2>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12 col-12">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                        {{ session('success') }}
            </div>
        @endif
    </div>
</div>

@foreach($courses as $course)
        <div class="row">
        <div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1 col-10 offset-1 courseCard"  style="border: 2px solid #E8E8E8; border-radius: 8px; padding-top:1.2%; padding-bottom:1.2%; box-shadow: 0px 0px 19px -17px rgba(0,0,0,0.75); margin-bottom:0.8%">
                <div class="row">
                    <div class="col-md-8 offset-md-1 col-sm-8 col-8">
                        <h5>
                        <a class="courseLinks" href="{{$course->link}}" target="_blank">{{$course->name}}</a>
                        </h5>
                        <p style="color:#808080; font-style:italic; font-weight:900; font-size:small"><i class="fas fa-pencil-alt"></i> Submitted by <span style="border-radius:10px; padding:0 6px; background-color: rgba(128, 128, 128, 0.15);"><i class="far fa-user"></i> {{$course->user->name}}</span> at <span style="border-radius:10px; padding:0 6px; background-color: rgba(128, 128, 128, 0.15);"><i class="far fa-clock"></i> {{$course->created_at}}</span></p>
                        <span style="border-radius:10px; padding:0 6px; background-color: rgba(144, 238, 144, 0.4); color:darkgreen; font-weight:900"><i class="far fa-folder-open"></i> {{$course->format->name}}</span>
                        <span style="border-radius:10px; padding:0 6px; background-color: rgba(144, 238, 144, 0.4); color:darkgreen; font-weight:900"><i class="far fa-money-bill-alt"></i> {{$course->type->name}}</span>
                        <span style="border-radius:10px; padding:0 6px; background-color: rgba(144, 238, 144, 0.4); color:darkgreen; font-weight:900 "><i class="fas fa-code-branch"></i> {{$course->version->name}}</span>
                        <span style="border-radius:10px; padding:0 6px; background-color: rgba(144, 238, 144, 0.4); color:darkgreen; font-weight:900 "><i class="fas fa-level-up-alt"></i> {{$course->level->name}}</span>
                        <span style="border-radius:10px; padding:0 6px; background-color: rgba(144, 238, 144, 0.4); color:darkgreen; font-weight:900 "><i class="far fa-flag"></i> {{$course->language->name}}</span>
                    </div>
                    <div class="col-md-3 col-sm-3 col-3 text-right" style="margin-top:3%">
                    @if($course->approved == false) <a href="{{route('approveMail', $course->id)}}"><button type="button" class="btn btn-success">Approve</button></a> <a data-target='#reason' data-toggle="modal"><button id="decline" data-id="{{$course->id}}" type="button" class="btn btn-secondary">Decline</button></a> @else <a href="{{route('removeCourse', $course->id)}}"><button type="button" class="btn btn-danger">Remove</button></a> @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-md-6 offset-md-3 col-sm-3 col-3">
            {{ $courses->links() }}
        </div>
    </div>
    <div  class="modal fade" id="reason" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
        <div class="modal-content" >
            <div class="modal-header" style="margin-bottom:2%; background-color:black; color:white; border-bottom: 1px solid black; box-shadow: 5px 5px 15px 0px rgba(0,0,0,0.75);">
                <div class="w-100 text-center headerModal">
                    <h2 style="font-weight:900" class="modal-title" id="exampleModalLongTitle">Decline <i class="fas fa-question-circle"></i></h2>
                </div>
            <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form id="reasonForm">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                            <label for="reason" style="font-size:large" class="boldFilter">Why is it declined?</label>
                            <br>
                            <br>
                            <textarea name="reason" class="form-control" id="reason" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-10 text-right">
                                <button type="submit" class="btn btn-danger">
                                    Decline
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script>
        $(function(){

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $(document).on('click', '#decline', function() {

                    var id = $(this).data('id');

                    $('#reasonForm').on('submit', function(e) {
                        e.preventDefault();

                        var reason = $('textarea[name="reason"]').val();
                        console.log(reason);
                            $.ajax({
                            type:'POST',
                            url : '/declineMail',
                            data:{'id':id,'reason':reason, "_method": 'POST'},
                            }).done(function (data) {
                                $('.headerModal').html(`<p style="font-weight:900; color:#90EE90">${data.success}</p>`);
                            }).fail(function () {
                                alert('Articles could not be loaded.');
                            });
                    });
                });

            });
    </script>
@endsection

