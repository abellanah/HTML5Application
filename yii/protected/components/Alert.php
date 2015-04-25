<?php

class Alert {

    public static function createAlert($message, $type = 'info') {
        $data['type'] = $type;
        $data['message'] = $message;
        Yii::app()->session['alertMessage'] = $data;
    }

}

?>
