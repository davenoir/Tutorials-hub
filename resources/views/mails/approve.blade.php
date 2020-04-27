@component('mail::message')
<div class="container">
    <div class="row text-center">
        <div class="col-md-6">
           <h1> Hello, {{$to}} </h1>
            <br>
            <br>
            <p style="font-weight:900">{{$message}}</p>
    </div>
    </div>
</div>
<p>Sincerely,</p>
<p>{{$from}}.</p>
<p>{{ config('app.name') }}</p>

@endcomponent
