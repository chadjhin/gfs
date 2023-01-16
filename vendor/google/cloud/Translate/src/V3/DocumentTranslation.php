<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/translate/v3/translation_service.proto

namespace Google\Cloud\Translate\V3;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A translated document message.
 *
 * Generated from protobuf message <code>google.cloud.translation.v3.DocumentTranslation</code>
 */
class DocumentTranslation extends \Google\Protobuf\Internal\Message
{
    /**
     * The array of translated documents. It is expected to be size 1 for now. We
     * may produce multiple translated documents in the future for other type of
     * file formats.
     *
     * Generated from protobuf field <code>repeated bytes byte_stream_outputs = 1;</code>
     */
    private $byte_stream_outputs;
    /**
     * The translated document's mime type.
     *
     * Generated from protobuf field <code>string mime_type = 2;</code>
     */
    private $mime_type = '';
    /**
     * The detected language for the input document.
     * If the user did not provide the source language for the input document,
     * this field will have the language code automatically detected. If the
     * source language was passed, auto-detection of the language does not occur
     * and this field is empty.
     *
     * Generated from protobuf field <code>string detected_language_code = 3;</code>
     */
    private $detected_language_code = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $byte_stream_outputs
     *           The array of translated documents. It is expected to be size 1 for now. We
     *           may produce multiple translated documents in the future for other type of
     *           file formats.
     *     @type string $mime_type
     *           The translated document's mime type.
     *     @type string $detected_language_code
     *           The detected language for the input document.
     *           If the user did not provide the source language for the input document,
     *           this field will have the language code automatically detected. If the
     *           source language was passed, auto-detection of the language does not occur
     *           and this field is empty.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Translate\V3\TranslationService::initOnce();
        parent::__construct($data);
    }

    /**
     * The array of translated documents. It is expected to be size 1 for now. We
     * may produce multiple translated documents in the future for other type of
     * file formats.
     *
     * Generated from protobuf field <code>repeated bytes byte_stream_outputs = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getByteStreamOutputs()
    {
        return $this->byte_stream_outputs;
    }

    /**
     * The array of translated documents. It is expected to be size 1 for now. We
     * may produce multiple translated documents in the future for other type of
     * file formats.
     *
     * Generated from protobuf field <code>repeated bytes byte_stream_outputs = 1;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setByteStreamOutputs($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::BYTES);
        $this->byte_stream_outputs = $arr;

        return $this;
    }

    /**
     * The translated document's mime type.
     *
     * Generated from protobuf field <code>string mime_type = 2;</code>
     * @return string
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * The translated document's mime type.
     *
     * Generated from protobuf field <code>string mime_type = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setMimeType($var)
    {
        GPBUtil::checkString($var, True);
        $this->mime_type = $var;

        return $this;
    }

    /**
     * The detected language for the input document.
     * If the user did not provide the source language for the input document,
     * this field will have the language code automatically detected. If the
     * source language was passed, auto-detection of the language does not occur
     * and this field is empty.
     *
     * Generated from protobuf field <code>string detected_language_code = 3;</code>
     * @return string
     */
    public function getDetectedLanguageCode()
    {
        return $this->detected_language_code;
    }

    /**
     * The detected language for the input document.
     * If the user did not provide the source language for the input document,
     * this field will have the language code automatically detected. If the
     * source language was passed, auto-detection of the language does not occur
     * and this field is empty.
     *
     * Generated from protobuf field <code>string detected_language_code = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setDetectedLanguageCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->detected_language_code = $var;

        return $this;
    }

}

