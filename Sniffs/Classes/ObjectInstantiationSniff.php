<?php

class Healthy_Mage_Sniffs_Classes_ObjectInstantiationSniff
    implements PHP_CodeSniffer_Sniff
{
    protected $disallowedPrefixes = array(
        'Mage_',
        'Enterprise_',
    );

    public function register()
    {
        return array(
            T_NEW
        );
    }

    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $next = $phpcsFile->findNext(T_STRING, $stackPtr + 1);
        $className = $phpcsFile->getTokens()[$next]['content'];

        if (preg_match('/^(' . implode('|', $this->disallowedPrefixes) . ')/i', $className)) {
            $phpcsFile->addWarning(
                'Direct Magento class instantiation (class %s) is discouraged.',
                $stackPtr,
                'DirectInstantiation',
                array($className)
            );
        }
    }

}
