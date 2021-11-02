
	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							{{-- <div class="logo">
								<img style="height: 300;width: 200px;" src="{{asset('backend/img/logo3.png')}}" alt="#">
							</div> --}}
							@php
								$settings=DB::table('settings')->get();
							@endphp
							
								<p class="text">@foreach($settings as $data) {{$data->short_des}} @endforeach</p>

							<p class="call">Cần đặt xe? gọi ngay<span><a href="tel:0933007858">@foreach($settings as $data) {{$data->phone}} @endforeach</a></span></p>
							
							
							<img style="margin-left: -95px;" src="{{asset('backend/img/logo3.png')}}" alt="#">
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-3 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>THÔNG TIN</h4>
							<ul>
								<li><a href="{{route('about-us')}}">Thông tin dịch vụ</a></li>
								<li><a href="{{route('contact')}}">Liên hệ chúng tôi</a></li>
								<li><a href="#">An toàn của quý khách là trên hết</a></li>
								<li><a href="#">Dịch vụ tốt, giá tốt</a></li>
								<li><a href="#">Liên hệ ngay nhận nhiều ưu đãi</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-3 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>DỊCH VỤ</h4>
							<ul>
								<li><a href="#">Cho thuê xe hoa</a></li>
								<li><a href="#">Xe theo hợp đồng</a></li>
								<li><a href="#">Xe đi bệnh viện</a></li>
								<li><a href="#">Xe đi theo tour</a></li>
								<li><a href="#">Phục vụ mọi nhu cầu đi lại của quý khách</a></li>
								<li><a href="#">Dịch vụ 24/7</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					{{-- <div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<img  src="{{asset('backend/img/logo3.png')}}" alt="#">
						
						</div>
						<!-- End Single Widget -->
					</div> --}}
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © {{date('Y')}} <a href="https://www.facebook.com/tri.phanminh.75" target="_blank">Phan Minh Trí</a>  -  All Rights Reserved.</p>
							</div>
						</div>
						{{-- <div class="col-lg-6 col-12">
							<div class="right">
								<img src="{{asset('backend/img/payments.png')}}" alt="#">
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->
 
	<!-- Jquery -->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
	<!-- Popper JS -->
	<script src="{{asset('frontend/js/popper.min.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<!-- Color JS -->
	{{-- <script src="{{asset('frontend/js/colors.js')}}"></script> --}}
	<!-- Slicknav JS -->
	<script src="{{asset('frontend/js/slicknav.min.js')}}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{asset('frontend/js/owl-carousel.js')}}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{asset('frontend/js/magnific-popup.js')}}"></script>
	<!-- Waypoints JS -->
	<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
	<!-- Countdown JS -->
	<script src="{{asset('frontend/js/finalcountdown.min.js')}}"></script>
	<!-- Nice Select JS -->
	<script src="{{asset('frontend/js/nicesellect.js')}}"></script>
	<!-- Flex Slider JS -->
	<script src="{{asset('frontend/js/flex-slider.js')}}"></script>
	<!-- ScrollUp JS -->
	<script src="{{asset('frontend/js/scrollup.js')}}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{asset('frontend/js/onepage-nav.min.js')}}"></script>
	{{-- Isotope --}}
	<script src="{{asset('frontend/js/isotope/isotope.pkgd.min.js')}}"></script>
	<!-- Easing JS -->
	<script src="{{asset('frontend/js/easing.js')}}"></script>

	<!-- Active JS -->
	<script src="{{asset('frontend/js/active.js')}}"></script>

	
	@stack('scripts')
	<script>
		setTimeout(function(){
		  $('.alert').slideUp();
		},5000);
		$(function() {
		// ------------------------------------------------------- //
		// Multi Level dropdowns
		// ------------------------------------------------------ //
			$("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
				event.preventDefault();
				event.stopPropagation();

				$(this).siblings().toggleClass("show");


				if (!$(this).next().hasClass('show')) {
				$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
				}
				$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
				$('.dropdown-submenu .show').removeClass("show");
				});

			});
		});
	  </script>