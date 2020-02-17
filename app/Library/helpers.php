<?php

if (!function_exists('vps_periods')) {
	function vps_periods($key = null)
	{
		if ($key) {
			$periods = vps_periods();
			return array_key_exists($key, $periods) ? $periods[$key] : null;
		} else {
			return array(
				1 => '1 Month',
				2 => '2 Month',
				6 => '6 Month',
				12 => '12 Month',
			);
		}
	}
}

if (!function_exists('unique_code')) {
	function unique_code($limit = 8)
	{
		return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
	}
}

if (!function_exists('vpn_types')) {
	function vpn_types($key = null)
	{
		if ($key) {
			$types = vpn_types();
			return array_key_exists($key, $types) ? $types[$key] : '';
		} else {
			return array(
				1 => "OpenConnect",
				2 => "OpenVpn",
				3 => "SSH Tunnel",
				4 => "SSL Tunnel",
				5 => "S Tunnel",
				6 => "Proxy Squid",
				7 => "Vpnconnect",
				8 => "Pptpr protocol",
				9 => "VPS to VPN",
			);
		}
	}
}

if (!function_exists('operating_systems')) {
	function operating_systems($key = null)
	{
		if ($key) {
			$types = operating_systems();
			return array_key_exists($key, $types) ? $types[$key] : '';
		} else {
			return array(
				1 => 'Linux',
				2 => 'Windows',
				3 => 'Mac',
				4 => 'CentOS 7',
				5 => 'Ubuntu 18',
				6 => 'Debain 9',
			);
		}
	}
}

if (!function_exists('carbon_only_date')) {
	function carbon_only_date($format)
	{
		return Carbon::parse($format)->format('d M Y');
	}
}

if (!function_exists('carbon_datetime')) {
	function carbon_datetime($format)
	{
		return Carbon::parse($format)->format('d M Y h:i:s A');
	}
}