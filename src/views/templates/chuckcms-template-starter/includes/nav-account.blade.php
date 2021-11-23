<div class="row">
	<div class="col-12">
		<ul class="nav nav-pills flex-column flex-md-row">
		  <li class="nav-item">
		    <a class="nav-link{{ Route::currentRouteName() == 'module.ecommerce.account.index' ? ' active' : '' }} " href="{{ route('module.ecommerce.account.index') }}"><i class="fas fa-user-alt mr-2"></i>Profiel</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link{{ Route::currentRouteName() == 'module.ecommerce.account.address.index' ? ' active' : '' }}" href="{{ route('module.ecommerce.account.address.index') }}"><i class="fas fa-address-book mr-2"></i>Adressen</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link{{ Route::currentRouteName() == 'module.ecommerce.account.order.index' ? ' active' : '' }}" href="{{ route('module.ecommerce.account.order.index') }}"><i class="fas fa-shopping-cart mr-2"></i>Bestellingen</a>
		  </li>
		  <!--<li class="nav-item">
		    <a class="nav-link" href="{{ URL::to('/') }}/retours">Retours</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="{{ URL::to('/') }}/tickets">Tickets</a>
		  </li>-->
		</ul>
	</div>
</div>