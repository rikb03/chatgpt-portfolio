<?php
if (session_status() != 2){session_start();}
class updateData {
    private function qb(){
        require_once 'functions/connect.php';
        require_once 'functions/queryBuilder.php';
        $qb = new QueryBuilder(new Connection());
        return $qb;
    }
    // Update user data
    function updateUserData($updateArr, $userId){
        unset ($updateArr['method']);
        $succes = $this->qb()->update('user', $updateArr, 'id='.$userId);
        if ($succes != 1) {errorMessage("Something went wrong, try again", 'edit');
        } else {header('Location: /edit');}
    }
}