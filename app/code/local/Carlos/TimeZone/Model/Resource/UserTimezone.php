<?php
class Carlos_Timezone_Model_Resource_UserTimezone extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('carlos_timezone/user_timezone', 'session_id');
    }
}
