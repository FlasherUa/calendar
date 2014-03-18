<?php
/**
 *
 * appliocation Events
 * @author Flasher
 *
 */
class Plugin_Events_Orders_List /*extends Event*/ {

	function select(&$controller){
		$controller->sql->add_order("id","DESC");
		
	}

}
