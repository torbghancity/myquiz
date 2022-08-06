@extends("Layout.user")

@section('Title', 'انتخاب سوالات')

@section("content")

<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10 col-lg-10">
            <div class="border">
                <div class="question bg-light p-3 border-bottom">
                    <div class="list-group shadow p-3 mb-5 bg-white rounded">
                        <a class="list-group-item list-group-item-info"> {{$logo}} </a>
                        
                        @if(!empty($exam_list))
                            @foreach($exam_list as $list)
                                <form action="showquiz" method="post">
                                    <input type="hidden" name="id_category" value="{{$list['id_category']}}">
                                    <button type="submit" class="list-group-item list-group-item-action">{{$list["category"]}} --> زمان آزمون به دقیقه -->  {{$list["exam_time"]}}</button>
                                </form>
                            @endforeach
                        @endif

                        @if ($error != "")
                            <a class="list-group-item list-group-item-warning"> {{$error}} </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection