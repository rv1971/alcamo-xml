<?php

namespace alcamo\xml;

/**
 * @brief Namespace constants needed in many places
 *
 * @date Last reviewed 2026-02-07
 */
interface NamespaceConstantsInterface
{
    /// Dublin core namespace
    public const DC_NS = 'http://purl.org/dc/terms/';

    /// XML Schema has Facet and Property namespace
    public const HFP_NS =
        'http://www.w3.org/2001/XMLSchema-hasFacetAndProperty';

    /// OWL Web Ontology Language namespace
    public const OWL_NS = 'http://www.w3.org/2002/07/owl#';

    /// PHP Xpath namespace
    public const PHP_XPATH_NS = 'http://php.net/xpath';

    /// RDF namespace
    public const RDF_NS = 'http://www.w3.org/1999/02/22-rdf-syntax-ns#';

    /// RDFS namespace
    public const RDFS_NS = 'http://www.w3.org/2000/01/rdf-schema#';

    /// XHTML namespace
    public const XH_NS = 'http://www.w3.org/1999/xhtml';

    /// XHTML datatypes namespace
    public const XH11D_NS = 'http://www.w3.org/1999/xhtml/datatypes/';

    /// XHTML vocabulary namespace
    public const XHV_NS = 'http://www.w3.org/1999/xhtml/vocab#';

    /// XML namespace
    public const XML_NS = 'http://www.w3.org/XML/1998/namespace';

    /// XML Schema namespace
    public const XSD_NS = 'http://www.w3.org/2001/XMLSchema';

    /// XML Schema instance namespace
    public const XSI_NS = 'http://www.w3.org/2001/XMLSchema-instance';

    /// XSL transform namespace
    public const XSL_NS = 'http://www.w3.org/1999/XSL/Transform';

    /// Proprietary namespace for http-related data
    public const HTTP_NS = 'tag:rv1971@web.de,2021:alcamo:ns:http#';

    /// Map of canonical namespace prefixes
    public const NS_PRFIX_TO_NS_URI = [
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
    public const NS_URI_TO_NS_PREFIX = [
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
