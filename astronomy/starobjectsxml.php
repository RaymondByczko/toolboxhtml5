<?php
	// author: Raymond Byczko
	// file: starobjectsxml.php
	// start date: 2012-05-19 May 19, 2012
	// further work dates: 2012-05-22
	// purpose: to create and return an xml structure for all star objects in
	// the astronomy database.  The id and name are specified for each.
	header('Content-Type: application/xml');
	class CStarObjects
	{
		public $id;
		public $name;
	}
	$dsn = '';
	try {
		$user = getenv('SH_USER');
		if ($user == FALSE)
		{
			throw new Exception("SH_USER env not defined");
		}
		$pass = getenv('SH_PASS');
		if ($pass == FALSE)
		{
			throw new Exception("SH_PASS env not defined");
		}
		$database = getenv('SH_DATABASE');
		if ($database == FALSE)
		{
			throw new Exception("SH_DATABASE env not defined");
		}

		$retXml = "<?xml version=\"1.0\" ?>";

		$dsn = 'mysql:dbname='.$database.';host=localhost';
		$pdo = new PDO($dsn, $user, $pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// $id = '10';
		$sql = 'select id, name from skyobjects';
		$stmt = $pdo->prepare($sql);  
		if ($stmt == FALSE)
		{
			throw new Exception('PDO::prepare failed');
		}
		$stmt->setFetchMode(PDO::FETCH_INTO, new CStarObjects());
		$stmt->execute();
		// $name = 'Regulus';
		$retXml .= "<starobjectdetails>";
		/*
		$retXml .= "<entry>";
		$retXml .= "<id>".$id."</id>";
		$retXml .= "<name>".$name."</name>";
		$retXml .= "</entry>";
		*/
		foreach ($stmt as $soObj)
		{
			$id = $soObj->id;
			$name = $soObj->name;
			$retXml .= "<entry>";
			$retXml .= "<id>".$id."</id>";
			$retXml .= "<name>".$name."</name>";
			$retXml .= "</entry>";
		}
		$retXml .= "</starobjectdetails>";
		echo $retXml;
	}
	catch (PDOException $pex)
	{
		$msg = $pex->getMessage();
		$retXml = "<?xml version=\"1.0\" ?>";
		$retXml .= '<starobjectdetails>';
		$retXml .= '<status>1</status>';
		$retXml .= '<dsn>'.$dsn.'</dsn>';
		$retXml .= '<msg>'.$msg.'</msg>';
		$retXml .= '</starobjectdetails>';
		echo $retXml;
	}
	catch (Exception $ex)
	{
		$msg = $ex->getMessage();
		$retXml = "<?xml version=\"1.0\" ?>";
		$retXml .= '<starobjectdetails>';
		$retXml .= '<status>2</status>';
		$retXml .= '<dsn>'.$dsn.'</dsn>';
		$retXml .= '<msg>'.$msg.'</msg>';
		$retXml .= '</starobjectdetails>';
		echo $retXml;
	}
?>
