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


    // HOBBY UPDATE
    function updateHobbyName($hobbyId, $newHobbyName) {
        $updateArr = array('hobbyName' => $newHobbyName);
        $this->updateHobby('hobby', $updateArr, $hobbyId);
    }

    // EXPERIENCE UPDATE
    function updateJobTitle($experienceId, $newJobTitle) {
        $updateArr = array('jobTitle' => $newJobTitle);
        $this->update('experience', $updateArr, $experienceId);
    }

    //CERTIFICATE UPDATE
    function updateCertificateName($certificateId, $newCertificateName) {
        $updateArr = array('certificateName' => $newCertificateName);
        $this->update('certificate', $updateArr, $certificateId);
    }


    function add($table, $addArr) {
        $succes = $this->qb()->insert($table, $addArr);
        if ($succes != 1) {errorMessage("Something went wrong, try again", 'edit');
        } else {header('Location: /edit');}
    }
    function delete($table, $id) {
        $succes = $this->qb()->delete($table, 'id='.$id);
        if ($succes != 1) {errorMessage("Something went wrong, try again", 'edit');
        } else {header('Location: /edit');}
    }
    function update($table, $updateArr, $userId) {
        $_POST['method'] = $updateArr['method'];
        unset ($updateArr['method']);
        $succes = $this->qb()->update($table, $updateArr, 'id='.$userId);
        if ($succes != 1) {errorMessage("Something went wrong, try again", 'edit');
        } else {header('Location: /edit');}
    }

    function updateHobby($table, $updateArr, $userId) {
        $_POST['methodHobbby'] = $updateArr['methodHobbby'];
        unset ($updateArr['methodHobbby']);
        $succes = $this->qb()->update($table, $updateArr, 'id='.$userId);
        if ($succes != 1) {errorMessage("Something went wrong, try again", 'edit');
        } else {header('Location: /edit');}
    }
}