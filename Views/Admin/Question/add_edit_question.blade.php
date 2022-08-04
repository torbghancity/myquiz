@extends("Layout.main")

@section('Title', 'ورود ادمین')

@section("content")

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Add Question Inside -><span style='color:red'>{{$category}}</span></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Add New Question by Text</strong></div>
                                    <div class="card-body card-block">
                                        <form action="addquestiontext" method="post">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Question</label>
                                                <input type="text" name="question_text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Opt1</label>
                                                <input type="text" name="opt1" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Opt2</label>
                                                <input type="text" name="opt2" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Opt3</label>
                                                <input type="text" name="opt3" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Opt4</label>
                                                <input type="text" name="opt4" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Add Answer</label>
                                                <input type="text" name="answer" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="id_category" value="{{$id_category}}">
                                                <button type="submit" name="insert_text" class="btn btn-lg btn-info btn-success">Add Question</button>
                                            </div>
                                            <div class="alert alert-light" role="alert">
                                                {{$error_text}}
                                            </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Add New Question by Image</strong></div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Question</label>
                                                <input type="text" name="question_image" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Opt1</label>
                                                <input type="file" name="f_opt1" class="form-control" style="padding-bottom:35px">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Opt2</label>
                                                <input type="file" name="f_opt2" class="form-control" style="padding-bottom:35px">
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Opt3</label>
                                                <input type="file" name="f_opt3" class="form-control" style="padding-bottom:35px">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Opt4</label>
                                                <input type="file" name="f_opt4" class="form-control" style="padding-bottom:35px">
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Add Answer</label>
                                                <input type="file" name="f_answer" class="form-control" style="padding-bottom:35px">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="id_category" value="{{$id_category}}">
                                                <button type="submit" name="insert_image" class="btn btn-lg btn-info btn-success">Add Question</button>
                                            </div>
                                            <div class="alert alert-light" role="alert">
                                               {{$error_img}}
                                            </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Exam Table</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Opt1</th>
                                        <th scope="col">Opt2</th>
                                        <th scope="col">Opt3</th>
                                        <th scope="col">Opt4</th>
                                        <th scope="col">Answer</th>                                                         
                                        <th scope="col">Edit</th>                                                         
                                        <th scope="col">Del</th>                                                         
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        if (!empty($question_list)){                                                            
                                            foreach($question_list as $question){
                                                @endphp
                                                <tr>
                                                    <th scope="row">{{$question['question_no']}}</th>
                                                    <td>{{$question['question']}}</td>
                                                    <td>
                                                        
                                                        @if(strpos($question['opt1'],"opt_images/")!==false){
                                                            <img src="{{$question['opt1']}}" alt="Opt1" height="50px" width="50px">
                                                        @else
                                                            {{$question['opt1']}}
                                                        @endif

                                                    </td>
                                                    <td>
                                                        
                                                        @if(strpos($question['opt2'],"opt_images/")!==false){
                                                            <img src="{{$question['opt2']}}" alt="Opt2" height="50px" width="50px">
                                                        @else
                                                            {{$question['opt2']}}
                                                        @endif

                                                    </td>
                                                    <td>

                                                        @if(strpos($question['opt3'],"opt_images/")!==false){
                                                            <img src="{{$question['opt3']}}" alt="Opt3" height="50px" width="50px">
                                                        @else
                                                            {{$question['opt3']}}
                                                        @endif

                                                    </td>
                                                    <td>

                                                        @if(strpos($question['opt4'],"opt_images/")!==false){
                                                            <img src="{{$question['opt4']}}" alt="Opt4" height="50px" width="50px">
                                                        @else
                                                            {{$question['opt1']}}
                                                        @endif

                                                    </td>
                                                    <td>

                                                        @if(strpos($question['answer'],"opt_images/")!==false){
                                                            <img src="{{$question['answer']}}" alt="answer" height="50px" width="50px">
                                                        @else
                                                            {{$question['answer']}}
                                                        @endif

                                                    </td>
                                                    <td><a href="find_image_text.php?id1= @php echo $question['id']."&id=".$id_category @endphp">Edit</a></td>                                                                    
                                                    <td><a href="delete_question.php?id1= @php echo $question['id']."&id=".$id_category @endphp">Del</a></td>                                                                    
                                                </tr> 
                                                @php
                                            }
                                        }
                                    @endphp                                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection