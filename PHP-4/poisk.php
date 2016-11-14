<?php
		if(isset($_POST['url']))
		{
		
		$url = $_POST['url'];
		$url = iconv("UTF-8","windows-1251",$url);
		
		$html = file_get_contents($url);
		echo "Результаты поиска:<br>";
			if($_POST['_sel1'] == 1)
			{
			$pattern = "/[A-Z][a-z0-9'-]{2,10}\s[A-Za-z0-9-_']{1,8}/";
			}
			if($_POST['_sel1'] == 2)
			{
				$pattern = "/([0-9]{1,2}\s[0-9]{3}\s[0-9]{3}|[0-9]{3}\s[0-9]{3})/";
			}
			if($_POST['_sel1'] == 3)
			{
				$pattern = "/[0-9]{4}\s/";
			}
			if($_POST['_sel1'] == 4)
			{
				$pattern = "/(Передний|Задний|Полный|передний|задний|полный).*?/u";
			}
			if($_POST['_sel1'] == 5)
			{
			$pattern = "/[0-9]+\.[0-9]\s[л]+\./";
			}
				$result_index = preg_match_all($pattern, $html, $result, PREG_PATTERN_ORDER);
				
				for($i = 0; $i < $result_index; $i++)
				{
					echo "<Div style=\"width:100%;\">".$i." ".@$result[0][$i]."</Div>"; 
				}
			}
			?>