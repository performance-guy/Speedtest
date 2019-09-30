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



    $email = $_REQUEST['email'];
    $first_Name = $_REQUEST['first'];
    $last_Name = $_REQUEST['last'];
    $phone_Number = $_REQUEST['phone'];
    $company_Name = $_REQUEST['company'];
    $job_Function = $_REQUEST['job'];
    $organization_Type = $_REQUEST['org'];
    $website_Owner = $_REQUEST['owner'];
    $website = $_REQUEST['website'];


// check if the post method is used to submit the form

if ( filter_has_var( INPUT_POST, 'submit' ) ) {


    $email = $_POST['email'];
    $first_Name = $_POST['first'];
    $last_Name = $_POST['last'];
    $phone_Number = $_POST['phone'];
    $company_Name = $_POST['company'];
    $job_Function = $_POST['job'];
    $organization_Type = $_POST['org'];
    $website_Owner = $_POST['owner'];
    $website = $_POST['website'];

// display the results

}

// check if the get method is used to submit the form

//if ( filter_has_var( INPUT_GET, 'submit' ) ) {
//
//    echo '<h2>form data retrieved by using $_GET variable<h2/>';
//
//$web = $_GET['web'];
//$email = $_GET['email'];
//}

// display the results
//echo 'Your data is ' . $web .' ' . $email;

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
if ($response = $wpt->runTest($website,$data)) {
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
//        echo '<pre>'; print_r($full_response);
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

        $query1 = "INSERT INTO lead_data (Work_Email_Address,
                        First_Name,
                        Last_Name,
                        Phone_Number,
                        Company_Name,
                        Job_Function,
                        Organization_Type,
                        Website_Owner,
                        Your_Website) 
                          VALUES ('$email',
                           '$first_Name',
                          '$last_Name',
                          '$phone_Number',
                          '$company_Name',
                          '$job_Function',
                          '$organization_Type',
                          '$website_Owner',
                          '$website')";
        $conn = OpenCon();
        $chk = mysqli_query($conn,$query1);
        $last_id = mysqli_insert_id($conn);

        $query2 = "INSERT INTO website_test (ID,
                        	F_Cache,
                        	F_Load_Time,
                        F_Render_Time,
                        F_Page_Size,
                        	F_Request,
                        	R_Cache,
                        R_Load_Time,
                        R_Render_Time,
                        R_Page_Size,
                        R_Request) 
                          VALUES ('$last_id',
                           '$f_score_cache',
                          '$f_loadtime',
                          '$f_render',
                          '$f_bytesInDoc',
                          '$f_requests',
                          '$r_score_cache',
                          '$r_loadtime',
                          '$r_render',
                          '$r_bytesInDoc',
                          '$r_requests')";
        $chk1 = mysqli_query($conn,$query2);

        header('Location: result.php/?id='.$last_id.'&website='.$website);

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



    }
}