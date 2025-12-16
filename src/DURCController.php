<?php

namespace ftrotter\DURCCC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/*
	A layer between DURCC Controllers and Laravel Controllers
*/
class DURCCController extends Controller{

	public function _getMainTemplateName(){
		//hardcoded for now.. lets get smarter!!
		return('DURCC.durc_html');
	}

	public static function isSelect2($data_type, $column_name) {
        $input_type = DURCC::mapColumnDataTypeToInputType( $data_type, $column_name );
    }
}
