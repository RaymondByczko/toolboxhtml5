<?php
	// author: Raymond Byczko
	// file: starobjectdetailsxml.php
	// start date: 2012-05-28 May 28, 2012
	// further work dates:
	// purpose: to create and return an xml structure for one star object in
	// the astronomy database.  The id is specified for it.
	header('Content-Type: application/xml');
	class CStarObjectDetails
	{
		public $id;
		public $name;
		public $raHrs;
		public $raMin;
		public $raSec;
		public $decSign;
		public $decDeg;
		public $decMin;
		public $decSec;
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
		$selIndex = $_GET['selIndex'];
		// $selIndex = 7;
		$retXml = "<?xml version=\"1.0\" ?>";

		$dsn = 'mysql:dbname='.$database.';host=localhost';
		$pdo = new PDO($dsn, $user, $pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'select id, name, raHrs, raMin, raSec, decSign, decDeg, decMin, decSec from skyobjects where id = ? limit 1';
		
		$stmt = $pdo->prepare($sql);  
		$stmt->bindParam(1, $selIndex, PDO::PARAM_STR, 12);
		if ($stmt == FALSE)
		{
			throw new Exception('PDO::prepare failed');
		}
		$stmt->setFetchMode(PDO::FETCH_INTO, new CStarObjectDetails());
		$stmt->execute();
		$retXml .= "<starobjectdetails>";
		foreach ($stmt as $soObj)
		{
			$id = $soObj->id;
			$name = $soObj->name;
			$raHrs = $soObj->raHrs;
			$raMin = $soObj->raMin;
			$raSec = $soObj->raSec;
			$decSign = $soObj->decSign;
			$decDeg = $soObj->decDeg;
			$decMin = $soObj->decMin;
			$decSec = $soObj->decSec;

			$retXml .= "<entry>";
			$retXml .= "<id>".$id."</id>";
			$retXml .= "<name>".$name."</name>";

			$retXml .= "<raHrs>".$raHrs."</raHrs>";
			$retXml .= "<raMin>".$raMin."</raMin>";
			$retXml .= "<raSec>".$raSec."</raSec>";

			$retXml .= "<decSign>".$decSign."</decSign>";
			$retXml .= "<decDeg>".$decDeg."</decDeg>";
			$retXml .= "<decMin>".$decMin."</decMin>";
			$retXml .= "<decSec>".$decSec."</decSec>";

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
