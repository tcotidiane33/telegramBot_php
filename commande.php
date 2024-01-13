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
    public function create($formData)
    {
        // Vérifiez si les données nécessaires sont présentes dans $formData
        if (
            !isset($formData['transaction_id']) ||
            !isset($formData['amount']) ||
            !isset($formData['currency']) ||
            !isset($formData['customer_name']) ||
            !isset($formData['customer_surname']) ||
            !isset($formData['description']) ||
            !isset($formData['notify_url']) ||
            !isset($formData['return_url']) ||
            !isset($formData['channels']) ||
            !isset($formData['invoice_data']) ||
            !isset($formData['customer_email']) ||
            !isset($formData['customer_phone_number']) ||
            !isset($formData['customer_address']) ||
            !isset($formData['customer_city']) ||
            !isset($formData['customer_country']) ||
            !isset($formData['customer_state']) 
            // !isset($formData['customer_zip_code'])
        ) {
            throw new Exception("Certaines données obligatoires de la transaction sont manquantes.");
        }

        // Utilisez ces données pour insérer les détails dans la table 'commande'.
        // Assurez-vous de remplacer les valeurs ci-dessous par les clés appropriées de $formData.

        $conn = new PDO("mysql:host=localhost;dbname=cinet", "root", "");

        $stmt = $conn->prepare("INSERT INTO commande (IDCLIENT, MONTANT, CURRENCY, TRANSID, BUYERNAME, BUYERSURNAME, DESCRIPTION, CHANNELS, PHONE, EMAIL, BUYERADDRESS, CITY, COUNTRY, BUYERSTATE,  DATECREATION) 
                        VALUES (:id_client, :montant, :currency, :transid, :buyername, :buyersurname, :description, :channels, :customer_phone, :customer_email, :customer_address, :customer_city, :customer_country, :customer_state,  NOW())");

        // Définir les valeurs des paramètres
        $idClient = uniqid();
        $stmt->bindParam(':id_client', $idClient);  
        $stmt->bindParam(':montant', $formData['amount']);
        $stmt->bindParam(':currency', $formData['currency']);
        $stmt->bindParam(':transid', $formData['transaction_id']);
        $stmt->bindParam(':buyername', $formData['customer_name']);
        $stmt->bindParam(':buyersurname', $formData['customer_surname']);
        $stmt->bindParam(':description', $formData['description']);
        $stmt->bindParam(':channels', $formData['channels']);
        $stmt->bindParam(':customer_phone', $formData['customer_phone_number']); 
        $stmt->bindParam(':customer_email', $formData['customer_email']); 
        $stmt->bindParam(':customer_address', $formData['customer_address']); 
        $stmt->bindParam(':customer_city', $formData['customer_city']); 
        $stmt->bindParam(':customer_country', $formData['customer_country']); 
        $stmt->bindParam(':customer_state', $formData['customer_state']); 
        // $stmt->bindParam(':customer_code', $formData['customer_zip_code']); 

        // $stmt->bindParam(':abonnement', $formData['abonnement']); // Assurez-vous que 'abonnement' est dans $formData
        // $stmt->bindParam(':methode', $formData['methode']); // Assurez-vous que 'methode' est dans $formData
        // $stmt->bindParam(':payid', $formData['payid']); // Assurez-vous que 'payid' est dans $formData
        // $stmt->bindParam(':transstatus', $formData['transstatus']); // Assurez-vous que 'transstatus' est dans $formData
        // $stmt->bindParam(':signature', $formData['signature']); // Assurez-vous que 'signature' est dans $formData
        // $stmt->bindParam(':errormessage', $formData['errormessage']); // Assurez-vous que 'errormessage' est dans $formData
        // $stmt->bindParam(':status', $formData['status']); // Assurez-vous que 'status' est dans $formData
        // $stmt->bindParam(':datecreation', $formData['datecreation']); // Assurez-vous que 'datecreation' est dans $formData
        // $stmt->bindParam(':datemodification', $formData['datemodification']); // Assurez-vous que 'datemodification' est dans $formData
        // $stmt->bindParam(':datepaiement', $formData['datepaiement']); // Assurez-vous que 'datepaiement' est dans $formData

        $stmt->execute();
    }
    public function select()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=cinet", "root", "");

            // Construire la requête SQL pour sélectionner la ligne la plus récente
            $sql = "SELECT * FROM commande ORDER BY DATECREATION DESC LIMIT 1";

            // Préparer la requête
            $stmt = $conn->prepare($sql);

            // Exécuter la requête
            $stmt->execute();

            // Récupérer et retourner la ligne la plus récente
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la sélection dans la base de données: " . $e->getMessage());
        }
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
