<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1\VpnGatewayStatusHighAvailabilityRequirementState;

use UnexpectedValueException;

/**
 * Indicates the high availability requirement state for the VPN connection. Valid values are CONNECTION_REDUNDANCY_MET, CONNECTION_REDUNDANCY_NOT_MET.
 *
 * Protobuf type <code>google.cloud.compute.v1.VpnGatewayStatusHighAvailabilityRequirementState.State</code>
 */
class State
{
    /**
     * A value indicating that the enum field is not set.
     *
     * Generated from protobuf enum <code>UNDEFINED_STATE = 0;</code>
     */
    const UNDEFINED_STATE = 0;
    /**
     * VPN tunnels are configured with adequate redundancy from Cloud VPN gateway to the peer VPN gateway. For both GCP-to-non-GCP and GCP-to-GCP connections, the adequate redundancy is a pre-requirement for users to get 99.99% availability on GCP side; please note that for any connection, end-to-end 99.99% availability is subject to proper configuration on the peer VPN gateway.
     *
     * Generated from protobuf enum <code>CONNECTION_REDUNDANCY_MET = 505242907;</code>
     */
    const CONNECTION_REDUNDANCY_MET = 505242907;
    /**
     * VPN tunnels are not configured with adequate redundancy from the Cloud VPN gateway to the peer gateway
     *
     * Generated from protobuf enum <code>CONNECTION_REDUNDANCY_NOT_MET = 511863311;</code>
     */
    const CONNECTION_REDUNDANCY_NOT_MET = 511863311;

    private static $valueToName = [
        self::UNDEFINED_STATE => 'UNDEFINED_STATE',
        self::CONNECTION_REDUNDANCY_MET => 'CONNECTION_REDUNDANCY_MET',
        self::CONNECTION_REDUNDANCY_NOT_MET => 'CONNECTION_REDUNDANCY_NOT_MET',
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


