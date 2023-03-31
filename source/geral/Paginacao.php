<?php
/**
 * MVC core class
 * @category    MVC
 * @package     Pagination
 * @author      Ross Masters <ross@php.net>
 * @copyright   Copyright (c) 2009 Ross Masters.
 * @license     http://wiki.github.com/rmasters/php-mvc/license New BSD License
 * @version     0.1
 */

namespace Geral;

/**
 * Pagination class
 * Provides a simple pagination interface for selecting groups of records.
 * @category    MVC
 * @package     Pagination
 * @copyright   Copyright (c) 2009 Ross Masters.
 * @license     http://wiki.github.com/rmasters/php-mvc/license New BSD License
 */
class Paginacao
{
    /**
     * Total records available in the table
     * @var int
     */
    private $total;

    /**
     * Records to return per set (or page)
     * @var int
     */
    private $perSet;

    /**
     * Number of the current set (1+) (or page)
     * @var int
     */
    private $setNumber;

    /**
     * Sets available based on total and perSet
     * @var int
     */
    private $sets;

    private $url;

    private $search;

    /**
     * Constructor
     * @param   int $setNumber  Current set number (or page)
     * @param   int $perSet Number of records to return per set
     * @param   int $total  Total records in table
     */
    public function __construct($setNumber, $perSet, $total, $url, $search = null) {
        $this->perSet = (int) $perSet;
        $this->total = (int) $total;
        $this->sets = (int) ceil($this->total / $perSet);

        $this->setNumber = $this->changeSet((int) $setNumber);
        $this->url = $url;
        $this->search = $search;
    }

    /**
     * Change the set to another number
     * @param   int $setNumber  New set number
     */
    public function changeSet($setNumber) {
        // Minimum set number
        if ($setNumber < 0) {
            $setNumber = 1;
        }

        // Maximum set number
        if ($setNumber > $this->sets) {
            $setNumber = $this->sets;
        }

        return $setNumber;
    }

    /**
     * Return the number of records to return
     * If there are more than Pagination::perSet records return
     * maximum per set otherwise return the amount of records
     * left to fetch.
     * @return  int Number of records
     */
    public function getCount() {
        // Remainder of records
        $rem = $this->total - ($this->perSet * ($this->setNumber - 1));
        // Return maximum number of records if greater than perSet
        if ($rem > $this->perSet) {
            return $this->perSet;
        }
        // Otherwise return number of records (lt perSet)
        return $rem;
    }

    /**
     * Get the offset (records onwards from 0)
     * @return  int Offset
     */
    public function getOffset() {
        $offset = ($this->perSet * ($this->setNumber - 1));
        return ($offset < 1) ? 0 : $offset;
    }

    /**
     * Get the current set number
     * @return  int Current set number
     */
    public function getSetNumber() {
        return $this->setNumber;
    }

    /**
     * Get total number of sets available
     * return   int Sets available
     */
    public function getSets() {
        return $this->sets;
    }

    public function getLinksPOST()
    {
        $links = '<div id="links-paginacao">';

            for($i = 1; $i <= $this->sets; $i++):
                if($i == $this->getSetNumber()):
                    $links .= '<a class="botao-circular botao-circular-padrao botao-circular-medio botao-circular-delineado-padrao">'.$i.'</a>';
                else:
                    $links .= '<a class="botao-circular botao-circular-sucesso botao-circular-medio" href="'.$this->url.'/'.$i.'/'.$this->search.'">'.$i.'</a>';
                endif;
            endfor;

        $links.= '</div>';

        return $links;
    }

    public function getLinksGET()
    {
        $links = '<div id="links-paginacao">';

            for($i = 1; $i <= $this->sets; $i++):
                if($i == $this->getSetNumber()):
                    $links .= '<a class="botao-circular botao-circular-padrao botao-circular-medio botao-circular-delineado-padrao">'.$i.'</a>';
                else:
                    (!in_array('pagina', $this->search)) ? $this->search['pagina'] = $i : '';
                    $links .= '<a class="botao-circular botao-circular-sucesso botao-circular-medio" href="?'.http_build_query($this->search).'">'.$i.'</a>';
                endif;
            endfor;

        $links.= '</div>';

        return $links;
    }

    public function getLinksCustomPOST()
    {
        $links = '<div id="links-paginacao">';

            for($i = 1; $i <= $this->sets; $i++):
                if($i == $this->getSetNumber()):
                    $links .= '<a class="botao-circular botao-circular-padrao botao-circular-medio botao-circular-delineado-padrao">'.$i.'</a>';
                else:
                    $links .= '<a class="botao-circular botao-circular-sucesso botao-circular-medio bt-custom-paginacao" data-numero-pagina="'.$i.'">'.$i.'</a>';
                endif;
            endfor;

        $links.= '</div>';

        return $links;
    }
}
