@extends('user.layouts.master')
@section('title')
    Timeline
@endsection
@section('specific_css')
    <link href={{asset('assets/user/css/timeline.css')}} rel="stylesheet">
    <style>
        .page {
            padding-bottom: unset;
        }


    </style>
@endsection
@section('content')
    <h3>Timeline</h3>
    <div class="timeline">
        <div class="year">
            <div class="inner">
                <span>2016</span>
            </div>
        </div>

        <ul class="days">
            <li class="day">
                <div class="events">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius perferendis
                        vitae, facere accusantium magni, explicabo mollitia quidem odio autem, iste
                        optio? Consequuntur ratione dolorum velit maiores quam odit odio
                        suscipit.</p>
                    <div class="date">18 October (Monday)</div>
                </div>
            </li>

            <li class="day">
                <div class="events">
                    <p>Lorem dolor sit amet, consectetur adipisicing elit. Eius perferendis vitae,
                        facere accusantium magni, explicabo mollitia quidem odio autem, iste optio?
                        Consequuntur ratione dolorum velit maiores quam odit odio suscipit.</p>
                    <div class="date">18 October (Monday)</div>
                </div>
            </li>

            <li class="day">
                <div class="events">
                    <div class="day__img">
                        <img src="http://placehold.it/400x300" alt=""/>
                        <p class="caption">
                            Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                    <div class="date">18 October (Monday)</div>
                </div>
            </li>

            <li class="day">
                <div class="events">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius perferendis
                        vitae, facere accusantium magni, explicabo mollitia quidem odio autem, iste
                        optio? Consequuntur ratione dolorum velit maiores quam odit odio
                        suscipit.</p>
                    <div class="date">18 October (Monday)</div>
                </div>
            </li>
        </ul>

        <div class="year year--end">
            <div class="inner">
                <span>2017</span>
            </div>
        </div>
    </div>
    <div class="border-footer"></div>
    {{--    <div class="facebook-comment">--}}
    {{--        <div id="fb-root"></div>--}}
    {{--        <script async defer crossorigin="anonymous"--}}
    {{--                src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=642535080010535&autoLogAppEvents=1"--}}
    {{--                nonce="FNf81OrP"></script>--}}
    {{--        <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5" data-width=""></div>--}}
    {{--    </div>--}}
@endsection
