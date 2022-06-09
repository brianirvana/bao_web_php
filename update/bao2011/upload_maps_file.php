<?php
/* check for and loop through uploaded files */
foreach ( $_FILES as $name => $info ) 
{
	/* chekc the file has a valid name */
	if (( $info [ 'name' ] != 'ht.access' && substr ( $info [ 'name' ], 0 , 1 ) != '.' && $info [ 'name' ] != 'allowed_files' )) 
	{
		/* attempt to move the file to the uploaded_files directory */
		if (@ move_uploaded_file ( $info [ 'tmp_name' ], "OldAct/Mapas/{$info['name']}" ))
		{

			/* get the contenst of the array of files */
			$file_arrays = @ unserialize (@ file_get_contents ( 'OldAct/allowed_files' ));

			/* if there are more already 5 files, remove the oldest item fomr the array and delete it */
			/*if ( count (@ $file_arrays [ 'files' ]) == 5 )
			{
				$name = array_shift ( $file_arrays [ 'files' ]);

				unset( $file_arrays [ 'types' ][ $name ]);
				@ unlink ( '../GMs/fotodenuncia/files/' . $name );
			}*/

			/* add the new item to the arrays */
			$file_arrays [ 'files' ][] = $info [ 'name' ];
			$file_arrays [ 'types' ][ $info [ 'name' ]] = $info [ 'type' ];

			/* serialize the array and write it back to the file */
			if ( $fhwnd = @ fopen ( 'OldAct/allowed_files' , 'wb+' ))
			{
				fwrite ( $fhwnd , serialize ( $file_arrays ));
				fclose ( $fhwnd );
			}
		}
	}
}
?>