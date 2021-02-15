<?php


namespace CsVikram\CustomShipping\Plugin;


use Magento\Backend\Model\Auth\Session;

class DisableEnableCustomShipping
{
    /**
     * @var Session
     */
    private $_session;

    public function __construct(
        Session $session)
    {
        $this->_session = $session;
    }

    public function aroundCollectRates(
        \CsVikram\CustomShipping\Model\Carrier\Customshipping $subject,
        \Closure $proceed,
        $request
    ) {

        if (!$this->_session->isLoggedIn()) {
            return false;   // Only allow this to be used from the admin system
        }

        $result = $proceed($request);
        return $result;
    }

}
