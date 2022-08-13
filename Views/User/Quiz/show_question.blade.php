@extends("Layout.user")

@section('Title', 'انتخاب سوالات')

@section("content")

    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>سوالات آزمون {{$exam_list["category"]}}</h4><span>minute {{$exam_list["exam_time"]}}</span>
                        </div>
                    </div>

                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <h3 class="text-danger">{{$quiz["0"]["question_no"]}} -> </h3>
                            <h5 class="mt-1 ml-2">{{$quiz["0"]["question"]}}</h5>
                        </div>
                            @if(strpos($quiz[0]['opt2'],"opt_images/")!==false)
                                <!--show question image-->
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input type="radio" name="opt1" >
                                        <img src="public/{{$quiz[0]['opt1']}}" alt="opt1" height="50px" width="50px">
                                    </label>    
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input type="radio" name="opt2">
                                        <img src="public/{{$quiz[0]['opt2']}}" alt="opt2" height="50px" width="50px">
                                    </label>    
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> 
                                        <input type="radio" name="opt3"> 
                                        <img src="public/{{$quiz[0]['opt3']}}" alt="opt3" height="50px" width="50px">
                                    </label>    
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> 
                                        <input type="radio" name="opt4"> 
                                        <img src="public/{{$quiz[0]['opt4']}}" alt="opt4" height="50px" width="50px">
                                    </label>    
                                </div>
                            </div>
                        

                            @else
                                <!--show question text-->
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input type="radio" name="opt1" > 
                                        <span>{{$quiz[0]["opt1"]}}</span>
                                    </label>    
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> <input type="radio" name="opt2">
                                        <span>{{$quiz[0]["opt2"]}}</span>
                                    </label>    
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> 
                                        <input type="radio" name="opt3"> 
                                        <span>{{$quiz[0]["opt3"]}}</span>
                                    </label>    
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> 
                                        <input type="radio" name="opt4"> 
                                        <span>{{$quiz[0]["opt4"]}}</span>
                                    </label>    
                                </div>
                            </div>
                        @endif
                        

                        

                    
                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                        <button class="btn btn-primary d-flex align-items-center btn-danger" type="button">
                            <i class="fa fa-angle-left mt-1 mr-1"></i>&nbsp;
                            قبلی
                        </button>
                        <button class="btn btn-primary border-success align-items-center btn-success" type="button" >
                            بعدی
                            <i class="fa fa-angle-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection