<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A request message for RegionUrlMaps.Validate. See the method description for details.
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.ValidateRegionUrlMapRequest</code>
 */
class ValidateRegionUrlMapRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Project ID for this request.
     *
     * Generated from protobuf field <code>string project = 227560217 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $project = '';
    /**
     * Name of the region scoping this request.
     *
     * Generated from protobuf field <code>string region = 138946292 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $region = '';
    /**
     * The body resource for this request
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.RegionUrlMapsValidateRequest region_url_maps_validate_request_resource = 56632858 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $region_url_maps_validate_request_resource = null;
    /**
     * Name of the UrlMap resource to be validated as.
     *
     * Generated from protobuf field <code>string url_map = 367020684 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $url_map = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $project
     *           Project ID for this request.
     *     @type string $region
     *           Name of the region scoping this request.
     *     @type \Google\Cloud\Compute\V1\RegionUrlMapsValidateRequest $region_url_maps_validate_request_resource
     *           The body resource for this request
     *     @type string $url_map
     *           Name of the UrlMap resource to be validated as.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * Project ID for this request.
     *
     * Generated from protobuf field <code>string project = 227560217 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Project ID for this request.
     *
     * Generated from protobuf field <code>string project = 227560217 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setProject($var)
    {
        GPBUtil::checkString($var, True);
        $this->project = $var;

        return $this;
    }

    /**
     * Name of the region scoping this request.
     *
     * Generated from protobuf field <code>string region = 138946292 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Name of the region scoping this request.
     *
     * Generated from protobuf field <code>string region = 138946292 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setRegion($var)
    {
        GPBUtil::checkString($var, True);
        $this->region = $var;

        return $this;
    }

    /**
     * The body resource for this request
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.RegionUrlMapsValidateRequest region_url_maps_validate_request_resource = 56632858 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Compute\V1\RegionUrlMapsValidateRequest|null
     */
    public function getRegionUrlMapsValidateRequestResource()
    {
        return $this->region_url_maps_validate_request_resource;
    }

    public function hasRegionUrlMapsValidateRequestResource()
    {
        return isset($this->region_url_maps_validate_request_resource);
    }

    public function clearRegionUrlMapsValidateRequestResource()
    {
        unset($this->region_url_maps_validate_request_resource);
    }

    /**
     * The body resource for this request
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.RegionUrlMapsValidateRequest region_url_maps_validate_request_resource = 56632858 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Compute\V1\RegionUrlMapsValidateRequest $var
     * @return $this
     */
    public function setRegionUrlMapsValidateRequestResource($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\RegionUrlMapsValidateRequest::class);
        $this->region_url_maps_validate_request_resource = $var;

        return $this;
    }

    /**
     * Name of the UrlMap resource to be validated as.
     *
     * Generated from protobuf field <code>string url_map = 367020684 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getUrlMap()
    {
        return $this->url_map;
    }

    /**
     * Name of the UrlMap resource to be validated as.
     *
     * Generated from protobuf field <code>string url_map = 367020684 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setUrlMap($var)
    {
        GPBUtil::checkString($var, True);
        $this->url_map = $var;

        return $this;
    }

}

