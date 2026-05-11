<article id="inquiry">
	<?php
		switch ( $param[1] ) {
			case 'form' :
				require_once( "/home/realestate/www/include/{$param[0]}/{$param[1]}.php" ) ;
				break ;
			
			default:
				require_once( "/home/realestate/www/include/{$param[0]}/form.php" ) ;
				break ;
		}
	?>
</article>