@extends("Layout.main")

@section('Title', 'ورود ادمین')

@section("content")

    <div class="breadcrumbs">
        <div class="col-sm-6">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Select Exam Category for add & edit Question</h1>
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
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Exam Table</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Exam</th>
                                                    <th scope="col">Time in Minute</th>
                                                    <th scope="col">Select</th>                                                        
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $Counter = 0;
                                                    if (!empty($exam_list)){                                                            
                                                        foreach ($exam_list as $exam){
                                                            $Counter = $Counter + 1;
                                                @endphp
                                                            <tr>
                                                                <th scope="row">{{$Counter}}</th>
                                                                <td>{{$exam['category']}}</td>
                                                                <td>{{$exam['exam_time']}}</td>
                                                                <td>
                                                                    <form action="question" method="post">
                                                                        <button name='action'>Select</button>
                                                                        <input type="hidden" name='id_category' value="{{$exam['id_category']}}">
                                                                        <input type="hidden" name='id' value="{{$exam['id']}}">
                                                                    </form>
                                                                </td>
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
            </div>
        </div>
    </div>
@endsection