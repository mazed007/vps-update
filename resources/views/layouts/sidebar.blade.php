<section id="sidebar">
    <div class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"></a>
        <ul class="sidebar-items">
            <li>
                <a href="index.php"><span class="icon"><i class="fas fa-tachometer-alt"></i></span> Dashboard</a
			>
		  </li>
		  <li>
			<a href="#" class="sub-menu dropdown"
			  ><span><i class="fas fa-list-ul"></i> Permission</a
			>
			<ul class="sub-menu-items">
				<!-- <li>
					<a href="{{ route('group.create') }}">
					  <span class="icon color1"><i class="far fa-circle"></i></span> Add Group
					</a>
					            </li>
					            <li>
					                <a href="{{ route('group.index') }}">
					                    <span class="icon color2"><i class="far fa-circle"></i></span> List Group
					                </a>
					            </li> -->
				  <li>
					<a href="{{ route('permission.create') }}">
					  <span class="icon color1"><i class="far fa-circle"></i></span> Add Permission
					</a>
	            </li>
	            <li>
	                <a href="{{ route('permission.index') }}">
	                    <span class="icon color2"><i class="far fa-circle"></i></span> List Permission
	                </a>
	            </li>
	        </ul>
        </li>
		  <li>
			<a href="#" class="sub-menu dropdown"
			  ><span><i class="fas fa-list-ul"></i> Manage VPS</a
			>
			<ul class="sub-menu-items">
				  <li>
					<a href="{{ route('vps.create') }}">
					  <span class="icon color1"><i class="far fa-circle"></i></span> Add VPS
					</a>
	            </li>
	            <li>
	                <a href="{{ route('online-vps.index') }}">
	                    <span class="icon color2"><i class="far fa-circle"></i></span> Online VPS
	                </a>
	            </li>
	            <li>
	                <a href="{{ route('vps.index') }}">
	                    <span class="icon color3"><i class="far fa-circle"></i></span>
	                    VPS list
	                </a>
	            </li>
	            <li>
	                <a href="{{ route('trial-vps.create') }}">
	                    <span class="icon color4"><i class="far fa-circle"></i></span>
	                    Create Trail VPS
	                </a>
	            </li>
	        </ul>
        </li>
        <li>
            <a href="#" class="sub-menu"><span class="icon"><i class="fas fa-users"></i></span>Master Resellers
			</a>
            <ul class="sub-menu-items">
                <li>
                    <a href="{{ route('master-reseller.create') }}"><span class="icon color2"><i class="far fa-circle"></i></span>
				  Create MTR</a
				>
			  </li>
			  <li>
				<a href="{{ route('master-reseller.index') }}"
				  ><span class="icon color1"><i class="far fa-circle"></i></span>List
				  MTR</a
				>
			  </li>
			  <li>
				<a href="sub-admin/login.php"
				  ><span class="icon color3"><i class="far fa-circle"></i></span>Sub Admin</a
				>
			  </li>
			</ul>
		  </li>
		  <li>
			<a href="#" class="sub-menu"
			  ><span class="icon"><i class="fas fa-users"></i></span>Reseller
			</a>
                    <ul class="sub-menu-items">
                        <li>
                            <a href="{{ route('reseller.create') }}"><span class="icon color1"><i class="far fa-circle"></i></span>Add Reseller
				  </a
				>
			  </li>
			  <li>
				<a href="{{ route('reseller.index') }}"
				  ><span class="icon color2"><i class="far fa-circle"></i></span>List Reseller</a
				>
			  </li>
			  <li>
				<a href="{{ route('bulk-reseller.create') }}"
				  ><span class="icon color1"><i class="far fa-circle"></i></span>Bulk Reseller</a
				>
			  </li>
			  <li>
				<a href="{{ route('trial-reseller.create') }}"
				  ><span class="icon color2"><i class="far fa-circle"></i></span>Trail Reseller</a
				>
			  </li>
			</ul>
		  </li>
		  <li>
			<a href="#" class="sub-menu"
			  ><span class="icon"><i class="fas fa-database"></i></span>Add Pin
			</a>
                            <ul class="sub-menu-items">
                                <li>
                                    <a href="{{ route('pin.create') }}"><span class="icon color1"><i class="far fa-circle"></i></span>Create Pin
				  </a
				>
			  </li>
			  <li>
				<a href="{{ route('trialpin.create') }}"
				  ><span class="icon color2"><i class="far fa-circle"></i></span>Trail Pin</a
				>
			  </li>
			  <li>
				<a href="{{ route('bulkpin.create') }}"
				  ><span class="icon color2"><i class="far fa-circle"></i></span>Bulk Pin</a
				>
			  </li>
			</ul>
		  </li>
		  <li>
			<a href="#" class="sub-menu"
			  ><span class="icon"><i class="fas fa-cog"></i></span>Setting
			</a>
                                    <ul class="sub-menu-items">
                                        <li>
                                            <a href="application-setting.php"><span class="icon color1"><i class="far fa-circle"></i></span>Application Setting
				</a>
                                        </li>
                                        <li>
                                            <a href="site-settings.php"><span class="icon color1"><i class="far fa-circle"></i></span>Site Settings
				</a>
                                        </li>
                                        <li>
                                            <a href="support-ticket.php"><span class="icon color3"><i class="far fa-circle"></i></span>Support Ticket
				  </a
				>
			  </li>
			  <li>
				<a href="#" class="sub-menu">
				  <span class="icon color2"><i class="far fa-circle"></i></span> Payment Gateway
				</a>
                                        </li>
                                        <li>
                                            <a href="change-brand-name.php"><span class="icon color3"><i class="far fa-circle"></i></span>Brand Name Change
				  </a
				>
			  </li>
			  <li>
				<a href="change-password.php"
				  ><span class="icon color2"><i class="far fa-circle"></i></span>Change Password
				  </a
				>
			  </li>
			</ul>
		  </li>
		  <li>
			<a href="history.php"
			  ><span class="icon"><i class="far fa-clock"></i></span> History</a
			>
		  </li>
		  <li>
			<a href="#"
			  ><span class="icon"><i class="fas fa-podcast"></i></span> API Genared</a
			>
		  </li>
		  <li>
			<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				<span class="icon"><i class="fas fa-sign-out-alt"></i></span> Logout
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
		  </li>
	  </ul>
	</div>
</section>