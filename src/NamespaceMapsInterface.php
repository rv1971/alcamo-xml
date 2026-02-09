<?php

namespace alcamo\xml;

/**
 * @brief Mappings between namespace names and canonical prefxes
 *
 * Separate from NamespaceConstantsInterface because unlike the latter, the
 * constants in the present interface may be modified by adding items to the
 * arrays. Typically, classes do not implement this interface but copy its
 * constants so that they can be changed.
 *
 * @date Last reviewed 2026-02-09
 */
interface NamespaceMapsInterface extends NamespaceConstantsInterface
{
    /// Map of canonical namespace prefixes
    public const NS_PRFIX_TO_NS_NAME = [
        'dc'    => self::DC_NS,
        'hfp'   => self::HFP_NS,
        'http'  => self::HTTP_NS,
        'owl'   => self::OWL_NS,
        'php'   => self::PHP_XPATH_NS,
        'rdf'   => self::RDF_NS,
        'rdfs'  => self::RDFS_NS,
        'xh'    => self::XH_NS,
        'xh11d' => self::XH11D_NS,
        'xhv'   => self::XHV_NS,
        'xml'   => self::XML_NS,
        'xsd'   => self::XSD_NS,
        'xsi'   => self::XSI_NS,
        'xsl'   => self::XSL_NS
    ];

    /// Map of namespace names to canonical namespace prefixes
    public const NS_NAME_TO_NS_PREFIX = [
        self::DC_NS        => 'dc',
        self::HFP_NS       => 'hfp',
        self::HTTP_NS      => 'http',
        self::OWL_NS       => 'owl',
        self::PHP_XPATH_NS => 'php',
        self::RDF_NS       => 'rdf',
        self::RDFS_NS      => 'rdfs',
        self::XH_NS        => 'xh',
        self::XH11D_NS     => 'xh11d',
        self::XHV_NS       => 'xhv',
        self::XML_NS       => 'xml',
        self::XSD_NS       => 'xsd',
        self::XSI_NS       => 'xsi',
        self::XSL_NS       => 'xsl'
    ];
}
