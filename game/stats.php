<?php
	session_start();

	$rq = $_POST['request'];

	switch ($rq) {
		case 'set':
			setStats();
			break;
		case 'str':
			addPoint('str');
			break;
		case 'int':
			addPoint('int');
			break;
		case 'dex':
			addPoint('dex');
			break;
		case 'sell':
			sellItem();
			break;
		case 'buy':
			buyItem();
			break;
		case 'addGold':
			addGold();
			break;
		default:
			echo "Function not found";
			break;
	}

	function setStats()	{
		if(isset($_SESSION['logged']))
		{
			if($_SESSION['logged'])
			{
				$db = new PDO('sqlite:../game_PDO.sqlite');

				$username=$_SESSION['username'];

				$sql = "SELECT * FROM users WHERE username='$username'";

				if($result = $db->query($sql))
				{
					$count = 0;
					foreach($result as $row)
					{
						$count=$count+1;

						$_SESSION['str'] = $row['str'];
						$_SESSION['int'] = $row['int'];
						$_SESSION['dex'] = $row['dex'];
						$_SESSION['gold'] = $row['gold'];
						$_SESSION['weapon']  = $row['weapon'];
						$_SESSION['outfit']  = $row['outfit'];
						$_SESSION['skill1']  = $row['skill1'];
						$_SESSION['skill2']  = $row['skill2'];
						$_SESSION['elixir']  = $row['elixir'];
						$_SESSION['class']  = $row['class'];
					}

					$result=null;
					$db=null;

					$str = $_SESSION['str'];
					$int = $_SESSION['int'];
					$dex = $_SESSION['dex'];
					$gold = $_SESSION['gold'];

					$weapon = $_SESSION['weapon'];
					$outfit = $_SESSION['outfit'];
					$skill1 = $_SESSION['skill1'];
					$skill2 = $_SESSION['skill2'];
					$elixir = $_SESSION['elixir'];
					$class = $_SESSION['class'];


					$hp = $str*10;
					$mp = $int*10;
					$ms = $dex*1;
					$ad = round(1.5*$str+0.5*$dex);
					$ap =  round(1.5*$int+0.5*$dex);
					$cdr =  round((2*$int + $dex) / 6);

					$stats = array(
					"str" => $str,
					"int" => $int,
					"dex" => $dex,
					"gold" => $gold,
					"hp" => $hp,
					"mp" => $mp,
					"ad" => $ad,
					"ap" => $ap,
					"ms" => $ms,
					"cdr" => $cdr,
					"weapon" => $weapon,
					"outfit" => $outfit,
					"skill1" => $skill1,
					"skill2" => $skill2,
					"elixir" => $elixir,
					"class" => $class
					);

					echo json_encode($stats);
				}
				else
				{
					echo "Can't find character data...";
					exit();
				}
			}
		}
		else
		{
			echo 'Player is not logged in';
			exit();
		}
	}

	function buyItem()	{

		 	if($_SESSION['gold']>=$_POST['cost'])
			{
				$_SESSION['gold']-=$_POST['cost'];

			 	$itemType = $_POST['type'];
				$item = $_POST['item'];
			 	$gold = $_SESSION['gold'];
			 	$username = $_SESSION['username'];

			 	$db = new PDO('sqlite:../game_PDO.sqlite');

			 	$sql = "UPDATE users
			 	SET
			 	$itemType='$item',
		   	gold='$gold'
			 	WHERE username='$username'";

				if($db->query($sql))
				{
					$_SESSION[$itemType]=$item;
					echo 1;
				}
				else
		 		{
				 	echo 0;
			 	}
			 	$db=null;
			}
   }
	function sellItem()	{

 		 	$_SESSION['gold']+=$_POST['cost'];

 		 	$item_type = $_POST['type'];
 		 	$gold = $_SESSION['gold'];
 		 	$username = $_SESSION['username'];

 		 	$db = new PDO('sqlite:../game_PDO.sqlite');

 		 	$sql = "UPDATE users
 		 	SET
 		 	$item_type=null,
 	   	gold='$gold'
 		 	WHERE username='$username'";

 			if($db->query($sql))
 			{
 				$_SESSION[$item_type]=NULL;
 				echo 1;
 			}
 			else
 	 		{
 			 	echo 0;
 		 	}
 		 	$db=null;
    }
	function addGold()	{

	 		$_SESSION['gold']+=200;

	 		$gold = $_SESSION['gold'];
	  	$username = $_SESSION['username'];

	 	 	$db = new PDO('sqlite:../game_PDO.sqlite');

	 	 	$sql = "UPDATE users
		 	SET
	 	 	gold='$gold'
	 	 	WHERE username='$username'";

	 		if($db->query($sql))
	 		{
	 			echo 1;
	 		}
	 		else
	 		{
	 		 	echo 0;
	 	 	}
	 	 	$db=null;
	  }

 	function addPoint($stat)	{

 	        if($_SESSION['gold']>=10)
 					 {
 						 $_SESSION[$stat]++;
 						 $_SESSION['gold']-=10;

 						 $value = $_SESSION[$stat];
 						 $gold = $_SESSION['gold'];
 						 $username = $_SESSION['username'];

 						 $db = new PDO('sqlite:../game_PDO.sqlite');

 					   $sql = "UPDATE users SET $stat=$value, gold=$gold WHERE username='$username'";

 						 if($db->query($sql))
 						 {
 							 echo $value;
 						 }
 						 else
 						 {
 							 echo 0;
 						 }

 						 $db=null;
 					 }
 	     }
?>
