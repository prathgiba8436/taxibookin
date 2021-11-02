@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
<h5 class="card-header">ĐƠN ĐẶT XE
  </h5>
  <div class="card-body">
    @if($order)
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>MÃ ĐƠN</th>
          <th>Tên</th>
          <th>Email</th>
          <th>Trạng thái</th>
          <th>Tuỳ chỉnh</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->order_number}}</td>
            <td>{{$order->first_name}} {{$order->last_name}}</td>
            <td>{{$order->email}}</td>
            <td>
              ĐANG CHỜ XỬ LÝ
            </td>
            <td>
                <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                  @csrf 
                  @method('delete')
                      <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
          
        </tr>
      </tbody>
    </table>

    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4"> THÔNG TIN ĐẶT XE </h4>
              <table class="table">
                    <tr>
                        <td>MÃ ĐƠN </td>
                        <td> : {{$order->order_number}}</td>
                    </tr>
                    <tr>
                        <td>NGÀY ĐẶT XE</td>
                        <td> : {{$order->created_at->format('D d M, Y')}} lúc {{$order->created_at->format('g : i a')}} </td>
                    </tr>
                    <tr>
                        <td>TRẠNG THÁI</td>
                        <td> : ĐANG CHỜ XỬ LÝ</td>
                    </tr>
                    <tr>
                        <td>THANH TOÁN</td>
                        <td> : CHƯA THANH TOÁN</td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">THÔNG TIN KHÁCH HÀNG</h4>
              <table class="table">
                    <tr class="">
                        <td>HỌ TÊN</td>
                        <td> : {{$order->first_name}} {{$order->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : {{$order->email}}</td>
                    </tr>
                    <tr>
                        <td>SỐ ĐIỆN THOẠI: </td>
                        <td> : {{$order->phone}} 
                        
                          <a href="tel:{{$order->phone}}" target="_self" class="btn btn-lg ws-btn wow fadeInUpBig" style="background-color: rgb(189, 211, 221);border-radius:20px; text-align: center; font-size: 15px">
                            
                            <i style="color: rgb(85, 180, 209)" class="fa fa-phone"></i>
                                <span style="color: rgb(85, 180, 209);">Gọi cho khách</span>
                            </a>
                        
                        </td>
                    </tr>
                    <tr>
                        <td>ĐỊA CHỈ: </td>
                        <td> RƯỚC KHÁCH: {{$order->address1}} <hr>,ĐƯA ĐẾN: {{$order->address2}}</td>
                    </tr>

              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush