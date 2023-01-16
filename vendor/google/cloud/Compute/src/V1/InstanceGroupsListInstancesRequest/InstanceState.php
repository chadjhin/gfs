<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1\InstanceGroupsListInstancesRequest;

use UnexpectedValueException;

/**
 * A filter for the state of the instances in the instance group. Valid options are ALL or RUNNING. If you do not specify this parameter the list includes all instances regardless of their state.
 *
 * Protobuf type <code>google.cloud.compute.v1.InstanceGroupsListInstancesRequest.InstanceState</code>
 */
class InstanceState
{
    /**
     * A value indicating that the enum field is not set.
     *
     * Generated from protobuf enum <code>UNDEFINED_INSTANCE_STATE = 0;</code>
     */
    const UNDEFINED_INSTANCE_STATE = 0;
    /**
     * Includes all instances in the generated list regardless of their state.
     *
     * Generated from protobuf enum <code>ALL = 64897;</code>
     */
    const ALL = 64897;
    /**
     * Includes instances in the generated list only if they have a RUNNING state.
     *
     * Generated from protobuf enum <code>RUNNING = 121282975;</code>
     */
    const RUNNING = 121282975;

    private static $valueToName = [
        self::UNDEFINED_INSTANCE_STATE => 'UNDEFINED_INSTANCE_STATE',
        self::ALL => 'ALL',
        self::RUNNING => 'RUNNING',
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

