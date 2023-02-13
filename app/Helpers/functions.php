<?php

use App\Models\Utilisateur;

//Fontion permettant de formatter une date en anglais
if(!function_exists('format_date')){
    function format_date($date){
        if ($date != null) {
            $dateFormatee = explode('/',$date);
            return $dateFormatee[2].'-'.$dateFormatee[1].'-'.$dateFormatee[0];
        }
        return null;
    }
}

//Fontion permettant de formatter une date en francais
if(!function_exists('format_date_french')){
    function format_date_french($date){
        if ($date != null) {
            $dateFormatee = explode('-',$date);
            return $dateFormatee[2].'/'.$dateFormatee[1].'/'.$dateFormatee[0];
        }
        return null;
    }
}

//Fontion permettant d'obtenir la duree en chaîne
if(!function_exists('get_duree_string')){
    function get_duree_string($duree){
        if (!empty($duree)) {
            $heure = explode(':', $duree)[0];
            $minute = explode(':', $duree)[1];

            //Formattage de l'heure
            if ($heure == "00") $heure = "";
            elseif ($heure == "01") $heure = "1 heure";
            else $heure = ($heure[0] == '0' ? $heure[1] : $heure)." heures";

            //Formattage de la minute
            if ($minute == "00") $minute = "";
            elseif ($minute == "01") $minute = "1 minute";
            else $minute = ($minute[0] == '0' ? $minute[1] : $minute)." minutes";

            //Formattage de la durée
            $duree_string = $heure." ".$minute;
            return trim($duree_string);
        }
        return "";
    }
}

//Fonction permettant de générer une chaine aléatoire
function generateRandomString($length = 10) {
    // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//Fonction permettant de faire le formatage monetaire
if(!function_exists('money_format')){
    function money_format($montant){
        return $montant == 0 ? 0 : number_format($montant, '0', ',', ' ');
    }
}

//Fonction permettant de générer le lien de paiement Cinetpay
if(!function_exists('get_lien_cinetpay')){
    function get_lien_cinetpay($user, $cinetpay, $montant, $transaction_id){
        //Initialisation de la requête
        $curl = curl_init();

        //Données à envoyer en POST
        $post_fields = [
            "apikey" => $cinetpay->apikey,
            "site_id" => $cinetpay->site_id,
            "transaction_id" => $transaction_id,
            "amount" => $montant,
            "currency" => $cinetpay->currency,
            "channels" => "ALL",
            "description" => "RECHARGEMENT DE COMPTE CELPAY",
            "customer_id" => $user->identifiant,
            "customer_name" => explode(' ', $user->nom_prenom, 2)[0],
            "customer_surname" => explode(' ', $user->nom_prenom, 2)[1] ?? "",
            "lock_phone_number" => false,
            "customer_phone_number" => "",
            "customer_email" => $user->email ?? "",
            "customer_address" => $user->quartier ?? "",
            "customer_city" => $user->ville->nom_ville ?? "Abidjan",
            "customer_country" => $cinetpay->customer_country,
            "customer_state" => $cinetpay->customer_state,
            "customer_zip_code" => $cinetpay->customer_zip_code,
            "notify_url" => route('cinetpay-notification'),
            "return_url" => route('cinetpay-retour'),
            "lang" => "fr",
            "metadata" => $user->identifiant,
            "invoice_data" => [
                "ID CEL" => $user->identifiant,
                "Nom et Prénom(s)" => $user->nom_prenom,
                "Solde CELPAY" => money_format($user->celpay->solde + $montant)." XOF"
            ]
        ];

        //Parametrage d'envoi
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-checkout.cinetpay.com/v2/payment',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($post_fields),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        //Exécution de la requête
        $response = curl_exec($curl);
        curl_close($curl);

        //On retourne la reponse de l'API
        return json_decode($response);
    }
}

//Fonction permettant de vérifier le statut d'un paiement CinetPay
if(!function_exists('get_statut_paiment_cinetpay')){
    function get_statut_paiment_cinetpay($cinetpay, $transaction_id){
        //Initialisation de la requête
        $curl = curl_init();

        //Données à envoyer en POST
        $post_fields = [
            "apikey" => $cinetpay->apikey,
            "site_id" => $cinetpay->site_id,
            "transaction_id" => $transaction_id,
        ];

        //Parametrage d'envoi
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-checkout.cinetpay.com/v2/payment/check',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($post_fields),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        //Exécution de la requête
        $response = curl_exec($curl);
        curl_close($curl);

        //On retourne la reponse de l'API
        return json_decode($response);
    }
}

//Fonction permettant de retourner le moyen de paiement
if(!function_exists('get_payment_method')){
    function get_payment_method($data){
        $payment_method = "";
        if ($data == "OM") $payment_method = "Orange Money";
        elseif ($data == "MOMO") $payment_method = "MTN Mobile Money";
        elseif ($data == "FLOOZ") $payment_method = "Moov Money";
        return $payment_method;
    }
}

//Fonction permettant de ramener null si champ vide
if(!function_exists('nullable')){
    function nullable($value){
        if (empty($value) || trim($value) == "") return null;
        return $value;
    }
}

//Fonction permettant de ramener null si champ vide
if(!function_exists('get_user')){
    function get_user($identifiant){
        return Utilisateur::find($identifiant);
    }
}

//Fonction permettant de ramener null si champ vide
if(!function_exists('get_montant_panier')){
    function get_montant_panier($paniers){
        $montant_total = 0;
        if ($paniers->count() >= 1) {
            foreach ($paniers as $panier) {
                $montant_total += $panier->sujet->type_sujet->montant;
            }
        }
        return $montant_total;
    }
}