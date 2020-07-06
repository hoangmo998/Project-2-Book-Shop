@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="my-4 p-3 bg-dark text-white"><h4 class="m-0">Kiểm Tra Đơn Hàng</h4></div>
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-product">
                    <h4><a href="{{route('cart')}}" title="Back to cart" class="text-danger"><i class="fas fa-shopping-basket" ></i></a> Đơn Hàng Của Bạn</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Tên sách</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Tổng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Cart::content() as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->price}} VNĐ</td>
                            <td>{{$item->subtotal()}} VNĐ</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="billing-address my-4">
                    <div class="p-3 bg-light my-4"><h4 class="m-0">Thông Tin Khách hàng</h4></div>

                    <form action="{{route('cart.proceed')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="shipping_name" class="form-control {{$errors->has('shipping_name')? 'is-invalid' : ''}}" value="{{Auth::user()? Auth::user()->name : ''}}" placeholder="Tên">

                            @if($errors->has('shipping_name'))
                                <span class="invalid-feedback"><strong>{{$errors->first('shipping_name')}}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" name="mobile_no" class="form-control {{$errors->has('mobile_no') ? 'is-invalid': ''}}" placeholder="Số điện thoại">

                            @if($errors->has('mobile_no'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('mobile_no')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <textarea name="address" class="form-control {{$errors->has('address')? 'is-invalid' : ''}}" placeholder="Địa chỉ" cols="30" rows="5"></textarea>
                            @if($errors->has('address'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('address')}}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="payment-area my-4 py-5 px-3 bg-light">
                            <input type="submit" value="Thanh toán" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-summary my-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Đơn hàng</h4>
                        </div>
                        <div class="card-body">
                            <p>Số Sản Phẩm = {{Cart::content()->count()}}</p>
                            <p>Giá Sản Phẩm = {{Cart::total()}} VNĐ</p>
                            <p>Phí Vận Chuyển = 0.00 VNĐ</p>
                            <p><strong>Tổng Tiền = {{Cart::total()}} VNĐ</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
