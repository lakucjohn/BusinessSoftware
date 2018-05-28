<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/9/18
 * Time: 1:43 PM
 */
require_once '../person.php';
require_once 'SupplierManager.php';

class supplier extends person{

    private $contactPerson;

    private $supplierManager;
    private $contactPersonPhone;

    public function __construct($personName, $personAddress, $personContact,$email,$contactPerson,$contactPersonPhone)
    {
        parent::__construct($personName, $personAddress, $personContact,$email);
        $this->contactPerson = $contactPerson;
        $this->contactPersonPhone=$contactPersonPhone;
        $this->supplierManager = new SupplierManager();
    }

    public function addPerson()
    {
        $this->supplierManager->Register($this->personalId,$this->personName,$this->personAddress,$this->email,$this->personContact,$this->contactPerson,$this->contactPersonPhone);
    }

    public function editPerson($personId)
    {
        $this->personalId=$personId;
        $this->supplierManager->edit($this->personalId,$this->personName,$this->personAddress,$this->email,$this->personContact,$this->contactPerson,$this->contactPersonPhone);

    }

    public function deletePerson($personId)
    {
        $this->personalId=$personId;
        $this->supplierManager->delete($this->personalId);

    }


}
if(isset($_POST['action'])){

    if($_POST['action']=='addSupplier'){

        #This code add a new supplier to the system
        if(isset($_POST['supplierName'])
            &&isset($_POST['supplierAddress'])
            &&isset($_POST['supplierEmail'])
            &&isset($_POST['supplierTelephone'])
            &&isset($_POST['supplierContactPerson'])
            &&isset($_POST['supplierContactPersonContact'])
        ){
            $supplierName = $_POST['supplierName'];
            $supplierAddress = $_POST['supplierAddress'];
            $supplierEmail = $_POST['supplierEmail'];
            $supplierTelephone = $_POST['supplierTelephone'];
            $supplierContactPerson = $_POST['supplierContactPerson'];
            $supplierContactPersonPhone = $_POST['supplierContactPersonContact'];

            $supplier = new supplier($supplierName,$supplierAddress,$supplierTelephone,$supplierEmail,$supplierContactPerson,$supplierContactPersonPhone);
            $supplier->addPerson();
        }


    }

    #This code edits a supplier
    if($_POST['action']=='editSupplier'){

        if(isset($_POST['supplierNameEdited'])
            &&isset($_POST['supplierAddressEdited'])
            &&isset($_POST['supplierEmailEdited'])
            &&isset($_POST['supplierTelephoneEdited'])
            &&isset($_POST['supplierContactPersonEdited'])
            &&isset($_POST['supplierContactPersonContactEdited'])
            &&isset($_POST['editedSupplierId'])
        ){
            $supplierNameEdited = $_POST['supplierNameEdited'];
            $supplierAddressEdited = $_POST['supplierAddressEdited'];
            $supplierEmailEdited = $_POST['supplierEmailEdited'];
            $supplierTelephoneEdited = $_POST['supplierTelephoneEdited'];
            $supplierContactPersonEdited = $_POST['supplierContactPersonEdited'];
            $supplierContactPersonPhoneEdited = $_POST['supplierContactPersonContactEdited'];
            $supplierIdEdited = $_POST['editedSupplierId'];

            $supplier = new supplier($supplierNameEdited,$supplierAddressEdited,$supplierTelephoneEdited,$supplierEmailEdited,$supplierContactPersonEdited,$supplierContactPersonPhoneEdited);
            $supplier->editPerson($supplierIdEdited);
        }
    }

    #This code deletes a suppier from the system
    if($_POST['action']=='deleteSupplier'){

        if(isset($_POST['deletedSupplierId'])){
            $deletedSupplierId = $_POST['deletedSupplierId'];
            $supplier = new supplier($deletedSupplierId,'','','','','');
            $supplier->deletePerson($deletedSupplierId);
        }
    }
    //$supplier = new supplier('Harbourline Industries Ltd','Kampala','0777971871','supply@harbourline.com','John','0706291191');
    //$supplier->addPerson();
}

?>