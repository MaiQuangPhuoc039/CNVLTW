<?php
$message = '';

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action =  'start_app';
}

switch ($action) {
    case 'start_app':

        $interval = new DateInterval('P1M');
        $default_date = new DateTime();
        $default_date->sub($interval);
        $invoice_date_s = $default_date->format('n/j/Y');

        $interval = new DateInterval('P2M');
        $default_date = new DateTime();
        $default_date->add($interval);
        $due_date_s = $default_date->format('n/j/Y');

        $message = 'Enter two dates and click on the Submit button.';
        break;
    case 'process_data':
        $invoice_date_s = filter_input(INPUT_POST, 'invoice_date');
        $due_date_s = filter_input(INPUT_POST, 'due_date');

        // make sure the user enters both dates
         if(empty($invoice_date_s) || empty($due_date_s)){
            $message = 'you must enter both dates . Please try again .';
         }

        // convert date strings to DateTime objects
        // and use a try/catch to make sure the dates are valid
        try{
            $invoice_date_datetime_ob  = new DateTime($invoice_date_s);
            $due_date_datetime_ob = new DateTime($due_date_s);

        }catch(Exception $ex){
            $message = 'Both dates must be in a valid format. Please check both dates and try again.';
            break;
        }

        // make sure the due date is after the invoice date
        if($invoice_date_datetime_ob > $due_date_datetime_ob){
            $message = 'The due date must come after the invoice date. Please try again.';
            break;
        }

        $format_string  = 'F j, Y';

        // format both dates
        $invoice_date_f =   $invoice_date_datetime_ob->format($format_string);
        $due_date_f =   $due_date_datetime_ob->format($format_string);
        
        // get the current date and time and format it
        $current_date_datetime_ob =  new DateTime();
        $current_date_f = $current_date_datetime_ob->format($format_string);
        $current_time_f = $current_date_datetime_ob->format('g:i:s a');
        
        // get the amount of time between the current date and the due date  
        // and format the due date message
        $date_dif = $current_date_datetime_ob->diff($due_date_datetime_ob);
        if($due_date_datetime_ob < $current_date_datetime_ob){
            $due_date_message = $date_dif->format('This invoice is %y years, %m months, and %d days overdue.');
        }else{
            $due_date_message = $date_dif->format( 'This invoice is due in %y years, %m months, and %d days.');
        }
        

        // $due_date_message = 'not implemented yet';

        break;
}
include 'date_tester.php';
?>