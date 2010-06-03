<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_PDF
 * @package    Zend_PDF_Internal
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

/**
 * @namespace
 */
namespace Zend\PDF\ObjectFactory;
use Zend\PDF;

/**
 * Container which collects updated object info.
 *
 * @uses       \Zend\PDF\PDFDocument
 * @package    Zend_PDF
 * @package    Zend_PDF_Internal
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class UpdateInfoContainer
{
    /**
     * Object number
     *
     * @var integer
     */
    private $_objNum;

    /**
     * Generation number
     *
     * @var integer
     */
    private $_genNum;


    /**
     * Flag, which signals, that object is free
     *
     * @var boolean
     */
    private $_isFree;

    /**
     * String representation of the object
     *
     * @var \Zend\Memory\Container\AbstractContainer|null
     */
    private $_dump = null;

    /**
     * Object constructor
     *
     * @param integer $objCount
     */
    public function __construct($objNum, $genNum, $isFree, $dump = null)
    {
        $this->_objNum = $objNum;
        $this->_genNum = $genNum;
        $this->_isFree = $isFree;

        if ($dump !== null) {
            if (strlen($dump) > 1024) {
                $this->_dump = PDF\PDFDocument::getMemoryManager()->create($dump);
            } else {
                $this->_dump = $dump;
            }
        }
    }


    /**
     * Get object number
     *
     * @return integer
     */
    public function getObjNum()
    {
        return $this->_objNum;
    }

    /**
     * Get generation number
     *
     * @return integer
     */
    public function getGenNum()
    {
        return $this->_genNum;
    }

    /**
     * Check, that object is free
     *
     * @return boolean
     */
    public function isFree()
    {
        return $this->_isFree;
    }

    /**
     * Get string representation of the object
     *
     * @return string
     */
    public function getObjectDump()
    {
        if ($this->_dump === null) {
            return '';
        }

        if (is_string($this->_dump)) {
            return $this->_dump;
        }

        return $this->_dump->getRef();
    }
}
