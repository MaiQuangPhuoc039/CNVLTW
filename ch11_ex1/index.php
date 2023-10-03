<?php
//get tasklist array from POST
$task_list = filter_input(INPUT_POST, 'tasklist', 
        FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
if ($task_list === NULL) {
    $task_list = array();
    
//    add some hard-coded starting values to make testing easier
//    $task_list[] = 'Write chapter';
//    $task_list[] = 'Edit chapter';
//    $task_list[] = 'Proofread chapter';
}

//get action variable from POST
$action = filter_input(INPUT_POST, 'action');

//initialize error messages array
$errors = array();

//process
switch( $action ) {
    case 'Add Task':
        $new_task = filter_input(INPUT_POST, 'newtask');
        if (empty($new_task)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            $task_list[] = $new_task;
        }
        break;
    case 'Delete Task':
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if ($task_index === NULL || $task_index === FALSE) {
            $errors[] = 'The task cannot be deleted.';
        } else {
            unset($task_list[$task_index]);
            $task_list = array_values($task_list);
        }
        break;
    case 'Promote Task':
        $task_pro = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if($task_pro === NULL || $task_pro ===false ){
            $errors[]  = 'The task cannot be promote ';
        }else if($task_pro == 0 ){
            $errors[] = 'You can\'t promote the first task ';
        }else{
            // change value when changing position in array
            $task_val_1 = $task_list[$task_pro];     // ex: 3
            $task_val_2 = $task_list[$task_pro-1];   // ex: 2

            // swap value for val_1 , val_2 (val : value)
            $task_list[$task_pro-1] = $task_val_1;
            $task_list[$task_pro]   = $task_val_2;

            break;
        }
    case 'Sort Tasks':
        sort($task_list);
        break;
        
/*
    case 'Modify Task':
    
    case 'Save Changes':
    
    case 'Cancel Changes':
    
  
        
     
    
*/
}

include('task_list.php');
?>