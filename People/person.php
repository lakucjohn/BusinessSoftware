<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/9/18
 * Time: 1:30 PM
 */
//require '../core_resources/id.generator.inc.php';
require '/opt/lampp/htdocs/Naod-Moses-Co/core_resources/id.generator.inc.php';
class person{

    public $personName;
    public $personAddress;
    public $personContact;
    public $personalId;
    public $email;

    public function __construct($personName, $personAddress, $personContact,$email)
    {
        $this->personName = $personName;
        $this->personAddress = $personAddress;
        $this->personContact = $personContact;
        $this->personalId = getUniqueId(7);
        $this->email = $email;
    }


}
?>