@extends('layouts.app')
@section('title', '| Sin stock')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h4 class="text-center text-info">@lang('navbar.outstock')</h4></div>
        <div class="panel-body">
            <div class="col-md-12 col-sm-12  col-xs-12">
                <div class="table-responsive" id="divProductTable">
                    <table class="table table-hover results">
                        <tr>
                            <th>#</th>
                            <th>@lang('products.bname')</th>
                            <th>@lang('products.gname')</th>
                            <th>@lang('products.category')</th>
                            <th>@lang('products.price')</th>
                            <th>@lang('products.quantity')</th>
                            <th>@lang('products.discount')</th>
                            <th>@lang('products.expire')</th>
                            <th class="text-center" >@lang('products.control')</th>
                        </tr>
                        <tbody id="productDivBoxAjax"></tbody>  <!-- end tbody #productDivBoxAjax -->
                        <tbody id="productDivBox">
                        @foreach($product as $pro)
                            <tr>
                                <td>{{  $pro->p_id      }}</td>
                                <td style="width: 130px;">
                                    @if(!empty($pro->p_icon))
                                        <img src="{{asset('img').'/'.$pro->p_icon}}.png" width="20">
                                    @endif
                                    {{  $pro->p_bname   }}</td>
                                <td>{{  $pro->p_gname   }}</td>
                                <td>{{  $pro->name      }}</td>
                                <td style="width: 100px;">
                                    <small style="float: left;"> {{get_currencySymbols() }} </small>{{  $pro->p_price  }}
                                </td>
                                <td id="quantityProduct">
                                    @if(preg_replace('/[^0-9]/','',$pro->p_quantity) < 4 )
                                        <span class="label label-danger" data-toggle="tooltip"
                                              title="Le queda poco de este producto, todo lo que tiene {{ $pro->p_quantity }}"> SOLO HAY {{ $pro->p_quantity }} </span>
                                    @else
                                        {{ $pro->p_quantity }}
                                    @endif</td>
                                <td>{{  $pro->p_discount  }}%</td>
                                <td>
                                    @if(strtotime($pro->p_exdate) < strtotime(Carbon\Carbon::now()))
                                        <span class="label label-danger" data-toggle="tooltip"
                                              title="El Producto Vencio en {{ date('d-M-y', strtotime($pro->p_exdate))}}"> Producto Vencido </span>
                                    @else
                                        {{ date('d-M-y', strtotime($pro->p_exdate)) }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('product.show', $pro->p_id)}}">
                                        <button class="btn btn-xs btn-white"><i class="fa fa-eye"
                                                                                aria-hidden="true"></i> @lang('button.show')
                                        </button>
                                    </a>
                                    <a href="{{route('product.edit', $pro->p_id)}}">
                                        <button class="btn btn-xs btn-white"><i class="fa fa-pencil"
                                                                                aria-hidden="true"></i> @lang('button.edit')
                                        </button>
                                    </a>

                                    {{-- {{Form::open(['route' => ['product.destroy', $pro->p_id], 'method' => 'DELETE' , 'id' => 'deleteForm'])}}

                                    {{Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> '.trans('button.delete'), ['class'=>'btn btn-xs btn-danger deleteBtn', 'type'=>'submit', 'data-id' => $pro->p_id]) }}

                                    {{Form::close()}} --}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody> <!-- end tbody #productDivBox -->
                    </table>
                    <div class="text-left ">
                        <ul class="pagination-primary">
                            {{$product->links()}}
                        </ul> <!-- end div .pagination-primary -->
                    </div>
                </div> <!-- end div #divProductTable -->
            </div>    <!-- end col 12 -->
        </div>  <!-- end div .panel-body -->
    </div>  <!-- end div .panel -->

@endsection
