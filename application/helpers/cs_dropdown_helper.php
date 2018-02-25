<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	if (!function_exists('role')) {

		function role() {

			$ci = & get_instance();

			$ci->load->model('admin/M_user','user');

			$res = $ci->user->get_role();

			foreach ($res as $key) {
				$option[$key->id] = $key->role_name;
			}
			return $option;
		}
	}

	if(!function_exists('unit_description')) {

		function unit_description() {

			$unit[''] = 'Unit Description';
			$unit['wholesale'] = 'Wholesale';
			$unit['retail'] = 'Retail';

			return $unit;
		}

	}

	if (!function_exists('productname')) {
		function productname() {

			$ci = & get_instance();

			$ci->load->model('admin/M_product','products');

			$items = $ci->products->getAllproducts();

			foreach ($items as $key) {
				$option[''] = 'Product Name';
				$option[$key->id] = $key->productname;
			}
			return $option;
		}
	}

	if (!function_exists('quantity')) {

		function quantity() {

			$quan = array('' => 'Quantity');
			for ($i=1; $i < 101; $i++) { 
				$i =str_pad($i,2,0,STR_PAD_LEFT);
				$quan[$i] = $i;
			}
			return $quan;
		}
	}

	if (!function_exists('unitDescription')) {

		function unitDescription() {

			$reports[''] = 'Unit Description';
			$reports['kg'] = 'Kilogram';
			$reports['pcs'] = 'Pieces';
			return $reports;
		}
	}

	if (!function_exists('reports')) {

		function reports() {

			$reports[''] = 'Select Reports';
			$reports['daily'] = 'Daily';
			$reports['monthly'] = 'Monthly';
			$reports['yearly'] = 'Yearly';
			return $reports;
		}
	}

	if(!function_exists('year')) {

		function year() {
			$years = array();
			for ($i=date('Y'); $i > date('Y')-1; $i--) { 
				$years[$i] = $i;
			}
			return $years;
		}
	}

	if(!function_exists('months')) {

		function months() {

			$months[''] = 'Select Months';
			$months['01'] = 'January';
			$months['02'] = 'February';
			$months['03'] = 'March';
			$months['04'] = 'April';
			$months['05'] = 'May';
			$months['06'] = 'June';
			$months['07'] = 'Daily';
			$months['08'] = 'July';
			$months['09'] = 'September';
			$months['10'] = 'October';
			$months['11'] = 'November';
			$months['12'] = 'Decenber';

			return $months;
		}
	}