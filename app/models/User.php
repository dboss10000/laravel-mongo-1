<?php

use Jenssegers\Mongodb\Model as Eloquent;

class User extends Eloquent {


	public function networks() {
		// return $this->hasMany('Network', 'un_id')->select(array('un_id','nid', 'n_name','n_ip','n_status'));
		return $this->hasMany('Network', 'un_id');
	}

	public function hostnames() {
		// return $this->hasMany('Hostname', 'us_id')->select(array('us_id','hostname', 'block'));
		return $this->hasMany('Hostname', 'us_id');
	}
}

