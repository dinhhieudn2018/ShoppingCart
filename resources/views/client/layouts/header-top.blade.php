<div class="agile-main-top">
	<div class="container-fluid">
		<div class="row main-top-w3l py-2">
			<div class="col-lg-4 header-most-top">
				<p class="text-white text-lg-left text-center"><a href="{{ route('cart.index') }}" class="text-white"> Giỏ hàng</a>
					<i class="fas fa-shopping-cart ml-1"></i>
				</p>
			</div>
			<div class="col-lg-8 header-right mt-lg-0 mt-2">
				<!-- header lists -->
				<ul>
					
					<li class="text-center border-right text-white">
						<a class="play-icon popup-with-zoom-anim text-white" href="#small-dialog1">
							<i class="fas fa-map-marker mr-2"></i>Electro Store</a>
					</li>
					<li class="text-center border-right text-white">
						<i class="fas fa-phone mr-2"></i> 0236 3 690156
					</li>
					
					
					@if(Auth::check())
						<li class="text-center border-right text-white">
						<a href="{{ route('user-detail',Auth::user()->id) }}"  class="text-white">
							<i class="fas fa-user mr-2"></i>Tài khoản</a>
						</li>
						<li class="text-center border-right text-white" >
							{{-- <i class="fas fa-sign-in-alt mr-2"></i> --}}{{ Auth::user()->name }}
						</li>
						<li class="text-center border-right text-white">
						<a href="{{ route('logout') }}"  class="text-white">
							<i class="fas fa-sign-in-alt mr-2"></i>Đăng xuất</a>
					</li>
					@else
						<li class="text-center border-right text-white">
						<i class="fas fa-user mr-2"></i>Tài khoản</a>
						</li>
						<li class="text-center border-right text-white">
						<a href="client-login" {{-- data-toggle="modal" data-target="#exampleModal" --}} class="text-white">
							<i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập </a>
						</li>
						<li class="text-center text-white">
							<a href="client-register" {{-- data-toggle="modal" data-target="#exampleModal2" --}} class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Đăng ký </a>
						</li>
					@endif
				</ul>
				<!-- //header lists -->
			</div>
		</div>
	</div>
</div>