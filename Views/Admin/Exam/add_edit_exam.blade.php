@extends("Layout.main")

@section('Title', 'ورود ادمین')

@section("content")

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Add Exam</h1>
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
                                    <div class="card-header"><strong>Edit Exam</strong></div>
                                    <div class="card-body card-block">
                                        <form action="doeditexam" method="post">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Edit Exam Category</label>
                                                <input type="text" name="edit_exam" class="form-control" value={{$category}}>
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Exam Time In Minute</label>
                                                <input type="text" name="edit_time" class="form-control" value={{$exam_time}}>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{$id}}">
                                                <button type="submit" name="edit" class="btn btn-lg btn-info btn-success">Edit Exam</button>
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