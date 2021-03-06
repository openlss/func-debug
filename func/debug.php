<?php
/**
 *  OpenLSS - Lighter Smarter Simpler
 *
 *	This file is part of OpenLSS.
 *
 *	OpenLSS is free software: you can redistribute it and/or modify
 *	it under the terms of the GNU Lesser General Public License as
 *	published by the Free Software Foundation, either version 3 of
 *	the License, or (at your option) any later version.
 *
 *	OpenLSS is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU Lesser General Public License for more details.
 *
 *	You should have received a copy of the 
 *	GNU Lesser General Public License along with OpenLSS.
 *	If not, see <http://www.gnu.org/licenses/>.
 */

//prints web readable debug output when not in CLI mode
//	exact same prototype as PHPs var_dump
function debug_dump(){
	if(php_sapi_name() != 'cli' && is_callable(array('\LSS\Tpl','addDebug'))){
		if(ob_start()){
			echo '<pre>';
			call_user_func_array('var_dump',func_get_args());
			echo '</pre>';
			\LSS\Tpl::_get()->addDebug(ob_get_contents());
			ob_end_clean();
		}
	} else {
		call_user_func_array('var_dump',func_get_args());
	}
}

