<?php
require_once 'vendor/autoload.php';
include 'db.php';




use WidgetsBurritos\WebPageTest\WebPageTest;
use Teapot\StatusCode;
use Spatie\Async\Pool;
use Entrecore\GTMetrixClient\GTMetrixClient;
use Entrecore\GTMetrixClient\GTMetrixTest;

$web  = "";
$email = "";
// Check if the form is submitted
if ( isset( $_POST['submit'] ) ) {

// retrieve the form data by using the element's name attributes value as key

    echo '<h2>form data retrieved by using the $_REQUEST variable<h2/>';

$web = $_REQUEST['web'];
$email = $_REQUEST['email'];

// display the results
echo 'Your data is ' . $web .' ' . $email;

// check if the post method is used to submit the form

if ( filter_has_var( INPUT_POST, 'submit' ) ) {

    echo '<h2>form data retrieved by using $_POST variable<h2/>';

$web = $_POST['web'];
$email = $_POST['email'];

// display the results
echo 'Your data is ' . $web .' ' . $email;
}

// check if the get method is used to submit the form

if ( filter_has_var( INPUT_GET, 'submit' ) ) {

    echo '<h2>form data retrieved by using $_GET variable<h2/>';

$web = $_GET['web'];
$email = $_GET['email'];
}

// display the results
echo 'Your data is ' . $web .' ' . $email;

}








//if ($done)
//{
//    header("Location: /url/to/the/other/page");
//    exit;
//}








$wpt = new WebPageTest('A.fe5ef47b69dfa003467133609b7a701d');
$test_id ='';
$data = array(
    'location' => "Dulles:Chrome.DSL"
);
if ($response = $wpt->runTest('https://www.kinsta.com',$data)) {
    if ($response->statusCode == StatusCode::OK) {
        // All test info is available in $response->data.
        $test_id = $response->data->testId;
    }
}
 $response = $wpt->getTestStatus($test_id);
        // All test info is available in $response->data.
        while ($response->statusCode != StatusCode::OK) {
            $response = $wpt->getTestStatus($test_id);
            if ($response->statusCode == StatusCode::OK) {

                break;
            } else if ($response->statusCode == StatusCode::CONTINUING) {

                $pool = Pool::create();

                foreach (range(1, 20) as $i) {
                    $pool[] = async(function () {
                        usleep(random_int(10, 1000));

                        return 2;
                    })->then(function (int $output) {
//                        echo $output;
                    });
                }

                await($pool);

            } else if ($response->statusCode == StatusCode::SWITCHING_PROTOCOLS || $response->statusCode == 101 || true) {
                $pool = Pool::create();

                foreach (range(1, 20) as $i) {
                    $pool[] = async(function () {
                        usleep(random_int(10, 1000));

                        return 2;
                    })->then(function (int $output) {
//                        echo $output;
                    });
                }

                await($pool);

            } else if ($response->statusCode == StatusCode::PAYMENT_REQUIRED) {
                // Test has been cancelled.
            }
        }



$full_response = "";
if ($response = $wpt->getTestResults($test_id)) {
    // All test result info is available in $response->data.
    if ($response->statusCode == StatusCode::OK) {

        // Test is complete.
        $full_response = $response;
        echo '<pre>'; print_r($full_response);
        $f_loadtime= $full_response->data->average->firstView->loadTime;
        $f_bytesInDoc= $full_response->data->average->firstView->bytesInDoc;
        $f_score_cache= $full_response->data->average->firstView->score_cache;
        $f_requests= $full_response->data->average->firstView->requests;
        $f_render= $full_response->data->average->firstView->render;

        $r_loadtime= $full_response->data->average->repeatView->loadTime;
        $r_bytesInDoc= $full_response->data->average->repeatView->bytesInDoc;
        $r_score_cache= $full_response->data->average->repeatView->score_cache;
        $r_requests= $full_response->data->average->repeatView->requests;
        $r_render= $full_response->data->average->repeatView->render;

        $aa = 1+1;
        $bb = $aa -1 ;


        $c ="asfasf";

        echo "Done";

    }
    else if (in_array($response->statusCode, [StatusCode::CONTINUING, StatusCode::SWITCHING_PROTOCOLS])) {
        // Test is not yet complete.
    }
    else {
        // Test failed.
    }
}

if ($response = $wpt->getLocations()) {
    if ($response->statusCode == StatusCode::OK) {
        // All locations info is available in $response->data.

        echo var_dump($response);

    }
}