@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Student Overview</div>
                    <div class="row p-2">
{{--                        <div class="infinite-scroll">--}}
                        @foreach($students as $student)
                            <div class="card ml-3 mb-3" style="max-width: 350px;">
                                <div class="row no-gutters">
                                    <div class="col-md-5 p-1">
                                        @if(!empty($student->image))
                                            <img src="{{ asset($student->image)}}" class="card-img" alt="..." style="width: 150px;height: 150px">
                                        @else
                                            <img src="{{asset('photo/images.png')}}" class="card-img" alt="..." style="width: 150px;height: 150px">
                                        @endif
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$student->name}}</h5>
                                            <p class="card-text">{{$student->faculty->name}}</p>
                                            <p class="card-text">{{$student->department->name}}</p>
                                            <p class="card-text">{{$student->programme}} / {{$student->level}}</p>

                                            <p class="card-text"><small class="text-muted">Last updated {{date('d-F-Y', strtotime($student->updated_at))}}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
{{--                        </div>--}}
                    </div>

                </div>
{{--                <div class="pt-5 justify-content-center">{{ $students->links() }}</div>--}}
            </div>
        </div>
    </div>
{{--    <script type="text/javascript">--}}
{{--        $('ul.pagination').hide();--}}
{{--        $(function() {--}}
{{--            $('.infinite-scroll').jscroll({--}}
{{--                autoTrigger: true,--}}
{{--                loadingHtml: '<img class="center-block" src="{{asset('loading.gif')}}" alt="Loading..." />',--}}
{{--                padding: 0,--}}
{{--                nextSelector: '.pagination li.active + li a',--}}
{{--                contentSelector: 'div.infinite-scroll',--}}
{{--                callback: function() {--}}
{{--                    $('ul.pagination').remove();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endsection
