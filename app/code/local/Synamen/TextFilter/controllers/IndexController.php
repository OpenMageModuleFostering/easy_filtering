<?php
class Synamen_TextFilter_IndexController extends Mage_Core_Controller_Front_Action{
	public function IndexAction() {
		foreach($_POST['alldata'] as $key => $item)
		{
			if(stripos($item, $_POST['query']) !== false)
			{
				$result_labels[$key] = $item;
			}
		}
		
		$htmlArray = explode("<li>",$_POST['currenthtml']);
		
		
		foreach($result_labels as $key => $result_label)
		{
			foreach($htmlArray as $li)
			{
				if(strpos($li, $result_label) !== false)
				{
					$result[] = "<li>".$li;
				}
			}
		}
		
		$unique_result = array_unique($result);
		
		$resultHtml = implode("", $unique_result);
		echo $resultHtml;
	}
}