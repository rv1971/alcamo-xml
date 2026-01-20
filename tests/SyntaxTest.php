<?php

namespace alcamo\xml;

use PHPUnit\Framework\TestCase;

class SyntaxTest extends TestCase
{
    /**
     * @dataProvider regexpProvider
     */
    public function testRegexp($value, $pattern, $expectedValidity): void
    {
        if ($expectedValidity) {
            $this->assertSame(1, preg_match($pattern, $value));
        } else {
            $this->assertSame(0, preg_match($pattern, $value));
        }
    }

    public function regexpProvider(): array
    {
        return [
            [ '_foo:bar',  Syntax::NAME_REGEXP,        true  ],
            [ '1_foo:bar', Syntax::NAME_REGEXP,        false ],
            [ '123baz',    Syntax::NMTOKEN_REGEXP,     true  ],
            [ 'a/b',       Syntax::NMTOKEN_REGEXP,     false ],
            [ 'Foo',       Syntax::NC_NAME_REGEXP,     true  ],
            [ 'F:oo',      Syntax::NC_NAME_REGEXP,     false ],
            [ 'A:B',       Syntax::Q_NAME_REGEXP,      true  ],
            [ 'AB',        Syntax::Q_NAME_REGEXP,      true  ],
            [ 'AB:',       Syntax::Q_NAME_REGEXP,      false ],
            [ 'UTF-8',     Syntax::ENC_NAME_REGEXP,    true  ],
            [ 'UTF:8',     Syntax::ENC_NAME_REGEXP,    false ],
            [ '1.0',       Syntax::VERSION_NUM_REGEXP, true  ],
            [ '2.0',       Syntax::VERSION_NUM_REGEXP, false ]
        ];
    }
}
