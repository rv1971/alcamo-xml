<?php

namespace alcamo\xml;

/**
 * @brief Object identifiable by an expanded name
 *
 * @date Last reviewed 2025-10-02
 */
interface HavingXNameInterface
{
    /// Get expanded name
    public function getXName(): XName;
}
