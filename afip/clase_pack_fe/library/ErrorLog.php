<?php
class ErrorLog
{

    protected $log = array();

    function add($str)
    {
        if(!empty($str))
        {
            if (is_array($str))
                foreach ($str as $it)
                    $this->log[] = $it;
            else
                $this->log[] = $str;
        }
    }
    function addError($error)
    {
        $this->add($error);
    }
    function addErr($error)
    {
        $this->add($error);
    }


    function get($reset = true)
    {
        if (empty($this->log))
            return null;

        $log = $this->log;
        if ($reset)
            $this->reset();
        return $log;
    }
    function getErrLog()
    {
        return $this->get();
    }

    /**
     * Funcion agregada para mantener compatibilidad con $this->resetErrLog()
     */
    function reset()
    {
        $this->log = null;
    }
    function resetErrLog()
    {
        $this->reset();
    }
}
?>
