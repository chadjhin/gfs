<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/devtools/artifactregistry/v1beta2/yum_artifact.proto

namespace Google\Cloud\ArtifactRegistry\V1beta2\YumArtifact;

use UnexpectedValueException;

/**
 * Package type is either binary or source.
 *
 * Protobuf type <code>google.devtools.artifactregistry.v1beta2.YumArtifact.PackageType</code>
 */
class PackageType
{
    /**
     * Package type is not specified.
     *
     * Generated from protobuf enum <code>PACKAGE_TYPE_UNSPECIFIED = 0;</code>
     */
    const PACKAGE_TYPE_UNSPECIFIED = 0;
    /**
     * Binary package (.rpm).
     *
     * Generated from protobuf enum <code>BINARY = 1;</code>
     */
    const BINARY = 1;
    /**
     * Source package (.srpm).
     *
     * Generated from protobuf enum <code>SOURCE = 2;</code>
     */
    const SOURCE = 2;

    private static $valueToName = [
        self::PACKAGE_TYPE_UNSPECIFIED => 'PACKAGE_TYPE_UNSPECIFIED',
        self::BINARY => 'BINARY',
        self::SOURCE => 'SOURCE',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PackageType::class, \Google\Cloud\ArtifactRegistry\V1beta2\YumArtifact_PackageType::class);

