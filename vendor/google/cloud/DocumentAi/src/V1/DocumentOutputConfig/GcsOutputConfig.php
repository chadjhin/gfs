<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/documentai/v1/document_io.proto

namespace Google\Cloud\DocumentAI\V1\DocumentOutputConfig;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The configuration used when outputting documents.
 *
 * Generated from protobuf message <code>google.cloud.documentai.v1.DocumentOutputConfig.GcsOutputConfig</code>
 */
class GcsOutputConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * The Cloud Storage uri (a directory) of the output.
     *
     * Generated from protobuf field <code>string gcs_uri = 1;</code>
     */
    private $gcs_uri = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $gcs_uri
     *           The Cloud Storage uri (a directory) of the output.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Documentai\V1\DocumentIo::initOnce();
        parent::__construct($data);
    }

    /**
     * The Cloud Storage uri (a directory) of the output.
     *
     * Generated from protobuf field <code>string gcs_uri = 1;</code>
     * @return string
     */
    public function getGcsUri()
    {
        return $this->gcs_uri;
    }

    /**
     * The Cloud Storage uri (a directory) of the output.
     *
     * Generated from protobuf field <code>string gcs_uri = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setGcsUri($var)
    {
        GPBUtil::checkString($var, True);
        $this->gcs_uri = $var;

        return $this;
    }

}


