<?php
/**
 *
 * appliocation Events
 * @author Flasher
 *
 */
class Plugin_Events_Markers_Edit /*extends Event*/ {

	function afterSave(&$controller){
		Model_Markers::reorder($controller->id);
	}
}

