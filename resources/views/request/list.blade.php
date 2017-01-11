@extends('layouts.booking')
@section('page_heading','Request')
@section('section')
    <div class="">

        <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Requests</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 20%">Request date</th>
                                <th>Request by</th>
                                <th>Project</th>
                                <th>Request resource</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($requests as $item): ?>
                            <tr>
                                <td>#</td>
                                <td>
                                    <a href="{{ url ('request/booking?project_id=' . $item->project_id . '&request_id=' . $item->id) }}">{{$item->created_at->format('m/d/Y H:i')}}</a>
                                </td>
                                <td>
                                    <a  href="{{ url ('project/details/' . $item->project->id) }}">
                                    {{$item->project->name}}
                                    </a>
                                </td>
                                <td>
                                    {{$item->user->name}}
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <?php foreach ($item->params() as $key => $param): ?>
                                            <li>
                                                {{$param->role}}({{$param->number}})
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>

                                <td>
                                    <a  class = 'link-popup' href="javascript:void(0)" url="{{ url ('request/details/' . $item->id) }}">
                                        View
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- end project list -->

                    </div>
                </div>
            </div>
        </div>
@stop
