@extends('layouts.master',['title' => 'Danh sách sản phẩm'])
@section('content')

    <div class="row" id="table-inverse">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>
                <div class="card-header">
                    @if (\Session::has('message'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('message') !!}</li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-content">
                    <form class="card-body" action="">
{{--                        <label for="">Tìm kiếm:</label>--}}
{{--                        <input type="search" name="search" placeholder="Tìm kiếm" value="{{$searches}}">--}}
                        <label for="keyword">Tìm kiếm:</label>
                        <input type="text" name="keyword" id="keyword" class="form-group">
                    </form>
                        <div class="card-body">

                        </div>
                    <a href="{{route('getProduct')}}" class="btn btn-outline-success">+ Tạo Sản Phẩm Mới</a>
                    <a value="pending" id="pd" onclick="pending('pending')" class="btn btn-outline-primary">Pending <span>{{$pending}}</span></a>
                    <a value="approve" id="ap" onclick="approve('approve')" class="btn btn-outline-secondary">Approve <span>{{$approve}}</span></a>
                    <a value="reject" id="re" onclick="reject('reject')" class="btn btn-outline-info">Reject <span>{{$reject}}</span></a>
                    <a href="{{route('getPro')}}" class="btn btn-outline-success">Clear</a>
                    <!-- table with light -->
                    <div class="table-responsive">
                        <table class="table table-light mb-0">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>TÊN</th>
                                <th>Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Trạng Thái</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody id="ListCategory">
                            @foreach($getProducts as $item)
                                <tr >
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td><img src="{{$item->image}}" alt="" height="120px" width="150px"></td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{number_format($item->price)}} VND</td>
                                    <td>{{$item->status}}</td>

                                    <td>
                                        <a href="{{route('getDetail',['id'=> $item->id])}}">
                                            <button type="submit" title="update" style="border: none; background-color:transparent;">
                                                <i class="fas fa-trash fa-lg text-danger">Chi tiết</i>
                                            </button>
                                        </a>
                                        <a href="{{route('getUpdateProduct',['id'=> $item->id])}}">
                                            <button type="submit" title="update" style="border: none; background-color:transparent;">
                                                <i class="fas fa-trash fa-lg text-danger" id="edit-product">Sửa</i>
                                            </button>
                                        </a>
                                        <a href="#" class="delete" data-id="{{$item->id}}">
                                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                                <i class="fas fa-trash fa-lg text-danger" >Xóa</i>
                                            </button>
                                        </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{$getProducts->links()}}
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        function pending(pending) {
            var pending = pending;
            $.ajax({
                type:'get',
                dataType: 'JSON',
                data:{pending},
                url: 'products/fitter/'+pending,

                success: function(result) {
                    var html =''
                    result.keyword.forEach(element => {
                        html += '<tr><td>'+element.id +'</td>'
                        html += '<td>'+element.name +'</td>'
                        html += '<td>'+element.title +'</td>'

                        html += '<td>'+element.quantity +'</td>'
                        html += '<td>'+element.image +'</td>'
                        html += '<td>'+element.price +'</td>'
                        html += '<td>'+element.status +'</td></tr>'

                    });
                    console.log(html);
                    $('#ListCategory').html(html)
                }
            });
        }

        function approve(approve) {
            var approve = approve;
            $.ajax({
                type:'get',
                dataType: 'JSON',
                data:{approve},
                url: 'products/fitter/'+approve,

                success: function(result) {
                    var html =''
                    result.keyword.forEach(element => {
                        html += '<tr><td>'+element.id +'</td>'
                        html += '<td>'+element.name +'</td>'
                        html += '<td>'+element.title +'</td>'

                        html += '<td>'+element.quantity +'</td>'
                        html += '<td>'+element.image +'</td>'
                        html += '<td>'+element.price +'</td>'
                        html += '<td>'+element.status +'</td></tr>'

                    });
                    console.log(html);
                    $('#ListCategory').html(html)
                }
            });
        }

        function reject(reject) {
            var reject = reject;
            $.ajax({
                type:'get',
                dataType: 'JSON',
                data:{reject},
                url: 'products/fitter/'+reject,

                success: function(result) {
                    var html =''
                    result.keyword.forEach(element => {
                        html += '<tr><td>'+element.id +'</td>'
                        html += '<td>'+element.name +'</td>'
                        html += '<td>'+element.title +'</td>'

                        html += '<td>'+element.quantity +'</td>'
                        html += '<td>'+element.image +'</td>'
                        html += '<td>'+element.price +'</td>'
                        html += '<td>'+element.status +'</td></tr>'

                    });
                    console.log(html);
                    $('#ListCategory').html(html)
                }
            });
        }
        // $(document).ready(function (){
        //     $(document).on('keyup','#keyword', function (){
        //         var keyword = $(this).val();
        //         $.ajax({
        //             type: "get",
        //             url: "/search",
        //             data:{
        //                 keyword:keyword
        //             },
        //             dataType: 'json',
        //             success: function (response){
        //                 $('#ListCategory').html(response);
        //             }
        //
        //         })
        //     })
        // })

        jQuery(document).ready(function($) {
            var engine = new Bloodhound({
                remote: {
                    url: 'api/customer?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $(".search-input").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                source: engine.ttAdapter(),
                name: 'usersList',
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Không có kết quả phù hợp.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        return '<a href="' + data.id + '" class="list-group-item">' + data.name + '</a>'
                    }
                }
            });
        });
    </script>
@stop

