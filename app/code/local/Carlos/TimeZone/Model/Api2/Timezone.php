<?php
class Carlos_Timezone_Model_Api2_Timezone extends Mage_Api2_Model_Resource
{
    private $resourceModel;

    protected function _construct()
    {
        $this->_init('carlos_timezone/user_timezone', 'user_timezone_id');
        $this->resourceModel = Mage::getResourceModel('carlos_timezone/userTimezone');
    }

    protected function _retrieve()
    {
        $data = [];
        $sessionId = $this->getRequest()->getParam('session_id'); 
        $userTimezone = $this->resourceModel->load($sessionId, 'session_id');
        if ($userTimezone->getId()) {
            $data = $userTimezone->getData();
        } 
        return $data;
    }

    protected function _create(array $data)
    {
        $timeZoneData = array(
            'session_id' => $data['session_id'],
            'timezone'   => $data['timezone'],
        );
        try {
            $this->resourceModel->setData($timeZoneData)->save();
            echo "New row inserted successfully!";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    protected function _update(array $data)
    {
        $sessionId = $data['session_id'];
        $timezone = $data['timezone'];
        $userTimezone = $this->resourceModel->load($sessionId);
        if ($userTimezone->getId()) {
            $userTimezone->setData('timezone', $timezone);
            try {
                $userTimezone->save();
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } 
    }

    protected function _delete(array $data)
    {
        $sessionId = $data['session_id'];
        $userTimezone = $this->resourceModel->load($sessionId, 'session_id');
        if ($userTimezone->getId()) {
            $userTimezone->delete();
        } else {
            echo "Record with session_id $sessionId not found.";
        }
    }
}
