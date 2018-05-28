<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/10/18
 * Time: 6:05 PM
 */
require 'CustomerQuotationManager.php';
class CustomerQuotation{

    private $sparePartId;
    private $measure;
    private $price;
    private $Transaction_Type;
    private $DbQuote;

    public function __construct($sparePartId, $measure,$Transaction_Type, $price)
    {

        $this->sparePartId = $sparePartId;
        $this->measure = $measure;
        $this->price = $price;
        $this->Transaction_Type = $Transaction_Type;
        $this->DbQuote = new CustomerQuotationManager();

    }

    public function setOutQuotation(){
        $this->DbQuote->addQuotation($this->sparePartId,$this->Transaction_Type,$this->measure,$this->price);
    }

    public function editOutQuotation()
    {
        $this->DbQuote->editQuotation($this->sparePartId,$this->Transaction_Type,$this->measure,$this->price);
    }

    public function deleteOutQuotation($id){
        $this->DbQuote->deleteQuotation($this->sparePartId,$this->Transaction_Type);
    }
}

if(isset($_POST['action'])){
    if($_POST['action']=='insertSparePart'){
        if(isset($_POST['sparePartId'])&&isset($_POST['creditSalePrices'])&&isset($_POST['packagingOptions'])&&isset($_POST['cashSalePrices'])) {
            $sparePartId = $_POST['sparePartId'];
            $measure = $_POST['packagingOptions'];
            $cashPrice = $_POST['cashSalePrices'];
            $creditPrice = $_POST['creditSalePrices'];


            $cashpricing = new CustomerQuotation($sparePartId,$measure,'cash',$cashPrice);
            $creditpricing = new CustomerQuotation($sparePartId,$measure,'credit',$creditPrice);

            #Saving the new prices
            $cashpricing->setOutQuotation();
            $creditpricing->setOutQuotation();
        }
    }

}
?>