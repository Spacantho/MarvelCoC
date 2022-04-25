<?php
class Video
{
    protected $_nbrView = 0;
    protected $_timestamp = 0;

    public function getNbrView()
    {
        return $this->_nbrView;
    }
    public function getTimestamp()
    {
        return $this->_timestamp;
    }
    public function setDate($date)
    {
        $this->_timestamp = $date;
    }
    public function __wakeup()
    {
        if ($this->_timestamp == 0) {
            $this->_timestamp = date('Y-m-d H:i:s', strtotime("+10 seconds"));
            $this->_nbrView += 1;
        }
    }
}
