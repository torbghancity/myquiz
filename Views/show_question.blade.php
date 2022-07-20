<div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>سوالات آزمون <?php echo $exam_list["category"]; ?></h4><span>minute <?php echo $exam_list["exam_time"]; ?></span>
                        </div>
                    </div>

                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <h3 class="text-danger">{{$question_no}} -></h3>
                            <h5 class="mt-1 ml-2">{{$question}}</h5>
                        </div>
                            @if(strpos($opt2,"opt_images/")!==false)

                                <!--show question image-->

                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input type="radio" name="opt1" >
                                        <img src="@php echo "admin/" . $opt1 @endphp" alt="opt1" height="50px" width="50px">
                                    </label>    
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input type="radio" name="opt2">
                                        <img src="@php echo "admin/" . $opt2 @endphp" alt="opt2" height="50px" width="50px">
                                    </label>    
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> 
                                        <input type="radio" name="opt3"> 
                                        <img src="@php echo "admin/" . $opt3 @endphp" alt="opt3" height="50px" width="50px">
                                    </label>    
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> 
                                        <input type="radio" name="opt4"> 
                                        <img src="@php echo "admin/" . $opt4 @endphp" alt="opt4" height="50px" width="50px">
                                    </label>    
                                </div>
                            </div>
                        
                                @else

                                <!--show question text-->

                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input type="radio" name="opt1" > 
                                        <span>{{$opt1}}</span>
                                    </label>    
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> <input type="radio" name="opt2">
                                        <span>{{$opt2}}</span>
                                    </label>    
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> 
                                        <input type="radio" name="opt3"> 
                                        <span>{{$opt3}}</span>
                                    </label>    
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> 
                                        <input type="radio" name="opt4"> 
                                        <span>{{$opt4}}</span>
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