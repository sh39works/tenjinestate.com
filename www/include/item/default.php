<article id="item">
	<?php
		switch ( $param[1] ) {
			case 'list' :
			case 'detail' :
			case 'search' :
				require_once( "/home/realestate/www/include/{$param[0]}/{$param[1]}.php" ) ;
				break ;
			
			default:
				require_once( "/home/realestate/www/include/{$param[0]}/list.php" ) ;
				break ;
		}
	?>
</article>