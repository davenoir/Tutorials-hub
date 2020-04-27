<div id="load">
    @foreach($courses as $course)
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12 courseCard" data-count="{{ $course->likers()->get()->count() }}" style="border: 2px solid #E8E8E8; border-radius: 8px; padding-top:1.2%; padding-bottom:1.2%; box-shadow: 0px 0px 19px -17px rgba(0,0,0,0.75); margin-bottom:0.8%">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-2">
                        <div class="row text-center voteMobile">
                            <div class="col-md-9 offset-md-2 col-sm-10 offset-sm-2 col-10 offset-2 voteCard @if(Auth::check() && auth()->user()->hasLiked($course)) voted @endif" data-id="{{ $course->id }}" style="border: 1px solid rgba(128, 128, 128, 0.15); border-radius: 10px">
                                <span style="font-size:xx-large; font-weight:900;color:#808080"><i class="fas fa-caret-up"></i></span>
                                <p style="color:#808080;font-weight:bolder; font-size:x-large; text-shadow: 1px 0 #808080; margin: 0 0;" id="like{{$course->id}}-bs3">{{ $course->likers()->get()->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10 col-10">
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
                </div>
            </div>
        </div>
    @endforeach
    <div class="text-right">
    <span style="color:#808080; font-style:italic; font-weight:900">Showing {{ $courses->firstItem() }} to {{ $courses->lastItem() }} of total {{$courses->total()}} courses</span>
    </div>
</div>
{{ $courses->links() }}
