@extends("Layout.main")

@section('Title', 'ورود ادمین')

@section("content")

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Update Question</h1>
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header"><strong>Update Question by Text</strong></div>
                                    <div class="card-body card-block">
                                        <form action="editquestiontxt" method="post">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Question</label>
                                                <input type="text" name="question" class="form-control" value="{{$question['question']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Opt1</label>
                                                <input type="text" name="opt1" class="form-control" value="{{$question['opt1']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Opt2</label>
                                                <input type="text" name="opt2" class="form-control" value="{{$question['opt2']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Opt3</label>
                                                <input type="text" name="opt3" class="form-control" value="{{$question['opt3']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Opt4</label>
                                                <input type="text" name="opt4" class="form-control" value="{{$question['opt4']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Add Answer</label>
                                                <input type="text" name="answer" class="form-control" value="{{$question['answer']}}">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="id_category" value="{{$question['id_category']}}">
                                                <input type="hidden" name="id" value="{{$question['id']}}">
                                                <button type="submit" name="update" class="btn btn-lg btn-info btn-success">Update Question</button>
                                            </div>
                                            <div class="alert alert-light" role="alert">
                                                {{$error}}
                                            </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection