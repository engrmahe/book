<?php 
namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDBooster;
use cb;

class AdminPDNewBookController extends \crocodicstudio\crudbooster\controllers\CBController {

	public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "Toname";
			$this->limit = "200";
			$this->orderby = "b_id,desc";
			$this->global_privilege = true;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon_text";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = true;
			$this->button_export = true;
			$this->table = "book";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"LR Bill No","name"=>"b_id","width"=>"3"];
			$this->col[] = ["label"=>"Receiver Name","name"=>"toname","width"=>"3"];
			$this->col[] = ["label"=>"To Branch","name"=>"tobranch","join"=>"cms_users,name","width"=>"3"];
			$this->col[] = ["label"=>"From Branch","name"=>"Frombranch","width"=>"3"];
			$this->col[] = ["label"=>"Sender Name","name"=>"from_name","width"=>"3"];
			$this->col[] = ["label"=>"Quantity","name"=>"total_Qut","width"=>"3"];
			$this->col[] = ["label"=>"Door Service","name"=>"door_serv","width"=>"3"];
			$this->col[] = ["label"=>"Net Pay(Out GST)","name"=>"sub_tot","width"=>"3"];
			$this->col[] = ["label"=>"Payment","name"=>"payment_mode","width"=>"3"];
			$this->col[] = ["label"=>"GST","name"=>"togstamount","width"=>"3"];
			$this->col[] = ["label"=>"Total Amount","name"=>"netpay","width"=>"3"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'To Branch','name'=>'tobranch','type'=>'select2','validation'=>'min:1|max:9999999999999999999999','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'To Party Number','name'=>'topartyno','type'=>'number','validation'=>'required|min:1|max:99999999999','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'To Party Name','name'=>'toname','type'=>'text','validation'=>'min:1|max:9999999999999999999999','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'To Party GST','name'=>'togst','type'=>'text','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'eWay Bill No','name'=>'ewaybill','type'=>'number','validation'=>'min:1|max:99999999999','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'From Contact No','name'=>'from_contact','type'=>'number','validation'=>'required|min:1|max:99999999999','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'From Party Name','name'=>'from_name','type'=>'text','validation'=>'required','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'From Branch','name'=>'frombranch','type'=>'text','validation'=>'required','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'From Party GST','name'=>'fromgst','type'=>'text','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Luggage Details','name'=>'Luggage_details','type'=>'text','validation'=>'required|min:1|max:999999999','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Total Quantity','name'=>'total_Qut','type'=>'number','validation'=>'required|min:1|max:99999999999','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Rate/Unit','name'=>'rate','type'=>'number','validation'=>'required|min:1|max:9999999999','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Door Service','name'=>'door_serv','type'=>'select','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Door Step Amount','name'=>'door_pay','type'=>'number','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Total  (Ex.GST)','name'=>'sub_tot','type'=>'number','validation'=>'required','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Book Receipt','name'=>'book_receipt','type'=>'number','validation'=>'min:1|max:255','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Date Of Issue','name'=>'dofissue','type'=>'datetime','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Payment Mode','name'=>'payment_mode','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-2'];
			$this->form[] = ['label'=>'GST Amount','name'=>'togstamount','type'=>'number','validation'=>'min:1|max:255','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'GST Amount','name'=>'cg','type'=>'number','validation'=>'min:1|max:255','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'GST Amount','name'=>'sg','type'=>'number','validation'=>'min:1|max:255','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Total Pay','name'=>'netpay','type'=>'number','validation'=>'required','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Remark','name'=>'sugg','type'=>'textarea','width'=>'col-sm-3'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'To Branch','name'=>'tobranch','type'=>'select2','validation'=>'min:1|max:9999999999999999999999','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'To Party Number','name'=>'topartyno','type'=>'number','validation'=>'required|min:1|max:99999999999','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'To Party Name','name'=>'toname','type'=>'text','validation'=>'min:1|max:9999999999999999999999','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'To Party GST','name'=>'togst','type'=>'text','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'eWay Bill No','name'=>'ewaybill','type'=>'number','validation'=>'min:1|max:99999999999','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'From Contact No','name'=>'from_contact','type'=>'number','validation'=>'required|min:1|max:99999999999','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'From Party Name','name'=>'from_name','type'=>'text','validation'=>'required','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'From Branch','name'=>'frombranch','type'=>'text','validation'=>'required','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'From Party GST','name'=>'fromgst','type'=>'text','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Luggage Details','name'=>'Luggage_details','type'=>'text','validation'=>'required|min:1|max:999999999','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Total Quantity','name'=>'total_Qut','type'=>'number','validation'=>'required|min:1|max:99999999999','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Rate/Unit','name'=>'rate','type'=>'number','validation'=>'required|min:1|max:9999999999','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Door Service','name'=>'door_serv','type'=>'select','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Door Step Amount','name'=>'door_pay','type'=>'number','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Total  (Ex.GST)','name'=>'sub_tot','type'=>'number','validation'=>'required','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Book Receipt','name'=>'book_receipt','type'=>'number','validation'=>'min:1|max:255','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Date Of Issue','name'=>'dofissue','type'=>'datetime','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Payment Mode','name'=>'Payment_Mode','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-2'];
			//$this->form[] = ['label'=>'GST Amount','name'=>'togstamount','type'=>'number','validation'=>'min:1|max:255','width'=>'col-sm-3'];
			//$this->form[] = ['label' => 'GST Amount', 'name' => 'cg', 'type' => 'number', 'validation' => 'min:1|max:255', 'width' => 'col-sm-3'];
			//$this->form[] = ['label' => 'GST Amount', 'name' => 'sg', 'type' => 'number', 'validation' => 'min:1|max:255', 'width' => 'col-sm-3'];
			//$this->form[] = ['label'=>'Total Pay','name'=>'netpay','type'=>'number','validation'=>'required','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Remark','name'=>'sugg','type'=>'textarea','width'=>'col-sm-3'];
			# OLD END FORM

			/* 
		| ---------------------------------------------------------------------- 
		| Sub Module
		| ----------------------------------------------------------------------     
		| @label          = Label of action 
		| @path           = Path of sub module
		| @foreign_key 	  = foreign key of sub table/module
		| @button_color   = Bootstrap Class (primary,success,warning,danger)
		| @button_icon    = Font Awesome Class  
		| @parent_columns = Sparate with comma, e.g : name,created_at
		| 
		*/
		$this->sub_module = array();


		/* 
		| ---------------------------------------------------------------------- 
		| Add More Action Button / Menu
		| ----------------------------------------------------------------------     
		| @label       = Label of action 
		| @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
		| @icon        = Font awesome class icon. e.g : fa fa-bars
		| @color 	   = Default is primary. (primary, warning, succecss, info)     
		| @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
		| 
		*/
		$this->addaction = array();


		/* 
		| ---------------------------------------------------------------------- 
		| Add More Button Selected
		| ----------------------------------------------------------------------     
		| @label       = Label of action 
		| @icon 	   = Icon from fontawesome
		| @name 	   = Name of button 
		| Then about the action, you should code at actionButtonSelected method 
		| 
		*/
		$this->button_selected = array();

				
		/* 
		| ---------------------------------------------------------------------- 
		| Add alert message to this module at overheader
		| ----------------------------------------------------------------------     
		| @message = Text of message 
		| @type    = warning,success,danger,info        
		| 
		*/
		$this->alert = array();
				

		
		/* 
		| ---------------------------------------------------------------------- 
		| Add more button to header button 
		| ----------------------------------------------------------------------     
		| @label = Name of button 
		| @url   = URL Target
		| @icon  = Icon from Awesome.
		| 
		*/
		$this->index_button = array();

		/* 
		| ---------------------------------------------------------------------- 
		| Customize Table Row Color
		| ----------------------------------------------------------------------     
		| @condition = If condition. You may use field alias. E.g : [id] == 1
		| @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
		| 
		*/
		$this->table_row_color = array();     	          

		
		/*
		| ---------------------------------------------------------------------- 
		| You may use this bellow array to add statistic at dashboard 
		| ---------------------------------------------------------------------- 
		| @label, @count, @icon, @color 
		|
		*/
		$this->index_statistic = array();



		/*
		| ---------------------------------------------------------------------- 
		| Add javascript at body 
		| ---------------------------------------------------------------------- 
		| javascript code in the variable */

		$this->script_js = null; 
		
		
		/*
		| ---------------------------------------------------------------------- 
		| Include HTML Code before index table 
		| ---------------------------------------------------------------------- 
		| html code to display it before index table
		| $this->pre_index_html = "<p>test</p>";
		|
		*/
		$this->pre_index_html = "<p>New Booking</p>";
		
		
		
		/*
		| ---------------------------------------------------------------------- 
		| Include HTML Code after index table 
		| ---------------------------------------------------------------------- 
		| html code to display it after index table
		| $this->post_index_html = "<p>test</p>";
		|
		*/
		$this->post_index_html = null;
		
		
		
		/*
		| ---------------------------------------------------------------------- 
		| Include Javascript File 
		| ---------------------------------------------------------------------- 
		| URL of your javascript each array 
		| $this->load_js[] = asset("myfile.js");
		|
		*/
		$this->load_js = array();
		
		
		
		/*
		| ---------------------------------------------------------------------- 
		| Add css style at body 
		| ---------------------------------------------------------------------- 
		| css code in the variable 
		| $this->style_css = ".style{....}";
		|
		*/
		$this->style_css = NULL;
		
		
		
		/*
		| ---------------------------------------------------------------------- 
		| Include css File 
		| ---------------------------------------------------------------------- 
		| URL of your css each array 
		| $this->load_css[] = asset("myfile.css");
		|
		*/
		$this->load_css = array();
		
		
	}
	
	public function getAdd() {

		$data['page_title'] = "New Parcel Booking";
		$data['cms_users']= DB::table('cms_users')->get();
		
		$data['users'] = DB::table('cms_users')->where('name', CRUDBooster::myName())->get();
		$this->cbView('new_add',$data); 
	}

	/*
	| ---------------------------------------------------------------------- 
	| Hook for button selected
	| ---------------------------------------------------------------------- 
	| @id_selected = the id selected
	| @button_name = the name of button
	|
	*/
	public function actionButtonSelected($id_selected,$button_name) {
		//Your code here
			
	}


	/*
	| ---------------------------------------------------------------------- 
	| Hook for manipulate query of index result 
	| ---------------------------------------------------------------------- 
	| @query = current sql query 
	|
	*/
	public function hook_query_index(&$query) {
		$query->where('frombranch',CRUDBooster::myName())->first();
			
	}

	/*
	| ---------------------------------------------------------------------- 
	| Hook for manipulate row of index table html 
	| ---------------------------------------------------------------------- 
	|
	*/    
	public function hook_row_index($column_index,&$column_value) {	        
		//Your code here
	}

	/*
	| ---------------------------------------------------------------------- 
	| Hook for manipulate data input before add data is execute
	| ---------------------------------------------------------------------- 
	| @arr
	|
	*/
	public function hook_before_add(&$postdata) {        
		//Your code here

	}

	/* 
	| ---------------------------------------------------------------------- 
	| Hook for execute command after add public static function called 
	| ---------------------------------------------------------------------- 
	| @id = last insert id
	| 
	*/
	public function hook_after_add($id) {        
		//Your code here

	}

	/* 
	| ---------------------------------------------------------------------- 
	| Hook for manipulate data input before update data is execute
	| ---------------------------------------------------------------------- 
	| @postdata = input post data 
	| @id       = current id 
	| 
	*/
	public function hook_before_edit(&$postdata,$id) {        
		//Your code here

	}

	/* 
	| ---------------------------------------------------------------------- 
	| Hook for execute command after edit public static function called
	| ----------------------------------------------------------------------     
	| @id       = current id 
	| 
	*/
	public function hook_after_edit($id) {
		//Your code here 

	}

	/* 
	| ---------------------------------------------------------------------- 
	| Hook for execute command before delete public static function called
	| ----------------------------------------------------------------------     
	| @id       = current id 
	| 
	*/
	public function hook_before_delete($id) {
		//Your code here

	}

	/* 
	| ---------------------------------------------------------------------- 
	| Hook for execute command after delete public static function called
	| ----------------------------------------------------------------------     
	| @id       = current id 
	| 
	*/
	public function hook_after_delete($id) {
		//Your code here

	}



	//By the way, you can still create your own method in here... :) 


}