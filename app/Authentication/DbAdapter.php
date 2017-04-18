<?php
namespace App\Authentication;
use App\Authentication\AdapterInterface;
use App\Authentication\AbstractAdapter;
use App\Modules\Project\Models\User;
use DB;
/* 
 * This is class to authentication through database
 * @author Thieu.LeQuang
 */
class DbAdapter extends AbstractAdapter implements AdapterInterface
{
    private $_authInfo = null;
    /**
     * Set indentity and credential to adapter
     * @param type $identity
     * @param type $credential
     */
    public function __construct($identity,$credential) {
        
        $this->setCredential($credential)->setIdentity($identity);
        
    }
    /**
     * Authenticate  
     * @param object $db
     * @return boolean
     */
    public function authenticate() {

        $user = User::where('email', $this->identity)->first();
        
        if(empty($user->password)) {
            return false;
        }
        
        if ($user->password === $this->encodeCredential($this->credential)) {

            $user->last_login = date('Y-m-d H:i:s');
            $user->save();
            $this->setAuthInfo($user);

            
            return true;
        }

        return false;
    }
    /**
     * Encode indentity
     * @param string $identity
     * @return string
     */
    public function encodeCredential($credential)
    {
        return md5($credential);
    }
    /**
     * Set authentication info
     * @param stdclass $authInfo
     */
    public function setAuthInfo($authInfo)
    {

        $authInfo->confirmation = $authInfo->email_confirm;
        $this->_authInfo = $authInfo;
    }
    /**
     * Get authentication info
     * @return stdclass
     */
    public function getAuthInfo()
    {
        return $this->_authInfo;
    }
}

