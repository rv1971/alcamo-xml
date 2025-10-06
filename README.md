# Class `Syntax`

Constants for (fragments of) regular expressions corresponding to
syntax productions in the XML specifications.

# Class `XName`

Implementation of the concept of an [expanded
name](https://www.w3.org/TR/xml-names/#dt-expname) in XML with
namespaces.

The constructor simply takes a namespace name and a local name as
input. For the sake of performance, the syntactic correctness of the
parameters is not checked.

Static factory methods are provided to create expanded names, among
others from a [qualified
names](https://www.w3.org/TR/xml-names/#dt-qualname).

A `__toString()` method is provided to create strings from `XName`s,
which are useful, among others, to use `XName`s as array indices.

# Interface `HavingXNameInterface`

Simple interface for objects (such as XML Schema items) that have an
expanded name.
