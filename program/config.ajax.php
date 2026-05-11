<?php
    mb_internal_encoding("UTF-8");
    mb_regex_encoding("UTF-8");

    session_start();
    header('Expires:-1');
    header('Cache-Control:');
    header('Pragma:');

//    require_once( "/home/realestate/vendor/autoload.php" );

    // ProgramFile Include
    $program_path = "/home/realestate/program/" ;
    $program_file = glob( $program_path."*.inc.php" ) ;
    $i = 0 ;

    while( !empty( $program_file[$i] )) :
        require_once( $program_file[$i++] ) ;
    endwhile ;

    $program_file = NULL ;
    $program_file = glob( $program_path."function.*.php" ) ;
    $i = 0 ;

    while( !empty( $program_file[$i] )) :
        require_once( $program_file[$i++] ) ;
    endwhile ;

//    $ini_file = parse_ini_file("/home/realestate/.aws.ini", true);

/*
    use Aws\CloudFront\CloudFrontClient;
    use Aws\Exception\AwsException;
    use Aws\S3\S3Client;
    use Aws\CommandPool;
    use Aws\S3\Exception\S3Exception;

    $cloudFront = new Aws\CloudFront\CloudFrontClient([
        'region' => 'us-east-1',
        'version' => '2016-01-28',
        'credentials' => [
            'key'       => $ini_file['S3']['ACCESS_KEY'],
            'secret'    => $ini_file['S3']['SECRET_ACCESS_KEY'],
        ],
    ]);

    // S3Clientインスタンスの作成
    $s3 = new Aws\S3\S3Client([
        'credentials' => [
            'key'       => $ini_file['S3']['ACCESS_KEY'],
            'secret'    => $ini_file['S3']['SECRET_ACCESS_KEY'],
        ],
        'region' => $ini_file['CDN']['REGION'],
        'version' => $ini_file['CDN']['VERSION'],
    ]);
*/
?>