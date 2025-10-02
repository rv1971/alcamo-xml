<?php

namespace alcamo\xml;

/**
 * @brief Object identifiable by an expanded name
 *
 * @date Last reviewed 2025-10-02
 */
interface HavingXNameInterface
{
    public function getXName(): XName;
}
