<?php

class Commande
{
    protected $_montant;
    protected $_transId;
    protected $_methode;
    protected $_payId;
    protected $_buyerName;
    protected $_transStatus;
    protected $_signature;
    protected $_phone;
    protected $_errorMessage;
    protected $_statut;
    protected $_dateCreation;
    protected $_dateModification;
    protected $_datePaiement;

    public function getCurrentUrl()
    {
        return  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
    }
    public function create($customer_name, $amount, $currency, $transId, $otherDetails)
    {
        // Logique pour créer une nouvelle commande dans votre base de données.
        // Utilisez les paramètres pour insérer les détails dans la table 'commande'.

        $conn = new PDO("mysql:host=localhost;dbname=cinet", "root", "");

        $stmt = $conn->prepare("INSERT INTO commande (IDCLIENT, MONTANT, TRANSID, BUYERNAME, PHONE, DATECREATION) 
                                VALUES (:id_client, :montant, :transid, :buyername, :phone, NOW())");

        $stmt->bindParam(':id_client', $idClient);  // Assurez-vous de définir la valeur de $idClient
        $stmt->bindParam(':montant', $amount);
        $stmt->bindParam(':transid', $transId);
        $stmt->bindParam(':buyername', $customer_name);
        $stmt->bindParam(':phone', $otherDetails['phone']);  // Assurez-vous de définir la valeur correcte

        $stmt->execute();
    }

    public function update($transId, $newData)
    {
        // Logique pour mettre à jour une ligne spécifique dans votre base de données.
        // Utilisez les paramètres pour déterminer la condition de mise à jour et les nouvelles valeurs.

        $conn = new PDO("mysql:host=localhost;dbname=cinet", "root", "");

        // Construisez la requête SQL pour la mise à jour
        $sql = "UPDATE commande SET MONTANT = :montant, METHODE = :methode, PAYID = :payid WHERE TRANSID = :transid";

        // Préparez la requête
        $stmt = $conn->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':montant', $newData['montant']);
        $stmt->bindParam(':methode', $newData['methode']);
        $stmt->bindParam(':payid', $newData['payid']);
        $stmt->bindParam(':transid', $transId);

        // Exécutez la requête
        $stmt->execute();
    }


    public function getCommandeByTransId($transId)
    {
        // Logique pour récupérer les détails d'une commande en utilisant son identifiant de transaction.
        // Vous pouvez interroger votre base de données ou tout autre moyen de stockage.
        // Retournez les détails sous forme de tableau associatif.

        $conn = new PDO("mysql:host=localhost;dbname=cinet", "root", "");

        $stmt = $conn->prepare("SELECT * FROM commande WHERE TRANSID = :transid");
        $stmt->bindParam(':transid', $transId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->_montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->_montant = $montant;
    }

    /**
     * @return mixed
     */
    public function getTransId()
    {
        return $this->_transId;
    }

    /**
     * @param mixed $transId
     */
    public function setTransId($transId)
    {
        $this->_transId = $transId;
    }

    /**
     * @return mixed
     */
    public function getMethode()
    {
        return $this->_methode;
    }

    /**
     * @param mixed $methode
     */
    public function setMethode($methode)
    {
        $this->_methode = $methode;
    }

    /**
     * @return mixed
     */
    public function getPayId()
    {
        return $this->_payId;
    }

    /**
     * @param mixed $payId
     */
    public function setPayId($payId)
    {
        $this->_payId = $payId;
    }

    /**
     * @return mixed
     */
    public function getBuyerName()
    {
        return $this->_buyerName;
    }

    /**
     * @param mixed $buyerName
     */
    public function setBuyerName($buyerName)
    {
        $this->_buyerName = $buyerName;
    }

    /**
     * @return mixed
     */
    public function getTransStatus()
    {
        return $this->_transStatus;
    }

    /**
     * @param mixed $transStatus
     */
    public function setTransStatus($transStatus)
    {
        $this->_transStatus = $transStatus;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->_signature;
    }

    /**
     * @param mixed $signature
     */
    public function setSignature($signature)
    {
        $this->_signature = $signature;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->_errorMessage;
    }

    /**
     * @param mixed $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->_errorMessage = $errorMessage;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->_statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->_statut = $statut;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->_dateCreation;
    }

    /**
     * @param mixed $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->_dateCreation = $dateCreation;
    }

    /**
     * @return mixed
     */
    public function getDateModification()
    {
        return $this->_dateModification;
    }

    /**
     * @param mixed $dateModification
     */
    public function setDateModification($dateModification)
    {
        $this->_dateModification = $dateModification;
    }

    /**
     * @return mixed
     */
    public function getDatePaiement()
    {
        return $this->_datePaiement;
    }

    /**
     * @param mixed $datePaiement
     */
    public function setDatePaiement($datePaiement)
    {
        $this->_datePaiement = $datePaiement;
    }
}
