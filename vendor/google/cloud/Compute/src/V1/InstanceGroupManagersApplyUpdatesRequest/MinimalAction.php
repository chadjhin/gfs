<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1\InstanceGroupManagersApplyUpdatesRequest;

use UnexpectedValueException;

/**
 * The minimal action that you want to perform on each instance during the update: - REPLACE: At minimum, delete the instance and create it again. - RESTART: Stop the instance and start it again. - REFRESH: Do not stop the instance. - NONE: Do not disrupt the instance at all. By default, the minimum action is NONE. If your update requires a more disruptive action than you set with this flag, the necessary action is performed to execute the update.
 * Additional supported values which may be not listed in the enum directly due to technical reasons:
 * NONE
 * REFRESH
 * REPLACE
 * RESTART
 *
 * Protobuf type <code>google.cloud.compute.v1.InstanceGroupManagersApplyUpdatesRequest.MinimalAction</code>
 */
class MinimalAction
{
    /**
     * A value indicating that the enum field is not set.
     *
     * Generated from protobuf enum <code>UNDEFINED_MINIMAL_ACTION = 0;</code>
     */
    const UNDEFINED_MINIMAL_ACTION = 0;

    private static $valueToName = [
        self::UNDEFINED_MINIMAL_ACTION => 'UNDEFINED_MINIMAL_ACTION',
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


