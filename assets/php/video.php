<?php
class Video
{

    protected $_nbrView = 0;
    /**
     * On initialise avec un nombre de vues choisi
     *
     * @param integer $nbrView
     */

    /**
     * Augmente de 1 notre nombre de vue
     *
     * @param integer $number
     * @return void
     */
    public function getNbrView()
    {
        return $this->_nbrView;
    }
    public function addView(int $number)
    {
        $this->_nbrView += $number;
    }

    public function __wakeup()
    {
        $this->_nbrView += 1;
    }
}
