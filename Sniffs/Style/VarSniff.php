<?php

class Healthy_Mage_Sniffs_Style_VarSniff implements PHP_CodeSniffer_Sniff
{
    public function register()
    {
        return array(
            T_VAR
        );
    }

    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $phpcsFile->addWarning('Use of "var" is discouraged.', $stackPtr, 'Found');
    }
}
