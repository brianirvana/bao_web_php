<?php
$directory = 'fotodenuncia';

/* load the file containg the list of uploaded files in to an array */
$file_arrays = @ unserialize (@ file_get_contents ( "$directory/allowed_files" ));

/* check the data was loaded successfully - if not, create an empty array */
if (! is_array ( $file_arrays )) {
$file_arrays = array( 'files' => array(), 'types' => array());
}

/* check for the existance of a file variable in the queery string
* if its there, this contains the name of the file to be downlaoded
*/
if (isset( $_GET [ 'file' ])) {
$file = $_GET [ 'file' ];

/* check the file is in the array retrieved from the file */
if ( in_array ( $file , @ $file_arrays [ 'files' ])) {
/* get the Content-Type of the file */
header ( 'Content-Type: ' . $file_arrays [ 'types' ][ $file ]);
header ( 'Content-Disposition: attachment; filename="' . $file . '"' );

/* send the file */
@ readfile ( "$directory/files/$file" );
exit;
}
}
?>
<html>
<head>
<title>Foto Denuncias</title>
</head>
<body>
<h3>Últimas Foto Denuncias</h3>
<ul>
<?php foreach( $file_arrays [ 'files' ] as $file ): ?>
<li><a href=" <?php echo( $directory.'/files/' . htmlspecialchars ( $file )) ?> ">
<?php echo( htmlspecialchars ( $file )) ?> </a>
</li>
<?php endforeach; ?>
</ul>
</body>
</html>