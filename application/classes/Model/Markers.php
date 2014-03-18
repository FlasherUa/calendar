<?php

class Model_Markers {
	public static function reorder ($id=1) {
		$sql="Update markers SET `ordr`=`id` WHERE `ordr`=0;";
		DB::query(Database::UPDATE, $sql)->execute();

		$sql="Select id FROM markers WHERE parent=(SELECT parent FROM markers WHERE id=:id LIMIT 1) ORDER by ordr";
		$arr=DB::query(Database::SELECT, $sql)->bind(":id", $id)->execute();
			
		$i=0;
		$ordr=0;
		$sql="Update markers SET ordr=:ordr WHERE id=:id";
		$rq=DB::query(Database::UPDATE, $sql)->bind(":id", $i)->bind(":ordr",$ordr);

		foreach ($arr as $a){
			$i=$a['id'];
			$ordr++;
			$rq->execute();
		}

	}

	public static function reorderAll ($id=1) {
		$sql="Update markers SET `ordr`=`id` WHERE `ordr`=0;";
		DB::query(Database::UPDATE, $sql)->execute();

		$sql="Select id FROM markers WHERE parent=(SELECT parent FROM markers WHERE id=:id LIMIT 1) ORDER by ordr";
		$arr=DB::query(Database::SELECT, $sql)->bind(":id", $id)->execute();
			
		$i=0;
		$ordr=0;
		$sql="Update markers SET ordr=:ordr WHERE id=:id";
		$rq=DB::query(Database::UPDATE, $sql)->bind(":id", $i)->bind(":ordr",$ordr);

		foreach ($arr as $a){
			$i=$a['id'];
			$ordr++;
			$rq->execute();
		}

	}
	
	public static function dn($id=1) {
		self::reorder($id);
		$ordr=DB::select("ordr", "parent")->from("markers")->where("id","=", $id)->execute()->as_array();
		if (count($ordr)==0)return;
		$parent=$ordr[0]['parent'];
		$ordr=$ordr[0]['ordr'];
		$newO=$ordr+1;
		$sql ="UPDATE markers set ordr=:newO WHERE id=:id";
		DB::query(Database::UPDATE, $sql)->bind(":id", $id)->bind(":newO",$newO)->execute();

		$sql ="UPDATE markers set ordr=ordr-1 WHERE ordr=:newO AND id!=:id AND parent=:parent" ;
		DB::query(Database::UPDATE, $sql)->bind(":id", $id)->bind(":newO",$newO)->bind(":parent",$parent)->execute();

		//self::reorder($parent);


	}
	public static function up($id=1) {
		self::reorder($id);
		
		$ordr=DB::select("ordr", "parent")->from("markers")->where("id","=", $id)->execute()->as_array();
		if (count($ordr)==0)return;
		$parent=$ordr[0]['parent'];
		$ordr=$ordr[0]['ordr'];
		if ($ordr>1) {
			$newO=$ordr-1;
			$sql ="UPDATE markers set ordr=:newO WHERE id=:id";
			DB::query(Database::UPDATE, $sql)->bind(":id", $id)->bind(":newO",$newO)->execute();

			$sql ="UPDATE markers set ordr=ordr+1 WHERE ordr=:newO AND id!=:id AND parent=:parent" ;
			DB::query(Database::UPDATE, $sql)->bind(":id", $id)->bind(":newO",$newO)->bind(":parent",$parent)->execute();

			
		}

	}


}