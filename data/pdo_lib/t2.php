<?php
define('START_TIME', microtime(true));
define('START_MEMORY', memory_get_usage());


/* Example Config for MYSQL */
$config = array();
$config['user'] = 'root';
$config['pass'] = '';
$config['name'] = 'pdo_test';
$config['host'] = 'localhost';
$config['type'] = 'mysql';
$config['port'] = null;
$config['persistent'] = true;
 



//Delete the SQLite DB file if it exists
if(file_exists($config['name'])) {
	unlink($config['name']);
}


//Include the CXPDO Class
include('cxpdo/cxpdo.php');


//Create/GET the instance - pass the config values
$db = db::instance($config);


/*
 * VIEW ROWS
 */
$data = array('tables' => 'posts');
$result = $db->select($data);

while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	print_r($row);
}



/*
 * UPDATE ROW 3 WITH NEW DATA
 */

$data = array('text' => 'I Went on vacation last week!');
$where = array('id' => $db->lastInsertId());

$result = $db->update('posts', $data, $where);

print 'Updated row '. $db->lastInsertId(). '<br />';




/*
 * VIEW ROWS
 */
$data = array('tables' => 'posts');
$result = $db->select($data);

while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	print_r($row);
}



/*
 * COUNT ROWS
 */
$result = $db->count('posts');
print 'There are '. $result->fetchColumn(). ' rows in the table posts<br />';



/*
 * DELETE ROW 3
 */
$result = $db->delete('posts', array('id' => 3));
print 'Deleted Row '. $db->lastInsertId(). '<br />';




/*
 * VIEW ROWS
 */
$data = array('tables' => 'posts');
$result = $db->select($data);

while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	print_r($row);
}


/*
 * DELETE ALL ROWS
 */
$result = $db->delete('posts');
print 'Deleted '. $result->rowCount(). ' rows<br />';



print '<br />Total Time: '. (round(microtime(true) - START_TIME, 4)). ' seconds.';
print '<br />Total Memory: '. round((memory_get_usage() - START_MEMORY) / 1024, 3). ' kilobytes';






/*
 * Complex LEFT JOIN SELECT example on three tables
 */

/*
$data				= array();

$data['tables']		= 'posts';
$data['columns']	= array('posts.id', 'posts.title', 'posts.text', 'posts.date', 'posts.author', 'tags.name');
$data['where']		= array('posts.id' => array('1', '2'));
$data['joins']		= null;
//$data['group_by'] = array('posts.id');
//$data['order_by'] = 'posts.id';
$data['limit']		= 10;
$data['offset']		= 0;

//Add the joins
$data['joins'][] = array(
	'table' => 'tags_ref', 
	'type'	=> 'right',
	'conditions' => array('posts.id' => 'tags_ref.item_id')
);

$data['joins'][] = array(
	'table' => 'tags',  
	'type'	=> 'left',
	'conditions' => array('tags_ref.tags_id' => 'tags.id')
);



$result = $db->select($data);

var_dump($result->queryString);

print '<pre>';
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	foreach($row as $key => $value) {
		var_dump($value);
	}
	print "<hr>";
}

*/

