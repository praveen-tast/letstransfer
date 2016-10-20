<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmailJet
 *
 * @author rashmitpalsingh
 */
class EmailJet {
   var $mailjet;
    var $apiKey = ''; //somu fe560327f4795dbdaf4d2ed3b9fdd8dc //sylvian efef5d976838b1f2ae234bf8bbce69c9
    var $secretKey = ''; //somu f6398cb65beb34621a5c2aad791c0963 //sylvain c7222dcfeaf7688c14412bcdd8ef6c60

    const EMAIL_TYPE_TRANSACTIONAL = 1;
    const EMAIL_TYPE_NEWSLETTER = 2;
    const EMAIL_TYPE_NOTIFICATIONS = 3;

    /**
     *
     * @var type Contact list ids from mailjet
     */
    var $users_contact_list;

    public function __construct() {
        parent::__construct();
       
        //if (SERVER_TYPE == "dev.") {
            $this->users_contact_list = "147570";
            $this->apiKey = "fe560327f4795dbdaf4d2ed3b9fdd8dc"; //somu fe560327f4795dbdaf4d2ed3b9fdd8dc //sylvian d81a2c10adc9297a55dbffcd53a7d90d
            $this->secretKey = "f6398cb65beb34621a5c2aad791c0963"; //somu f6398cb65beb34621a5c2aad791c0963 //sylvain e8fca324a33af50f1499f71c33b3a714
            $this->from = "arpesingh@gmail.com"; //somu arpesingh@gmail.com //sylvain sylvain.chevet@mesport.fr
        /*} else {
            $this->users_contact_list = "141052";
            $this->apiKey = "efef5d976838b1f2ae234bf8bbce69c9";
            $this->secretKey = "c7222dcfeaf7688c14412bcdd8ef6c60";
        }*/
        
        
        $this->mailjet = new Mailjet($this->apiKey, $this->secretKey);
        
        $this->smtpOptions = array(
            'timeout' => '5',
            'host' => 'in.mailjet.com',
            'port' => '587',
            'username' => $this->apiKey,
            'password' => $this->secretKey);

       // $this->delivery = 'smtp';
       // $this->sendAs = 'both';
       // $this->layout = 'volley_email';
        
        
        
    }

    public function send($email_type, $content = null, $template = null, $layout = null) {

        //
        if ($email_type == EmailjetComponent::EMAIL_TYPE_TRANSACTIONAL) {
            $this->headers = array(
                'Mailjet-Prio' => '2'
            );

            if ($this->from == null) {
            //    $this->from = 'Volley Me <contact@mesport.fr>';
            }
        } else if ($email_type == EmailjetComponent::EMAIL_TYPE_NEWSLETTER) {
            $this->headers = array(
                'Mailjet-Prio' => '1'
            );

            if ($this->from == null) {
             //   $this->from = 'Volley Me <contact@mesport.fr>';
            }
        }else if($email_type==EmailjetComponent::EMAIL_TYPE_NOTIFICATIONS)
        {
            
            //change the layout
          //  $this->layout = "notification_email";
            
            $this->headers = array(
                'Mailjet-Prio' => '1'
            );

            if ($this->from == null) {
            //    $this->from = 'Volley Me <notification@mesport.fr>';
            }
        }

        
        
        
        //parent::send($content, $template, $layout);
    }
    
    function enableDebug($what)
    {
        $this->mailjet->debug = $what;
    }
}

?>
