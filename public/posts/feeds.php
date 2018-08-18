<?php 

header ("Access-Control-Allow-Origin : *");

setlocale(LC_ALL, 'IND');
date_default_timezone_set("Asia/Jakarta");


include 'connect.php';

$type = $_GET['t'];

function get_list($connect, $what) {

	if (!isset($_GET['o']) || !isset($_GET['l'])){
		echo false;
		exit;
	}

	$limit = $_GET['l'];
	$offset = $_GET['o'];

	$sqlyear = "SELECT DISTINCT YEAR(`timestamp`) as year
				FROM $what
				ORDER BY id DESC";

	$queryingyear = $connect->query($sqlyear);

	$sql = "SELECT * 
			FROM $what
			ORDER BY id DESC
			LIMIT $offset, $limit";

	if (isset($_GET['y'])) {
		$y = $_GET['y'];

		$sql = "SELECT * 
				FROM $what
				WHERE YEAR(timestamp) = $y
				ORDER BY id DESC
				LIMIT $offset, $limit";
	}

	if (isset($_GET['f'])) {
		$f = '%'.$_GET['f'].'%';

		$sql = "SELECT * 
				FROM $what
				WHERE title LIKE '$f'
				ORDER BY id DESC
				LIMIT $offset, $limit";
	}

	$querying = $connect->query($sql);

	$result = new StdClass;

	$json = array();
	$year = array();

	$j = 0;

	if ($queryingyear->num_rows > 0) {
		while ($row = $queryingyear->fetch_assoc()){

			$year[$j] = $row['year'];
			$j++;
		}
		$result->year = $year;
	} else {
		$result->year = false;
	}

	$i = 0;

	if ($querying->num_rows > 0) {
		while ($row = $querying->fetch_assoc()) {
			$json[$i] = new StdClass;

			$strtime = strtotime($row['timestamp']);

			$json[$i]->id = $row['id'];
			$json[$i]->featured = $row['featured'];
			$json[$i]->class = 'grid-item';
			$json[$i]->datecreated = strftime("%d %h %Y", $strtime);
			$json[$i]->link = $row['link'];
			$json[$i]->cover = '/public/posts/'.$what.'/images/'.date("Y", $strtime).'/'.date("n", $strtime).'/'.$row['cover'];
			$json[$i]->title = $row['title'];
			$json[$i]->shorttext = $row['shorttext'];
			$json[$i]->liked = $row['liked'];
			$json[$i]->viewed = $row['viewed'];
			$i++;
		}

		$result->list = $json;

	} else {
		$result->list = false;
	}

	return $result;

	// echo '<pre>';
	// print_r($result);
	// echo '</pre>';

}

function get_data($connect, $what) {

	if (!isset($_GET['li'])){
		echo false;
		exit;
	}

	$link = $_GET['li'];

	$update = "UPDATE $what
				SET viewed = viewed + 1
				WHERE link = '$link'";

	$connect->query($update);


	$sql = "SELECT *
			FROM $what
			WHERE link = '$link'";

	$querying = $connect->query($sql);

	$result = new StdClass;

	if ($querying->num_rows == 1) {
		$json = new StdClass;

		$row = $querying->fetch_assoc();

		$strtime = strtotime($row['timestamp']);

		$json->datecreated = date("d-m-Y", $strtime);
		$json->timecreated = date("H:i:s", $strtime);
		$json->author = $row['author'];
		$json->cover = ($row['cover'] != '')? '/public/posts/'.$what."/images/".date("Y", $strtime).'/'.date("n", $strtime).'/'.$row['cover'] : '';
		$json->title = $row['title'];
		$json->htmlcontent = $row['htmlcontent'];
		$json->viewed = $row['viewed'];

		$result->data = $json;

	} else {
		
		$result->data = false;
	}

	return $result;
}

function get_list_data($connect, $what) {

	$result = new StdClass;

	$result->list = get_list($connect, 'artikel')->list;
	$result->data = get_data($connect, $what)->data;

	return $result;
}

function get_all_list($connect) {

	$result = new StdClass;

	$result->artikel = get_list($connect, 'artikel')->list;
	$result->pengumuman = get_list($connect, 'pengumuman')->list;
	$result->beasiswa = get_list($connect, 'beasiswa')->list;

	// echo '<pre>';
	// print_r($result);
	// echo '</pre>';

	// echo 'test';

	return $result;


}

function get_tautan($connect) {

	$datenow = date('Y-m-d');

	$sql = "SELECT *
			FROM tautan
			WHERE expired >= '$datenow'
			ORDER BY expired ASC";

	$querying = $connect->query($sql);

	$result = new StdClass;
	$json = array();

	if ($querying->num_rows > 0) {

		$i = 0;

		while ($row = $querying->fetch_assoc()) {
			
			$exp= date_create($row['expired']);
			$dnow= date_create($datenow);

			$diff = date_diff($dnow,$exp)->format('%a');

			$strtime = strtotime($row['dibuat']);

			$json[$i] = new StdClass;

			$json[$i]->nama = $row['name'];
			$json[$i]->site = $row['site'];
			$json[$i]->author = $row['departemen'];
			$json[$i]->created = strftime('%e %B %Y',$strtime);
			$json[$i]->timeleft = $diff;

			$i++;

		}

		$result->list = $json;

	} else {
		$result->list = false;
	}

	return $result;
}


switch ($type) {
	// list artikel
	case 'list':
		echo json_encode(get_list($conn, $_GET['c']));
		break;

	case 'data':
		echo json_encode(get_data($conn, $_GET['c']));
		break;

	case 'data-list':
		echo json_encode(get_list_data($conn, $_GET['c']));
		break;

	case 'all-list':
		echo json_encode(get_all_list($conn));
		break;

	case 'tautan':
		echo json_encode(get_tautan($conn));
		break;
}

?>