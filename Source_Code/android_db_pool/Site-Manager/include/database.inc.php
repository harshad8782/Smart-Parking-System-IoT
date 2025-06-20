<?php
	/*****************************************************************************
		Database Class for MySQL Server. Please do not change anything
	*****************************************************************************/
	class database {
		var $database_host;
		var $database_port;
		var $database_user;
		var $database_password;
		var $database_name;
		var $Con;
		 
		function connect() {
			$this->Con = @mysql_connect($this->database_host.":".$this->database_port,$this->database_user,$this->database_password) or die($this->error(mysql_error()));
			@mysql_select_db($this->database_name,$this->Con) or die($this->error(mysql_error()));
		}
		
		function query($sql) {
			$result = @mysql_query($sql,$this->Con) or die($this->error($sql."<br />".mysql_error()));
			return $result;
		}
		
		function fetch_array($result) {
			return mysql_fetch_array($result);
		}
		
		function insert_id() {
			return mysql_insert_id($this->Con);
		}
		
		function result($result,$row,$column) {
			return mysql_result($result,$row,$column);
		}
		
		function num_rows($result) {
			return mysql_num_rows($result);
		}
		
		function getDateDiff($coming_date) {
			$diff_sql = "SELECT DATEDIFF('".$coming_date."','".date('Y-m-d')."')";
			$diff_res = $this->query($diff_sql);
			return $this->result($diff_res,0,0);
		}
		
		function record_number($sql) {
			$result = $this->query($sql);
			$cnt = $this->num_rows($result);
			return $cnt;
		}
		
		function pagination($sql,$DividedRecordNumber,$Page) {
			$PageResult = $this->record_number($sql);
			if($Page == "" || $Page == 1) {
				$Page = 0;
			} else {
				$Page = ($Page-1) * $DividedRecordNumber;
			}
			$RecordPerPage = ceil($PageResult/$DividedRecordNumber);
			$ReturnResult = $this->query($sql." limit ".$Page.",".$DividedRecordNumber."");
			return $ReturnResult;
		}
		
		function pagination_page_number($sql,$DividedRecordNumber,$Page,$PageName,$QueryString) {
			$PageResult = $this->record_number($sql);
			$RecordPerPage = ceil($PageResult/$DividedRecordNumber);
			if($Page == "") {
				$Page = 1;
			}
			$str = "<select class=\"txt_p\" name=\"cmbPage\" id=\"cmbPage\" onchange=\"javascript:_doPagination('".$PageName."','".$QueryString."');\">\n";
			for($i = 1;$i <= $RecordPerPage;$i++) {
				if($Page == $i) {
					$selected = ' selected';
				} else {
					$selected = '';
				}
				$str.= "<option value=\"".$i."\"".$selected.">Page ".$i."</option>\n";
			}
			$str.= "</select>";
			echo $str;
		}
		
		function paging($sql,$DividedRecordNumber,$Page,$PageName,$QueryStringName,$Class) {
			$PageResult = $this->record_number($sql);
			if($PageResult > $DividedRecordNumber):
				$RecordPerPage = ceil($PageResult/$DividedRecordNumber);
				//echo $RecordPerPage;
				if($Page == "") {
					$Page = 1;
				}
				$PageCount = $Page - 1;
				if($PageCount > 0) {
					if(empty($QueryStringName)) {
						echo "<a href='".$PageName."?page=".$PageCount."' class='".$Class."'>&lt;&lt; Prev</a>&nbsp;";
					} else {
						echo "<a href='".$PageName."?page=".$PageCount."&".$QueryStringName."' class='".$Class."'>&lt;&lt; Prev</a>&nbsp;&nbsp;";
					}
				} else {
					echo "";
				}
				for($i = 1;$i <= $RecordPerPage;$i++) {
					if($Page == $i) {
						echo "<b>".$i."</b>&nbsp;";
					} else {
						echo "<a href='".$PageName."?page=".$i."&".$QueryStringName."' class='".$Class."'>".$i."</a>&nbsp;";
					}
				}
				$PageCount = $Page + 1;
				if($PageCount < $RecordPerPage + 1) {
					if(empty($QueryStringName)) {
						echo "<a href='".$PageName."?page=".$PageCount."' class='".$Class."'>Next &gt;&gt;</font>";
					} else {
						echo "<a href='".$PageName."?page=".$PageCount."&".$QueryStringName."' class='".$Class."'>Next &gt;&gt;</a>";
					}
				} else {
					echo "";
				}
			else:
				echo "&nbsp;";
			endif;
		}
		
		function paging_nx($sql,$DividedRecordNumber,$Page,$PageName,$QueryStringName,$Class) {
			$PageResult = $this->record_number($sql);
			if($PageResult > $DividedRecordNumber):
				$RecordPerPage = ceil($PageResult/$DividedRecordNumber);
				//echo $RecordPerPage;
				if($Page == "") {
					$Page = 1;
				}
				$PageCount = $Page - 1;
				if($PageCount > 0) {
					if(empty($QueryStringName)) {
						echo "<a href='".$PageName."?page=".$PageCount."' class='".$Class."'>&lt;&lt; Prev</a>&nbsp;";
					} else {
						echo "<a href='".$PageName."?page=".$PageCount."&".$QueryStringName."' class='".$Class."'>&lt;&lt; Prev</a>&nbsp;&nbsp;";
					}
				} else {
					echo "";
				}
				/*for($i = 1;$i <= $RecordPerPage;$i++) {
					if($Page == $i) {
						echo "<b>".$i."</b>&nbsp;";
					} else {
						echo "<a href='".$PageName."?page=".$i."' class='".$Class."'>".$i."</a>&nbsp;";
					}
				}*/
				$PageCount = $Page + 1;
				if($PageCount < $RecordPerPage + 1) {
					if(empty($QueryStringName)) {
						echo "<a href='".$PageName."?page=".$PageCount."' class='".$Class."'>Next &gt;&gt;</font>";
					} else {
						echo "<a href='".$PageName."?page=".$PageCount."&".$QueryStringName."' class='".$Class."'>Next &gt;&gt;</a>";
					}
				} else {
					echo "";
				}
			else:
				echo "&nbsp;";
			endif;
		}
		
		function close() {
			mysql_close($this->Con);
		}

		function getAutoNumber() {
			$auto_sql = "SELECT `auto_number` FROM `tbl_auto_number` WHERE `auto_id`=1";
			$auto_res = $this->query($auto_sql);
			$number = $this->result($auto_res,0,0);
			$number = $number + 1;
			return $number;
		}
		
		function setAutoNumber() {
			$num = $this->getAutoNumber();
			$update_sql = "UPDATE `tbl_auto_number` SET `auto_number`=".$num." WHERE `auto_id`=1";
			$this->query($update_sql);
		}
		function DisplayCat($cat_id,$cat_type) {
		    if($cat_type == 1)
			{
				$sql = "SELECT * FROM `tbl_category` WHERE `cat_id`=".$cat_id;
				$result = $this->query($sql);
				$row = $this->fetch_array($result);
				$cat_name = $row['cat_name'];
			
			}
			else
			{
				$sql = "SELECT * FROM `tbl_home_category` WHERE `home_cat_id`=".$cat_id;
				$result = $this->query($sql);
				$row = $this->fetch_array($result);
				$cat_name = $row['home_cat_name'];
			}
			return $cat_name;
		}
		
		function DisplayCat_home($cat_id) 
		{
			$sql = "SELECT * FROM `tbl_home_category` WHERE `home_cat_id`=".$cat_id;
			$result = $this->query($sql);
			$row = $this->fetch_array($result);
			return $row['home_cat_name'];
		}
		function DisplayCat_trade($cat_id) 
		{
			$sql = "SELECT * FROM `tbl_category` WHERE `cat_id`=".$cat_id;
			$result = $this->query($sql);
			$row = $this->fetch_array($result);
			return $row['cat_name'];
		}
		function error($arg_error_msg) {
			if(empty($arg_error_msg)==false) {
				$error_msg = "<div style=\"font-family: Tahoma; font-size: 11px; padding: 10px; background-color: #FFD1C4; color: #990000; font-weight: bold; border: 1px solid #FF0000; text-align: center;\">";
				$error_msg.= $arg_error_msg;
				$error_msg.= "</div>";
				return $error_msg;
			}
		}
	}
?>