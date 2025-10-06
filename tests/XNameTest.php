<?php

namespace alcamo\xml;

use alcamo\exception\UnknownNamespacePrefix;
use PHPUnit\Framework\TestCase;

class XNameTest extends TestCase
{
    /**
     * @dataProvider basicsProvider
     */
    public function testBasics($nsName, $localName, $expectedString): void
    {
        $xName = new XName($nsName, $localName);

        $this->assertSame($nsName, $xName->getNsName());
        $this->assertSame($localName, $xName->getLocalName());
        $this->assertSame($expectedString, (string)$xName);
    }

    public function basicsProvider(): array
    {
        return [
            [ null, 'foo', 'foo' ],
            [ 'https://example.org', 'bar', 'https://example.org bar' ]
        ];
    }

    /**
     * @dataProvider newFromQNameAndMapProvider
     */
    public function testNewFromQNameAndMap(
        $qName,
        $map,
        $defaultNs,
        $expectedString
    ): void {
        $xName = XName::newFromQNameAndMap($qName, $map, $defaultNs);

        $this->assertSame($expectedString, (string)$xName);
    }

    public function newFromQNameAndMapProvider(): array
    {
        return [
            [ 'foo', [], null, 'foo' ],
            [ 'bar', [], 'https://example.com', 'https://example.com bar' ],
            [
                'i:baz',
                [ 'b' => 'https://example.biz', 'i' => 'https://example.info' ],
                null,
                'https://example.info baz'
            ],
            [
                'b:qux',
                [ 'b' => 'https://example.biz', 'i' => 'https://example.info' ],
                'https://example.edu',
                'https://example.biz qux'
            ],
        ];
    }

    public function testNewFromQNameAndMapException(): void
    {
        $this->expectException(UnknownNamespacePrefix::class);

        $this->expectExceptionMessage(
            'Unknown namespace prefix "x" in "x:foo"'
        );

        XName::newFromQNameAndMap('x:foo', [], 'https://example.edu');
    }

    /**
     * @dataProvider newFromQNameAndContextProvider
     */
    public function testNewFromQNameAndContext(
        $qName,
        $context,
        $defaultNs,
        $expectedString
    ): void {
        $xName = XName::newFromQNameAndContext($qName, $context, $defaultNs);

        $this->assertSame($expectedString, (string)$xName);
    }

    public function newFromQNameAndContextProvider(): array
    {
        $foo = new \DOMDocument();
        $foo->load(__DIR__ . DIRECTORY_SEPARATOR . 'foo.xml', LIBXML_NOBLANKS);

        return [
            [ 'foo', $foo, null, 'foo' ],
            [ 'bar', $foo, 'https://example.com', 'https://example.com bar' ],
            [ 'i:baz', $foo, null, 'https://example.info baz' ],
            [ 'b:qux', $foo, 'https://example.edu', 'https://example.biz qux' ],
            [
                'quux',
                $foo->documentElement->firstChild,
                null,
                'https://bar.example.org quux'
            ],
            [
                'corge',
                $foo->documentElement->firstChild,
                'https://example.com',
                'https://example.com corge'
            ]
        ];
    }

    public function testNewFromQNameAndContextException1(): void
    {
        $foo = new \DOMDocument();
        $foo->load(__DIR__ . DIRECTORY_SEPARATOR . 'foo.xml', LIBXML_NOBLANKS);

        $this->expectException(UnknownNamespacePrefix::class);

        $this->expectExceptionMessage(
            'Unknown namespace prefix "x" in "x:foo"'
        );

        XName::newFromQNameAndContext('x:foo', $foo, 'https://example.edu');
    }

    public function testNewFromQNameAndContextException2(): void
    {
        $foo = new \DOMDocument();
        $foo->load(__DIR__ . DIRECTORY_SEPARATOR . 'foo.xml', LIBXML_NOBLANKS);

        $this->expectException(UnknownNamespacePrefix::class);

        $this->expectExceptionMessage(
            'Unknown namespace prefix "x" in "x:foo"'
        );

        XName::newFromQNameAndContext(
            'x:foo',
            $foo->firstChild,
            'https://example.edu'
        );
    }

    /**
     * @dataProvider newFromUriProvider
     */
    public function testNewFromUri($uri, $defaultNs, $expectedString): void
    {
        $xName = XName::newFromUri($uri, $defaultNs);

        $this->assertSame($expectedString, (string)$xName);
    }

    public function newFromUriProvider(): array
    {
        return [
            [ 'foo', null, 'foo' ],
            [ 'bar', 'https://example.org', 'https://example.org bar' ],
            [ 'https://example.org/baz', null, 'https://example.org/ baz' ],
            [
                'https://example.org#qux-quux.corge',
                'https://example.com',
                'https://example.org# qux-quux.corge'
            ]
        ];
    }
}
