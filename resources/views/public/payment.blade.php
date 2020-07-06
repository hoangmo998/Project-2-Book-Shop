@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="payment-area">
            <h4 class="my-4 bg-dark p-3 text-white">Thanh Toán</h4>

            <div class="cart-summary my-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Đơn Hàng</h4>
                    </div>
                    <div class="card-body">
                        <p>Số Sản Phẩm = {{Cart::content()->count()}}</p>
                        <p>Giá Sản Phẩm = {{Cart::total()}} VNĐ</p>
                        <p>Phí Vận Chuyển = 0 VNĐ</p>
                        <p><strong>Tổng Tiền = {{Cart::total()}} VNĐ</strong></p>
                    </div>
                </div>
            </div>

            <div class="bg-light p-3 my-4">
                <form action="{{route('cart.checkout')}}" method="post">
                    @csrf
                    <input type="hidden" name="cart_total" value="{{Cart::total()}}">
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_7xVvmxzKaoeFzuBZZ18WdwKy00bmfx80CA"
                            data-amount=""
                            data-name="Bookshop"
                            data-description="Bookshop payment"
                            data-locale="auto">
                    </script>
                </form>
            </div>
            <div class="bg-light p-3 my-4">
                <button class="btn btn-success btn-sm"><strong>Thanh toán khi giao hàng</strong></button>
            </div>
        </div>
    </div>
@endsection
