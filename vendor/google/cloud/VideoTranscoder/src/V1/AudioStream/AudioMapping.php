<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/video/transcoder/v1/resources.proto

namespace Google\Cloud\Video\Transcoder\V1\AudioStream;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The mapping for the `Job.edit_list` atoms with audio `EditAtom.inputs`.
 *
 * Generated from protobuf message <code>google.cloud.video.transcoder.v1.AudioStream.AudioMapping</code>
 */
class AudioMapping extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The `EditAtom.key` that references the atom with audio inputs in the
     * `Job.edit_list`.
     *
     * Generated from protobuf field <code>string atom_key = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $atom_key = '';
    /**
     * Required. The `Input.key` that identifies the input file.
     *
     * Generated from protobuf field <code>string input_key = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $input_key = '';
    /**
     * Required. The zero-based index of the track in the input file.
     *
     * Generated from protobuf field <code>int32 input_track = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $input_track = 0;
    /**
     * Required. The zero-based index of the channel in the input audio stream.
     *
     * Generated from protobuf field <code>int32 input_channel = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $input_channel = 0;
    /**
     * Required. The zero-based index of the channel in the output audio stream.
     *
     * Generated from protobuf field <code>int32 output_channel = 5 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $output_channel = 0;
    /**
     * Audio volume control in dB. Negative values decrease volume,
     * positive values increase. The default is 0.
     *
     * Generated from protobuf field <code>double gain_db = 6;</code>
     */
    private $gain_db = 0.0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $atom_key
     *           Required. The `EditAtom.key` that references the atom with audio inputs in the
     *           `Job.edit_list`.
     *     @type string $input_key
     *           Required. The `Input.key` that identifies the input file.
     *     @type int $input_track
     *           Required. The zero-based index of the track in the input file.
     *     @type int $input_channel
     *           Required. The zero-based index of the channel in the input audio stream.
     *     @type int $output_channel
     *           Required. The zero-based index of the channel in the output audio stream.
     *     @type float $gain_db
     *           Audio volume control in dB. Negative values decrease volume,
     *           positive values increase. The default is 0.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Video\Transcoder\V1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The `EditAtom.key` that references the atom with audio inputs in the
     * `Job.edit_list`.
     *
     * Generated from protobuf field <code>string atom_key = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getAtomKey()
    {
        return $this->atom_key;
    }

    /**
     * Required. The `EditAtom.key` that references the atom with audio inputs in the
     * `Job.edit_list`.
     *
     * Generated from protobuf field <code>string atom_key = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setAtomKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->atom_key = $var;

        return $this;
    }

    /**
     * Required. The `Input.key` that identifies the input file.
     *
     * Generated from protobuf field <code>string input_key = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getInputKey()
    {
        return $this->input_key;
    }

    /**
     * Required. The `Input.key` that identifies the input file.
     *
     * Generated from protobuf field <code>string input_key = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setInputKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->input_key = $var;

        return $this;
    }

    /**
     * Required. The zero-based index of the track in the input file.
     *
     * Generated from protobuf field <code>int32 input_track = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getInputTrack()
    {
        return $this->input_track;
    }

    /**
     * Required. The zero-based index of the track in the input file.
     *
     * Generated from protobuf field <code>int32 input_track = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setInputTrack($var)
    {
        GPBUtil::checkInt32($var);
        $this->input_track = $var;

        return $this;
    }

    /**
     * Required. The zero-based index of the channel in the input audio stream.
     *
     * Generated from protobuf field <code>int32 input_channel = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getInputChannel()
    {
        return $this->input_channel;
    }

    /**
     * Required. The zero-based index of the channel in the input audio stream.
     *
     * Generated from protobuf field <code>int32 input_channel = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setInputChannel($var)
    {
        GPBUtil::checkInt32($var);
        $this->input_channel = $var;

        return $this;
    }

    /**
     * Required. The zero-based index of the channel in the output audio stream.
     *
     * Generated from protobuf field <code>int32 output_channel = 5 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getOutputChannel()
    {
        return $this->output_channel;
    }

    /**
     * Required. The zero-based index of the channel in the output audio stream.
     *
     * Generated from protobuf field <code>int32 output_channel = 5 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setOutputChannel($var)
    {
        GPBUtil::checkInt32($var);
        $this->output_channel = $var;

        return $this;
    }

    /**
     * Audio volume control in dB. Negative values decrease volume,
     * positive values increase. The default is 0.
     *
     * Generated from protobuf field <code>double gain_db = 6;</code>
     * @return float
     */
    public function getGainDb()
    {
        return $this->gain_db;
    }

    /**
     * Audio volume control in dB. Negative values decrease volume,
     * positive values increase. The default is 0.
     *
     * Generated from protobuf field <code>double gain_db = 6;</code>
     * @param float $var
     * @return $this
     */
    public function setGainDb($var)
    {
        GPBUtil::checkDouble($var);
        $this->gain_db = $var;

        return $this;
    }

}


